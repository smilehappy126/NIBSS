@extends('layouts.layout')
@section('title', '可借用物品')
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
            <form action=" {{ asset('/admin')}}" method="get" }}">
                <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回</button>
            </form>
        </div>  
        <div class="TopTitle">
          可借用物品
        </div>
            <div class="content" style="position: relative;">
                <table class="table" style="border: 0px; height: 100%; table-layout: fixed; text-align: center;">
                    <tr>
                        <th>
                            <button class="FormButton" type="button" data-toggle="modal" data-target="#CreateItemModal">新增物品</button>
                        </th>
                        <th>
                            <form action=" {{asset('/admin/itemlists')}} " method="get" >{{ csrf_field() }}
                                <button class="FormButton" type="submit">目前清單</button>
                            </form>
                        </th>
                    </tr>
                </table>
            </div>
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
          可借用物品
        </div>
        
      </div>  
      <!-- End of Mobile Section -->

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

<!-- ↓↓↓ Modal Section ↓↓↓ -->
    <!-- CreateItem Modal -->
        <div id="CreateItemModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" style="opacity: 0.9;">
            <div class="modal-dialog">

                    <!-- CreateItem Modal content-->
                    <div class="modal-content">
                        <!-- Begin of Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="CreateItemPage">
                               <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">新增物品 Create Items</h4>
                            </div>
                        </div>
                        <!-- End of Modal Header -->

                        <!-- Begin of Modal Body -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form class="form-horizontal" method="post" action="{{asset('/admin/createitem')}}">
                                     {{ csrf_field() }}
                                    <div class="EditPage">
                                        <div class="EditInfo">
                                            <!-- Edit Modal Table -->
                                            <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
                                                <tr><th>物品類別 : </th><th><input class="form-control" type="text" name="itemgroup" style="text-align: center; width: 100%;" required></th></tr>
                                                <tr><th>物品名稱 :</th> <th><input  class="form-control" type="text" name="itemname" style="text-align: center;" required ></th></tr>
                                                <tr><th>物品數量 :</th> <th><input  class="form-control" type="number" name="itemnum" style="text-align: center;" value="1" required></th></tr>
                                            </table>
                                            <!-- End of Edit Modal Table -->
                                            <input class="form-control" type="text" name="createuser" value="{{Auth::user()->name}}" style="display:none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End of Modal Body -->

                        <!-- Begin of Modal Footer -->
                        <div class="modal-footer">
                              <div class="form-group">
                                    <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">Create</button>
                                    <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                              </div>
                        </div>
                        <!-- End of Modal Footer -->
                                </form>
                    </div>
                    <!-- End of CreateItem Modal Conent -->
            </div>
        </div>        
        <!-- End of CreateItem Modal -->
<!-- ↑↑↑ End of Modal Section ↑↑↑ -->


@endsection

@section('js')

@stop