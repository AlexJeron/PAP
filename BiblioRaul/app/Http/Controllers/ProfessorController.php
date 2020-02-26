<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professores = Professor::latest()->get();
        return view('professor.index', ['professores' => $professores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Professor::create($this->validateProfessor());
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validateProfessor();

        $professor = Professor::findOrFail($request->id);
        $professor->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $professor = Professor::findOrFail($request->professor_id);
        $professor->delete();
        return back();
    }

    protected function validateProfessor()
    {
        return request()->validate([
            'nome' => 'required|max:255',
            'email' => 'nullable|max:255',
        ]);
    }
}