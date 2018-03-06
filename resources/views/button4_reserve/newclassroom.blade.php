@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')
<style>
/*    .btn-primary {
        background-color: #FFF;
        color: #285e8e;
        border-color: #3276b1;
        border-radius: 25px;
    }
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active    {
        background-color: #3276b1;
        color: #FFF;
        border-color: #285e8e;
    }*/
.btn-outline-success{
        margin-top:1%;
        background-color: #FFF;
        color: #0044BB;
        border-color: #0044BB;
        border-radius: 25px;
        width: 80px;
    }
.btn-outline-success:hover,
    .btn-outline-success:focus,
    .btn-outline-success:active    {
        background-color: #0044BB;
        color: #FFF;
        border-color: #0044BB;
    }

.returnButton{
        border-radius: 40px;
        font-weight: bolder;
        font-family: Microsoft JhengHei;
        width: 18%;
        font-size: 18px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .returnButton:hover{
        width: 20%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }

</style>
@stop

@section('content')


<div class="container" style="padding-top: 10px;">

    <!--顯示出錯訊息(課程重疊了)-->
    @if (session('alert'))
    <div class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Oops...出錯了!</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{ session('alert') }}
    </div>
    @endif

    <button type="button" class="btn btn-link btn-lg">
        <a href="{{ asset('/editclassroom') }}"><div>修改刪除/教室資料</div></a>
    </button>
        
    <br>

    <div>
      <form action="{{ asset('/reserve') }}" method="get">
          <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回教室列表</button>
      </form>
    </div>

    <br>

    <form action="{{ asset('/newclassroom/create') }}" method="post" enctype="multipart/form-data">     <!-- enctype="multipart/form-data"加ㄉ  -->
 	    {{ csrf_field() }}
        <div class="form-group">
           <label for="classid">教室名稱或編號:</label>
           <input type="text" class="form-control" id="classid" name="roomname" required="必填！">
        </div>
        <div class="form-group">
           <label for="classword">教室位置、設備、軟體描述:</label>
           <textarea  class="form-control" rows="5" name="word" id="classword" required="必填！"></textarea>
         <!--   <input type="text" class="form-control" id="classword" name="word" required="必填！"> -->
        </div>
        <div class="form-group">
           <label for="classpic">教室照片路由:</label>
           <input type="file" class="form-control" id="classpic" name="imgurl" required="必填！">  <!-- input type="file" 改ㄉ  -->
        </div>
        <div>
            <button class="btn btn-outline-success" type="submit">送出</button>
        </div>

    </form>

</div>



@endsection

@section('js')

@stop
