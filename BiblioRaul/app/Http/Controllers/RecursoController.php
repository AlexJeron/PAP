<?php

namespace App\Http\Controllers;

use App\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recurso = Recurso::latest()->get();

        return view('recurso.index', ['recurso' => $recurso]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function show(Recurso $recurso)
    {
        return view('recurso.show', compact('recurso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recurso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Recurso::create($this->validateRecurso());

        return redirect('/recurso');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurso $recurso)
    {
        return view('recurso.edit', compact('recurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'quantidade' => 'nullable|max:255',
        ]);

        $recurso = Recurso::findOrFail($request->id);
        $recurso->update($request->all());

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $recurso = Recurso::findOrFail($request->recurso_id);
        $recurso->delete();
        return back();
    }

    protected function validateRecurso()
    {
        return request()->validate([
            'nome' => 'required|max:255',
            'quantidade' => 'nullable|max:255',
        ]);
    }
}