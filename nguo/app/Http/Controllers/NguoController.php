<?php

namespace App\Http\Controllers;

use App\Models\Nguo;
use Illuminate\Http\Request;

class NguoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Nguo::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nguo = Nguo::create($request->all());
        return response()->json($nguo);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(Nguo::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nguo $nguo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nguo = Nguo::findOrFail($id);
        $nguo->update($request->all());
        return response()->json($nguo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Nguo::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
