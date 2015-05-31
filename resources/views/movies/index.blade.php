Vista de movies:
@extends('layout')
@section('content')
	<h1>Movies</h1>
	@foreach ($movies as $movie)
		<h2><a href="/movies/{{$movie->id}}">{{$movie->title}}</a></h2>
		<p>{{$movie->description}}</p>
		
		<button type="button" class="btn btn-default"><a href="/movies/{{$movie->id}}/edit">Editar</a></button>
		{!! Form::open(array('route' => array('movies.destroy', $movie->id), 'method' => 'delete')) !!}
		<button type="submit" class="btn btn-danger btn-mini">Borrar</button>
		{!! Form::close() !!}
	@endforeach
	<button type="button" class="btn btn-default"><a href="/movies/create">Nueva Pelicula</a></button>
	

@stop