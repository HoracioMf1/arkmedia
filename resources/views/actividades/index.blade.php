@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Actividades</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-actividades')
                        <a class="btn btn-info" href="{{ route('actividades.create') }}"><i class=" fas fa-plus-square"></i> &nbsp;Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#495B70">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($actividades as $actividade)
                            <tr>
                                <td style="display: none;">{{ $actividade->id }}</td>                                
                                <td>{{ $actividade->titulo }}</td>
                                <td>{{ $actividade->contenido }}</td>
                                <td>
                                    <form action="{{ route('actividades.destroy',$actividade->id) }}" method="POST">                                        
                                        @can('editar-actividades')
                                        <a class="btn btn-warning" href="{{ route('actividades.edit',$actividade->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-actividades')
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
                            {!! $actividades->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection