@extends('layout')
@section('content')
{!! Form::open(['url'=>'movies']) !!}
{!! Form::label('name','Title:') !!}
{!! Form::text('title') !!}
<br>
{!! Form::label('name','Description') !!}
{!! Form::text('description') !!}
<br><br>

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