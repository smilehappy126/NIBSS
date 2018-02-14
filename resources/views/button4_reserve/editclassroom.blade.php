@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')
<style >
  @media screen and (min-width: 900px){
    .panel-body{
        width: 100%;
        height: 100%;
        float: left;
        overflow: hidden;
        position: relative;
        text-align: center;
        cursor: default;
        margin-top:0%;
    }
    .modal-body{
        width: 100%;
        height: 100%;
        float: left;
        overflow: hidden;
        position: relative;
        text-align: center;
        cursor: default;
        margin-top:0%;
    }
    .returnButton{
        border-radius: 40px;
        font-weight: bolder;
        font-family: Microsoft JhengHei;
        width: 20%;
        font-size: 20px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .returnButton:hover{
        width: 15%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
    .btn-primary {
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
    }
    .btn-secondary {
        background-color: #FFF;
        color: #ac2925;
        border-color: #d2322d;
        border-radius: 25px;
    }
    .btn-secondary:hover,
    .btn-secondary:focus,
    .btn-secondary:active {
        background-color: #d2322d;
        color: #FFF;
        border-color: #ac2925;
    }
}

  @media screen and (max-width: 900px) and (min-width: 300px) and (max-height: 1024px){
    .returnButton{
        border-radius: 40px;
        font-weight: bolder;
        font-family: Microsoft JhengHei;
        width: 14%;
        font-size: 20px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .returnButton:hover{
        width: 16%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
    .btn-primary {
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
    }
    .btn-secondary {
        background-color: #FFF;
        color: #ac2925;
        border-color: #d2322d;
        border-radius: 25px;
    }
    .btn-secondary:hover,
    .btn-secondary:focus,
    .btn-secondary:active {
        background-color: #d2322d;
        color: #FFF;
        border-color: #ac2925;
    }
}


</style>

@stop

@section('content')

  <div class="returnSection">
      <form action=" {{ asset('/reserve')}}" method="get">
          <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回教室列表</button>
      </form>
  </div>
  <br>
  @foreach ($classrooms as $classroom)
  <div class="col-md-4">
    <div class="panel panel-default">
       <div class="panel-heading">{{ $classroom->roomname }}</div>
  
       <div class="panel-body"><img src="{{  url('/uploadimg/'.$classroom->imgurl) }}" style="height: 300px; width: 500px; display:block; margin:auto;"></br></br>
              <label>教室描述</label>
              <textarea readonly class="form-control" rows="5" name="word" id="TX">{{ $classroom->word }}</textarea>
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#editModal{{$classroom->id}}">
               修改
            </button>

    @if (Route::has('login'))
      @if (Auth::check())
        @if(Auth::user()->level === '管理員')
        <form action="{{ asset('/editclassroom/'.$classroom->id) }}" method="POST" onclick="if(confirm('您確定刪除嗎? \n\n注意:該教室內的課程資料不會被刪除')) return true;else return false">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <button type="submit" class="btn btn-secondary btn-block" id="{{ $classroom->id }}">
                刪除 
            </button>
        </form>
        @endif
      @endif
    @endif


 <div class="modal fade" id="editModal{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ asset('/editclassroom/'.$classroom->id) }}" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $classroom->roomname }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{  url('/uploadimg/'.$classroom->imgurl) }}" height="200" width="300">
        <hr>
        <label>更換教室圖片</label>
        <input type="file" class="form-control" name="imgurl">
        <hr>
        <label>教室描述</label>
        <textarea  class="form-control" rows="5" name="word">{{ $classroom->word }}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

       </div>
    </div>
  </div>
  @endforeach



@endsection

@section('js')



@stop