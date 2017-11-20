@extends('layouts.layout')
@section('title', '已歸還資料')
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
    font-size: 18px;
    text-align: center;
    }
    .TableContent{
    font-family:  Microsoft JhengHei;
    font-size: 13px;
    text-align: center;
    }
    .EditButton{
    background-color: transparent;
    font-family: Microsoft JhengHei;
    transition: 0.3s;
    cursor: pointer;
    border: 0px;
    color:#7D26CD;
    text-align:center;
    text-decoration:underline;
    }
    .EditPage{
    font-family: Microsoft JhengHei;
    font-size: 20px;
    font-weight: bold;
    }
    </style>
@stop

@section('content')

<div class="container">
<div class="TopTitle">已歸還資料</div>
<br>
<br>

    <!-- 表單的標頭 -->
    <div class="TableTop">
    <table class="table " style="text-align: center ; table-layout: fixed" >  
      <tr>
        <th style=" text-align: center;">租借序號</th>
        <th style=" text-align: center;">租借日期</th>
        <th style=" text-align: center;">歸還日期</th>
        <th style=" text-align: center;">班級</th>
        <th style=" text-align: center;">申請人</th>
        @if (Route::has('login'))
          @if (Auth::check())
        <th style=" text-align: center;">電話</th>
          @endif
        @endif
        <th style=" text-align: center;">借用物品</th>
        <th style=" text-align: center;">借用數量</th>
        <th style=" text-align: center;">抵押證件</th>
        <th style=" text-align: center;">授課教室</th>
        <th style=" text-align: center;">授課老師</th>
        <th style=" text-align: center;">狀態</th>
        @if (Route::has('login'))
          @if (Auth::check())
        <th style=" text-align: center;">編輯資料</th>
          @endif
        @endif
      </tr>
      </table>
    <!-- 表單內容 -->
    @foreach($res as $re)
    <div class="TableContent">
    <table class="table table-hover" id="content" style="table-layout: fixed; text-align: center;">
    <tr> 
     <td> {{$re->id}} </td>
     <td> {{$re->date}}</td>
     <td>
      <?php
       if ($re->status == "已歸還") 
       $re->timestamps = false;
       $re->save();
       if ($re->status == "借用中")
       $re->timestamps=ture;
      ?>
          {{$re->updated_at}}
     </td>
     <td> {{$re->class}}</td>
     <td> {{$re->name}}</td>
     @if (Route::has('login'))
          @if (Auth::check())
     <td> {{$re->phone}}</td>   
          @endif
     @endif
     <td> {{$re->item}}</td>
     <td> {{$re->itemnum}}</td>
     <td> {{$re->license}}</td>
     <td> {{$re->classroom}}</td>
     <td> {{$re->teacher}}</td>
     <td> {{$re->status}}</td>
     @if (Route::has('login'))
          @if (Auth::check())
     <td><a href="#" class="btn btn-sm btn-primary" id="edit-message-{{ $re->id }}" data-toggle="modal" data-target="#myModal{{$re->id}}"><span class="glyphicon glyphicon-pencil"></span> 編輯</a></td>
          @endif
     @endif
    </tr>   
    </table>
    </div>

    <!-- Modal 浮現式視窗-->
      <div class="modal fade" id="myModal{{$re->id}}" role="dialog" style="height: 600px;">
        <div class="modal-dialog" >
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">租借詳細資料</h4>
            </div>
            <div class="modal-body">
              <div class="EditPage">
              <form action="{{asset ( '/return/update/'.$re->id) }}" method="post">
              {{ csrf_field()}}

    <div class="EditInfo">
    <!-- Modal中顯示的表格 -->
    <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
    <tr><th>租借序號 : </th><th><input  class="form-control" type="text" disabled value="{{ $re->id}}"> </th></tr>
    <tr><th>租借日期 : </th><th> <input  class="form-control" type="date" name="date" value="{{ $re->date }}"></th></tr>
    <tr><th>歸還日期 : </th><th> <input  class="form-control" type="timestamp" disabled value="{{ $re->updated_at }}"></th></tr>
    <tr><th>班級 :</th> <th><input  class="form-control" type="text" name="class" value="{{ $re->class }}"></th></th>
    <tr><th>申請人 :</th><th> <input  class="form-control" type="text" name="name" value="{{ $re->name }}"></th></tr>
    <tr><th>電話 :</th><th> <input  class="form-control" type="text" name="phone" value="{{ $re->phone }}"></th></tr>   
    <tr><th>借用物品 :</th> <th> <input  class="form-control" type="text" name="item" value="{{ $re->item }}"> </th></tr>
    <tr><th>借用數量 :</th><th><input  class="form-control" type="number" name="itemnum" value="{{ $re->itemnum }}"></th></tr>
    <tr><th>抵押證件 :</th><th> <input  class="form-control" type="text" name="license" value="{{ $re->license }}"></th></tr>
    <tr><th>授課教室 :</th><th> <input  class="form-control" type="text" name="classroom" value="{{ $re->classroom }}"></th></tr>
    <tr><th>授課教師 :</th><th> <input  class="form-control" type="text" name="teacher" value="{{ $re->teacher }}"></th></tr>
    <tr><th>狀態 :</th><td> <select class= "form-control" name="status" value="{{ $re->teacher }}" >
                                        <option value="已歸還">已歸還</option>
                                        <option value="借用中">借用中</option>                                          </select> </th></tr>
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