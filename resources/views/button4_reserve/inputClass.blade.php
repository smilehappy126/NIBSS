@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')

<link href="{{ asset('/include/pickadate/lib/themes/classic.css') }}" rel="stylesheet">
<link href="{{ asset('/include/pickadate/lib/themes/classic.date.css') }}" rel="stylesheet">

<style>
.errorMessage {
    color: red;
}
</style>
@stop

@section('content')



<button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#excelModal2">
        Excel匯入固定多筆資料
    </button>

    <div class="modal fade" id="excelModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excel匯入固定多筆資料</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('inputClass/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
                    {{ csrf_field() }}
        <br/>

        <button class="btn btn-primary">Import CSV or Excel File</button>

    </form>
    <br>
    <a href="{{asset('/longdownloadExcel')}}" class="btn btn-success" role="button">Excel固定多筆範本下載</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>        

    <!-- <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('inputClass/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
                    {{ csrf_field() }}
        <br/>

        <button class="btn btn-primary">Import CSV or Excel File</button>

    </form> -->
<div class="container" style="padding-top: 10px;">

    <!--顯示出錯訊息(課程重疊了)-->
    @if (session('alert'))
    <div class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Oops...出錯了!</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{ session('alert') }}
        <br><br>
        <label>重複課堂資訊:</label>
        <p>該週週一: {{ session('weekFirst') }}</p>
        <!-- <p>開始時間: </p>
        <p>結束時間: </p> -->
    </div>
    @endif

    <form action="{{ asset('/inputClass/save') }}" method="post">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label>教室: {{$currentClassroom}}</label>
            <input name="roomname" value="{{$currentClassroom}}" hidden>
        </div>
        <div class="form-group">
            <label>課堂起始日期:</label>
            <input id="start_date" class="pickadate form-control" type="text" name="start_date" placeholder="點選以選擇日期" data-value="" required>
            <p class="errorMessage" id="err_startDate"></p>
        </div>
        <div class="form-group">
            <label>課堂結束日期:</label>
            <input id="end_date" class="pickadate form-control" type="text" name="end_date" placeholder="點選以選擇日期" data-value="" required>
            <p class="errorMessage" id="err_endDate"></p>
        </div>
        <div class="form-group">
            <label>起始節次:</label>
            <select class="form-control select_start" name="start_classTime">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="noon">午休</option>
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
            <select class="form-control select_end" name="end_classTime">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="noon">午休</option>
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
        <div>
            <p class="errorMessage" id="err_classTime"></p>
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

var classTime_array = ["1", "2", "3", "4", "noon", "5", "6", "7", "8", "9", "A", "B", "C"];

$( document ).ready(function(){
    
    $(".pickadate").pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd'
    });

    $("#submit_btn").click(function() {

        if($("#start_date").val() == ""){
            // alert("請選擇課堂起始日期!");
            $("#err_startDate").text("請選擇課堂起始日期!");
        }
        if($("#end_date").val() == ""){
            // alert("請選擇課堂結束日期!");
            $("#err_endDate").text("請選擇課堂起始日期!");
        }
        else{
            $("#err_startDate").text("");
            $("#err_endDate").text("");
        }
    });

    /* 起始日期應早於結束日期 */
    var from_$input = $('#start_date').pickadate(),
        from_picker = from_$input.pickadate('picker');

    var to_$input = $('#end_date').pickadate(),
        to_picker = to_$input.pickadate('picker');

    // Check if there’s a “from” or “to” date to start with.
    if ( from_picker.get('value') ) {
      to_picker.set('min', from_picker.get('select'));
    }
    if ( to_picker.get('value') ) {
      from_picker.set('max', to_picker.get('select'));
    }

    // When something is selected, update the “from” and “to” limits.
    from_picker.on('set', function(event) {
      if ( event.select ) {
        to_picker.set('min', from_picker.get('select'));  
      }
      else if ( 'clear' in event ) {
        to_picker.set('min', false);
      }
    });
    to_picker.on('set', function(event) {
      if ( event.select ) {
        from_picker.set('max', to_picker.get('select'));
      }
      else if ( 'clear' in event ) {
        from_picker.set('max', false);
      }
    });


    /* 起始節次應早於結束節次 */
    $(".select_start").change(function(){

        var index_start = classTime_array.indexOf($(".select_start option:selected").val());
        var index_end = classTime_array.indexOf($(".select_end option:selected").val());

        if(index_start > index_end){
            $("#err_classTime").text("起始節次應早於結束節次");
            $("#submit_btn").prop('disabled', true);
        }else{
            $("#err_classTime").text("");
            $("#submit_btn").prop('disabled', false);
        }
    });

    $(".select_end").change(function(){

        var index_start = classTime_array.indexOf($(".select_start option:selected").val());
        var index_end = classTime_array.indexOf($(".select_end option:selected").val());

        if(index_start > index_end){
            $("#err_classTime").text("起始節次應早於結束節次");
            $("#submit_btn").prop('disabled', true);
        }else{
            $("#err_classTime").text("");
            $("#submit_btn").prop('disabled', false);
        }
    });

});
</script>

@stop