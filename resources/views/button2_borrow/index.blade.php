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
	.search{
	background-color: transparent;
	font-family:  Microsoft JhengHei;
	text-align:left;
	margin-left: 82.5%;
	font-weight: bold;
	}
	.searchButton{
	width: 40px;
    height: 25px;
    font-size: 12px;
    font-weight: bold;
    text-align: left;
    border: 0px;
    transition: 0.3s;
    cursor: pointer;
    background-color: transparent;	
	}
	.TableTop{
	font-family:  Microsoft JhengHei;
	font-size: 20px;
	text-align: center;
	}
	.TableContent{
    font-family:  Microsoft JhengHei;
	font-size: 15px;
	text-align: center;
	font-weight: bold;
	}
	.EditButton{
	background-color: transparent;
	font-family: Microsoft JhengHei;
	transition: 0.3s;
    cursor: pointer;
    border: 0px;
	}
	.EditButton:hover{
	background-color: #FF5511;
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
    .sortButton{
    width: 20px;
    height: 20px;
    font-size: 12px;
    font-weight: bold;
    text-align: left;
    border: 0px;
    transition: 0.3s;
    cursor: pointer;
    background-color: transparent;	
    }
    #content:hover{
    background-color: #FF7744;
    }
    .sortButton:hover{
    background-color: grey;
    }
    .searchButton:hover{
    background-color: grey;
    }
   
    </style>
	
@stop

@section('content')
<div class="container">
<div class="TopTitle">借用狀況</div>
<!-- 透過名字搜尋 -->
<div class="search"><form action="{{ asset ('/borrow/searchName')}}" method="post" style="display: inline;">{{ csrf_field()}}<input class="form-inline" name="searchname" type="text"  placeholder="請輸入名字...." ><nobr><button class="searchButton" type="submit">搜尋</button></form></div>

<!-- 表單的標頭 -->
<div class="TableTop">
	<table class="table" style="table-layout: fixed;" border="5">
	<tr>
	
<!-- 序號 -->
	<th>租借序號<br>
    <form action="{{ asset ('/borrow/idasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/iddesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>   	    
<!-- 日期 -->
    <th>租借日期<br>
    <form action="{{ asset ('/borrow/dateasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/datedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 班級 -->
    <th>班級<br>
    <form action="{{ asset ('/borrow/classasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/classdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 申請人 -->
   	<th>申請人<br>
    <form action="{{ asset ('/borrow/nameasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/namedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 借用物品-->
   	<th>借用物品<br>
   	<form action="{{ asset ('/borrow/itemasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/itemdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 借用數量 -->
   	<th>借用數量<br>
    <form action="{{ asset ('/borrow/itemnumasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/itemnumdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 抵押證件 -->
   	<th>抵押證件<br>
    <form action="{{ asset ('/borrow/licenseasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/licensedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 授課教室 -->
   	<th>授課教室<br>
   	<form action="{{ asset ('/borrow/classroomasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/classroomdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 授課教室 -->
   	<th>授課教師<br>
   	<form action="{{ asset ('/borrow/teacherasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/teacherdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 狀態 -->
   	<th>狀態<br>
   	<form action="{{ asset ('/borrow/statusasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/statusdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 編輯資料 -->
   	<th>編輯資料
	</tr></table>
	
	<!-- 表單內容 -->
	@foreach($miss as $mis)
	<div class="TableContent">
	<table class="table" id="content" style="table-layout: fixed; text-align: left" border="2">

	<tr><td>{{$mis->id}}<td>{{$mis->date}}<td>{{$mis->class}}<td>{{$mis->name}}<td>{{$mis->item}}<td>{{$mis->itemnum}}<td>{{$mis->license}}<td>{{$mis->classroom}}<td>{{$mis->teacher}}<td>{{$mis->status}}<td>
	<button class="EditButton"  id="edit-message-{{ $mis->id }}" data-toggle="modal" data-target="#myModal{{$mis->id}}">編輯</button>
	</table>
	</div>



	<!-- Modal 浮現式視窗-->
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
	<!-- Modal中顯示的表格 -->
	<table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
	<tr><th>租借序號 : </th><th><input  class="form-control" type="text" disabled value="{{ $mis->id}}"> </th></tr>
	<tr><th>租借日期 :</th> <th><input  class="form-control" type="date" name="date" value="{{ $mis->date }}"></th></th>
	<tr><th>班級 :</th><th> <input  class="form-control" type="text" name="class" value="{{ $mis->class }}"></th></tr>
    <tr><th>申請人 : </th><th> <input  class="form-control" type="text" name="name" value="{{ $mis->name }}"></th></tr>
    <tr><th>借用物品 :</th> <th> <input  class="form-control" type="text" name="item" value="{{ $mis->item }}"> </th></tr>
    <tr><th>借用數量 :</th><th><input  class="form-control" type="number" name="itemnum" value="{{ $mis->itemnum }}"></th></tr>
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
$(document).ready(function(){


}

@stop

