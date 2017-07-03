@extends('layouts.layout')
@section('title', '已歸還資料')
@section('css')

@stop

@section('content')

<div class="container">
<table class="table table-hover">
    <thead>
      <tr>
        <th>序號</th>
        <th>姓名</th>
        <th>年級</th>
        <th>抵押證件</th>
        <th>借用物品</th>
        <th>借用時間</th>
        <th>授課教室</th>
        <th>授課老師</th>
        <th>狀態</th>
      </tr>
    </thead>
    <tbody>
    @foreach($res as $re)
    <tr>
    <td> {{$re->id}} </td>
    <td> {{$re->name}}</td>
    <td> {{$re->grade}}</td>
    <td> {{$re->mortgage}}</td>
    <td> {{$re->borrow}}</td>
    <td> {{$re->created_at}}</td>
    <td> {{$re->classroom}}</td>
    <td> {{$re->teacher}}</td>
    <td> {{$re->status}}</td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>


@endsection

@section('js')

@stop