@extends('layouts.app')

@section('content')


<h1>Estas son las recetas</h1>

<ul>

    @foreach ($recetas as $receta)
    <li>
        {{ $receta }}
    </li>

    @endforeach
</ul>

<h1>Estas son las categorias</h1>

<ul>

    @foreach ($categorias as $categoria)
    <li>
        {{ $categoria }}
    </li>

    @endforeach
</ul>

@endsection