@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <form action='{{action('Web\UserController@index')}}' method="get">
            <div class="row">
                <div class="form-group col-md-6">
                    <select class="form-control" name="estado" id="estado">
                        @if(request()->get('estado') == 'Activo')
                            <option value="Activo" selected>Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        @endif

                        @if(request()->get('estado') == 'Inactivo')
                            <option value="Inactivo" selected>Inactivo</option>
                            <option value="Activo">Activo</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>
        </form>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Identificacion</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $row)
                                <tr>
                                    <td>{{ $row->name }} {{ $row->apellido }}</td>
                                    <td>{{$row->identificacion}}</td>
                                    <td>{{$row->direccion}}</td>
                                    <td>{{$row->telefono}}</td>
                                    <td>
                                        <select class="form-control" name="is_active" id="is_active"
                                                @change="cambiarEstadoUsuario({{$row->id}}, $event)">
                                            @if($row->estado == 'Activo')
                                                <option value="Activo" selected>Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            @else
                                                <option value="Inactivo" selected>Inactivo</option>
                                                <option value="Activo">Activo</option>
                                            @endif
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$user->render()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
