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
        $recursos = Recurso::latest()->get();

        return view('recurso.index', ['recursos' => $recursos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Recurso::create($this->validateStoreRecurso());

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Recurso $recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $recurso = Recurso::findOrFail($request->id);
        $this->validateUpdateRecurso($recurso);
        $recurso->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Recurso $recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $recurso = Recurso::findOrFail($request->recurso_id);
        $recurso->delete();

        return back();
    }

    protected function validateStoreRecurso()
    {
        return request()->validate([
            'nome' => 'required|unique:recurso|max:255',
            'quantidade_total' => 'nullable|numeric|max:255',
            'danificados' => 'nullable|numeric|max:255',
        ]);
    }

    protected function validateUpdateRecurso(Recurso $recurso)
    {
        return request()->validate([
            'nome' => 'required|max:255|unique:recurso,nome,'.$recurso->id,
            'quantidade_total' => 'nullable|numeric|max:255',
            'danificados' => 'nullable|numeric|max:255',
        ]);
    }
}