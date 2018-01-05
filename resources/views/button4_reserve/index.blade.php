@extends('layouts.layout') 
@section('title', '預約狀況') 
@section('css')
@stop 

@section('content')

<?php
$date = new DateTime($weekfirst);
$dateString = $date->format('Y-m-d');

$pre = strtotime('previous monday', strtotime($dateString));
$next = strtotime('next monday', strtotime($dateString)); 

echo "主畫面<br>";
echo "(請先選擇教室)<br>";
//echo "(可在思考此處畫面設計)";


?>

<!--新增教室資料按鈕-->
<div class="btn-group"> 
    <button type="button" class="btn btn-link">
        <a href="{{ asset('/newclassroom') }}"><div>新增教室資料</div></a>
    </button>

    <!--修改刪除教室資料按鈕-->
    <button type="button" class="btn btn-link">
        <a href="{{ asset('/editclassroom') }}"><div>修改刪除/教室資料</div></a>
    </button>
</div></br>


    <!--教室按鈕-->
    @foreach ($classrooms as $classroom)

<!--classModal先不顯示，等跳轉之後再顯示-->
  <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">    <a href="{{ asset('/reserve/' . $classroom->roomname ) }}" class="btn btn-secondary btn-block classBtn" id="{{ $classroom->roomname }}">{{ $classroom->roomname }}</a></div>
          <div class="panel-body"><img src="{{ url('/uploadimg/'.$classroom->imgurl) }}" height="200" width="300"></br>
              教室描述：
              {{ $classroom->word }} </br>
          </div>
       </div>
     </div>
   </div>

<!--   classModal   -->
    <div class="modal fade" id="classModal{{ $classroom->roomname }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $classroom->roomname }}</h5>
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
