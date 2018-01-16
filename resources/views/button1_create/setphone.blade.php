@extends('layouts.layout')
@section('title', '填寫電話')
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
    }
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
	<div id="container3" class="container3">
        <div class="border1">
            <div class="border2">

                <form action="{{ asset('/create/setphone')}}" method="post" id="form6" novalidate>
                {{ csrf_field() }}
                <div class="form-group">
                        <h2>
                        <label>
                        {{ Auth::user()->name }}，</br>由於您的帳號還沒有電話，請先填寫電話才能進行申請。（僅首次申請需要）</h2>
                        </label>
                        <div class="form-group">
                        <label><h2>電話：</h2></label>
                        <input type="text"  class="form-control" name="phone">
                        </div>
                </div>
                <div align="center">
                    <button type="button" class="removeFormButton" onclick="submit()" >送出</button>
                </div>
                <label name="currentuser" style="display:none;">{{ Auth::user()->email }}</label>
                
                </form>
            </div>
        </div>
    </div>
</div>
@section('js')
<script language="JavaScript" type="text/javascript"> 
function submit(){
        document.getElementById("#Form6").submit();
    }
</script>

@stop
@endsection
