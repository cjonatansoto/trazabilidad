@extends('layouts.app')
@section('content')
    <script>
        $(".Books_Illustrations").select2("val", ["a", "c"]);
    </script>
    <section class="section">
        <div class="section-header">
            <div>
                <h3 class="page__heading">Nuevo registro</h3>
                <ul style="background-color: #ffffff" class="breadcrumb breadcrumb-transparent breadcrumb-dot my-2 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('neppex.index') }}">Neppex
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="">Nuevo registro</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(array('route' => 'neppex.store','method'=>'POST', ' enctype' => 'multipart/form-data')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Numero de Neppex/Codaut</label>
                                                {!! Form::text('codaut', null, array('class' => 'form-control')) !!}
                                                @if ($errors->has('codaut'))
                                                    <div class="mt-3">
                                                        <span class="text-danger text-left mt-3">
                                                            {{ $errors->first('codaut') }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fecha de Autorización</label>
                                                {!! Form::date('authorization_date', null, array('class' => 'form-control')) !!}
                                                @if ($errors->has('authorization_date'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('authorization_date') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Contenedor</label>
                                                {!! Form::text('container', null, array('class' => 'form-control')) !!}
                                                @if ($errors->has('container'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('container') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Nombre Contenedor</label>
                                                {!! Form::text('container_name', null, array('class' => 'form-control')) !!}
                                                @if ($errors->has('container_name'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('container_name') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Puerto embarque</label>
                                                <select class="form-control select2" name="shipping_port_id">
                                                    <option value="" selected disabled hidden>SELECCIONAR...</option>
                                                    @foreach($shippingPorts as $shippingPort)
                                                        @if(old('shipping_port_id') == $shippingPort->id)
                                                            <option value="{{$shippingPort->id}}" selected>{{$shippingPort->name}}</option>
                                                        @endif
                                                        <option value="{{$shippingPort->id}}">{{$shippingPort->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('shipping_port_id'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('shipping_port_id') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pais destino</label>
                                                <select class="form-control select2" name="country_id">
                                                    <option value="" selected disabled hidden>SELECCIONAR...</option>
                                                    @foreach($countries as $country)
                                                        @if(old('country_id') == $country->id)
                                                            <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                                        @endif
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('country_id'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('country_id') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Puerto destino</label>
                                                <select class="form-control select2" name="destination_port_id">
                                                    <option value="" selected disabled hidden>SELECCIONAR...</option>
                                                    @foreach($destinationPorts as $destinationPort)
                                                        @if(old('destination_port_id') == $destinationPort->id)
                                                            <option value="{{$destinationPort->id}}" selected>{{$destinationPort->name}}</option>
                                                        @endif
                                                        <option value="{{$destinationPort->id}}">{{$destinationPort->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('destination_port_id'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('destination_port_id') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Exportador</label>
                                                <select class="form-control select2" name="export_id">
                                                    <option value="" selected disabled hidden>SELECCIONAR...</option>
                                                    @foreach($exporters as $exporter)
                                                        @if(old('export_id') == $exporter->id)
                                                            <option value="{{$exporter->id}}" selected>{{$exporter->rut.'-'.$exporter->name}}</option>
                                                        @endif
                                                        <option value="{{$exporter->id}}">{{$exporter->rut.'-'.$exporter->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('export_id'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('export_id') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Agencia de Aduana</label>
                                                <select class="form-control select2" name="border_crossing_id">
                                                    <option value="" selected disabled hidden>SELECCIONAR...</option>
                                                    @foreach($borderCrossings as $borderCrossing)
                                                        @if(old('border_crossing_id') == $borderCrossing->id)
                                                            <option value="{{$borderCrossing->id}}" selected>{{$borderCrossing->name}}</option>
                                                        @endif
                                                        <option value="{{$borderCrossing->id}}">{{$borderCrossing->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('border_crossing_id'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('border_crossing_id') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Consignatario</label>
                                                <select class="form-control select2" name="consignee_id">
                                                    <option value="" selected disabled hidden>SELECCIONAR...</option>
                                                    @foreach($consignees as $consignee)
                                                        @if(old('consignee_id') == $consignee->id)
                                                            <option value="{{$consignee->id}}" selected>{{$consignee->name}}</option>
                                                        @endif
                                                        <option value="{{$consignee->id}}">{{$consignee->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('consignee_id'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('consignee_id') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lugar Almacenamiento</label>
                                                <select class="select-multiple form-control select2" name="storage_location_id[]" multiple="multiple">
                                                    @foreach($storageLocations as $storageLocation)
                                                        @if(old('storage_location_id'))
                                                            @foreach(old('storage_location_id') as $item)
                                                                @if($item == $storageLocation->id)
                                                                    <option value="{{$storageLocation->id}}" selected>{{$storageLocation->code}} - {{$storageLocation->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        <option value="{{$storageLocation->id}}">{{$storageLocation->code}} - {{$storageLocation->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('storage_location_id'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('storage_location_id') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lugar Faenamiento</label>
                                                <select class="select-multiple form-control select2" name="slaughter_place_id[]" multiple="multiple">
                                                    @foreach($slaughterPlaces as $slaughterPlace)
                                                        @if(old('slaughter_place_id'))
                                                            @foreach(old('slaughter_place_id') as $item)
                                                                @if($item == $slaughterPlace->id)
                                                                    <option value="{{$slaughterPlace->id}}" selected>{{$slaughterPlace->code}} - {{$slaughterPlace->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        <option value="{{$slaughterPlace->id}}">{{$slaughterPlace->code}} - {{$slaughterPlace->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('slaughter_place_id'))
                                                    <div class="mt-3">
                                                         <span class="text-danger text-left mt-3">
                                                              {{ $errors->first('slaughter_place_id') }}
                                                         </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">TXT cajas</label>
                                        <input type="file" name="box" accept=".txt">
                                        @if ($errors->has('box'))
                                            <div class="mt-3">
                                                 <span class="text-danger text-left mt-3">
                                                      {{ $errors->first('box') }}
                                                 </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Subir</button>
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
