@extends('layout')
@section('content')

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2><h2>{{$movie->title}}</h2>
	<p>{{$movie->description}}</p></h2>
            
  <table class="table">
    
    <tbody>
      <tr>
        <td>Reviews about this movie</td>
        <td>

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
		</td>



      </tr>
      <tr>
        <td>Ratings about this movie</td>
        <td><p>cantidad: {{count($ratings)}}</p>
<p>promedio: {{$total/count($ratings)}}</p>
</td>
      </tr>
      <tr>
        <td>
{!! Form::open(['url'=>'reviews']) !!}
{!! Form::label('name','Content:') !!}
{!! Form::text('content') !!}

{!! Form::hidden('movie_id', $movie->id) !!}


<br>

{!! Form::submit('Guardar') !!}
{!! Form::close() !!}</td>
        <td>{!! Form::open(['url'=>'ratings']) !!}
{!! Form::label('name','Value:') !!}
{!! Form::text('value') !!}

{!! Form::hidden('movie_id', $movie->id) !!}


<br>

{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
</td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>







@stop





