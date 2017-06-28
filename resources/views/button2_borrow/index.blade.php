@extends('layouts.layout')
@section('title', '借用狀況')
@section('css')
	<style>
	.TopTitle{
	background-color: transparent;
	font-family: DFKai-sb;
	font-size: 80px;
	text-align: center;
	}
	.TableTop{
	font-family:  Microsoft JhengHei;
	font-size: 20px;
	text-align: center;
	}
	.TableContent{
    font-family:  Microsoft JhengHei;
	font-size: 16px;
	text-align: center;
	}
	</style>
	
@stop

@section('content')

<div class="TopTitle">借用狀況</div>
<div class="TableTop">
	<table class="table">
	<tr><th>租借序號<th>租借日期<th>班級<th>申請人姓名<th>借用物品<th>數量<th>抵押證件<th>授課教室<th>授課教師<th>狀態	
	</table>
	@foreach($miss as $mis)
	<!DOCTYPE html>
	<html>
	<head>
	</head>
	<body>
	<div class="TableContent">
	<table class="table">
	<tr><td>{{$mis->id}}<td>{{$mis->created_at}}<td>{{$mis->class}}<td>{{$mis->name}}<td>{{$mis->item}}<td>{{$mis->itemnum}}<td>{{$mis->license}}<td>{{$mis->classroom}}<td>{{$mis->teacher}}<td>OK
	</table>
	</div>

	
	</body>
	</html>
	
	@endforeach
</div>

@endsection

@section('js')

@stop

