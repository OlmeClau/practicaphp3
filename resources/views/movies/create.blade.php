@extends('layout')
@section('content')
<h1> peliculas y mas!</h1>

{!! Form::open(['url'=>'movies']) !!}
{!! Form::label('name','Title:') !!}
{!! Form::text('title') !!}
<br>
{!! Form::label('name','Description') !!}
{!! Form::text('description') !!}


<br>
{{!! Form::label('name','Category')!!}}
{{!! Form::select('category', array(
    '',
    'terror'=>'terror',
    'comedia'=>'comedia'),'2') !!}}
{{Form::close() }}
<br>
@if( $errors->has('title') )
              @foreach($errors->get('title') as $error )
                  <br />* {{ $error }}
              @endforeach
@endif
@if( $errors->has('description') )
              @foreach($errors->get('description') as $error )
                  <br />* {{ $error }}
              @endforeach
@endif
{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
@stop