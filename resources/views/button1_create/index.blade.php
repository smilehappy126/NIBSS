@extends('layouts.layout')
@section('title', '新增申請單')
@section('css')

@stop

@section('content')

<div class="container">
  
    <h2>資管系器材租借申請單</h2>
    <!-- novalidate 解決 An invalid form control with name='' is not focusable. -->
    <form action="{{ asset('/create') }}" method="post" id="form5" novalidate>
        {{ csrf_field() }}
        <ul class="nav nav-tabs">
            <li class="active" id="L1"><a>Step1 借用人資料</a></li>
            <li id="L2"><a>Step2 借用項目</a></li>
            <li id="L3"><a>Step3 確認</a></li>
        </ul>
    <div class="tab-content" >
        <div id="home" class="tab-pane fade in active" >
            <div class="col-xs-6 col-sm-4">
                <div class="form-group">
                    <label><h2>姓名（必填）：</h2></label>
                        <input type="text" class="form-control"  required="required" id="username" name="name">
                </div>             

                <label><h2>班級（必選）：</h2></label>
                    <select class="form-control" id="class" name="class">
                        <option value="" disabled selected></option>
                        <option value="1A">1A</option>
                        <option value="1B">1B</option>
                        <option value="2A">2A</option>
                        <option value="2B">2B</option>
                        <option value="3A">3A</option>
                        <option value="3B">3B</option>
                        <option value="4A">4A</option>
                        <option value="4B">4B</option>
                        <option value="碩一">碩一</option>
                        <option value="碩二">碩二</option>
                        <option value="碩專一">碩專一</option>
                        <option value="碩專二">碩專二</option>
                        <option value="博一">博一</option>
                        <option value="博二">博二</option>
                        <option value="博三">博三</option>
                        <option value="博四">博四</option>
                        <option value="博五">博五</option>
                        <option value="博六">博六</option>
                        <option value="博七">博七</option>
                    </select>
                <div class="form-group">
                    <label><h2>電話（必填）：</h2></label>
                        <input type="text" class="form-control"  required="required" id="phone" name="phone" placeholder="000 000 0000" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="10">
                </div>           
            
                <label><h2>證件：（必填）</h2></label>
                <select class="form-control" name="license">
                    <option value="" disabled selected></option>
                    <option value="身分證">身分證</option>
                    <option value="學生證">學生證</option>
                    <option value="健保卡">健保卡</option>
                    <option value="駕照">駕照</option>
                </select>
            
                <label><h2>授課教室：</h2></label>
                <select class="form-control" name="classroom">
                    <option value="" disabled selected></option>
                    <option value="I1-223">I1-223</option>
                    <option value="I1-002">I1-002</option>
                    <option value="I1-017">I1-017</option>
                    <option value="I1-105">I1-105</option>
                    <option value="I1-107">I1-107</option>
                    <option value="I1-404">I1-404</option>
                    <option value="I1-314">I-314</option>
                    <option value="I1-315">I-315</option>
                </select>

            <div class="form-group">
                <label><h2>授課老師：</h2></label>
                <input type="text" class="form-control" placeholder="" name="teacher">
            </div>         
            
            <div align="middle">
            <a data-toggle="tab" class="btn btn-primary" role="button" onclick="next()" id="b1">下一步</a>
            </div>
        </div>  
    </div>  
    

    <div id="menu1" class="tab-pane fade">
        <div class="borrow">
            <button type="button" class="btn btn-primary" onclick="appendForm()">點此新增申請單</button>
        <h2><font color= red><所有項目請確實填寫！></font></h2>
        <div id="myForm1">
        <h2>借用項目：</h2>
            <select class="form-group" width="auto" name="item[]">
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
                        <option value="備鑰">備鑰</option>
                        <option value="服務學習鑰匙">服務學習鑰匙</option> 
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
            <select class="form-group" width="auto" name="itemnum[]">
                <option value="" disabled selected></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>        
        </div>             
        </div>
        <div>
                <a data-toggle="tab" class="btn btn-primary" role="button" onclick="Previous1()" id="B2">上一步</a>
                <a data-toggle="tab" class="btn btn-primary" role="button" onclick="confirm()" id="b2">確定</a>
            </div>
    </div>
    

    <div id="menu2" class="tab-pane fade">
        <div id="confirm"></div>
        <div>
        <a data-toggle="tab" class="btn btn-primary" role="button" onclick="Previous2()" id="B3">上一步</a>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <button type="submit"  class="btn btn-primary" id="b3" form="form5">送出申請</button>
        </div>
    </div>
</form>    

    
    <!-- <div id="menu3" class="tab-pane fade">
        <div class="col-xs-6 col-sm-4">
            <h2>您已完成預約！</h2>
        </div>
    </div> -->
</div>
</div>



@section('js')

<script language="JavaScript" type="text/javascript">  
    
    
    function next() {
    
    var $name = document.getElementById("username").value ;
    var $phone = document.getElementById("phone").value ;
    var $class = document.getElementById("class").value ;
    var $license = $("#form5").find("select[name='license']").val();
        if($name == "" ||  $class == "" || $license == null)
        {
            alert("尚有資料未填！");  
        }
        else if(isNaN($phone) == 1)
        {
            alert("請確實填寫電話！");
        }
        else{
            $("#L1").removeClass("active");
            $("#L2").addClass("active");
            $('#b1').attr('href','#menu1');
        }
    }
    var formCount = 1;
    
    function appendForm() {
        //複製myForm1表單，更改id變成myForm2,myForm3...
        $("#myForm1").clone()
                    .attr("id","myForm" + (formCount+=1))
                    .insertAfter($("[id^=myForm]:last"));

//        window.alert("現在的formCount: " + formCount);
    } 
    
    function Previous1() {
    $("#L2").removeClass("active");
    $("#L1").addClass("active");
    $('#B2').attr('href','#home');
    }

    function Previous2() {
    $("#L3").removeClass("active");
    $("#L2").addClass("active");
    $('#B3').attr('href','#menu1');
    }

    var $s1, $s2, $s3, $s4, $s5; 
    
    function confirm(){
        $s5 = document.getElementById("username").value;
        $("#confirm").append("<h2>借用者:" + $s5 + "</h2>")
        for(var i = 1; i<=formCount; i++){
            $s1 = $("#myForm"+i).find("select[name='item[]']").val();
            $s2 = $("#myForm"+i).find("select[name='itemnum[]']").val();

            $("#confirm").append("<h2>借用項目" + i + ": </h2>" + "項目: " + $s1 + "<br>")
                        .append("數量: " + $s2 + "<br>")
  

        }
        if($s1 == null || $s2 == null )
        {
            alert("請將資料填完！");  
        }
        else{

        $("#L2").removeClass("active");
        $("#L3").addClass("active");
        $('#b2').attr('href','#menu2');
        }        
        // $("#L2").removeClass("active");
        // $("#L3").addClass("active");
        // $('#b2').attr('href','#menu2');


    }
    /*function send(){
            $("#L3").removeClass("active");
            $("#L1").addClass("active");
            $('#b3').attr('href','#home');
        
    }*/
    
</script>


@stop
@endsection