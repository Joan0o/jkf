@extends('admin.template')

@section('sidebar')
    @parent
@stop

@php
    $cursos = \App\curso::all();
@endphp

@section('content')
<div class="card" style="width:70%; margin:auto;">
    
    @isset($cursos)
        @if(count($cursos) > 0)
            @foreach($cursos as $curso)
                <div class="rounded" style="background-color:#ffa50091; margin-top:30px; padding:15px 20px 26px 33px;">
                    <h1 style="color:white;">{{$curso->nombre}}</h1>
                    <div class="container">
                        <p>{{$curso->descripcion}}</p>
                    </div>
                    <button type="button" style="float:right; margin:10px;" class="btn btn-info">info</button> 
                </div>
            @endforeach
        @endif
    @endisset

    <form action="{{route('cursos.store')}}" method="post" style="margin:23px 0;">
    @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right"> Nombre </label>

            <div class="col-md-6">
                <input placeholder="nombre" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="descripcion" class="col-md-4 col-form-label text-md-right"> Descripcion </label>

            <div class="col-md-6">
                <input placeholder="descripcion" id="descripcion" type="area" class="form-control" name="descripcion" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="correo" class="col-md-4 col-form-label text-md-right"> Temas </label>

            <div class="col-md-6">
                <input placeholder="Describe el curso en palabras cortas al lado de un numeral # como los hashtags en twitter" id="temas" type="area" class="form-control" name="temas" required>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Crear</button>

    </form>

</div>
@stop
