@extends('layouts.layout')
@section('title', '編輯借用狀況')

@section('css')

@stop

@section('content')
<!-- <div class="container">
<div class="EditPage">
	租借詳細資料  <hr>
	<div class="EditInfo">
	<table class="table" style="table-layout: fixed; text-align: left">
	<tr><th>租借編號 : </th><th><textarea class="form-control" disabled >{{ $miss->id}} </textarea></th></tr>
	<tr><th>租借日期 :</th> <th><textarea class="form-control" >{{ $miss->date }}</textarea></th></th>
	<tr><th>租借人班級 :</th><th> <textarea class="form-control">{{ $miss->class }}</textarea></th></tr>
    <tr><th>租借人姓名 : </th><th> <textarea class="form-control" >{{ $miss->name }}</textarea> </th></tr>
    <tr><th>租借物品 :</th> <th> <textarea class="form-control">{{ $miss->item }}</textarea> </th></tr>
    <tr><th>租借數量 :</th><th><textarea class="form-control">{{ $miss->itemnum }}</textarea></th></tr>
    <tr><th>抵押證件 :</th><th> <textarea class="form-control">{{ $miss->license }}</textarea></th></tr>
    <tr><th>教室 :</th><th> <textarea class="form-control">{{ $miss->classroom }}</textarea></th></tr>
    <tr><th>教師 :</th><th> <textarea class="form-control">{{ $miss->teacher }}</textarea></th></tr>
    <tr><th>狀態 :</th><th> <textarea class="form-control">{{ $miss->status }}</textarea></th></tr>
</table>
    <form action="{{ asset ('/borrow') }}" method="get">
	{{ csrf_field()}}<button class="Button" type="submit">取消並返回</button>
	</form>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
</div>
</div>
</div>
 -->
@foreach($miss as $mis)
 {{$mis->class}} <br>
 {{$mis->name}}
@endforeach

@endsection

@section('js')

@stop
