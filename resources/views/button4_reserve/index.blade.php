@extends('layouts.layout') 
@section('title', '預約狀況') 
@section('css')
<style type="text/css">
  .hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
  margin-top:0%;
}

.hovereffect .overlay {
  position: absolute;
  overflow: hidden;
  width: 80%;
  height: 80%;
  left: 10%;
  top: 10%;
  border-bottom: 1px solid #FFF;
  border-top: 1px solid #FFF;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: scale(0,1);
  -ms-transform: scale(0,1);
  transform: scale(0,1);
}

.hovereffect:hover .overlay {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.35s;
  transition: all 0.35s;
}

.hovereffect:hover img {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feComponentTransfer color-interpolation-filters="sRGB"><feFuncR type="linear" slope="0.6" /><feFuncG type="linear" slope="0.6" /><feFuncB type="linear" slope="0.6" /></feComponentTransfer></filter></svg>#filter');
  filter: brightness(0.6);
  -webkit-filter: brightness(0.6);
}

.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 17px;
  background-color: transparent;
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,-100%,0);
  transform: translate3d(0,-100%,0);
}

.hovereffect a, .hovereffect p {
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,100%,0);
  transform: translate3d(0,100%,0);
}

.hovereffect:hover a, .hovereffect:hover p, .hovereffect:hover h2 {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}
    .btn-outline-success{
        margin-top:2%;
        background-color: #FFF;
        color: #5cb85c;
        border-color: #5cb85c;
        border-radius: 25px;
    }
    .btn-outline-success:hover,
    .btn-outline-success:focus,
    .btn-outline-success:active    {
        background-color: #5cb85c;
        color: #FFF;
        border-color: #5cb85c;
    }

    .btn-secondary1{
        margin-top:2%;
        background-color: #FFF;
        color: #0000ff;
        border-color: #0000ff;
        border-radius: 25px;
    }
    .btn-secondary1:hover,
    .btn-secondary1:focus,
    .btn-secondary1:active    {
        background-color: #0000ff;
        color: #FFF;
        border-color: #0000ff;
    }
    
.funcBtn{
        float:center;
        color: #004d80;
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 16px;
        background-color: #B0C4DE;
        width: 190px;
        height: 35px;
        border-radius: 100px;
        border-width: 0px;
        margin-top: 20px;
        margin-right: 5px;
        margin-left: 5px;
        transition: 0.3s;
        cursor: pointer;
    }
    .funcBtn:border{
        border-width: 1px;
        border-style:none;
    }
    .funcBtn:hover{
        color: #007acc;
        background-color: #CCDDFF;
        transition: 0.3s;
    }

</style>
@stop 

@section('content')

<?php
// echo "主畫面<br>";
// echo "(請先選擇教室)<br>";
//echo "(可在思考此處畫面設計)";
?>
@if (Route::has('login'))
  @if (Auth::check())
    @if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
    

<div> 
    <!--新增教室資料按鈕-->
    <a href="{{ asset('/newclassroom') }}" class="btn btn-primary funcBtn">新增教室資料</a>
    <!--修改刪除教室資料按鈕-->
    <a href="{{ asset('/editclassroom') }}" class="btn btn-primary funcBtn">修改/刪除教室資料</a>
</div>
   
    @endif
  @endif
@endif
    
    <br>

    <!--教室按鈕-->
    @foreach ($classrooms as $classroom)

<!--   <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">    <a href="{{ asset('/reserve/' . $classroom->roomname ) }}" class="btn btn-secondary btn-block classBtn" id="{{ $classroom->roomname }}">{{ $classroom->roomname }}</a></div>
          <div class="panel-body">    
              <div class="hovereffect">
                  <img class="img-responsive" src="{{ url('/uploadimg/'.$classroom->imgurl) }}" alt="" height="500" width="500">
                  <div class="overlay">
                      <h2> 教室描述：
                             {{ $classroom->word }} 
                      </h2>
                      <p>
                         <button type="submit" class="btn btn-secondary btn-block" id="{{ $classroom->id }}">詳細資訊</button>
                      </p>
                  </div>
              </div>
          </div>
       </div>
     </div>
   </div>

    <div class="col-md-4">
    <div class="hovereffect">
        <img class="img-responsive" src="{{ url('/uploadimg/'.$classroom->imgurl) }}" alt="" height="200" width="300">
            <div class="overlay">
                <h2> 教室描述：
                       {{ $classroom->word }} 
                </h2>
                <p>
                     <button type="submit" class="btn btn-secondary btn-block" id="{{ $classroom->id }}">詳細資訊</button>
                </p>
            </div>
    </div>
</div> -->

<!--classModal-->
  <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">    <a href="{{ asset('/reserve/' . $classroom->roomname ) }}" class="btn btn-secondary btn-block classBtn" id="{{ $classroom->roomname }}">{{ $classroom->roomname }} 預約狀況</a></div>
          <div class="panel-body">    
              <div class="hovereffect">
                  <img class="img-responsive" src="{{ url('/uploadimg/'.$classroom->imgurl) }}" alt="" style="height: 300px; width: 500px; display:block; margin:auto;">
                  <div class="overlay">
                      <h2> 教室描述：
                             {{ $classroom->word }} 
                      </h2>
                  </div>
              </div>
              <form>
                 <button type="button" class="btn btn-outline-success" id="{{ $classroom->id }}" data-toggle="modal" data-target="#editModal{{$classroom->id}}">詳細資訊</button>
              </form>
          </div>
       </div>
  </div>
   
  <div class="modal fade" id="editModal{{$classroom->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form>
       {{ csrf_field() }}
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">{{ $classroom->roomname }}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
        <img class="img-responsive" src="{{ url('/uploadimg/'.$classroom->imgurl) }}">
      </form></br>
        <textarea readonly class="form-control" rows="5" name="word">{{ $classroom->word }}</textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary1" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--   classModal   -->
<!--     <div class="modal fade" id="classModal{{ $classroom->roomname }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $classroom->roomname}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $classroom->word }}
                    <img id="image" src="{{$classroom->imgurl}}" height="200" width="400">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
 -->
    @endforeach



@endsection 

@section('js')

<script language="JavaScript" type="text/javascript">

$( document ).ready(function() {
    
    // /* alert進入的教室 */
    // $(".classBtn").click(function() {
        
    //     var classroomBtn;// 所在教室
    //     classroomBtn = this.id;
        
    //     alert("你進入了 " + classroomBtn + " 教室頁面");
        
    // });
    
});


</script>

@stop
