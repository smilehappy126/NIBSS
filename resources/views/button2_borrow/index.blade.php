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
	.EditButton{
	font-family: Microsoft JhengHei;
	}
	.EditPage{
	font-family: Microsoft JhengHei;
	font-size: 20px;
	font-weight: bold;
}
    .modal-title{
    font-size: 30px;
    font-weight: bold;
    }
	</style>
	
@stop

@section('content')
<div class="container">
<div class="TopTitle">借用狀況</div>
<div class="TableTop">
	<table class="table" style="table-layout: fixed;" border="5">
	<tr><th>租借序號<th>租借日期<th>班級<th>申請人<th>借用物品<th>數量<th>抵押證件<th>授課教室<th>授課教師<th>狀態<th>編輯資料
	</table>
	@foreach($miss as $mis)
	<!-- <!DOCTYPE html>
	<html>
	<head>
	</head>
	<body> -->
	<div class="TableContent">
	<table class="table" style="table-layout: fixed; text-align: left" border="2">
	<tr><td>{{$mis->id}}<td>{{$mis->date}}<td>{{$mis->class}}<td>{{$mis->name}}<td>{{$mis->item}}<td>{{$mis->itemnum}}<td>{{$mis->license}}<td>{{$mis->classroom}}<td>{{$mis->teacher}}<td>{{$mis->status}}<td>
	<button class="EditButton"  id="edit-message-{{ $mis->id }}" data-toggle="modal" data-target="#myModal{{$mis->id}}">編輯</button>
	</table>
	</div>



	<!-- Modal -->
	  <div class="modal fade" id="myModal{{$mis->id}}" role="dialog"  style="height: 600px;">
	    <div class="modal-dialog" >
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">租借詳細資料</h4>
	        </div>
	        <div class="modal-body">
	          <div class="EditPage">
	          <form action="{{asset ( '/borrow/update/'.$mis->id) }}" method="post">
	          {{ csrf_field()}}
	
	<div class="EditInfo">
	<table class="table" style="table-layout: fixed; text-align: left; line-height: 10px;">
	<tr><th>租借序號 : </th><th><input  class="form-control" type="text" disabled value="{{ $mis->id}}"> </th></tr>
	<tr><th>租借日期 :</th> <th><input  class="form-control" type="date" name="date" value="{{ $mis->date }}"></th></th>
	<tr><th>班級 :</th><th> <input  class="form-control" type="text" name="class" value="{{ $mis->class }}"></th></tr>
    <tr><th>申請人 : </th><th> <input  class="form-control" type="text" name="name" value="{{ $mis->name }}"></th></tr>
    <tr><th>借用物品 :</th> <th> <input  class="form-control" type="text" name="item" value="{{ $mis->item }}"> </th></tr>
    <tr><th>數量 :</th><th><input  class="form-control" type="number" name="itemnum" value="{{ $mis->itemnum }}"></th></tr>
    <tr><th>抵押證件 :</th><th> <input  class="form-control" type="text" name="license" value="{{ $mis->license }}"></th></tr>
    <tr><th>授課教室 :</th><th> <input  class="form-control" type="text" name="classroom" value="{{ $mis->classroom }}"></th></tr>
    <tr><th>授課教師 :</th><th> <input  class="form-control" type="text" name="teacher" value="{{ $mis->teacher }}"></th></tr>
    <tr><th>狀態 :</th><th> <input  class="form-control" type="text" name="status" value="{{ $mis->status }}"></th></tr>
</table>
</div>
	        </div>
	        <div class="modal-footer">
	          
	          <button type="submit" class="btn btn-default">變更</button>	
	          </form>
	          <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
	          </div>
	      </div>
	      
	    </div>
	  </div>

	
</div>
@endforeach
</div>
@endsection

@section('js')

@stop

