<?php

namespace App\Http\Controllers;

use App\Models\Discos_carmen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Disco_carmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discos= Discos_carmen::all();
        return view('discos_carmen.index',compact('discos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discos_carmen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $disco= Discos_carmen::create($request->all());
        return redirect()->route('discos_carmen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discos_carmen $disco)
    {   
        return view('discos_carmen.edit',compact('disco'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discos_carmen $disco)
    {
        $disco->update($request->all());
        return redirect()->route('discos_carmen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discos_carmen $disco)
    {
        $disco->delete();
        return redirect()->route('discos_carmen.index');
    }
}
