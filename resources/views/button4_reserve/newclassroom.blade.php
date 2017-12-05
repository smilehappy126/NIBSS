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
        .btn-primary{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 24px;
                background-color:#B0C4DE;
                width: 80px;
                height: 50px;
                border-radius: 100px;
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;

            }

           .btn-primary:hover{
                background-color: #CCDDFF;
                width:150px;
                transition: 0.3s;
</style>
@stop

@section('content')
<div class="container">

<button type="button" class="btn btn-link">
        <a href="{{ asset('/editclassroom') }}"><div>修改刪除/教室資料</div></a>
    </button>
</br>

 <form action="{{ asset('/reserve/{roomname}') }}" method="post"> <!-- //enctype="multipart/form-data"加ㄉ  -->
 	    {{ csrf_field() }}
    <div class="form-group">
       <label for="classid">教室名稱或編號:</label>
       <input type="text" class="form-control" id="classid" name="roomname" required="必填！">
    </div>
    <div class="form-group">
       <label for="classword">教室位置、設備、軟體描述:</label>
       <input type="text" class="form-control" id="classword" name="word" required="必填！">
    </div>
        <div class="form-group">
       <label for="classpic">教室照片路由:</label>
       <input type="text" class="form-control" id="classpic" name="imgurl" required="必填！">  <!-- input type="file" 改ㄉ  -->
    </div>
    <div>
        <button class="btn btn-primary" type="submit">送出</button>
    </div>

 
  </form>

</div>



@endsection

@section('js')



@stop
