<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-actividades|crear-actividades|editar-actividades|borrar-actividades')->only('index');
         $this->middleware('permission:crear-actividades', ['only' => ['create','store']]);
         $this->middleware('permission:editar-actividades', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-actividadess', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $actividades = Actividades::paginate(5);
         return view('actividades.index',compact('actividades'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $actividades->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividades.crear');
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
    
        Actividades::create($request->all());
    
        return redirect()->route('actividades.index');
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
    public function edit(Actividades $actividades)
    {
        return view('actividades.editar',compact('actividades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividades $actividades)
    {
         request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
    
        $actividades->update($request->all());
    
        return redirect()->route('actividades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividades $actividades)
    {
        $actividades->delete();
    
        return redirect()->route('actividades.index');
    }
}