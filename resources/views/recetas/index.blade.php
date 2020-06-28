@extends('layouts.app')

@section('botones')

<a href="{{ route('recetas.create') }}" class="btn btn-outline-primary mr-2 font-weight-bold text-uppercase">Crear receta</a>
<a href="{{ route('perfiles.edit', ['perfil'=> Auth::user()->id] ) }}" class="btn btn-outline-success font-weight-bold mr-2 text-uppercase">Editar Perfil</a>
<a href="{{ route('perfiles.show', ['perfil'=> Auth::user()->id] ) }}" class="btn btn-outline-info font-weight-bold mr-2 text-uppercase">Mostrar Perfil</a>
    
@endsection

@section('content')

<h2 class="text-center mb-5">Administra tus recetas</h2>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">

        <thead class="bg-primary text-light">
            <tr>

                <th scole="col">Título</th>
                <th scole="col">Categoría</th>
                <th scole="col">Acciones</th>

            </tr>
        </thead>

        <tbody>

            @foreach ($recetas as $receta)
                
            <tr>
                <td>{{ $receta->titulo }}</td>
                <td>{{ $receta->categoria->nombre }}</td>
                <td class="row">

                    <eliminar-receta 
                    receta-id="{{ $receta->id }}"
                    ></eliminar-receta>

                    <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}" class="btn btn-dark mr-2">Editar</a>
                    <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-success">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>



    </table>
</div>




@endsection