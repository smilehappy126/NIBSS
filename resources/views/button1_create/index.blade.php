@extends('layouts.layout')
@section('title', '新增申請單')
@section('css')
<style type="text/css">
    /*申請規則*/
    .violationWarm{
        text-align:center;
        color: red;
    }
    .warm{
        color: red;
    }
    .labelSet{
        font-family: Microsoft JhengHei;　　　　　          
        line-height: 20px;　　　          　
        letter-spacing: 15px;　
    }
    @media only screen and (min-width: 768px) {
    .border1{
        border-color: #99FF99; /*邊框顏色*/
        -moz-box-shadow: 0px 0px 5px #99FF99;
        -webkit-box-shadow: 0px 0px 5px #99FF99; /*webkit 系列瀏覽器的陰影*/
        box-shadow: 0px 0px 5px #99FF99; /*IE9 或opera*/
        -moz-transition:all 0.5s;
        -webkit-transition:all 0.5s;
        -o-transition:all 0.5s;
        transition:all 0.5s;
        border-radius:10px;
        padding:20px;
    }
    .border2{
        background-color:#F5F5F5;
        border-radius:10px;
        padding:15px 15px;
        margin-bottom:20px;
    }
    .border3{
        background-color:#F5F5F5;
        border-radius:10px;
        padding:15px 15px;
        margin-top: 2px;
    }
    }

    /*radio按鈕*/
    .optionRadio{
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        -o-appearance: none;
        appearance: none;
        position: relative;
        top: 13.33333px;
        right: 0;
        bottom: 0;
        left: 0;
        height: 40px;
        width: 40px;
        transition: all 0.15s ease-out 0s;
        background: #cbd1d8;
        border: none;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin-right: 0.5rem;
        outline: none;
        position: relative;
        z-index: 1000;
    }
    .optionRadio:checked::before {
        height: 40px;
        width: 40px;
        position: absolute;
        content: '✔';
        display: inline-block;
        font-size: 26.66667px;
        text-align: center;
        line-height: 40px;
    }
    .optionRadio:checked::after {
        background: #40e0d0;
        content: '';
        display: block;
        position: relative;
        z-index: 100;
    }
    .optionRadio:hover {
        background: #9faab7;
    }
    .optionRadio{
        border-radius: 50%;
    }
    /*上下一步按鈕*/
    .nextButton{
        margin-top:50px; 
    }
    .previousButton{

    }
    /*新增刪除按鈕*/
    .addFormButton{
        float:center;
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 20px;
        background-color: #B0C4DE;
        width: 135px;
        height: 40px;
        border-radius: 100px;
        border-width: 0px;
        margin-top: 30px;
        margin-right: 10px;
        transition: 0.3s;
        cursor: pointer;
    }
    .addFormButton:border{
        border-width: 1px;
        border-style:none;
    }
    .addFormButton:hover{
        background-color: #CCDDFF;
        width: 15%;
        transition: 0.3s;
    }
    .removeFormButton{
        float:center;
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 20px;
        background-color: #B0C4DE;
        width: 135px;
        height: 40px;
        border-radius: 100px;
        border-width: 0px;
        margin-top: 30px;
        transition: 0.3s;
        cursor: pointer;
    }
    .removeFormButton:border{
        border-style:none;
    }
    .removeFormButton:hover{ 
        background-color: #CCDDFF;
        width: 15%;
        transition: 0.3s;
    }
</style>
@stop

@section('content')
<div class="container">
    @if( (Auth::user()->violation) > 2)
    <div id="container3" class="container3">
        <div class="border1">
        <h2>
            <div class="border2">
                <label class="violationWarm">您因違規次數超過三次，因此被禁止借用，請洽詢系辦以恢復申請資格。
                </label>
            <div>
        </h2>
        </div>
    </div>
    @endif
    @if( (Auth::user()->violation) < 3)
    <div id="container1" class="container1">
        <h2><label class="labelSet">器材租借使用規則</label></h2>
        <div class="border1">
        <h4>
            <div class="border2">
                <label class="labelSet">
                <?php
            echo nl2br($rules[0]->personinfo)
            ?>
                </label>
                <input  type="radio" class="optionRadio" name="person" id="person1" value="yes" onclick="show2()">
                <label class="labelSet">本人已確實詳閱上述之同意書內容，並且同意提供個人之資料以供中央大學資訊管理學系使用。</label>
            </div>    
            <div id="border3" class="border3">
            <br>    
                <label class="labelSet">
                <?php
                echo nl2br($rules[0]->note)
                ?>
                </label>
                <input  type="radio" class="optionRadio" name="ruler" id="ruler"  onclick="show()" checked disabled>
                <label class="labelSet">本人已確實詳閱上述之同意書內容，並且同意以上器材借用規則。</label>
            </div>
        </h4>
        </div>
    </div>

    <div id="container2" style="display:none;">
        <h2>資管系器材租借申請單</h2>
    <!-- novalidate 解決 An invalid form control with name='' is not focusable. -->
            <form action="{{ asset('/create') }}" method="post" id="form5" novalidate>
            {{ csrf_field() }}
                <ul class="nav nav-tabs">
                    <li class="active" id="L1"><a>Step1 借用人資料</a></li>
                    <li id="L2"><a>Step2 借用項目</a></li>
                    <li id="L3"><a>Step3 確認</a></li>
                </ul>
                <div id="home" class="tab-pane fade in active">
                    <div class="form-group">
                        <label><h2>姓名（必填）：</h2></label>
                        <input type="text" class="form-control" id="username" name="name" required>
                    </div>             

                    <div class="form-group">
                        <label><h2>班級（必選）：</h2></label>
                        <select class="form-control" id="class" name="class"  required>
                            <option value="" disabled selected></option>
                            <optgroup label="資管系">
                            <option value="資管1A">1A</option>
                            <option value="資管1B">1B</option>
                            <option value="資管2A">2A</option>
                            <option value="資管2B">2B</option>
                            <option value="資管3A">3A</option>
                            <option value="資管3B">3B</option>
                            <option value="資管4A">4A</option>
                            <option value="資管4B">4B</option>
                            <option value="資管碩一">碩一</option>
                            <option value="資管碩二">碩二</option>
                            <option value="資管碩專一">碩專一</option>
                            <option value="資管碩專二">碩專二</option>
                            <option value="資管博一">博一</option>
                            <option value="資管博二">博二</option>
                            <option value="資管博三">博三</option>
                            <option value="資管博四">博四</option>
                            <option value="資管博五">博五</option>
                            <option value="資管博六">博六</option>
                            <option value="資管博七">博七</option>
                            </optgroup>
                            <optgroup label="系外人士">
                            <option value="外系學生">外系學生</option>
                            <option value="教職員">教職員</option>
                            <option value="其他">其他</option>
                        </select>
                    </div> 
            
                    <div class="form-group">
                        <label><h2>電話（必填）：</h2></label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="000 000 0000" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="10" required>
                    </div>

                    <div class="form-group">           
                        <label><h2>證件（必填）：</h2></label>
                        <select class="form-control" name="license" required>
                            <option value="" disabled selected></option>
                            <option value="身分證">身分證</option>
                            <option value="學生證">學生證</option>
                            <option value="健保卡">健保卡</option>
                            <option value="駕照">駕照</option>
                            <option value="其他">其他</option>
                        </select>
                    </div>
                    
                    <div id="needClassroom">
                        <label><h2>是否借用教室</h2></label><br>
                        <input type="radio" class="optionRadio" name="needClassroom" id="needClassroom1" value="yes" onclick="selectroom()">
                        <label for="needClassroom1">Yes</label>
                        <input type="radio" class="optionRadio" name="needClassroom" id="needClassroom2" value="no" onclick="selectroom()" checked>
                        <label for="needClassroom2">No</label>

                    </div> 

                    <div id="borrowClassroom">
                        <div id="classroom" style="display:none;"  >
                            <label><h2>授課教室：</h2></label>
                            <select class="form-control" name="classroom" id=Sclassroom>
                                <option value="" disabled selected></option>
                                <option value="I1-223"" >I1-223</option>
                                <option value="I1-002">I1-002</option>
                                <option value="I1-017">I1-017</option>
                                <option value="I1-105">I1-105</option>
                                <option value="I1-107">I1-107</option>
                                <option value="I1-404">I1-404</option>
                                <option value="I1-314">I-314</option>
                                <option value="I1-315">I-315</option>
                            </select>
                        </div>

                        <div id="keyselect" style="display:none;">
                            <label><h2>鑰匙種類：</h2></label>
                            <select class="form-control" name="key" id="Skey">
                                <option value="" disabled selected></option>
                                <option value="一般鑰匙">一般鑰匙</option>
                                <option value="備用鑰匙">備用鑰匙</option>
                                <option value="服務學習鑰匙">服務學習鑰匙</option>
                            </select>
                        </div>    
                        
                        <div id="teacher" class="form-group" style="display:none;">
                            <label><h2>授課老師：</h2></label>
                            <input type="text" class="form-control" placeholder="" name="teacher" id="Steacher">
                        </div>
                    </div>
                    <div align="middle">
                        <button type="button" class="addFormButton next1Button" onclick="next()" id="b1"" >下一步</button>
                    </div>
                </div>
 
                <div id="menu1" class="tab-pane fade">
                    <h2><font color= red><所有項目請確實填寫！></font></h2>
                    <div id="myForm1">
                        <h2>借用項目：</h2>
                        <select class="form-control" width="auto" name="item[]" required>
                            <optgroup label="器材">
                            <option value="無">無</option>
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
                        <select class="form-control" width="auto" name="itemnum[]" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>        
                    </div>             
            
                    <div>
                        <button type="button" class="addFormButton" onclick="appendForm()">點此借用更多</button>
                        <button type="button" class="removeFormButton" style="display:none;" id="removeButton" onclick="removeForm()" >點此刪除</button>
                    </div>   
            
                    <div>
                        <button type="button" class="addFormButton next1Button" onclick="Previous1()" 
                        id="B2">上一步</button>
                        <button type="button" data-toggle="tab" class="removeFormButton next1Button" onclick="confirm()" 
                        id="b2">確定</button>
                    </div>
                </div>
    
                <div id="menu2" class="tab-pane fade">
                    <div id="confirm"></div>
                    <div>
                        <button type="button" class="addFormButton next1Button" onclick="Previous2()" 
                        id="B3">上一步</button>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <button type="button"  class="removeFormButton next1Button" id="b3" onclick="submit()">送出申請</button>
                    </div>
                </div>
            </form>
        </div> 
    </div>
    @endif
</div>  





@section('js')

<script language="JavaScript" type="text/javascript">  
    function show2(){
        document.getElementById("ruler").disabled=false;
    }    
    function show(){

        document.getElementById('container1').style.display="none";
        document.getElementById('container2').style.display="inline";

    }

    function selectroom(){
        var $slc1
            $slc1 = $(':radio[name="needClassroom"]:checked').val();
        
        if($slc1 == "yes"){
            document.getElementById('classroom').style.display="inline";
            document.getElementById('keyselect').style.display="inline";
            document.getElementById('teacher').style.display="inline";    
        }
        if($slc1 == "no"){ 
            document.getElementById('classroom').style.display="none";
            document.getElementById('keyselect').style.display="none";
            document.getElementById('teacher').style.display="none";

            document.getElementById('Sclassroom').value="";
            document.getElementById('Skey').value="";
            document.getElementById('Steacher').value="";
            
        }

    }        



    function next()
    {    
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
            document.getElementById('home').style.display="none";
            document.getElementById('menu1').style.display="inline";
            $("#L1").removeClass("active");
            $("#L2").addClass("active");
            $('#b1').attr('href','#menu1');
            $('#B3').attr('value','#menu1')
        }
    }
    var formCount = 1;
    
    function appendForm() {
        //複製myForm1表單，更改id變成myForm2,myForm3...
        
        $("#myForm1").clone()
                    .attr("id","myForm" + (formCount+=1))
                    .insertAfter($("[id^=myForm]:last"));
        if(formCount > 1){
                document.getElementById('removeButton').style.display="inline";
        }

//        window.alert("現在的formCount: " + formCount);
    }
    function removeForm(){
        // 刪除最後一個myForm表單

        if(formCount !== 1)
        {
            $("[id^=myForm]:last").remove();
            formCount-=1;
            if(formCount == 1){
                document.getElementById('removeButton').style.display="none";
            }
       }
    } 

    
    function Previous1() {
    document.getElementById('home').style.display="inline";
    document.getElementById('menu1').style.display="none";
    $("#L2").removeClass("active");
    $("#L1").addClass("active");
    $('#B2').attr('href','#home');
    }

    function Previous2() {
    $("#confirm").empty();
    document.getElementById('menu1').style.display="inline";
    $("#L3").removeClass("active");
    $("#L2").addClass("active");
    $('#B3').attr('href','#menu1');
    }

    var $s1, $s2, $s3, $s4, $s5; 
    
    function confirm(){
        document.getElementById('menu1').style.display="none";
        $s5 = document.getElementById("username").value;
        $("#confirm").empty();
        $("#confirm").append("<h2>借用者:" + $s5 + "</h2>")
        for(var i = 1; i<=formCount; i++){
            $s1 = $("#myForm"+i).find("select[name='item[]']").val();
            $s2 = $("#myForm"+i).find("select[name='itemnum[]']").val();

            $("#confirm").append("<h2>借用項目" + i + ": </h2>" + "項目: " + $s1 + "<br>")
                        .append("數量: " + $s2 + "<br>")

        }

        $("#L2").removeClass("active");
        $("#L3").addClass("active");
        $('#b2').attr('href','#menu2');
           



    }
    /*function send(){
            $("#L3").removeClass("active");
            $("#L1").addClass("active");
            $('#b3').attr('href','#home');
        
    }*/

    function submit(){
        document.getElementById("#Form5").submit();
    }
   
</script>


@stop
@endsection