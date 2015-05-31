@extends('layout')
@section('content')
{!! Form::model($movie, ['method'=>'PATCH', 'action' => ['MovieController@update', $movie->id]]) !!}
{!! Form::label('name','Title:') !!}
{!! Form::text('title') !!}
<br>
{!! Form::label('name','Description:') !!}
{!! Form::text('description') !!}
<br><br>
{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
@stop