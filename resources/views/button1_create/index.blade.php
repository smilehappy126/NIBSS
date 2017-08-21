@extends('layouts.layout')
@section('title', '新增申請單')
@section('css')

@stop

@section('content')

<div class="container">
  

<h2>資管系器材租借申請單</h2>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Step1 借用人資料</a></li>
    <li><a data-toggle="tab" href="#menu1">Step2 借用項目</a></li>
    <li><a data-toggle="tab" href="#menu2">Step3 確認</a></li>
    <li><a data-toggle="tab" href="#menu3">Step4 完成借用</a></li>
</ul>

<div class="tab-content" >
    <div id="home" class="tab-pane fade in active" >
        <div class="col-xs-6 col-sm-4">
            <div class="form-group">
                <label for="name"><h2>姓名（必填）：</h2></label>
                <input type="text" class="form-control" placeholder="" required="required">
            </div>             

            <label for="name" id=class><h2>班級：</h2></label>
                <select class="form-control" >
                    <option value="" disabled selected></option>
                    <option>1A</option>
                    <option>1B</option>
                    <option>2A</option>
                    <option>2B</option>
                    <option>3A</option>
                    <option>3B</option>
                    <option>4A</option>
                    <option>4B</option>
                    <option>碩一</option>
                    <option>碩二</option>
                    <option>碩專一</option>
                    <option>碩專二</option>
                    <option>博一</option>
                    <option>博二</option>
                    <option>博三</option>
                    <option>博四</option>
                    <option>博五</option>
                    <option>博六</option>
                    <option>博七</option>
                </select>          
            
            <div class="form-group">
                <label for="name"><h2>電話（必填）：</h2></label>
                <input type="text" class="form-control" placeholder="" required="required">
            </div>  
            
            <label for="name" id=documents><h2>證件：</h2></label>
                <select class="form-control">
                    <option value="" disabled selected></option>
                    <option>身分證</option>
                    <option>學生證</option>
                    <option>健保卡</option>
                    <option>駕照</option>
                </select>
            
            <label for="name" id=classroom><h2>授課教室：</h2></label>
                <select class="form-control">
                    <option value="" disabled selected></option>
                    <option>I1-223</option>
                    <option>I1-002</option>
                    <option>I1-017</option>
                    <option>I1-105</option>
                    <option>I1-107</option>
                    <option>I1-404</option>
                    <option>I-314</option>
                    <option>I-315</option>
                </select>

            <div class="form-group">
                <label for="name"><h2>授課老師：</h2></label>
                <input type="text" class="form-control" placeholder=""></h2>
            </div>         
            
            <div align="middle">
            <a data-toggle="tab" href="#menu1" class="btn btn-primary" role="button">下一步</a>
            </div>
        </div>  
    </div>  
    

    <div id="menu1" class="tab-pane fade">
        <div class="borrow">
            <button type="button" class="btn btn-primary">
            <span calss="glyphicon glyphicon-plus"></span>點此新增申請單
            </button>
        
        <p><h2>借用項目：</h2>
            <select name="equipment" class="form-group" width: 'auto' >
                    <option value="" disabled selected></option>
                    <optgroup label="鑰匙">
                        <option value="鑰匙I1-223">鑰匙I1-223</option>
                        <option value="鑰匙I1-002">鑰匙I1-002</option>
                        <option value="鑰匙I1-017">鑰匙I1-017</option>
                        <option value="鑰匙I1-105">鑰匙I1-105</option>
                        <option value="鑰匙I1-107">鑰匙I1-107</option>
                        <option value="鑰匙I1-404">鑰匙I1-404</option>
                        <option value="鑰匙I-314">鑰匙I-314</option>
                        <option value="鑰匙I-315">鑰匙I-315</option>
                        <option value="鑰匙I1-933">鑰匙I1-933</option>
                    </optgroup>
                    
                    <optgroup label="器材">
                        <option value="電池盒">電池盒</option>
                        <option value="紅外線簡報器">紅外線簡報器</option>
                        <option value="筆記型電腦">筆記型電腦</option>
                        <option value="相機">相機</option>
                        <option value="數位攝影機">數位攝影機</option>
                        <option value="腳架">腳架</option>
                        <option value="螢幕傳輸線HDMI">螢幕傳輸線HDMI</option>
                        <option value="延長線">延長線</option>
                        <option value="網路線">網路線</option>
                        <option value="電源線">電源線</option>
                        <option value="單槍投影機">單槍投影機</option>
                        <option value="麥克風">麥克風</option>
                        <option value="喇叭">喇叭</option>
                        <option value="擴大機">擴大機</option>
                        <option value="錄音筆">錄音筆</option>
                        <option value="按鈴">按鈴</option>
                        <option value="推車">推車</option>
                        <option value="IRS">IRS</option>
                    </optgroup>
            </select>
        
        <h2>借用數量：</h2>
            <select name="number" class="form-group" width: 'auto' >
                <option value="" disabled selected></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        
        <h2>備份鑰匙：</h2>
            <select name="spare_key" class="form-group" width: 'auto' >
                <option value="" disabled selected></option>
                <option value="備鑰">備鑰</option>
                <option value="服務學習鑰匙">服務學習鑰匙</option>  
            </select>
        
        <h2>器材編號：</h2>
            <select name="eq_number" class="form-group" width: 'auto' >
                <option value="" disabled selected></option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="編號1">編號1</option>
                <option value="編號2">編號2</option> 
                <option value="編號3">編號3</option>                                       
                <option value="編號4">編號4</option>
                <option value="編號5">編號5</option>            
                <option value="編號6">編號6</option>
                <option value="編號7">編號7</option> 
                <option value="編號8">編號8</option>                                  
                <option value="編號9">編號9</option>
                <option value="編號10">編號10</option> 
                <option value="編號11">編號11</option>
            </select>           
        </p>
            <div id="application">
            <a data-toggle="tab" href="#menu2" class="btn btn-primary" role="button">確定</a>
            </div>
        </div>
    </div>
    
    

    <div id="menu2" class="tab-pane fade">
        <div>
            <h2>
            借用項目為：<div class="display1"></div>
            借用數量為：<div class="display2"></div>
            備鑰為：<div class="display3"></div>
            編號為：<div class="display4"></div>
            </h2>
        <a data-toggle="tab" href="#menu3" class="btn btn-primary" role="submit">送出申請</a>    


        </div>
    
    </div>
    

    
    <div id="menu3" class="tab-pane fade">
        <div class="col-xs-6 col-sm-4">
            <h2>您已完成預約！</h2>
        </div>
    </div>



@endsection

@section('js')

 <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $(".add").click(function(){
                $(".borrow").append("<input name='class"+q+"'>");//待補完新增功能
                q++;
  });
});
</script>

<script language="JavaScript" type="text/javascript">
    $(function(){
    var $s1 = $('select[name="equipment"]');//目前只能抓取第一筆借用資料
    var $s2 = $('select[name="number"]');
    var $s3 = $('select[name="spare_key"]');
    var $s4 = $('select[name="eq_number"]'); 
        $("#application").click(function(){
        $( ".display1" ).text($s1.val());
        $( ".display2" ).text($s2.val());
        $( ".display3" ).text($s3.val());
        $( ".display4" ).text($s4.val());
  });
        });
</script>


@stop