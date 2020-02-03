<?php

namespace App\Http\Controllers;

use App\Atividade;
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
        $atividade = Atividade::latest()->get();

        return view('atividade.index', ['atividade' => $atividade]);

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