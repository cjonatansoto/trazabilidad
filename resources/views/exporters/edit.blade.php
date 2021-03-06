@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <div>
                <h3 class="page__heading">Editar registro</h3>
                <ul style="background-color: #ffffff" class="breadcrumb breadcrumb-transparent breadcrumb-dot my-2 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('exporters.index') }}">Exportadores</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="">Editar registro</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::model($exporter, ['method' => 'PATCH','route' => ['exporters.update', $exporter->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Rut</label>
                                        {!! Form::text('rut', null, array('class' => 'form-control')) !!}
                                        @if ($errors->has('rut'))
                                            <div class="mt-3">
                                        <span class="text-danger text-left mt-3">
                                            {{ $errors->first('rut') }}
                                        </span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                        @if ($errors->has('name'))
                                            <div class="mt-3">
                                        <span class="text-danger text-left mt-3">
                                            {{ $errors->first('name') }}
                                        </span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripci??n</label>
                                        {!! Form::text('description', null, array('class' => 'form-control')) !!}
                                        @if ($errors->has('description'))
                                            <div class="mt-3">
                                        <span class="text-danger text-left mt-3">
                                            {{ $errors->first('description') }}
                                        </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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
