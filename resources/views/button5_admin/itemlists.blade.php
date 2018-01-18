@extends('layouts.layout')
@section('title', '目前清單')
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
    .FormButton{
        border: 0px;
        border-radius: 8px;
        background-color: #87CEFA;
        left: 0px;
        right: 0px;
        width: 100%;
        height: 100%;
        bottom: :0;
        float: left;
        font-family: Microsoft JhengHei;
        font-size: 80px;
    }
    .FormButton:hover{
        background-color:  #6495ED;
    }
    .TableHead{
        font-size: 25px;
    }
    .TableHead>th{
        text-align: center;
    }
    .TableContent>th{
        text-align: center;
        font-weight: bolder;
        font-size: 20px;
    }
    .TableContent:hover{
        background-color: #77FFEE;
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
    .FormButton{
        border: 0px;
        border-radius: 8px;
        background-color: pink;
        left: 0px;
        right: 0px;
        width: 100%;
        height: 100%;
        bottom: :0;
        float: left;
        font-family: Microsoft JhengHei;
        font-size: 40px;
    }
    .FormButton:hover{
        background-color: #FF8888;
    }

}
/*End of Mobile CSS*/


  </style>
@stop

@section('content')
<div class="container" style="width: 80%;">
  @if(Auth::check())
    @if((Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
      <!-- PC Section -->
      <div class="PCsection">
        <div class="returnSection">
            <form action=" {{ asset('/admin/item')}}" method="get" }}">
                <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回</button>
            </form>
        </div>  
        <div class="TopTitle">
          目前清單
        </div>
        @if(Auth::check())
            @if(Auth::user()->level === '管理員')
                <div class="content" style="position: relative;">
                    <table class="table" style="border: 0px; height: 100%; table-layout: fixed; text-align: center;">
                        <tr class="TableHead">
                            <th>物品類別</th>
                            <th>物品名稱</th>
                            <th>物品數量</th>
                            <th>負責人</th>
                            <th>更新日期</th>
                            <th>編輯</th>
                        </tr>
                        @foreach($items as $item)
                        <tr class="TableContent">
                            <th>{{$item->itemgroup}}</th>
                            <th>{{$item->itemname}}</th>
                            <th>{{$item->itemnum}}</th>
                            <th>{{$item->createuser}}</th>
                            <th>{{$item->updated_at}}</th>
                            <th>
                                <a href="#" class="btn btn-sm btn-primary" id="edit-message-{{ $item->id }}" data-toggle="modal" data-target="#EditModal{{$item->id}}">
                                    <span class="glyphicon glyphicon-pencil"></span> 編輯
                                </a>
                            </th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        @endif
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
          目前清單
        </div>
        
      </div>  
      <!-- End of Mobile Section -->

      <!-- Modal Section -->
    @foreach($items as $item)
        <!-- Edit Modal -->
        <div id="EditModal{{$item->id}}" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" >
            <div class="modal-dialog">

                    <!-- Edit Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="EditPage">
                                <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei; font-weight: bolder;">編輯物品資訊</h4>
                            </div>
                        </div> <!-- End of Modal Header -->
                         
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form class="form-horizontal" method="post" action="{{ asset('/admin/itemlists/update/'.$item->id)}}">
                                     {{ csrf_field() }}
                                    <div class="EditPage">
                                        <div class="EditInfo">
                                            <!-- Edit Modal Table -->
                                            <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px; font-size: 20px;">
                                                <tr>
                                                    <th>物品類別 :</th>
                                                    <th>
                                                        <input class="form-control" name="itemgroup" value="{{ $item->itemgroup}}">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>物品名稱 :</th> 
                                                    <th>
                                                        <input  class="form-control" type="string" name="itemname" value="{{ $item->itemname }}">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>物品數量 :</th> 
                                                    <th>
                                                        <input  class="form-control" type="number" name="itemnum" value="{{ $item->itemnum }}">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>負責人 :</th>
                                                    <th> 
                                                        <input  class="form-control" type="string" name="createuser" value="{{ $item->createuser }}">
                                                    </th>
                                                </tr>
                                            </table>
                                            <!-- End of Edit Modal Table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End of Modal Body -->
                        <div class="modal-footer">
                              <div class="form-group">
                              <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">Edit</button>
                              <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                              </div>
                        </div> 
                        <!-- End of Modal Footer -->
                                    </form>
                    </div> 
                    <!-- End of Edit Modal Content -->
            </div>
        </div>
<!-- End of Edit Modal -->
    @endforeach
    










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

@stop