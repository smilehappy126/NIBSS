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
echo "新增多筆" . "<br>";

?>


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