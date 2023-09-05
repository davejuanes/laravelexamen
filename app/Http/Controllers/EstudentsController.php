<?php

namespace App\Http\Controllers;

use App\Models\Estudent;
use Illuminate\Http\Request;

class EstudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudents = Estudent::all();
        return view('estudents.index', compact('estudents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudent = new Estudent;
        $estudent->nombre = $request->nombre;
        $estudent->paterno = $request->paterno;
        $estudent->materno = $request->materno;
        $estudent->email = $request->email;
        $estudent->ci = $request->ci;

        $estudent->save();

        return redirect()->route('estudents.index')->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudent = Estudent::find($id);
        return view('estudents.edit', compact('estudent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estudent = Estudent::find($id);
        $estudent->nombre = $request->nombre;
        $estudent->paterno = $request->paterno;
        $estudent->materno = $request->materno;
        $estudent->email = $request->email;
        $estudent->ci = $request->ci;

        $estudent->save();

        return redirect()->route('estudents.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudent = Estudent::find($id);
        $estudent->delete();

        return redirect()->route('estudents.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
