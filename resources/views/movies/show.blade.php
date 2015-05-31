@extends('layout')
@section('content')

	<h2>{{$movie->title}}</h2>
	<p>{{$movie->description}}</p>
	




	



<p>Reviews about this movie</p>
@foreach ($reviews as $review)
@if($review->movie_id == $movie->id)

		<h2>{{$review->content}}</h2>
		
		Usuario: {{($review->user == null) ? 'NA' : $review->user->email}}
		<br>
		<a href="/reviews/{{$review->id}}/edit">Editar</a>
		{!! Form::open(array('route' => array('reviews.destroy', $review->id), 'method' => 'delete')) !!}
		<button type="submit" class="btn btn-danger btn-mini">Borrar</button>
		{!! Form::close() !!}
	
@endif		
	@endforeach

<p>Ratings about this movie</p>


<p>cantidad: {{count($ratings)}}</p>
<p>promedio: {{$total/count($ratings)}}</p>




	<a href="/movies">Atras</a>
{!! Form::open(['url'=>'reviews']) !!}
{!! Form::label('name','Content:') !!}
{!! Form::text('content') !!}

{!! Form::hidden('movie_id', $movie->id) !!}


<br>

{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
-------------------------------------------------------------------
{!! Form::open(['url'=>'ratings']) !!}
{!! Form::label('name','Value:') !!}
{!! Form::text('value') !!}

{!! Form::hidden('movie_id', $movie->id) !!}


<br>

{!! Form::submit('Guardar') !!}
{!! Form::close() !!}


@stop





