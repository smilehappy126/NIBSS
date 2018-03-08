@extends('layouts.layout')
@section('title', '違規紀錄')
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
        width: 20%;
        font-size: 20px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .returnButton:hover{
        width: 25%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
    .searchButton{
        border-radius: 40px;
        font-weight: bolder;
        font-family: Microsoft JhengHei;
        width: 20%;
        font-size: 20px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .searchButton:hover{
        width: 25%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
    .TopTitle{
        background-color: transparent;
        font-family: Microsoft JhengHei;
        font-size: 80px;
        text-align: center;
    }
    .TableTop{
        font-family:  Microsoft JhengHei;
        font-size: 20px;
        text-align: center;
        word-break: break-word;
    }
    .TableContent{
        font-family:  Microsoft JhengHei;
        font-size: 15px;
        text-align: center;
        font-weight: bold;
    }
    .EditButton{
        border-width: 0px;
        border-radius: 7px;
        font-size: 13px;
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        height: 30px;
        width: 70%;
        background-color: #D8BFD8;
    }
    .EditButton:hover{
        transition: 0.3s;
        background-color: antiquewhite;
    }
    .searchUser{
        background-color: transparent;
        font-family:  Microsoft JhengHei;
        text-align:right;
        font-weight: bold;
    }
    .resetButton{
        width:100px ;
        height:40px;
        font-family: Microsoft JhengHei;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        border-width: 1px;
        border-radius: 20px;
        background-color: transparent;
        transition: 0.3s;
    }
    .resetButton:hover{
        background-color: #DDDDDD;
        transition: 0.3s;
        width:150px;
    }
    .notice{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 100px;
        color: #FF3333;
    }
}
/*End of PC CSS*/

/*Mobile CSS*/
@media screen and (max-width: 900px) and (min-width: 300px){
    .PCsection{
        display: none;
    }


    .TopTitle{
        background-color: transparent;
        font-family: Microsoft JhengHei;
        font-size: 65px;
        text-align: center;
    }
    .returnButton{
        border-radius: 40px;
        font-weight: bolder;
        font-family: Microsoft JhengHei;
        width: 60%;
        font-size: 20px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .returnButton:hover{
        width: 75%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
    .TableTitle{
        font-weight: bolder;
        font-size: 20px;
    }
    .EditButton{
        border-width: 0px;
        border-radius: 7px;
        font-size: 13px;
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        height: 30px;
        width: 80%;
        background-color: #D8BFD8;
    }
    .EditButton:hover{
        transition: 0.3s;
        background-color: antiquewhite;
    }
    .resetButton{
        width:100px ;
        height:40px;
        font-family: Microsoft JhengHei;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        border-width: 1px;
        border-radius: 20px;
        background-color: transparent;
        transition: 0.3s;
    }
    .resetButton:hover{
        background-color: #DDDDDD;
        transition: 0.3s;
        width:150px;
    }
    .searchButton{
        border-radius: 40px;
        font-weight: bolder;
        font-family: Microsoft JhengHei;
        width: 60%;
        font-size: 20px;
        transition: 0.3s;
        background-color: transparent;
        border-width: 1px;  
    }
    .searchButton:hover{
        width: 75%;
        transition: 0.3s;
        background-color: #DDDDDD;
    }
    .notice{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 45px;
        color: #FF3333;
    }
}
/*End of Mobile CSS*/


  </style>
@stop

@section('content')
<div class="container" style=" width: 90%; padding-top: 0px;">
  @if(Auth::check())
    @if((Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
    <!-- PC section -->
    <div class="PCsection">  
      <div class="TopTitle">
        違規紀錄
      </div>
      <table style="table-layout: fixed; width: 100%;">
          <tr>
            <th style="text-align: left;">
                <div class="returnSection">
                   <form action=" {{ asset('/admin')}}" method="get" }}">
                      <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回</button>
                   </form>
                </div>
            </th>
            <th style="text-align: right;">
                <div class="searchReason">
                    <button class="searchButton" id="searchButton" type="button" data-toggle="modal" data-target="#SearchModal">搜尋<span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
            </th>
          </tr>
      </table>
      <div class="TableTop">
          <!-- 表單表頭 -->
          <table class="table" id="TableTitle" style="table-layout: fixed;">
              <tr>    
                  <th style="text-align: center;">
                      <button id="nameSortButton" type="button" onclick="sortTable(0)" style="border-radius: 100px; border: none; background-color: transparent;">違規者</button>
                  </th>
                  <th style="text-align: center;">
                      <button id="phoneSortButton" type="button" onclick="sortTable(1)" style="border-radius: 100px; border: none; background-color: transparent;">電話</button>
                  </th>
                  <th style="text-align: center;">
                      <button id="emailSortButton" type="button" onclick="sortTable(2)" style="border-radius: 100px; border: none; background-color: transparent;">信箱</button>
                  </th>
                  <th style="text-align: center;">
                      <button id="reasonSortButton" type="button" onclick="sortTable(3)" style="border-radius: 100px; border: none; background-color: transparent;">違規原因</button>
                  </th>
                  <th style="text-align: center;">
                      <button id="violationtimeSortButton" type="button" onclick="sortTable(4)" style="border-radius: 100px; border: none; background-color: transparent;">違規時間</button>
                  </th>
                  <th style="text-align: center;">
                      <button id="deletereasonSortButton" type="button" onclick="sortTable(5)" style="border-radius: 100px; border: none; background-color: transparent;">撤銷原因</button>
                  </th>
                  <th style="text-align: center;">
                      <button id="offsettimeSortButton" type="button" onclick="sortTable(6)" style="border-radius: 100px; border: none; background-color: transparent;">撤銷時間</button>
                  </th>
                  <th style="text-align: center;">
                      <button id="userviolationSortButton" type="button" onclick="sortTable(7)" style="border-radius: 100px; border: none; background-color: transparent;">違規點數</button>
                  </th>
                  <th style="text-align: center;">
                      <button id="creatorSortButton" type="button" onclick="sortTable(8)" style="border-radius: 100px; border: none; background-color: transparent;">負責人</button>
                  </th>
                  @if ((Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
                  <th style="text-align: center;">
                      <button id="editSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">修改資料</button>
                  </th>
                  @endif
              </tr>
          </table>
      </div>
      <div class="TableContent">
          <!-- 表單內容 -->
          <table class="table" id="content" style="table-layout: fixed;"">
              @foreach($reasons as $reason)
              <tr>
                  <th style="text-align: center;">{{ $reason->user }}</th>
                  <th style="text-align: center;">{{ $reason->phone }}</th>
                  <th style="text-align: center;">{{ $reason->email }}</th>
                  <th style="text-align: center;">{{ $reason->reason}}</th>
                  <th style="text-align: center;">{{ $reason->violationtime }}</th>
                  <th style="text-align: center;">{{ $reason->deletereason}}</th>
                  <th style="text-align: center;">{{ $reason->offsettime }}</th>
                  <th style="text-align: center;">{{$reason->violation}}</th>
                  <th style="text-align: center;">{{ $reason->creator }}</th>
                  @if ((Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
                  <th style="text-align: center;">
                      <button class="EditButton" type="button" data-toggle="modal" data-target="#EditModal{{$reason->id}}"><span class="glyphicon glyphicon-wrench"></span> 修改</button>
                  </th>
                  @endif
              </tr>
              @endforeach
          </table>
          {{ $reasons->links() }}
      </div>
    </div>
    <!-- End of PC Section -->

    <!-- Mobile Section -->
    <div class="Mobilesection">
      <div class="TopTitle">
        違規紀錄
      </div>
      <table style="table-layout: fixed; width: 100%;">
          <tr>
            <th style="text-align: left;">
              <div class="returnSection">
                 <form action=" {{ asset('/admin')}}" method="get" }}">
                    <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回</button>
                 </form>
              </div>
            </th>
            <th style="text-align: right;">
              <div class="searchReason">
                 <button class="searchButton" id="searchButton" type="button" data-toggle="modal" data-target="#SearchModal">搜尋<span class="glyphicon glyphicon-chevron-right"></span></button>
              </div>
            </th>
          </tr>
      </table>
      <br>
      <div class="TableTop">
          <!-- 表單表頭 -->
          @foreach($reasons as $reason)
          <table class="table-bordered" style="table-layout: fixed; width: 100%; background-color:  #FFF8DC;">
              <tr>    
                  <th style="text-align: center;" class="TableTitle">
                      <button id="nameSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">違規者</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                      {{ $reason->user }}
                  </th>
              </tr>
              <tr>
                  <th style="text-align: center;" class="TableTitle">
                      <button id="phoneSortButton" type="button" onclick="sortTable(0)" style="border-radius: 100px; border: none; background-color: transparent;">電話</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                    {{ $reason->phone }}
                  </th>
              </tr>
              <tr>
                  <th style="text-align: center;" class="TableTitle">
                      <button id="emailSortButton" type="button" onclick="sortTable(0)" style="border-radius: 100px; border: none; background-color: transparent;">信箱</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                    {{ $reason->email }}
                  </th>
              </tr>
              <tr>
                  <th style="text-align: center;" class="TableTitle">
                      <button id="reasonSortButton" type="button" onclick="sortTable(1)" style="border-radius: 100px; border: none; background-color: transparent;">違規原因</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                    {{ $reason->reason }}
                  </th>
              </tr>
              <tr>
                  <th style="text-align: center;" class="TableTitle">
                      <button id="reasonSortButton" type="button" onclick="sortTable(1)" style="border-radius: 100px; border: none; background-color: transparent;">違規時間</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                    {{ $reason->violationtime }}
                  </th>
              </tr>
              <tr>
                  <th style="text-align: center;" class="TableTitle">
                      <button id="deletereasonSortButton" type="button" onclick="sortTable(2)" style="border-radius: 100px; border: none; background-color: transparent;">撤銷原因</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                    {{ $reason->deletereason }}
                  </th>
              </tr>
              <tr>
                  <th style="text-align: center;" class="TableTitle">
                      <button id="deletereasonSortButton" type="button" onclick="sortTable(2)" style="border-radius: 100px; border: none; background-color: transparent;">撤銷時間</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                    {{ $reason->offsettime }}
                  </th>
              </tr>
              <tr>
                  <th style="text-align: center;" class="TableTitle">
                      <button id="userviolationSortButton" type="button" onclick="sortTable(3)" style="border-radius: 100px; border: none; background-color: transparent;">違規點數</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                      {{$reason->violation}}
                  </th>
              </tr>
              <tr>
                  <th style="text-align: center;" class="TableTitle">
                      <button id="creatorSortButton" type="button" onclick="sortTable(4)" style="border-radius: 100px; border: none; background-color: transparent;">負責人</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                    {{ $reason->creator }}
                  </th>
              </tr>
              @if((Auth::user()->level)==='管理員')
              <tr>
                  <th style="text-align: center;" class="TableTitle">
                      <button id="editSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">修改資料</button>
                  </th>
                  <th style="text-align: center;" class="TableContent">
                      <button class="EditButton" type="button" data-toggle="modal" data-target="#EditModal{{$reason->id}}"><span class="glyphicon glyphicon-wrench"></span> 修改</button>
                  </th>
              </tr>
              @endif
          </table>
          <br>
          @endforeach
          {{ $reasons->links() }}
      </div>
    </div>

    <!-- End of Mobile Section -->

    


    <!-- Modal Section -->
    
    <!-- Edit Modal -->
    @foreach($reasons as $reason)
      <div id="EditModal{{$reason->id}}" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" >
            <div class="modal-dialog">

                    <!-- Edit Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="EditPage">
                                <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">修改 Edit</h4>
                            </div>
                        </div> <!-- End of Modal Header -->
                         
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form class="form-horizontal" method="post" action="{{ asset('/admin/reasons/update/'.$reason->id)}}">
                                     {{ csrf_field() }}
                                    <div class="EditPage">
                                        <div class="EditInfo">
                                            <!-- Edit Modal Table -->
                                            <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
                                                <tr><th>違規者 : </th><th><input  class="form-control" type="phone" name="phone" disabled value="{{ $reason->user }}"> </th></tr>
                                                <tr><th>電話 :</th> <th><input  class="form-control" type="phone" name="phone" value="{{ $reason->phone }}"></th></tr>
                                                <tr><th>違規原因 :</th> <th><input  class="form-control" type="text" name="reason" value="{{ $reason->reason }}"></th></tr>
                                                <tr><th>撤銷原因 :</th> <th><input  class="form-control" type="text" name="deletereason" value="{{ $reason->deletereason }}"></th></tr>
                                                <tr><th>違規點數 :</th> <th><input  class="form-control" type="number" min="0" name="violation" value="{{$reason->violation}}"></th></tr>
                                                <tr><th>負責人 :</th><th> <input  class="form-control" type="text" name="creator" value="{{ $reason->creator }}" disabled></th></tr>
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
    @endforeach
    <!-- End of Edit Modal -->

  <div style="text-align: center;">
    <form action="{{ asset('/admin/reasons') }}" method="get">
      <button class="resetButton" id="testbtn">重新整理</button>
    </form>
  </div>

  <!-- ↓↓↓ Modal Section ↓↓↓ -->
    <!-- Search Modal -->
        <div id="SearchModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" style="opacity: 0.9;">
            <div class="modal-dialog">
    <!-- Search Modal content-->
                <div class="modal-content">
                    <!-- Begin of Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div id="SearchPage">
                            <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">搜尋 Search</h4>
                        </div>
                    </div>
                    <!-- End of Modal Header -->

                    <!-- Begin of Modal Body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <form action="{{ asset ('/admin/searchReason')}}" method="post" style="width: 100%;">{{ csrf_field()}}
                                    <label style="font-family: Microsoft JhengHei; height: 50px;font-size: 30px;">搜尋:&nbsp;</label>
                                    <input  class="searchcontent" name="searchname" id="searchname" type="text"  placeholder="請輸入..."  value="" style="width: 70%;" autofocus>
                            </div>    
                        </div>
                    </div>
                    <!--  End of Modal Body -->

                    <!-- Begin of Modal Footer -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">Search</button>
                            <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- End of Modal Footer -->
                              </form>
                </div>
  <!-- End of Search Modal Conent -->
            </div>
        </div>        
        <!-- End of Search Modal -->
<!-- ↑↑↑ End of Modal Section ↑↑↑ -->
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
//表單排序  
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("content");
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

</script>

@stop