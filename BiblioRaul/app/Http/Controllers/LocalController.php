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
        $local = Local::latest()->get();

        return view('local.index', ['local' => $local]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function show(Local $local)
    {
        return view('local.show', compact('local'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('local.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Local::create($this->validateLocal());

        return redirect('/local');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Local  $local
     * @return \Illuminate\Http\Response
     */
    public function edit(Local $local)
    {
        return view('local.edit', compact('local'));
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
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'espaco' => 'nullable|max:255',
        ]);

        $local = Local::findOrFail($request->id);
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

    protected function validateLocal()
    {
        return request()->validate([
            'nome' => 'required|max:255',
            'espaco' => 'nullable|max:255',
        ]);
    }
}