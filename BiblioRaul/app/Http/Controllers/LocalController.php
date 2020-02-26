<?php

namespace App\Http\Controllers;

use App\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locais = Local::latest()->get();
        return view('local.index', ['locais' => $locais]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Local::create($this->validateStoreLocal());
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $local = Local::findOrFail($request->id);
        $this->validateUpdateLocal($local);
        $local->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $local = Local::findOrFail($request->local_id);
        $local->delete();
        return back();
    }

    protected function validateStoreLocal()
    {
        return request()->validate([
            'nome' => 'required|unique:local|max:255',
            'capacidade' => 'nullable|numeric|max:255',
        ]);
    }

    protected function validateUpdateLocal(Local $local)
    {
        return request()->validate([
            'nome' => 'required|max:255|unique:local,nome,' . $local->id,
            'capacidade' => 'nullable|numeric|max:255',
        ]);
    }
}