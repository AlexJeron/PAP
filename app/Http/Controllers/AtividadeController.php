<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Http\Requests\EventRequest;
use App\Local;
use App\Professor;
use App\Recurso;
use App\Turma;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

// use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EventRequest $request)
    {
        // Date format
        setlocale(LC_COLLATE, 'pt-PT.utf8');

        if ($request->has('year_month')) {
            // Show current month's activities [Eloquent]

            // dd(request()->all());
            $this->validateYearMonth();
            $atividades = Atividade::latest()
                ->whereMonth('inicio', Carbon::parse($request->year_month)->format('m'))
                ->whereYear('inicio', Carbon::parse($request->year_month)->format('Y'))
                ->get()
            ;

            $users = User::all()->sortBy('nome', SORT_LOCALE_STRING);
            $locais = Local::all()->sortBy('nome', SORT_LOCALE_STRING);
            $professores = Professor::all()->sortBy('nome', SORT_LOCALE_STRING);
            $turmas = Turma::all()->sortBy('id');
            $recursos = Recurso::all()->sortBy('nome', SORT_LOCALE_STRING);
        } else {
            // Show all activities
            $atividades = Atividade::latest()->get();
            $users = User::all()->sortBy('nome', SORT_LOCALE_STRING);
            $locais = Local::all()->sortBy('nome', SORT_LOCALE_STRING);
            $professores = Professor::all()->sortBy('nome', SORT_LOCALE_STRING);
            $turmas = Turma::all()->sortBy('id');
            $recursos = Recurso::all()->sortBy('nome', SORT_LOCALE_STRING);
        }

        return view('atividades.index', compact('atividades', 'users', 'locais', 'professores', 'turmas', 'recursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        if (request()->has('title')) {
            $this->validateAjaxStoreAtividade();

            $atividade = new Atividade(request(['nome', 'user_id', 'local_id', 'recurso_id', 'inicio', 'fim', 'total_espectadores', 'outros_espectadores', 'num_recursos', 'observacao']));
            $atividade->nome = $request->title;
            $atividade->user_id = Auth::user()->id;
            if ($request->recurso_id) {
                $atividade->recurso_id = (int) $request->recurso_id;
            }
            $atividade->inicio = Carbon::parse($request->start)->format('Y-m-d H:i:s');
            $atividade->fim = empty($request->end) ? null : Carbon::parse($request->end)->format('Y-m-d H:i:s');
            $atividade->num_recursos = $request->total_recursos;
            $atividade->save();

            $atividade->turmas()->attach(request('turmas'));
            $atividade->professores()->attach(request('professores'));
        } else {
            $this->validateStoreAtividade();

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

            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Atividade $atividade
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request)
    {
        // dd(request()->all());
        var_dump(request()->all());
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
     * @param \App\Atividade $atividade
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        dd($request->all());
        $atividade = Atividade::findOrFail($request->atividade_id);
        $atividade->delete();

        return back();
    }

    public function ajaxLoad()
    {
        $atividades = Atividade::with('local', 'recurso', 'professores', 'turmas')
            ->select(\DB::raw('id, nome AS title, local_id, recurso_id, inicio AS start, fim AS end, total_espectadores, outros_espectadores, num_recursos AS total_recursos, observacao'))
            ->get()
        ;

        return response()->json($atividades);
    }

    public function ajaxUpdate(EventRequest $request)
    {
        if ($request->has('title')) {
            // dd(request()->all());
            // var_dump(request()->all());
            $this->validateAjaxUpdateAtividade();

            $atividade = Atividade::findOrFail($request->id);
            $atividade->nome = $request->title;
            $atividade->local_id = $request->local_id;
            $atividade->inicio = Carbon::parse($request->start)->format('Y-m-d H:i:s');
            $atividade->fim = empty($request->end) ? null : Carbon::parse($request->end)->format('Y-m-d H:i:s');
            $atividade->total_espectadores = $request->total_espectadores;
            $atividade->outros_espectadores = $request->outros_espectadores;
            $atividade->recurso_id = $request->recurso_id;
            $atividade->num_recursos = $request->total_recursos;
            $atividade->observacao = $request->observacao;
            $atividade->save();
            // dd($request->title);

            $atividade->turmas()->sync(request('turmas'));
            $atividade->professores()->sync(request('professores'));
        } else {
            $atividade = Atividade::where('id', $request->id)->first();
            $atividade->inicio = $request->start;
            if ($request->end) {
                $atividade->fim = $request->end;
            }
            $atividade->save();
        }
    }

    public function ajaxDestroy(Request $request)
    {
        // dd($request->all());
        Atividade::findOrFail($request->id)->delete();

        // return response()->json(true);
    }

    protected function validateAjaxUpdateAtividade()
    {
        return request()->validate([
            'id' => 'required|max:20',
            'title' => 'required|max:255',
            'local_id' => 'required|max:20',
            'start' => 'required|max:25',
            'end' => 'nullable|max:25',
            'total_espectadores' => 'required|max:10',
            'outros_espectadores' => 'nullable|max:255',
            'turmas' => 'exists:turma,id',
            'professores' => 'exists:professor,id',
            'total_recursos' => 'nullable|max:11',
            'recurso_id' => 'nullable|max:20',
            'observacao' => 'nullable|max:255',
        ]);
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

    protected function validateStoreAtividade()
    {
        return request()->validate([
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

    protected function validateAjaxStoreAtividade()
    {
        return request()->validate([
            'title' => 'required|max:255',
            'local_id' => 'required|max:20',
            'start' => 'required|max:25',
            'end' => 'nullable|max:25',
            'total_espectadores' => 'required|max:10',
            'outros_espectadores' => 'nullable|max:255',
            'turmas' => 'exists:turma,id',
            'professores' => 'exists:professor,id',
            'total_recursos' => 'nullable|max:11',
            'recurso_id' => 'nullable|max:20',
            'observacao' => 'nullable|max:255',
        ]);
    }

    protected function validateYearMonth()
    {
        return request()->validate([
            'year_month' => 'nullable|date_format:Y-m',
        ]);
    }
}