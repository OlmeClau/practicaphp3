@extends('layout')
@section('content')
<h1> peliculas y mas</h1>

{!! Form::model($movie, ['method'=>'PATCH', 'action' => ['MovieController@update', $movie->id]]) !!}
{!! Form::label('name','Title:') !!}
{!! Form::text('title') !!}
<br>
{!! Form::label('name','Description:') !!}
{!! Form::text('description') !!}
<br>
{!! Form::label('name','category') !!}
{!! Form::text('category') !!}<br>
<br>
{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
@stop