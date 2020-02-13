<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Local;
use App\Professor;
use App\Recurso;
use App\Turma;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mostrar as atividades do mês atual [Eloquent]
        $atividade = Atividade::latest()
            ->whereMonth('inicio', Carbon::now()->month)
            ->get();
        setlocale(LC_COLLATE, 'pt-PT.utf8');
        $user = User::all()->sortBy('nome', SORT_LOCALE_STRING);
        $local = Local::all()->sortBy('nome', SORT_LOCALE_STRING);
        $professor = Professor::all()->sortBy('nome', SORT_LOCALE_STRING);
        $turma = Turma::all()->sortBy('id');
        $recurso = Recurso::all()->sortBy('nome', SORT_LOCALE_STRING);

        // $user = DB::table('user')->orderBy('nome')->get();
        // $local = DB::table('local')->orderBy('nome')->get();

        // $local = Atividade::latest()
        //     ->from('atividade', 'local')
        //     ->where('atividade.local_id', '=', 'local.id');
        // $local = Atividade::where('atividade.local_id', '=', 'local.id');

        // [Query Builder]
        // $atividade = DB::table('atividade')
        //     ->select('atividade.id', 'atividade.nome', 'local.nome AS local', DB::raw('DATE_FORMAT(inicio, "%d") AS inicio'), 'fim', 'observacao')
        //     ->join('local', 'local_id', '=', 'local.id')
        // // ->join('atividade_espectador', 'atividade.id', '=', 'atividade_espectador.atividade_id')
        // // ->join('espectador', 'espectador.id', '=', 'atividade_espectador.espectador_id')
        //     ->whereMonth('inicio', Carbon::now()->month)
        //     ->get();

        return view('atividades.index', compact('atividade', 'user', 'local', 'professor', 'turma', 'recurso'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show(Atividade $atividade)
    {
        return view('atividades.show', compact('atividade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atividades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $this->validateNewAtividade();

        $atividade = new Atividade(request(['nome', 'user_id', 'local_id', 'recurso_id', 'inicio', 'fim', 'total_espectadores', 'outros_espectadores', 'num_recursos', 'observacao']));
        $atividade->user_id = Auth::user()->id;
        $atividade->local_id = $request->new_local_id;
        $atividade->recurso_id = $request->new_recurso_id;
        $atividade->inicio = Carbon::parse($request->inicio)->format('Y-m-d H:i:s');
        $atividade->fim = empty($request->fim) ? null : Carbon::parse($request->fim)->format('Y-m-d H:i:s');
        $atividade->num_recursos = $request->new_num_recursos;
        $atividade->save();

        $atividade->turmas()->attach(request('new_turmas'));
        $atividade->professores()->attach(request('new_professores'));

        return redirect('/atividades');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit(Atividade $atividade)
    {
        return view('atividades.edit', compact('atividade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd(request()->all());
        $this->validateEditAtividade();

        $atividade = Atividade::findOrFail($request->id);
        $atividade->nome = $request->nome;
        $atividade->local_id = $request->local_id;
        $atividade->inicio = Carbon::parse($request->inicio)->format('Y-m-d H:i:s');
        $atividade->fim = empty($request->fim) ? null : Carbon::parse($request->fim)->format('Y-m-d H:i:s');
        $atividade->total_espectadores = $request->total_espectadores;
        $atividade->outros_espectadores = $request->outros_espectadores;
        $atividade->recurso_id = $request->recurso_id;
        $atividade->num_recursos = $request->num_recursos;
        $atividade->observacao = $request->observacao;
        $atividade->save();

        $atividade->turmas()->sync(request('turmas'));
        $atividade->professores()->sync(request('professor_id'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $atividade = Atividade::findOrFail($request->atividade_id);
        $atividade->delete();
        return back();
    }

    protected function validateEditAtividade()
    {
        return request()->validate([
            'id' => 'required|max:20',
            'nome' => 'required|max:255',
            'local_id' => 'required|max:20',
            'inicio' => 'required|max:25',
            'fim' => 'nullable|max:25',
            'total_espectadores' => 'required|max:10',
            'outros_espectadores' => 'nullable|max:255',
            'turmas' => 'exists:turma,id',
            'professor_id' => 'exists:professor,id',
            'num_recursos' => 'nullable|max:11',
            'recurso_id' => 'nullable|max:20',
            'observacao' => 'nullable|max:255',
        ]);
    }

    protected function validateNewAtividade()
    {
        request()->validate([
            'nome' => 'required|max:255',
            'new_local_id' => 'required|max:20',
            'inicio' => 'required|max:25',
            'fim' => 'nullable|max:25',
            'total_espectadores' => 'required|max:10',
            'outros_espectadores' => 'nullable|max:255',
            'new_turmas' => 'exists:turma,id',
            'new_professores' => 'exists:professor,id',
            'new_num_recursos' => 'nullable|max:11',
            'new_recurso_id' => 'nullable|max:20',
            'observacao' => 'nullable|max:255',
        ]);
    }
}