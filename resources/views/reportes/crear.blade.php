@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de reportes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                <strong>¡Revisa los campos!</strong>
                                @foreach($errors->all() as $error)
                                <span class="badge badge-danger">{{$error}}</span> 
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {!! Form::open(array('route'=>'reportes.store', 'method'=>'Post')) !!}  
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label for="titulo">Titulo:</label>
                                    {!! Form::text('titulo', null, array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                           
                            
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label for="contenido">Contenido:</label>
                                    {!! Form::textarea('contenido', null, array('class'=>'form-control')) !!}
                                    <div class="text-secondary">NOTA: Desliza la parte inferior derecha del campo de contenido para hacer más grande el espacio. <a class="text-warning">*</a></div>
                                </div>

                                </div>
                           
                            
                                
                            
                        
                              
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <button type="reset" class="btn btn-light" style="display: inline">Borrar</button>

                                </div>

                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

