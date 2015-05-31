Vista de reviews:
@extends('layout')
@section('content')
	<h1>reviews</h1>
	@foreach ($reviews as $review)
		<h2><a href="/reviews/{{$review->id}}">{{$review->content}}</a></h2>
		
		<a href="/reviews/{{$review->id}}/edit">Editar</a>
		{!! Form::open(array('route' => array('reviews.destroy', $review->id), 'method' => 'delete')) !!}
		<button type="submit" class="btn btn-danger btn-mini">Borrar</button>
		{!! Form::close() !!}
	@endforeach
	<a href="/reviews/create">Nuevo</a>

@stop