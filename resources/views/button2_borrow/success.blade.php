@extends('layouts.layout')
@section('title', '登入成功')
@section('css')
   <style type="text/css">
    .cry{
      text-align: center;
      font-size: 100px;
      font-family: Microsoft JhengHei; 
    }   

   </style>
@stop

@section('content')
<div class="container">
    
<div class="cry">
    少年 你登入成功了!!<br> 
    
    你是 {{ $users[0]->name}}!
    
</div>



</div>
@endsection

@section('js')

@stop