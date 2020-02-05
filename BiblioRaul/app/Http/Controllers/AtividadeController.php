<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Local;
use App\Professor;
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
        $turma = Turma::all()->sortBy('nome', SORT_LOCALE_STRING);

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

        return view('atividade.index', compact('atividade', 'user', 'local', 'professor', 'turma'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show(Atividade $atividade)
    {
        return view('atividade.show', compact('atividade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('atividade.create');
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
        // $this->validateAtividade();
        $atividade = new Atividade(request(['nome', 'local_id', 'user_id', 'inicio', 'fim', 'observacao']));
        $atividade->user_id = Auth::user()->id;
        $atividade->inicio = Carbon::parse($request->inicio)->format('Y-m-d H:i:s');
        $atividade->fim = Carbon::parse($request->fim)->format('Y-m-d H:i:s');
        $atividade->save();

        // Atividade::create($this->validateAtividade());

        return redirect('/atividade');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit(Atividade $atividade)
    {
        return view('atividade.edit', compact('atividade'));
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
        dd(request()->all());
        // $validatedData = $request->validate([
        //     'nome' => 'required|max:255',
        //     'user_id' => 'required|max:20',
        //     'local_id' => 'required|max:20',
        //     'inicio' => 'required|max:25',
        //     'fim' => 'nullable|max:25',
        //     'observacao' => 'nullable|max:255',
        // ]);
        $this->validateAtividade();

        $atividade = Atividade::findOrFail($request->id);
        $atividade->nome = $request->nome;
        $atividade->local_id = $request->local_id;
        $atividade->user_id = $request->user_id;
        $atividade->inicio = Carbon::parse($request->inicio)->format('Y-m-d H:i:s');
        $atividade->fim = Carbon::parse($request->fim)->format('Y-m-d H:i:s');
        $atividade->observacao = $request->observacao;
        $atividade->save();

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

    protected function validateAtividade()
    {
        return request()->validate([
            'nome' => 'required|max:255',
            'local_id' => 'required|max:20',
            // 'user_id' => 'required|max:20',
            'inicio' => 'required|max:25',
            'fim' => 'nullable|max:25',
            'observacao' => 'nullable|max:255',
        ]);
    }
}