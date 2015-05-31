@extends('layout')
@section('content')
{!! Form::open(['url'=>'reviews']) !!}
{!! Form::label('name','Content:') !!}
{!! Form::text('content') !!}
{!! Form::hidden('movie_id', null,['id'=>1]) !!}

<br>

{!! Form::submit('Guardar') !!}
{!! Form::close() !!}
@stop