<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\biodatas;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biodatas = biodatas::all();
        return view ('biodatas.index', compact('biodatas'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biodatas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
        ]);
        biodatas::create ($request->all());
        return redirect()->route('biodatas.index');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $biodata = biodatas::find($id);
        return view('biodatas.edit', compact('biodata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $biodata = biodatas::find($id);
        $biodata -> update($request->all());
        return redirect()->route('biodatas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        biodatas::find($id)->delete();
        return redirect()->route('biodatas.index');
    }
}
