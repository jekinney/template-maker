<?php

namespace App\Http\Controllers;

use App\Template\Variable;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Variable $variable)
    {
        $variables = $variable->orderBy('name', 'asc')->get(['id','name', 'variable', 'test_data', 'description']);

        return view('variable.index', compact('variables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('variable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Variable $variable)
    {
        $this->validate( $request, [
            'name' => 'required|string|unique:variables,name',
            'variable' => 'required|string|unique:variables,variable',
            'test_data' => 'required|string',
            'description' => 'required|string',
        ]);

        $variable->create( $request->only('name', 'variable', 'test_data', 'description') );

        return redirect()->route('variable.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function show(Variable $variable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function edit(Variable $variable)
    {
        return view('variable.edit', compact('variable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variable $variable)
    {
        $this->validate( $request, [
            'name' => 'required|string|unique:variables,name,'.$variable->id,
            'variable' => 'required|string|unique:variables,variable,'.$variable->id,
            'test_data' => 'required|string',
            'description' => 'required|string',
        ]);

        $variable->update( $request->only('name', 'variable', 'test_data', 'description') );

        return redirect()->route('variable.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variable $variable)
    {
        //
    }
}
