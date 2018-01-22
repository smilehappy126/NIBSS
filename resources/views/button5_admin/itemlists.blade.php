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
        font-weight: bolder;
    }
    .notice{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 100px;
        color: #FF3333;
    }
    .EditButton{
        font-family: Microsoft JhengHei;
        text-align: center;
        font-size: 17px;
        border-width: 1px;
        border-radius: 40px;
        width: 70px;
        background-color: #D8BFD8;
        transition: 0.3s;
    }
    .EditButton:hover{
        width: 100px;
        background-color: antiquewhite;
        transition: 0.3s;
    }
    #ModalEditButton{
        background-color: #00FA9A;
        width: 20%;
    }
    #ModalEditButton:hover{
        background-color: #20B2AA;
    }
    #ModalDeleteButton{
        background-color: #FF0000;
        color: white;
    }
    #ModalDeleteButton:hover{
        background-color: #AA0000;
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
        width: 30%;
        font-size: 20px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .returnButton:hover{
        width: 33%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
    .TopTitle{
        background-color: transparent;
        font-family: DFKai-sb;
        font-size: 65px;
        text-align: center;
        font-weight: bolder;
    }
    .notice{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 100px;
        color: #FF3333;
    }
    .EditButton{
        font-family: Microsoft JhengHei;
        text-align: center;
        font-size: 17px;
        border-width: 1px;
        border-radius: 40px;
        width: 70px;
        background-color: #D8BFD8;
        transition: 0.3s;
    }
    .EditButton:hover{
        width: 100px;
        background-color: antiquewhite;
        transition: 0.3s;
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
    #ModalEditButton{
        background-color: #00FA9A;
    }
    #ModalEditButton:hover{
        background-color: #20B2AA;
    }

}
/*End of Mobile CSS*/


  </style>
@stop

@section('content')
<div class="container" style="width: 90%;">
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
                            <th>
                                <button id="groupSortButton" type="button" onclick="sortTable(0)" style="border-radius: 100px; border: none; background-color: transparent;">物品類別</button>
                            </th>
                            <th>
                                <button id="nameSortButton" type="button" onclick="sortTable(1)" style="border-radius: 100px; border: none; background-color: transparent;">物品名稱</button>
                            </th>
                            <th>
                                <button id="numSortButton" type="button" onclick="sortTable(2)" style="border-radius: 100px; border: none; background-color: transparent;">物品數量</button>
                            </th>
                            <th>
                                <button id="userSortButton" type="button" onclick="sortTable(0)" style="border-radius: 100px; border: none; background-color: transparent;">負責人</button>
                            </th>
                            <th>更新日期</th>
                            <th>編輯</th>
                        </tr>
                    </table>
                    <table class="table" id="itemcontent" style="border: 0px; height: 100%; table-layout: fixed; text-align: center;">
                        @foreach($items as $item)
                        <tr class="TableContent">
                            <th>{{$item->itemgroup}}</th>
                            <th>{{$item->itemname}}</th>
                            <th>{{$item->itemnum}}</th>
                            <th>{{$item->creator}}</th>
                            <th>{{$item->updated_at}}</th>
                            <th>
                                <button class="EditButton" type="button" data-toggle="modal" data-target="#EditModal{{$item->id}}"><span class="glyphicon glyphicon-wrench"></span>編輯</button>
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
        <div>
            @foreach($items as $item)
                <table class="table-bordered" id="MobileTable" style="text-align: center; table-layout: fixed; width: 100%; background-color: #FDF5E6; font-size: 20px; ">
                    <tr>
                        <th>物品類別</th>
                        <td>{{$item->itemgroup}}</td>
                    </tr>
                    <tr>
                        <th>物品名稱</th>
                        <td>{{$item->itemname}}</td>
                    </tr>
                    <tr>
                        <th>物品數量</th>
                        <td>{{$item->itemnum}}</td>
                    </tr>
                    <tr>
                        <th>負責人</th>
                        <td>{{$item->creator}}</td>
                    </tr>
                    <tr>
                        <th>更新日期</th>
                        <td style="font-size: 15px;">{{$item->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>編輯</th>
                        <td>
                            <button class="EditButton" type="button" data-toggle="modal" data-target="#EditModal{{$item->id}}"><span class="glyphicon glyphicon-wrench"></span>編輯</button>
                        </td>
                    </tr>
                </table>
                <br>
            @endforeach
        </div>
      </div>  
      <!-- End of Mobile Section -->

      <!-- Modal Section -->
    @foreach($items as $item)
        <!-- Edit Modal -->
        <div id="EditModal{{$item->id}}" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" >
            <div class="modal-dialog">
                <div id="EditSection{{$item->id}}">
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
                                                        <input  class="form-control" type="string" name="creator" value="{{ $item->creator }}">
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
                              <button type="submit" class="btn btn-default" id="ModalEditButton" style="font-size: 20px; font-weight: bold;">Edit</button>
                              </form>
                              <button type="button" class="btn btn-default" id="ModalDeleteButton" style="font-size: 20px; font-weight: bold;" data-toggle="modal" data-target="#DeleteModal{{$item->id}}">Delete</button>
                              <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                              </div>
                        </div> 
                        <!-- End of Modal Footer -->
                    </div> 
                    <!-- End of Edit Modal Content -->
                </div>
                <!-- End of EditSection -->
            </div>
        </div>
<!-- End of Edit Modal -->

 <!-- Delete Modal -->
        <div id="DeleteModal{{$item->id}}" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
    <!-- Delete Modal content-->
                <!-- Delete Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="DeletePage">
                                <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei; font-weight: bolder;">刪除物品</h4>
                            </div>
                        </div> <!-- End of Modal Header -->
                         
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form class="form-horizontal" method="post" action="{{ asset('/admin/itemlists/delete/'.$item->id)}}">
                                     {{ csrf_field() }}
                                    <div class="DeletePage">
                                        <div class="DeleteInfo">
                                            <!-- Delete Modal Table -->
                                            <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px; font-size: 20px;">
                                                <tr>
                                                    <th>物品類別 :</th>
                                                    <th>
                                                        <input class="form-control" name="itemgroup" value="{{ $item->itemgroup}}" disabled>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>物品名稱 :</th> 
                                                    <th>
                                                        <input  class="form-control" type="string" name="itemname" value="{{ $item->itemname }}" disabled>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>物品數量 :</th> 
                                                    <th>
                                                        <input  class="form-control" type="number" name="itemnum" value="{{ $item->itemnum }}" disabled>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>負責人 :</th>
                                                    <th> 
                                                        <input  class="form-control" type="string" name="creator" value="{{ $item->creator }}" disabled>
                                                    </th>
                                                </tr>
                                            </table>
                                            <!-- End of Delete Modal Table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End of Modal Body -->
                        <div class="modal-footer">
                              <div class="form-group" style="text-align: center;">
                                <button type="submit" class="btn btn-default" id="ModalDeleteButton" style="font-size: 20px; font-weight: bold;">Delete</button></form>
                                <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" onclick="showModalEditSection({{$item->id}})">Back</button>
                              </div>
                        </div> 
                        <!-- End of Modal Footer -->
                    </div> 
                    <!-- End of Delete Modal Content -->
            </div>
        </div>        
        <!-- End of Delete Modal -->

<!-- ↑↑↑ End of Modal Section ↑↑↑ -->
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
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("itemcontent");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 0; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TH")[n];
      y = rows[i + 1].getElementsByTagName("TH")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

function showModalEditSection(id){
    var toshowSection = "EditSection"+id;
    document.getElementById('EditSection').style.display="inline";
    document.getElementById('DeleteSection').style.display="none";
}
function showModalDeleteSection(id){
    var toshowSection = 'DeleteSeciton'+id;
    var tohideSection = 'EditSection'+id;
    document.getElementById(toshowSection).style.display="inline";
    document.getElementById(tohideSection).style.display="none";
}
</script>

@stop