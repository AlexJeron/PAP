<?php

namespace App\Http\Controllers;

use App\Atividade;
use Carbon\Carbon;
use DB;
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
        $user = DB::table('user')->orderBy('nome')->get();
        $local = DB::table('local')->orderBy('nome')->get();

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

        return view('atividade.index', compact('atividade', 'user', 'local'));
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
    public function store()
    {
        Atividade::create($this->validateAtividade());

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
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'user_id' => 'required|max:20',
            'local_id' => 'required|max:20',
            'inicio' => 'required|max:25',
            'fim' => 'nullable|max:25',
            'observacao' => 'nullable|max:255',
        ]);

        $atividade = Atividade::findOrFail($request->id);
        $atividade->update($request->all());

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
            'user_id' => 'required|max:20',
            'local_id' => 'required|max:20',
            'inicio' => 'required|max:25',
            'fim' => 'nullable|max:25',
            'observacao' => 'nullable|max:255',
        ]);
    }
}
