@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')

<link href="{{ asset('/include/pickadate/lib/themes/classic.css') }}" rel="stylesheet">
<link href="{{ asset('/include/pickadate/lib/themes/classic.date.css') }}" rel="stylesheet">

@stop

@section('content')

<!-- <?php
echo "新增多筆" . "<br>";

?> -->
<button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#excelModal">
        Excel匯入固定多筆資料
    </button>

    <div class="modal fade" id="excelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excel匯入固定多筆資料</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- excel -->
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
                    {{ csrf_field() }}
        <br/>

        <button class="btn btn-md btn-primary">Import CSV or Excel File</button>

    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>        

<div class="container">

    <form action="{{ asset('/inputClass/save') }}" method="post">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label>教室: {{$currentClassroom}}</label>
            <input name="roomname" value="{{$currentClassroom}}" hidden>
        </div>
        <div class="form-group">
            <label>課堂起始日期:</label>
            <input id="start_date" class="pickadate form-control" type="text" name="start_date" placeholder="點選以選擇日期" data-value="" required>
        </div>
        <div class="form-group">
            <label>課堂結束日期:</label>
            <input id="end_date" class="pickadate form-control" type="text" name="end_date" placeholder="點選以選擇日期" data-value="" required>
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
            <input type="text" class="form-control" name="content" required>
        </div>
        <div class="form-group">
            <label>老師:</label>
            <input type="text" class="form-control" name="teacher" required>
        </div>
        <div>
            <button id="submit_btn" class="btn btn-primary" type="submit">送出</button>
        </div>
    </form>
</div>




@endsection

@section('js')

<script src="{{ asset('/include/pickadate/lib/picker.js') }}"></script>
<script src="{{ asset('/include/pickadate/lib/picker.date.js') }}"></script>
<script src="{{ asset('/include/pickadate/lib/legacy.js') }}"></script>

<script language="JavaScript" type="text/javascript">
$( document ).ready(function(){
    
    // JQuery Datepicker
    // $(".datepick").datepicker({ dateFormat: 'yy-mm-dd' });

    $(".pickadate").pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd'
    });

    $("#submit_btn").click(function() {

        if($("#start_date").val() == ""){
            alert("請選擇課堂起始日期!");
        }
        if($("#end_date").val() == ""){
            alert("請選擇課堂結束日期!");
        }
    });

});
</script>

@stop