<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reportes;

class ReportesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-reportes|crear-reportes|editar-reportes|borrar-reportes')->only('index');
         $this->middleware('permission:crear-reportes', ['only' => ['create','store']]);
         $this->middleware('permission:editar-reportes', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-reportes', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $reportes = Reportes::paginate(5);
         return view('reportes.index',compact('reportes'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $reportes->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reportes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
    
        Reportes::create($request->all());
    
        return redirect()->route('reportes.index');
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
    public function edit(Reportes $reportes)
    {
        return view('reportes.editar',compact('reportes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reportes $reportes)
    {
         request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
    
        $reportes->update($request->all());
    
        return redirect()->route('reportes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reportes $reportes)
    {
        $reportes->delete();
    
        return redirect()->route('reportes.index');
    }
}