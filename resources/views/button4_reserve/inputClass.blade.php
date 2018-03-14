@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')

<link href="{{ asset('/include/pickadate/lib/themes/classic.css') }}" rel="stylesheet">
<link href="{{ asset('/include/pickadate/lib/themes/classic.date.css') }}" rel="stylesheet">

<style>
.errorMessage {
    color: red;
}
.returnButton{
        border-radius: 40px;
        font-weight: bolder;
        font-family: Microsoft JhengHei;
        width: 21%;
        font-size: 16px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .returnButton:hover{
        width: 23%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
.submitButton{
        margin-top:1%;
        background-color: #FFF;
        color: #0044BB;
        border-color: #0044BB;
        border-radius: 25px;
        width: 80px;
    }
.submitButton:hover,
    .submitButton:focus,
    .submitButton:active    {
        background-color: #0044BB;
        color: #FFF;
        border-color: #0044BB;
    }
</style>
@stop

@section('content')

<div class="container" style="padding-top: 10px;">
    <!--顯示出錯訊息(課程重疊了)-->
    @if (session('alert'))
    <div class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Oops...出錯了!</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{ session('alert') }}
        <br><br>
        <label>請檢查撞堂位置，日期為:</label>
        <p>該週週一: {{ session('weekFirst') }}</p>
        <!-- <p>開始時間: </p>
        <p>結束時間: </p> -->
    </div>
    @endif
    <div>
      <form action="{{ asset('reserve/'.$currentClassroom)}}" method="get">
          <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回 {{$currentClassroom}} 教室預約狀況</button>
      </form>
    </div>

    <br>

    <form action="{{ asset('/inputClass/save') }}" method="post">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label>教室: {{$currentClassroom}}</label>
            <input name="roomname" value="{{$currentClassroom}}" hidden>
        </div>
        <div class="form-group">
            <label>課堂起始日期:</label>
            <input id="start_date" class="start_pickadate form-control" type="text" name="start_date" placeholder="點選以選擇日期" data-value="" required>
            <p class="errorMessage" id="err_startDate"></p>
        </div>
        <div class="form-group">
            <label>起始節次:</label>
            <select class="form-control select_start create_classTime" name="start_classTime">
                <option disabled selected>請先選擇課堂起始日期</option>
            </select>
        </div>
        <div class="form-group">
            <label>結束節次:</label>
            <select class="form-control select_end create_classTime" name="end_classTime">
                <option disabled selected>請先選擇課堂起始日期</option>
            </select>
        </div>
        <div>
            <p class="errorMessage" id="err_classTime"></p>
        </div>
        <div class="form-group">
            <label>結束重複日期 (重複頻率:每週):</label>
            <input id="end_date" class="end_pickadate form-control" type="text" name="end_date" placeholder="點選以選擇日期" data-value="" required>
            <p class="errorMessage" id="err_endDate"></p>
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
            <button id="submit_btn" class="btn btn-primary submitButton" type="submit">送出</button>
            <!-- <button type="button" class="btn btn-success " data-toggle="modal" data-target="#excelModal2">Excel匯入固定多筆資料 -->
    </button>
        </div>
    </form>
</div>
    <div class="modal fade" id="excelModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 align="center" class="modal-title" id="exampleModalLabel">Excel匯入固定多筆資料</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-success" role="alert">
  <h5 class="alert-heading">【 說明 】</h5>
  <p>Excel的欄位對應送出表單欄位。</p><br>
  <a href="{{asset('/longdownloadExcel')}}" class="btn btn-success" role="button">範本下載</a>
  <hr>
  <p class="mb-0">【 範例 (可以多筆新增) 】</p><br>
  <div class="table-responsive">
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">roomname</th>
      <th scope="col">start_date</th>
      <th scope="col">end_date</th>
      <th scope="col">start_classtime</th>
      <th scope="col">end_classtime</th>
      <th scope="col">content</th>
      <th scope="col">teacher</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>107</td>
      <td>2018/2/22</td>
      <td>2018/6/21</td>
      <td>1</td>
      <td>4</td>
      <td>會計學</td>
      <td>謝依靜</td>
    </tr>
    <tr>
      <td>107</td>
      <td>2018/2/20</td>
      <td>2018/6/19</td>
      <td>5</td>
      <td>7</td>
      <td>微積分</td>
      <td>須上苑</td>
    </tr>
  </tbody>
</table>
</div>
<br>
<p>即可在 <b>教室107</b> <b>2018/2/22~6/21</b>每個禮拜四 <b>1~4節</b> 填上 <b>會計學謝依靜</b> <br><b>以此類推</b>其他筆的資料新增</p>
</div> 

    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('inputClass/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
                    {{ csrf_field() }}
        <!-- <br/> -->
   
    <!-- <a href="{{asset('/longdownloadExcel')}}" class="btn btn-success" role="button">Excel固定多筆範本下載</a> -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">上傳固定課程</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      </form>
    </div>
  </div>
</div>        

@endsection

@section('js')

<script src="{{ asset('/include/pickadate/lib/picker.js') }}"></script>
<script src="{{ asset('/include/pickadate/lib/picker.date.js') }}"></script>
<script src="{{ asset('/include/pickadate/lib/legacy.js') }}"></script>

<script language="JavaScript" type="text/javascript">

var classTime_array = ["1", "2", "3", "4", "noon", "5", "6", "7", "8", "9", "A", "B", "C"];
var curDay; // current day(星期幾)

$( document ).ready(function(){
    
    $(".start_pickadate").pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd',

        onClose: function() {
          // console.log(this.get('select', 'ddd'));
          curDay = this.get('select', 'ddd');

          /* select option的text更新 */
          if(curDay){
            $(".create_classTime").html(''); // 讓原有select options清空
            populateStartDay(".select_start");
            populateEndDay(".select_end");
          } 
        }
    });

    $(".end_pickadate").pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd',
    });

    function populateStartDay(selector) {
        $(selector).html(''); // 讓原有select options清空
        $(selector)
          .append('<option value="1">'+curDay+'_1'+' (08:00)</option>')
          .append('<option value="2">'+curDay+'_2'+' (09:00)</option>')
          .append('<option value="3">'+curDay+'_3'+' (10:00)</option>')
          .append('<option value="4">'+curDay+'_4'+' (11:00)</option>')
          .append('<option value="noon">'+curDay+'_noon'+' (12:00)</option>')
          .append('<option value="5">'+curDay+'_5'+' (13:00)</option>')
          .append('<option value="6">'+curDay+'_6'+' (14:00)</option>')
          .append('<option value="7">'+curDay+'_7'+' (15:00)</option>')
          .append('<option value="8">'+curDay+'_8'+' (16:00)</option>')
          .append('<option value="9">'+curDay+'_9'+' (17:00)</option>')
          .append('<option value="A">'+curDay+'_A'+' (18:00)</option>')
          .append('<option value="B">'+curDay+'_B'+' (19:00)</option>')
          .append('<option value="C">'+curDay+'_C'+' (20:00)</option>')
    }
    function populateEndDay(selector) {
        $(selector).html(''); // 讓原有select options清空
        $(selector)
          .append('<option value="1">'+curDay+'_1'+' (08:50)</option>')
          .append('<option value="2">'+curDay+'_2'+' (09:50)</option>')
          .append('<option value="3">'+curDay+'_3'+' (10:50)</option>')
          .append('<option value="4">'+curDay+'_4'+' (11:50)</option>')
          .append('<option value="noon">'+curDay+'_noon'+' (12:50)</option>')
          .append('<option value="5">'+curDay+'_5'+' (13:50)</option>')
          .append('<option value="6">'+curDay+'_6'+' (14:50)</option>')
          .append('<option value="7">'+curDay+'_7'+' (15:50)</option>')
          .append('<option value="8">'+curDay+'_8'+' (16:50)</option>')
          .append('<option value="9">'+curDay+'_9'+' (17:50)</option>')
          .append('<option value="A">'+curDay+'_A'+' (18:50)</option>')
          .append('<option value="B">'+curDay+'_B'+' (19:50)</option>')
          .append('<option value="C">'+curDay+'_C'+' (20:50)</option>')
    }


    /* form validation */
    $("#submit_btn").click(function() {
        
        // 清空錯誤訊息
        $("#err_startDate").text("");
        $("#err_endDate").text("");

        if($("#start_date").val() == ""){
            // alert("請選擇課堂起始日期!");
            $("#err_startDate").text("請選擇課堂起始日期!");
        }
        if($("#end_date").val() == ""){
            // alert("請選擇課堂結束日期!");
            $("#err_endDate").text("請選擇課堂結束日期!");
        }
        else{
            $("#err_startDate").text("");
            $("#err_endDate").text("");
        }
    });


    /* form validation: 起始日期應早於結束日期 */
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


    /* form validation: 起始節次應早於結束節次 */
    $(".create_classTime").change(function(){

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