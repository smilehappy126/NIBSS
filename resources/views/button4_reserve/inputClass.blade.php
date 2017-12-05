@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')
<!--
<link href="/ncumisborrowsystem/public/include/pickadate.js-master/lib/themes/default.css" rel="stylesheet">
<link href="/ncumisborrowsystem/public/include/pickadate.js-master/lib/themes/default.date.css" rel="stylesheet">
-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

@stop

@section('content')

<?php
echo "新增多筆";
/* testing */
//$begin = new DateTime( '2017-11-22' );
//$end = new DateTime( '2017-11-30' );
//
//
//getIntervalMonday($begin, $end);
//function getIntervalMonday($begin, $end){
//    
//    /* 當週任一天的禮拜一是幾號? */
//    $beginString = $begin->format("Y-m-d");
//    $endString = $end->format("Y-m-d");
//    
//    //讓起始日期&結束日期成為禮拜一
//    if(date("w", strtotime($beginString)) == 1){
//        $beginMon = strtotime($beginString);
//    }else{
//        $beginMon = strtotime('last monday', strtotime($beginString));
//    }
//    
//    if(date("w", strtotime($endString)) == 1){
//        $ending = strtotime("+1 day", $endString);
//    }else{
//        //$endMon = strtotime('last monday', strtotime($endString));
//        $ending = strtotime("last monday +1 day", strtotime($endString)); // +1天，為了DatePeriod取的時候尾巴沒包含
//    }
//    
//    $beginMon = date("Y-m-d", $beginMon);
//    echo "begin Monday is " . $beginMon . "<br>";
//    $beginMon = new DateTime($beginMon);
//    
//    $ending = date("Y-m-d", $ending);
//    echo "endMon plus one day is " . $ending . "<br>";
//    $ending = new DateTime($ending);
////    $endMon = date("Y-m-d", $endMon);
////    echo "end Monday is " . $endMon . "<br>";
//    
//    
//    $interval = new DateInterval('P1D');
//    $period = new DatePeriod($beginMon, $interval, $ending);
//    
//    $dates = array();
//    // $dates陣列內放置$date(格式為"Y-m-d")
//    foreach($period as $date){
//        //$dates[] = $date->format("Y-m-d");
//        array_push($dates, $date->format("Y-m-d"));
//    }
//    
//    // 列出日期區間為Monday的
//    foreach($dates as $date){
//        if(date("w", strtotime($date)) == 1){
//            echo $date . "<br>";
//        }
//    }
//    
//}
//
//getBeginDay($begin);
//function getBeginDay($begin){
//    $beginString = $begin->format("Y-m-d");
//    $beginDay = date("w", strtotime($beginString));
//    
//    $dayOfWeek = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
//    
//    //echo $dayOfWeek[$beginDay] . "<br>";
//    return $dayOfWeek[$beginDay];
//}

?>
<!-- excel -->
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('inputClass/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
                    {{ csrf_field() }}
        <br/>

        <button class="btn btn-primary">Import CSV or Excel File</button>

    </form>

<div class="container">

    <form action="{{ asset('/inputClass/save') }}" method="post">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label>教室: {{$currentClassroom}}</label>
            <input name="roomname" value="{{$currentClassroom}}" hidden>
<!--
            <select class="form-control" id="classroom_select" name="roomname">
                  @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->roomname }} "> {{ $classroom->roomname }} </option>
                  @endforeach
            </select>
-->
        </div>
        <div class="form-group">
            <label>課堂起始日期:</label>
<!--            <input type="text" class="form-control" name="start_date">-->
            <input type="text" class="form-control datepick" name="start_date">
        </div>
        <div class="form-group">
            <label>課堂結束日期:</label>
<!--            <input type="text" class="form-control" name="end_date">-->
            <input type="text" class="form-control datepick" name="end_date">
        </div>
        <div class="form-group">
            <label>起始節次:</label>
            <select class="form-control" name="start_classTime">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="午休">午休</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div>
        <div class="form-group">
            <label>結束節次:</label>
            <select class="form-control" name="end_classTime">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="午休">午休</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>內容:</label>
            <input type="text" class="form-control" name="content">
        </div>
        <div class="form-group">
            <label>老師:</label>
            <input type="text" class="form-control" name="teacher">
        </div>
        <div>
            <button class="btn btn-primary" type="submit">送出</button>
        </div>
    </form>
</div>




@endsection

@section('js')

<!--
<script src="/ncumisborrowsystem/public/include/pickadate.js-master/lib/picker.js"></script>
<script src="/ncumisborrowsystem/public/include/pickadate.js-master/lib/picker.date.js"></script>
-->

<!--Jquery Datepicker-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script language="JavaScript" type="text/javascript">
$( document ).ready(function(){
    
    $(".datepick").datepicker({ dateFormat: 'yy-mm-dd' });
    
    $("#classroom_select [value="+$roomname+"]").prop('selected', true);
});
</script>

@stop