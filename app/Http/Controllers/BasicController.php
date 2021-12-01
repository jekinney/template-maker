<?php

namespace App\Http\Controllers;

use App\Template\{
    Basic,
    Variable
};
use Illuminate\Http\Request;

class BasicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Basic $basic)
    {
        $basics = $basic->orderby('name', 'asc')->get(['id', 'name', 'description']);

        return view('basic.index', compact('basics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Variable $variable)
    {
        $variables = $variable->orderBy('name','asc')->get();

        return view('basic.create', compact('variables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Basic $basic)
    {
        $this->validate( $request, [
            'name' => 'required|string|unique:basics,name',
            'html' => 'required|string',
            'description' => 'required',
        ]);

        $basics = $basic->create([
            'name' => $request->name,
            'html' => $request->html,
            'description' => $request->description,
        ]);

        return redirect()->route('basic.edit', $basics);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Basic  $basic
     * @return \Illuminate\Http\Response
     */
    public function show(Basic $basic)
    {
        return view('basic.show', compact('basic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Basic  $basic
     * @return \Illuminate\Http\Response
     */
    public function edit(Basic $basic, Variable $variable)
    {       
        $variables = $variable->orderBy('name','asc')->get();

        return view('basic.edit', compact('basic', 'variables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Basic  $basic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basic $basic)
    {
        $this->validate( $request, [
            'name' => 'required|string|unique:basics,name,'. $basic->id,
            'html' => 'required|string',
            'locations' => 'nullable',
            'description' => 'required',
        ]);

        $basic->update([
            'name' => $request->name,
            'html' => $request->html,
            'locations' => $request->locations,
            'description' => $request->description,
        ]);

        return redirect()->route('basic.show', $basic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Basic  $basic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basic $basic)
    {
        $basic->delete();

        return redirect()->route( 'basic.index' );
    }
}
