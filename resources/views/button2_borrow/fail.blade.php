@extends('layouts.layout')
@section('title', '編輯借用狀況')

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
  text-align:right;
  
  font-weight: bold;
  }
  .searchButton{
  width: 41px;
    height: 28px;
    font-size: 12px;
    font-weight: bold;
    text-align: left;
    border: 0px;
    transition: 0.3s;
    cursor: pointer;
    background-color: transparent;
    font-family:  Microsoft JhengHei;
    border-radius: 5px; 
  }
	.TableTop{
  font-family:  Microsoft JhengHei;
  font-size: 20px;
  text-align: center;
  word-break: break-word;
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
    background-color: #CCBBFF;
    }
    .sortButton:hover{
    background-color: grey;
    }
    .searchButton:hover{
    background-color: #DDDDDD;
    }
   
    </style>
	
@stop

@section('content')
<div class="container">
<div class="TopTitle">借用狀況</div>
<!-- 透過名字搜尋 -->
  <div class="search">
    <form action="{{ asset ('/borrow/search')}}" method="post" style="width: 100%;">{{ csrf_field()}}
      <input  name="searchname" id="searchname" type="text"  placeholder="請輸入名字...."  value="" style="width: 20%;">
      <button class="searchButton" id="searchButton" type="submit">搜尋</button>
    </form>
  </div>

<!-- 表單的標頭 -->
<div class="TableTop">
	<table class="table" style="table-layout: fixed; text-align: center;" >
	<tr>
	
<!-- 序號 -->
	<th style="text-align: center;">租借序號<br>
    <!-- <form action="{{ asset ('/borrow/idasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/iddesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>   --> 	    
<!-- 日期 -->
    <th style="text-align: center;">租借日期<br>
    <!-- <form action="{{ asset ('/borrow/dateasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/datedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
<!-- 班級 --> 
    <th style="text-align: center;">班級<br>
    <!-- <form action="{{ asset ('/borrow/classasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/classdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form> -->
<!-- 申請人 -->
   	<th style="text-align: center;">申請人<br>
   <!--  <form action="{{ asset ('/borrow/nameasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/namedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form> -->
<!-- 電話 -->
    <th style="text-align: center;">電話<br>
   <!--  <form action="{{ asset ('/borrow/nameasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
    <form action="{{ asset ('/borrow/namedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form> -->
<!-- 借用物品-->
   	<th style="text-align: center;">借用物品<br>
   	<!-- <form action="{{ asset ('/borrow/itemasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/itemdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form> -->
<!-- 借用數量 -->
   	<th style="text-align: center;">借用數量<br>
    <!-- <form action="{{ asset ('/borrow/itemnumasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/itemnumdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form> -->
<!-- 抵押證件 -->
   	<th style="text-align: center;">抵押證件<br>
    <!-- <form action="{{ asset ('/borrow/licenseasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/licensedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form> -->
<!-- 授課教室 -->
   	<th style="text-align: center;">授課教室<br>
   	<!-- <form action="{{ asset ('/borrow/classroomasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/classroomdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form> -->
<!-- 授課教室 -->
   	<th style="text-align: center;">授課教師<br>
   	<!-- <form action="{{ asset ('/borrow/teacherasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/teacherdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form> -->
<!-- 狀態 -->
   	<th style="text-align: center;">狀態<br>
   	<!-- <form action="{{ asset ('/borrow/statusasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	<form action="{{ asset ('/borrow/statusdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form> -->
<!-- 編輯資料 -->
   	<th style="text-align: center;">編輯資料
	</tr></table>

<div style=" font-family: Microsoft JhengHei; text-align: center; font-weight: bolder; font-size: 40px; color: red;" >
查無此資料!!!
</div>
	<form action="{{ asset('/borrow') }}" method="get">
<button class="btn btn-primary" id="testbtn">重新整理</button>
</form>
</div>



@endsection

@section('js')

@stop
