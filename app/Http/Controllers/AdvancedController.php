<?php

namespace App\Http\Controllers;

use App\Template\Advanced;
use Illuminate\Http\Request;

class AdvancedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Advanced $advanced)
    {
        $advances = $advanced->get(['id', 'name', 'description', 'created_at']);

        return view('advanced.index', compact('advances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advanced.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Advanced $advanced)
    {
        $this->validate( $request, [
            'name' => 'required|string|unique:basics,name',
            'file' => 'required|file',
            'description' => 'required',
        ]);

        $url = $request->file->store( '/public/upload/pdf' );

        $advance = $advanced->create([
            'name' => $request->name,
            'path' => asset( 'storage/'.$url ),
            'description' => $request->description,
        ]);

        return redirect()->route('advanced.edit', $advance);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template\Advanced $advanced
     * @return \Illuminate\Http\Response
     */
    public function show(Advanced $advanced)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template\Advanced $advanced
     * @return \Illuminate\Http\Response
     */
    public function edit(Advanced $advanced)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template\Advanced $advanced
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advanced $advanced)
    {
        $advance = $advanced->create([
            'name' => $request->name,
            'locations' => $request->locations,
            'description' => $request->description,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template\Advanced $advanced
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advanced $advanced)
    {
        // remove image
        // remove data
        // return back
        return back();
    }
}
