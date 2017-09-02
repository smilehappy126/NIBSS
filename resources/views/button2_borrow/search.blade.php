@extends('layouts.layout')
@section('title', '編輯借用狀況')

@section('css')

@stop

@section('content')

@foreach($miss as $mis)
 {{$mis->class}} <br>
 {{$mis->name}}
@endforeach

@endsection

@section('js')

@stop
