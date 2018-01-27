@extends('layouts.layout')
@section('title', '編輯條例')
@section('css')
   <style type="text/css">
  /*PC CSS*/
@media screen and (min-width: 900px){
    .Mobilesection{
        display: none;
    }
    .returnButton{
        border-radius: 40px;
        font-weight: bolder;
        font-family: Microsoft JhengHei;
        width: 10%;
        font-size: 20px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .returnButton:hover{
        width: 12%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
    .TopTitle{
        background-color: transparent;
        font-family: DFKai-sb;
        font-size: 80px;
        text-align: center;
    }
    .notice{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 100px;
        color: #FF3333;
    }
    .chooseSectionButton{
        transition: 0.2s;
        border-width: 0px;
        background-color: #F0FFFF;
        font-weight: bolder;
        font-size: 30px;
        border-radius: 50px;
        height: 50px;
        width: 180px;
    }
    .chooseSectionButton:hover{
        transition: 0.2s;
        background-color: #B0E0E6;
        width: 220px;
    }
    /*個資條款*/
    .personInfoSection{
        text-align: center;
    }
    .personInfoContent{
        font-weight: bolder;
        font-size: 20px;
        text-align: left;
    }
    .personInfoArea{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 22px;
        width: 100%;
        height: 450px;
    }
    .personInfoButton{
        transition: 0.3s;
        width: 100px;
        background-color: #E0FFFF;
        border-width: 0px;
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 22px;
        border-radius: 100px;
    }
    .personInfoButton:hover{
        transition: 0.3s;
        width: 120px;
        background-color: #7FFFD4;
        
    }
    /*借用條款*/
    .NoteSection{
        text-align: center;
    }
    .noteContent{
        font-weight: bolder;
        font-size: 20px;
        text-align: left;
    }
    .noteArea{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 22px;
        width: 100%;
        height: 450px;
    }
    .NoteButton{
        transition: 0.3s;
        width: 100px;
        background-color: #E0FFFF;
        border-width: 0px;
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 22px;
        border-radius: 100px;
    }
    .NoteButton:hover{
        transition: 0.3s;
        width: 120px;
        background-color: #7FFFD4;
        
    }

}
/*End of PC CSS*/

/*Mobile CSS*/
@media screen and (max-width: 900px) and (min-width: 300px){
    .PCsection{
        display: none;
    }
    .returnButton{
        border-radius: 40px;
        font-weight: bolder;
        font-family: Microsoft JhengHei;
        width: 25%;
        font-size: 20px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .returnButton:hover{
        width: 27%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
    .TopTitle{
        background-color: transparent;
        font-family: DFKai-sb;
        font-size: 80px;
        text-align: center;
    }
    .notice{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 100px;
        color: #FF3333;
    }
    .chooseSectionButton{
        transition: 0.2s;
        border-width: 0px;
        background-color: #F0FFFF;
        font-weight: bolder;
        font-size: 20px;
        border-radius: 50px;
        height: 50px;
        width: 120px;
    }
    .chooseSectionButton:hover{
        transition: 0.2s;
        background-color: #B0E0E6;
        width: 140px;
    }
    /*個資條款*/
    .personInfoSection{
        text-align: center;
    }
    .personInfoContent{
        font-weight: bolder;
        font-size: 20px;
        text-align: left;
    }
    .personInfoArea{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 22px;
        width: 100%;
        height: 450px;
    }
    .personInfoButton{
        transition: 0.3s;
        width: 100px;
        background-color: #E0FFFF;
        border-width: 0px;
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 22px;
        border-radius: 100px;
    }
    .personInfoButton:hover{
        transition: 0.3s;
        width: 120px;
        background-color: #7FFFD4;
        
    }
    /*借用條款*/
    .NoteSection{
        text-align: center;
    }
    .noteContent{
        font-weight: bolder;
        font-size: 20px;
        text-align: left;
    }
    .noteArea{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 22px;
        width: 100%;
        height: 450px;
    }
    .NoteButton{
        transition: 0.3s;
        width: 100px;
        background-color: #E0FFFF;
        border-width: 0px;
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 22px;
        border-radius: 100px;
    }
    .NoteButton:hover{
        transition: 0.3s;
        width: 120px;
        background-color: #7FFFD4;
        
    }

}
/*End of Mobile CSS*/


  </style>
@stop

@section('content')
<div class="container" style=" padding-top: 0px;">
  @if(Auth::check())
    @if((Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
      <!-- PC Section -->
      <div class="PCsection">
        <div class="returnSection">
            <form action=" {{ asset('/admin')}}" method="get" }}">
                <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回</button>
            </form>
        </div>  
        <div class="TopTitle">
          編輯條例
        </div>
        <table class="chooseSectionTable" style="table-layout: fixed; width: 100%;">
          <tr>
            <th style="text-align: center;">
              <button class="chooseSectionButton" id="ChoosepersonInfo" type="button" onclick="showpersonInfo()">個資條款</button>
            </th>
            <th style="text-align: center;">
              <button class="chooseSectionButton" id="ChooseNote" type="button" onclick="showNote()">借用條款</button>
            </th>
          </tr>
        </table>
        <br><br>
        <!-- personInfo Section -->
        <div class="personInfoSection" id="personInfoSection">
          <form action="{{ asset('/admin/rules/updatepersonInfo')}}" method="post">{{ csrf_field()}}
            <textarea class="personInfoArea" name="personInfo"><?php echo $rules[0]->personinfo ?></textarea><br>
            <button class="personInfoButton" type="submit">修改</button>
          </form>
        </div> 
        <!-- End of personInfo Section -->

        <!-- Note Section -->
        <div class="NoteSection" id="NoteSection" style="display: none;">
          <form action="{{ asset('/admin/rules/updatenote')}}" method="post">{{ csrf_field()}}
            <textarea class="noteArea" name="note"><?php echo $rules[0]->note ?></textarea><br>
            <button class="NoteButton" type="submit">修改</button>
          </form>
        </div> 
        <!-- End of Note Section -->
      </div>
      <!-- End of PC Section -->
      


      <!-- Mobile Section -->
      <div class="Mobilesection">  
        <div class="returnSection">
            <form action=" {{ asset('/admin')}}" method="get" }}">
                <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回</button>
            </form>
        </div>  
        <div class="TopTitle">
          編輯條例
        </div>
        <table class="chooseSectionTable" style="table-layout: fixed; width: 100%;">
          <tr>
            <th style="text-align: center;">
              <button class="chooseSectionButton" id="ChoosepersonInfo" type="button" onclick="showpersonInfo()">個資條款</button>
            </th>
            <th style="text-align: center;">
              <button class="chooseSectionButton" id="ChooseNote" type="button" onclick="showNote()">借用條款</button>
            </th>
          </tr>
        </table>
        <br><br>
        <!-- personInfo Section -->
        <div class="personInfoSection" id="personInfoSection">
          <form action="{{ asset('/admin/rules/updatepersonInfo')}}" method="post">{{ csrf_field()}}
            <textarea class="personInfoArea" name="personInfo"><?php echo $rules[0]->personinfo ?>              
            </textarea><br>
            <button class="personInfoButton" type="submit">修改</button>
          </form>
        </div> 
        <!-- End of personInfo Section -->

        <!-- Note Section -->
        <div class="NoteSection" id="NoteSection" style="display: none;">
          <form action="{{ asset('/admin/rules/updatenote')}}" method="post">{{ csrf_field()}}
            <textarea class="noteArea" name="note"><?php echo $rules[0]->note ?></textarea><br>
            <button class="NoteButton" type="submit">修改</button>
          </form>
        </div> 
        <!-- End of Note Section -->
      </div>  


    @endif <!-- Auth::user()->level -->
    @unless((Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
    <div class="content">
        <label class="notice">只限管理員使用，請先登入!!!</label>
    </div>
    @endunless
  @endif<!-- Auth::check() -->
  @unless(Auth::check())
    <div class="content">
        <label class="notice">只限管理員使用，請先登入!!!</label>
    </div>
  @endunless
</div>
<!-- End of Container -->


@endsection

@section('js')
<script type="text/javascript">
  function showpersonInfo()
  {
  document.getElementById('personInfoSection').style.display="inline";
  document.getElementById('NoteSection').style.display="none";
  }
  function showNote()
  {
  document.getElementById('personInfoSection').style.display="none";
  document.getElementById('NoteSection').style.display="inline";
  }
</script>

@stop