<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Estudent;
use App\Models\Matricula;
use DB;
use Illuminate\Http\Request;


class MatriculasController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matriculas = DB::table('matriculas as m')
        ->join('estudents as e', 'e.id', '=', 'm.estudent_id')
        ->join('courses as c', 'c.id', '=', 'm.course_id')
        ->select('*', 'm.id AS matricula_id', 'c.nombre AS nombre_curso', 'e.nombre AS nombre_estudent')
        ->get();
        
        return view('matriculas.index', compact('matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudents = Estudent::all();

        $courses = Course::all();
        return view('matriculas.create', compact('estudents', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $matricula = new Matricula;

        $matricula->estudent_id = $request->estudent_id;
        $matricula->course_id = $request->course_id;
        $matricula->fechamatriculacion = $request->fechamatriculacion;
        $matricula->nota = $request->nota;

        $matricula->save();

        return redirect()->route('matriculas.index')->with('success', 'Matricula creada exitosamente.');
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
        $matricula = Matricula::find($id);

        $estudents = Estudent::all();
        
        $courses = Course::all();
        return view('matriculas.edit', compact('matricula', 'estudents', 'courses'));
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
        $matricula = Matricula::find($id);

        $matricula->estudent_id = $request->estudent_id;
        $matricula->course_id = $request->course_id;
        $matricula->fechamatriculacion = $request->fechamatriculacion;
        $matricula->nota = $request->nota;

        $matricula->save();

        return redirect()->route('matriculas.index')->with('success', 'Matricula creada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula = Matricula::find($id);
        $matricula->delete();

        return redirect()->route('matriculas.index')->with('success', 'Matricula eliminada exitosamente.');
    }
}
