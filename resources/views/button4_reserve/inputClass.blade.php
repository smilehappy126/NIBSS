@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')

@stop

@section('content')

<?php
function getMon($year)
{
	for($m=1;$m<=12;$m++){
		for($d=1;$d<=31;$d++){
			if(date("w",mktime(0,0,0,$m,$d,$year))==1)
				$result[]="$year-$m-$d";
		}
		
	}	
	return $result;
}

//$result = getMon("2017");
//$arrlength = count($result);
//for($i=0; $i < $arrlength; $i++){
//    echo $result[$i];
//    echo "<br>";
//}


$begin = new DateTime( '2017-09-01' );
//echo $begin->format("m") . "<br>";
//echo intval($begin->format("m"));
//echo gettype($begin->format("m"));
    
$end = new DateTime( '2017-10-31' );

getIntervalMonday($begin, $end);

function getIntervalMonday($begin, $end){
    
    $interval = new DateInterval('P1D');
    $period = new DatePeriod($begin, $interval, $end);

    // $dates陣列內放置$date(格式為"Y-m-d")
    foreach($period as $date){
        $dates[] = $date->format("Y-m-d");
    }
    
    // 列出日期區間為Monday的
    foreach($dates as $date){
        if(date("w", strtotime($date)) == 1){
            echo $date . "<br>";
        }
    }
}



?>

<script type="text/javascript"src="http://services.iperfect.net/js/IP_generalLib.js">
</script>

<div class="container">

    <form action="{{ asset('/inputClass') }}" method="post">
        {{ csrf_field() }}
        
        <select name="roomname" class="form-control">
              @foreach ($classrooms as $classroom)
                <option value="{{ $classroom->roomname }} "> {{ $classroom->roomname }} </option>
              @endforeach
        </select>
        <div class="form-group">
            <label for="classid">日期:</label>
            <input type="text" class="form-control" id="classtime" name="weekFirst">
        </div>
        <select name="classTime" class="form-control">

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
        <div class="form-group">
            <label for="classpic">老師名稱:</label>
            <input type="text" class="form-control" id="teachername" name="teacher">
        </div>
        <div class="form-group">
            <label for="classpic">活動內容:</label>
            <input type="text" class="form-control" id="classcontent" name="content">
        </div>
        <div>
            <input type="text" name="date1" id="date1" alt="date" class="IP_calendar" title="d/m/Y">
        </div>
        
        <div>
            <button class="btn btn-primary" type="submit">送出</button>
        </div>
    </form>
</div>




@endsection

@section('js')

@stop