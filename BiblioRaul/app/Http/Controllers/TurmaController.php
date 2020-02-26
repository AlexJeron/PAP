<?php

namespace App\Http\Controllers;

use App\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = Turma::latest()->get();
        return view('turma.index', ['turmas' => $turmas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Turma::create($this->validateTurma());
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validateTurma();
        $turma = Turma::findOrFail($request->id);
        $turma->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $turma = Turma::findOrFail($request->class_id);
        $turma->delete();
        return back();
    }

    protected function validateTurma()
    {
        return request()->validate([
            'nome' => 'required|unique:turma|max:10',
        ]);
    }
}