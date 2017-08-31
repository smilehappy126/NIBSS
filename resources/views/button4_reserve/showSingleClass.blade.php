@extends('layouts.layout') 
@section('title', '預約狀況') 
@section('css') 
@stop 

@section('content')

<?php
$date = new DateTime($thisMonday);
$dateString = $date->format('Y-m-d');

$pre = strtotime('previous monday', strtotime($dateString));
$next = strtotime('next monday', strtotime($dateString)); 
$preString = date('Y-m-d',$pre);
$nextString = date('Y-m-d',$next);


////test字串方式比對weekFirst時間(格式: XXXX-XX-XX)
//if($dateString == "2017-08-21"){
//    echo "The Mondays` date are same. Working.<br>";
//}else{
//    echo "Something Wrong.<br>";
//}


echo "本週一: ", $dateString;
echo "<br>";
echo "上週一: ", $preString;
echo "<br>";
echo "下週一: ", $nextString;

echo "<br>";
echo "現在所在教室: ", $currentClass;


?>

<div class="container">

    <!--新增教室資料按鈕-->
    <button type="button" class="btn btn-link">
        <a href="{{ asset('/newclassroom') }}"><div>新增教室資料</div></a>
    </button>

    <!--新增課程資訊按鈕-->
    <button type="button" class="btn btn-link">
        <a href="{{ asset('/inputClass') }}"><div>新增課程資訊</div></a>
    </button>
    
    

    <!--教室按鈕-->
    @foreach ($classrooms as $classroom)
<!--
    <button id="{{ $classroom->roomname }}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#classModal{{ $classroom->roomname }}">
        <a href="{{ asset('/reserve/017') }}">{{ $classroom->roomname }}</a>
    </button>
-->
<!--classModal先不顯示，等跳轉之後再顯示-->
    <a href="{{ asset('/reserve/' . $classroom->roomname ) }}" class="btn btn-primary classBtn" id="{{ $classroom->roomname }}">{{ $classroom->roomname }}</a>

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

    <!--上一週/下一週按鈕-->
    <div class="row">
        
        <a href="{{ asset('/reserve/'.$currentClass.'/'.$preString) }}" class="btn btn-primary col col-md-offset-1 col-md-1"><<上一週</a>

        <a href="{{ asset('/reserve/'.$currentClass.'/'.$nextString) }}" class="btn btn-primary col col-md-offset-8 col-md-1">下一週>></a>
        
    </div>



    <table BORDER="5" align=center width="1200" height="800" class="table table-bordered" style="border:8px #00BBFF groove;">

        <tr style="font-weight:bold;" id="monitor">
            <td> </td>
            <td>時間</td>

            <td>
                星期一 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </td>
            <td>
                星期二 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </td>
            <td>
                星期三 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </td>
            <td>
                星期四 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </td>
            <td>
                星期五 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </td>
            <td>
                星期六 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </td>
            <td>
                星期日 <br>
                <?php
                echo $date->format('Y-m-d');
                // $date->add(new DateInterval('P1D'));
                ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">1</td>
            <td>0800 至 0850</td>
            <td class="Curriculum" id="Mon_1"></td>
            <td class="Curriculum" id="Tue_1"></td>
            <td class="Curriculum" id="Wed_1"></td>
            <td class="Curriculum" id="Thu_1"></td>
            <td class="Curriculum" id="Fri_1"></td>
            <td class="Curriculum" id="Sat_1"></td>
            <td class="Curriculum" id="Sun_1"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">2</td>
            <td>0900 至 0950</td>
            <td class="Curriculum" id="Mon_2"></td>
            <td class="Curriculum" id="Tue_2"></td>
            <td class="Curriculum" id="Wed_2"></td>
            <td class="Curriculum" id="Thu_2"></td>
            <td class="Curriculum" id="Fri_2"></td>
            <td class="Curriculum" id="Sat_2"></td>
            <td class="Curriculum" id="Sun_2"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">3</td>
            <td>1000 至 1050</td>
            <td class="Curriculum" id="Mon_3"></td>
            <td class="Curriculum" id="Tue_3"></td>
            <td class="Curriculum" id="Wed_3"></td>
            <td class="Curriculum" id="Thu_3"></td>
            <td class="Curriculum" id="Fri_3"></td>
            <td class="Curriculum" id="Sat_3"></td>
            <td class="Curriculum" id="Sun_3"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">4</td>
            <td>1100 至 1150</td>
            <td class="Curriculum" id="Mon_4"></td>
            <td class="Curriculum" id="Tue_4"></td>
            <td class="Curriculum" id="Wed_4"></td>
            <td class="Curriculum" id="Thu_4"></td>
            <td class="Curriculum" id="Fri_4"></td>
            <td class="Curriculum" id="Sat_4"></td>
            <td class="Curriculum" id="Sun_4"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">午休</td>
            <td>1200 至 1250</td>
            <td class="Curriculum" id="Mon_noon"></td>
            <td class="Curriculum" id="Tue_noon"></td>
            <td class="Curriculum" id="Wed_noon"></td>
            <td class="Curriculum" id="Thu_noon"></td>
            <td class="Curriculum" id="Fri_noon"></td>
            <td class="Curriculum" id="Sat_noon"></td>
            <td class="Curriculum" id="Sun_noon"></td>
        </tr>

        <tr>
            <td style="font-weight:bold;"><font size="3">5</td>
            <td>1300 至 1350</td>
            <td class="Curriculum" id="Mon_5"></td>
            <td class="Curriculum" id="Tue_5"></td>
            <td class="Curriculum" id="Wed_5"></td>
            <td class="Curriculum" id="Thu_5"></td>
            <td class="Curriculum" id="Fri_5"></td>
            <td class="Curriculum" id="Sat_5"></td>
            <td class="Curriculum" id="Sun_5"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">6</td>
            <td>1400 至 1450</td>
            <td class="Curriculum" id="Mon_6"></td>
            <td class="Curriculum" id="Tue_6"></td>
            <td class="Curriculum" id="Wed_6"></td>
            <td class="Curriculum" id="Thu_6"></td>
            <td class="Curriculum" id="Fri_6"></td>
            <td class="Curriculum" id="Sat_6"></td>
            <td class="Curriculum" id="Sun_6"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">7</td>
            <td>1500 至 1550</td>
            <td class="Curriculum" id="Mon_7"></td>
            <td class="Curriculum" id="Tue_7"></td>
            <td class="Curriculum" id="Wed_7"></td>
            <td class="Curriculum" id="Thu_7"></td>
            <td class="Curriculum" id="Fri_7"></td>
            <td class="Curriculum" id="Sat_7"></td>
            <td class="Curriculum" id="Sun_7"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">8</td>
            <td>1600 至 1650</td>
            <td class="Curriculum" id="Mon_8"></td>
            <td class="Curriculum" id="Tue_8"></td>
            <td class="Curriculum" id="Wed_8"></td>
            <td class="Curriculum" id="Thu_8"></td>
            <td class="Curriculum" id="Fri_8"></td>
            <td class="Curriculum" id="Sat_8"></td>
            <td class="Curriculum" id="Sun_8"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">9</td>
            <td>1700 至 1750</td>
            <td class="Curriculum" id="Mon_9"></td>
            <td class="Curriculum" id="Tue_9"></td>
            <td class="Curriculum" id="Wed_9"></td>
            <td class="Curriculum" id="Thu_9"></td>
            <td class="Curriculum" id="Fri_9"></td>
            <td class="Curriculum" id="Sat_9"></td>
            <td class="Curriculum" id="Sun_9"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">A</td>
            <td>1800 至 1850</td>
            <td class="Curriculum" id="Mon_A"></td>
            <td class="Curriculum" id="Tue_A"></td>
            <td class="Curriculum" id="Wed_A"></td>
            <td class="Curriculum" id="Thu_A"></td>
            <td class="Curriculum" id="Fru_A"></td>
            <td class="Curriculum" id="Sat_A"></td>
            <td class="Curriculum" id="Sun_A"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                <font size="3">B</td>
            <td>1900 至 1950</td>
            <td class="Curriculum" id="Mon_B"></td>
            <td class="Curriculum" id="Tue_B"></td>
            <td class="Curriculum" id="Wed_B"></td>
            <td class="Curriculum" id="Thu_B"></td>
            <td class="Curriculum" id="Fri_B"></td>
            <td class="Curriculum" id="Sat_B"></td>
            <td class="Curriculum" id="Sun_B"></td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                <font size="3">C</td>
            <td>2000 至 2050</td>
            <td class="Curriculum" id="Mon_C"></td>
            <td class="Curriculum" id="Tue_C"></td>
            <td class="Curriculum" id="Wed_C"></td>
            <td class="Curriculum" id="Thu_C"></td>
            <td class="Curriculum" id="Fri_C"></td>
            <td class="Curriculum" id="Sat_C"></td>
            <td class="Curriculum" id="Sun_C"></td>
        </tr>
    </table>

<ul>
@foreach ($results as $course)
    <ul>
        <h1>{{$course->teacher}}</h1>
        <li>{{$course->roomname}}, {{$course->content}},
         {{$course->classTime}}, {{$course->weekFirst}}
        </li>
    </ul>
@endforeach
</ul>




</div>

<!--點選課表格子Modal-->
<div class="modal fade" id="cellModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">課程資訊</h4>
            </div>
            <div class="modal-body">
                <p id="cellModalContent"></p>
                <hr>
                <div>時間: <p id="cellModalTime"></p></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!--modal 要放哪: 放div container外面-->
<!--div container好像沒包好?? 包好包滿才能work-->

@endsection 

@section('js')

<script language="JavaScript" type="text/javascript">

    
var currentClass;   
    
$( document ).ready(function() {
    
    // alert現在的教室
    $(".classBtn").click(function() {

        currentClass = this.id;
        
        alert("你按下了" + currentClass);
        
    });
    

    //在對應的格子顯示撈出之內容
    @foreach ($results as $course)

        @if ($course->weekFirst == $dateString)
            $("#{{$course->classTime}}").html("<p>{{$course->content}}</p><p>{{$course->teacher}}</p>");
        @endif
    
    @endforeach
    

    
    // 按下課表內格子顯示Modal   
    $(".Curriculum").click(function() {

        var myContent = $(this).html(); // .text()

        $("#cellModalContent").html(myContent);
        $("#cellModalTime").text(this.id);
//        $("#modalContent").append("<br>id: " + this.id);//this.id即該格id
        
        $("#cellModal").modal("show");

    });
    

});


</script>

@stop
