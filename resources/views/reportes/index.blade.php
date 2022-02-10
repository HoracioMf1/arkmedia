@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Reportes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-reportes')
                        <a class="btn btn-info" href="{{ route('reportes.create') }}"><i class=" fas fa-plus-square"></i> &nbsp;Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#495B70">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($reportes as $reporte)
                            <tr>
                                <td style="display: none;">{{ $reporte->id }}</td>                                
                                <td>{{ $reporte->titulo }}</td>
                                <td>{{ $reporte->contenido }}</td>
                                <td>
                                    <form action="{{ route('reportes.destroy',$reporte->id) }}" method="POST">                                        
                                        @can('editar-reportes')
                                        <a class="btn btn-warning" href="{{ route('reportes.edit',$reporte->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-reportes')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $reportes->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection