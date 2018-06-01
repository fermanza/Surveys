@extends('admin.default')

@section('page-header')
  Editar <big>{{ trans('Usuario') }}</big>
@stop

@section('content')

    @include('admin.users.form')

@stop

