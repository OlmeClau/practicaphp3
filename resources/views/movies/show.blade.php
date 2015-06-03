@extends('layout')
@section('content')

<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<style>
			.rating {
			    overflow: hidden;
			    display: inline-block;
			    font-size: 0;
			    position: relative;
			}
			.rating-input {
			    float: right;
			    width: 16px;
			    height: 16px;
			    padding: 0;
			    margin: 0 0 0 -16px;
			    opacity: 0;
			}
			.rating:hover .rating-star:hover,
			.rating:hover .rating-star:hover ~ .rating-star,
			.rating-input:checked ~ .rating-star {
			    background-position: 0 0;
			}
			.rating-star,
			.rating:hover .rating-star {
			    position: relative;
			    float: right;
			    display: block;
			    width: 16px;
			    height: 16px;
			    background: url('http://kubyshkin.ru/samples/star-rating/star.png') 0 -16px;
			}

			/* Just for the demo */
			body {
			    margin: 20px;
			}

	</style>
</head>
<body>

<div class="container">
  <h2><h2>{{$movie->title}}</h2>
	<p>{{$movie->description}}</p>
	<p>category:</p>
<p>{{$movie->category}}</p>
	</h2>
            
  <table class="table">
    
    <tbody>
      <tr>
        <td>Reviews about this movie</td>
        <td>

@foreach ($reviews as $review)
@if($review->movie_id == $movie->id)

		<h2>{{$review->content}}</h2>
		<h2>likes:</h2><h2>{{count($review->likes)}}</h2>
		
		Usuario: {{($review->user == null) ? 'NA' : $review->user->email}}
		<br>
		<a href="/reviews/{{$review->id}}/edit">Editar</a>
		{!! Form::open(array('route' => array('reviews.destroy', $review->id), 'method' => 'delete')) !!}
		<button type="submit" class="btn btn-danger btn-mini">Borrar</button>
		{!! Form::close() !!}
		-----------------------------
		
		
		{!! Form::open(['url'=>'likes']) !!}
		{!! Form::label('name','like:') !!}
		{!! Form::hidden('cant') !!}

		{!! Form::hidden('review_id', $review->id) !!}
		{!! Form::submit('Like') !!}
		{!! Form::close() !!}
		
		@endif
		@endforeach
		</td>



      </tr>

      
      <tr>
        <td>Ratings about this movie</td>

        <td><p>cantidad: {{count($ratings)}}</p>
       @if(count($ratings)!=0)
<p>promedio: {{$total/count($ratings)}}</p>
@endif
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
  <span class="rating">
		<input type="radio" class="rating-input"
    id="rating-input-1-10" name="rating-input-1"/>
        <label for="rating-input-1-10" class="rating-star"></label>

        <input type="radio" class="rating-input"
    id="rating-input-1-9" name="rating-input-1"/>
        <label for="rating-input-1-9" class="rating-star"></label>

        <input type="radio" class="rating-input"
    id="rating-input-1-8" name="rating-input-1"/>
        <label for="rating-input-1-8" class="rating-star"></label>

		<input type="radio" class="rating-input"
    id="rating-input-1-7" name="rating-input-1"/>
        <label for="rating-input-1-7" class="rating-star"></label>

		<input type="radio" class="rating-input"
    id="rating-input-1-6" name="rating-input-1"/>
        <label for="rating-input-1-6" class="rating-star"></label>

        <input type="radio" class="rating-input"
    id="rating-input-1-5" name="rating-input-1"/>
        <label for="rating-input-1-5" class="rating-star"></label>

        <input type="radio" class="rating-input"
                id="rating-input-1-4" name="rating-input-1"/>
        <label for="rating-input-1-4" class="rating-star"></label>
        
        <input type="radio" class="rating-input"
                id="rating-input-1-3" name="rating-input-1"/>
        <label for="rating-input-1-3" class="rating-star"></label>
        
        <input type="radio" class="rating-input"
                id="rating-input-1-2" name="rating-input-1"/>
        <label for="rating-input-1-2" class="rating-star"></label>

        <input type="radio" class="rating-input"
                id="rating-input-1-1" name="rating-input-1"/>
        <label for="rating-input-1-1" class="rating-star"></label>
</span>
</div>

</body>
</html>







@stop





