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
        $professor = Professor::latest()->get();

        return view('professor.index', ['professor' => $professor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        return view('professor.show', compact('professor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professor.create');
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

        return redirect('/professor');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        return view('professor.edit', compact('professor'));
        /**
         * ou
         *
         * return view('professor.edit', ['professor' => $professor]); */
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
        // $professor->update($this->validateProfessor());
        // return redirect('/professor/' . $professor->id);
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'email' => 'nullable|max:255',
        ]);

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