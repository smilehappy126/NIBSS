@extends('layouts.layout')
@section('title', '查詢結果')
@section('css')
  <style>
/*PC CSS Section*/
@media screen and (min-width: 900px){
    .Mobilesection{
        display: none;
    }

    .returnButton{
      width: 27%;
      font-family: Microsoft JhengHei;
      font-size: 20px;
      transition: 0.3s;
      background-color: transparent;
      border-width: 1px;
      border-radius: 40px;
    }
    .returnButton:hover{
      width: 32%;
      transition: 0.3s;
      background-color: #DDDDDD;
    }
    .searchButton{
      width: 40%;
      font-family: Microsoft JhengHei;
      font-size: 20px;
      transition: 0.3s;
      background-color: transparent;
      border-width: 1px;
      border-radius: 40px;
    }
    .searchButton:hover{
      width: 45%;
      transition: 0.3s;
      background-color: #DDDDDD;
    }
    .TopTitle{
      background-color: transparent;
      font-family: Microsoft JhengHei;
      font-size: 80px;
      text-align: center;
    }
    .NavSection{
      background-color: transparent;
      font-family: Microsoft JhengHei;
      font-size: 80px;
      text-align: center;
    }
    .search{
      background-color: transparent;
      font-family:  Microsoft JhengHei;
      text-align:right;
      font-weight: bold;
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
      color: #F5F5F5;
      height: 30px;
      width: 100%;
    }
    .EditButton:hover{
      transition: 0.3s;
    }
    .EditPage{
      font-family: Microsoft JhengHei;
      font-size: 20px;
      font-weight: bold;
    }
    .modal-title{
      font-size: 30px;
      font-weight: bold;
    }
    .sortButton{
      border-radius: 40px;
      font-weight: bolder;
      font-family: Microsoft JhengHei;
      width: 9%;
      font-size: 20px;
      transition: 0.3s;
      background-color: transparent;
      border-width: 1px;  
    }
    .contentdata:hover{
      background-color: #CCBBFF;
    }
    .sortButton:hover{
      background-color: #DDDDDD;
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
    .UserModalButton{
      background-color: #4169E1;
      border-width: 0px;
      border-radius: 7px;
      font-size: 14px;
      font-family: Microsoft JhengHei;
      font-weight: bolder;
      color: #F5F5F5;
      height: 30px;
      width: 100%;
      transition: 0.3s;
    }
    .UserModalButton:hover{
      background-color: #483D8B;
      transition: 0.3s;
    }
}
/*End of PC CSS Section*/

/*Mobile CSS Section*/
@media screen and (max-width: 900px) and (min-width: 300px){
    .PCsection{
      display: none;
    }

    .TopTitle{
      background-color: transparent;
      font-family: Microsoft JhengHei;
      font-size: 80px;
      text-align: center;
    }
    .EditButton{
      border-width: 0px;
      border-radius: 7px;
      font-size: 13px;
      font-family: Microsoft JhengHei;
      font-weight: bolder;
      color: #F5F5F5;
      height: 30px;
      width: 80%;
    }
    .EditButton:hover{
      transition: 0.3s;
    }
    .returnButton{
      width: 60%;
      font-family: Microsoft JhengHei;
      font-size: 15px;
      transition: 0.3s;
      background-color: transparent;
      border-width: 1px;
      border-radius: 40px;
    }
    .returnButton:hover{
      width: 70%;
      transition: 0.3s;
      background-color: #DDDDDD;
    }
    .searchButton{
      width: 78%;
      font-family: Microsoft JhengHei;
      font-size: 15px;
      transition: 0.3s;
      background-color: transparent;
      border-width: 1px;
      border-radius: 40px;
    }
    .searchButton:hover{
      width: 85%;
      transition: 0.3s;
      background-color: #DDDDDD;
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
    .UserModalButton{
      background-color: #4169E1;
      border-width: 0px;
      border-radius: 7px;
      font-size: 15px;
      font-family: Microsoft JhengHei;
      font-weight: bolder;
      color: #F5F5F5;
      height: 30px;
      width: 55%;
      transition: 0.3s;
    }
    .UserModalButton:hover{
      background-color: #483D8B;
      transition: 0.3s;
    }
    .note7button{
      width: 70%;
      transition: 0.3s;
      border-width: 0px;
      border-radius: 20px;
      background-color:   #9999FF;
    }
}
/*End of Mobile CSS Section*/    

    </style>
  
@stop

@section('content')
<div class="container" style=" padding-top: 0px; width: 100%;">
    <div class="TopTitle">
      查詢結果<br>
    </div>
    <!-- PC Section -->
    <div class="PCsection">
      <div class="NavSection">
            <table style="text-align: center; table-layout: fixed; width: 100%; ">
                <tr>
                  <th>
                    <form action=" {{ asset('/admin')}}" method="get" }}" style="width: 100%;">
                    <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回</button>
                    </form>
                  </th>
                  <th style="text-align: center;">
                    <label style="font-size: 30px; font-family: Microsoft JhengHei;">以「{{ $content }}」搜尋</label>
                  </th>
                  <th style="text-align: right;">
                    <!-- 再次搜尋 -->
                      <button class="searchButton" id="searchButton" type="button" data-toggle="modal" data-target="#SearchModal">再次搜尋<span class="glyphicon glyphicon-chevron-right"></span></button>
                    </form>
                  </th>
                </tr>
            </table>
      </div>
      <label class="PCsection" style="font-family: Microsoft JhengHei;">※代表有備註</label>
      
      <!-- Table Head -->
      <div class="TableTop">
        <table class="table" id="TitleTable" style="text-align: center; table-layout: fixed;">
          <tr>
            <!-- 備註提示欄 -->
            <th style="width: 1px;"></th>
            <!-- 序號 -->
              <th style="text-align: center;">
                <button id="idSortButton" type="button" onclick="sortTable(1)" style="border-radius: 100px; border: none; background-color: transparent;">借用序號</button>
              </th>  
            <!-- 日期 -->
              <th style="text-align: center;">
                <button id="dateSortButton" type="button" onclick="sortTable(2)" style="border-radius: 100px; border: none; background-color: transparent;">更新日期</button>
              </th>
            <!-- 班級 -->
              <th style="text-align: center;">
                <button id="classSortButton" type="button" onclick="sortTable(3)" style="border-radius: 100px; border: none; background-color: transparent;">班級</button>
              </th>
            <!-- 申請人 -->
              <th style="text-align: center;">
                <button id="nameSortButton" type="button" onclick="sortTable(4)" style="border-radius: 100px; border: none; background-color: transparent;">申請人</button>
              </th>
            @if (Route::has('login'))
              @if (Auth::check())
            <!-- 電話 -->
              <th style="text-align: center; width: 10%;">
                <button id="phoneSortButton" type="button" onclick="sortTable(5)" style="border-radius: 100px; border: none; background-color: transparent;">電話</button>
              </th>
                @endif
              @endif
            <!-- 借用物品-->
              <th style="text-align: center;">
                <button id="itemSortButton" type="button" onclick="sortTable(6)" style="border-radius: 100px; border: none; background-color: transparent;">借用物品</button>
              </th>
            <!-- 借用數量 -->
              <th style="text-align: center;">
                <button id="itemnumSortButton" type="button" onclick="sortTable(7)" style="border-radius: 100px; border: none; background-color: transparent;">借用數量</button>
              </th>
            <!-- 抵押證件 -->
              <th style="text-align: center;">
                <button id="licenseSortButton" type="button" onclick="sortTable(8)" style="border-radius: 100px; border: none; background-color: transparent;">抵押證件</button>
              </th>
              <!-- 授課教室 -->
              <th style="text-align: center;">
                <button id="classroomSortButton" type="button" onclick="sortTable(9)" style="border-radius: 100px; border: none; background-color: transparent;">授課教室</button>
              </th>
            <!-- 授課教師 -->
              <th style="text-align: center;">
                <button id="teacherSortButton" type="button" onclick="sortTable(10)" style="border-radius: 100px; border: none; background-color: transparent;">授課教師</button>
              </th>
            <!-- 審核人 -->
              <th style="text-align: center;">
                <button id="teacherSortButton" type="button" onclick="sortTable(11)" style="border-radius: 100px; border: none; background-color: transparent;">審核人</button>
              </th>
             <!-- 編輯資料 -->
            @if (Route::has('login'))
              @if (Auth::check())
                @if( (Auth::user()->level)==='管理員')
              <th style="text-align: center;">
                <button id="editSortButton" type="button" onclick="sortTable(12)"  style="border-radius: 100px; border: none; background-color: transparent;">編輯資料</button>
              </th>
          </tr> 
                @endif
              @endif
            @endif
        </table>
      </div>
      <!-- End of Table Head -->

      <!-- Table Content -->
      <div class="TableContent">
        <table class="table" id="content" style="table-layout: fixed; text-align: center" >
          @foreach($miss as $mis)
          <tr class="contentdata" id="tr-{{$mis->id}}">
            <!-- 若是有備註，出現提示 -->
            @if(($mis->note7)==='無')
              <td style="width: 1px;"></td>
            @else
              <td style="width: 1px;">※</td>
            @endif
            <td id="id-{{$mis->id}}">{{$mis->id}}</td>
            @if(($mis->status)==='待審核')
              <td id="date-{{$mis->id}}">{{$mis->created_at}}</td>
            @elseif(($mis->status)==='借用中')
              <td id="date-{{$mis->id}}">{{$mis->borrowat}}</td>
            @elseif(($mis->status)==='已歸還')
              <td id="date-{{$mis->id}}">{{$mis->returnat}}</td>
            @endif
            <td id="class-{{$mis->id}}">{{$mis->class}}</td>
            <td id="name-{{$mis->id}}">
              <?php 
                    $oldmisemail = str_replace('@', '.', $mis->email);
                        $misemail = str_replace('.', '', $oldmisemail)
              ?>
              <button class="UserModalButton" data-toggle="modal" data-target="#UserModal{{$misemail}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp; {{$mis->name}}</button>
            </td>
            @if (Route::has('login'))
              @if (Auth::check())
            <td id="phone-{{$mis->id}}" style="width: 10%;">{{$mis->phone}}</td>
              @endif
            @endif
            <td id="item-{{$mis->id}}">{{$mis->item}}</td>
            <td id="itemnum-{{$mis->id}}">{{$mis->itemnum}}</td>
            <td id="license-{{$mis->id}}">{{$mis->license}}</td>
            <td id="classroom-{{$mis->id}}">{{$mis->classroom}}</td>
            <td id="teacher-{{$mis->id}}">{{$mis->teacher}}</td>
            <td id="audit-{{$mis->id}}">{{$mis->audit}}</td>
            @if (Route::has('login'))
              @if (Auth::check())
                @if( (Auth::user()->level)==='管理員')
                  @if(($mis->status)==='借用中')
                  <td>
                    <button class="EditButton"  type="button" style="background-color: #5599FF;" data-toggle="modal" data-target="#myModal{{$mis->id}}">
                      借用中
                    </button> 
                  </td>
                  @elseif(($mis->status)==='已歸還')
                  <td>
                    <button class="EditButton" type="button" style="background-color: #008B00;" data-toggle="modal" data-target="#myModal{{$mis->id}}">
                      已歸還
                    </button> 
                  </td>
                  @elseif(($mis->status)==='待審核')
                  <td>
                    <button class="EditButton" type="button" style="background-color: #FF8888;" data-toggle="modal" data-target="#myModal{{$mis->id}}">
                      待審核
                    </button> 
                  </td>
                  @endif
                @endif
              @endif
            @endif
            </tr>
          @endforeach
        </table>
        {{ $miss->links() }}
      </div>
      <!-- End of Table Content -->
    </div>
    <!-- End of PC Section -->

    <!-- Mobile Section -->
    <div class="Mobilesection">
      <div class="NavSection">
            <table style="text-align: center; table-layout: fixed; width: 100%; ">
                <tr>
                  <th style="text-align: center;">
                    <form action=" {{ asset('/admin')}}" method="get" }}" style="width: 100%;">
                    <button class="returnButton"><span class="glyphicon glyphicon-chevron-left"></span>返回</button>
                    </form>
                  </th>
                  <th style="text-align: center;">
                    <label style="font-size: 15px; font-family: Microsoft JhengHei;">以「{{ $content }}」搜尋</label>
                  </th>
                  <th style="text-align: center;">
                    <!-- 再次搜尋 -->
                      <button class="searchButton" id="searchButton" type="button" data-toggle="modal" data-target="#SearchModal">再次搜尋<span class="glyphicon glyphicon-chevron-right"></span></button>
                    </form>
                  </th>
                </tr>
            </table>
      </div>
      <br>
      <!-- Mobile Table -->
      <div class="TableTop">
        @foreach($miss as $mis)
        <table class="table-bordered" id="TitleTable" style="text-align: center; table-layout: fixed; width: 100%; background-color: #FFFFE0;">
            <!-- 序號 -->
          <tr>
              <th style="text-align: center;">
                <button id="idSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">借用序號</button>
              </th>
              <th id="id-{{$mis->id}}" style="text-align: center;">
                {{$mis->id}}
              </th>
          </tr>
          <!-- 日期 -->
          <tr>
              <th style="text-align: center;">
                <button id="dateSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">更新日期</button>
              </th>
              @if(($mis->status)==='待審核')
                <th id="date-{{$mis->id}}">{{$mis->created_at}}</th>
              @elseif(($mis->status)==='借用中')
                <th id="date-{{$mis->id}}">{{$mis->borrowat}}</th>
              @elseif(($mis->status)==='已歸還')
                <th id="date-{{$mis->id}}">{{$mis->returnat}}</th>
              @endif
          </tr>
          <!-- 班級 -->
          <tr>
              <th style="text-align: center;">
                <button id="classSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">班級</button>
              </th>
              <th id="class-{{$mis->id}}" style="text-align: center;">
                {{$mis->class}}
              </th>
          </tr>
          <!-- 申請人 -->
          <tr>
            <th class="TableTop" style="text-align: center;">
            <button id="nameSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">申請人</button>
          </th>
          @if (Route::has('login'))
            @if (Auth::check())
              @if( (Auth::user()->level)==='管理員'|| (Auth::user()->level)==='工讀生')
                  <td id="name-{{$mis->id}}">
                    <?php 
                    $oldmisemail = str_replace('@', '.', $mis->email);
                        $misemail = str_replace('.', '', $oldmisemail)
                    ?>
                    <button class="UserModalButton" style="width: 130px;" data-toggle="modal" data-target="#UserModal{{$misemail}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp; {{$mis->name}}</button>
                  </td>
                @else
                  <td class="TableContent" id="name-{{$mis->id}}">
                  {{$mis->name}}
                </td>
                @endif
              @endif
            @endif
        </tr>
          <!-- 電話 -->
            @if (Route::has('login'))
              @if (Auth::check())
                @if ((Auth::user()->level)==='管理員')
          <tr>
              <th style="text-align: center;"">
                <button id="phoneSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">電話</button>
              </th>
              <th id="phone-{{$mis->id}}" style="text-align: center;">
                {{$mis->phone}}
              </th>
          </tr>
                @endif
              @endif
            @endif
          <!-- 借用物品-->
          <tr>
              <th style="text-align: center;">
                <button id="itemSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">借用物品</button>
              </th>
              <th id="item-{{$mis->id}}" style="text-align: center;">
                {{$mis->item}}
              </th>
          </tr>
          <!-- 借用數量 -->
          <tr>
              <th style="text-align: center;">
                <button id="itemnumSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">借用數量</button>
              </th>
              <th id="itemnum-{{$mis->id}}" style="text-align: center;">
                {{$mis->itemnum}}
              </th>
          </tr>
          <!-- 抵押證件 -->
          <tr>
              <th style="text-align: center;">
                <button id="licenseSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">抵押證件</button>
              </th>
              <th id="license-{{$mis->id}}" style="text-align: center;">
                {{$mis->license}}
              </th>
          </tr>
          <!-- 授課教室 -->
          <tr>
              <th style="text-align: center;">
                <button id="classroomSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">授課教室</button>
              </th>
              <th id="classroom-{{$mis->id}}" style="text-align: center;">
                {{$mis->classroom}}
              </th>
          </tr>
          <!-- 授課教師 -->
          <tr>
              <th style="text-align: center;">
                <button id="teacherSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">授課教師</button>
              </th>
              <th id="teacher-{{$mis->id}}" style="text-align: center;">
                {{$mis->teacher}}
              </th>
          </tr>
          <!-- 審核人 -->
          <tr>
              <th style="text-align: center;">
                <button id="auditSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">審核人</button>
              </th>
              <th id="audit-{{$mis->id}}" style="text-align: center;">
                {{$mis->audit}}
              </th>
          </tr>
          <!-- 狀態 -->
          <tr>
              <th style="text-align: center;">
                <button id="statusSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">狀態</button>
              </th>
              <th id="status-{{$mis->id}}" style="text-align: center;">
                {{$mis->status}}
              </th>
          </tr>
          <!-- 備註 -->
          @if(($mis->note7)==='無')
          @else
          <tr>
            <th class="TableTop" style="text-align: center;">
            <button id="note7SortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">備註</button>
          </th>
          <td class="TableContent" id="note7-{{$mis->id}}"  style="text-align: center;">
            <button class="note7button" type="button" data-toggle="modal" data-target="#Note{{$mis->id}}">
              <span class="glyphicon glyphicon-pencil"></span>
              備註
            </button>
          </td>
          </tr>
          @endif
          <!-- 編輯資料 -->
          @if (Route::has('login'))
              @if (Auth::check())
                @if( (Auth::user()->level)==='管理員')
          <tr>
              <th style="text-align: center;">
                <button id="editSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">編輯資料</button>
              </th>
              @if(($mis->status)==='借用中')
                  <td>
                    <button class="EditButton" type="button" style="background-color: #5599FF;" data-toggle="modal" data-target="#myModal{{$mis->id}}">
                      借用中
                    </button> 
                  </td>
                  @elseif(($mis->status)==='已歸還')
                  <td>
                    <button class="EditButton" type="button" style="background-color: #008B00;" data-toggle="modal" data-target="#myModal{{$mis->id}}">
                      已歸還
                    </button> 
                  </td>
                  @elseif(($mis->status)==='待審核')
                  <td>
                    <button class="EditButton" type="button" style="background-color: #FF8888;" data-toggle="modal" data-target="#myModal{{$mis->id}}">
                      待審核
                    </button> 
                  </td>
              @endif
          </tr>
               @endif
             @endif
          @endif
        </table>
        <br>
        @endforeach
        {{ $miss->links() }}
      </div>
      <!-- End of Mobile Table -->
    </div>
    <!-- End of Mobile Section -->


  <!-- Modal Section -->

  <!-- Edit Modal-->
  @foreach($miss as $mis)
  <div class="modal fade" id="myModal{{$mis->id}}" role="dialog"  style="height: 600px;">
      <div class="modal-dialog" >
        <!-- Edit Modal content-->
        <div class="modal-content">
            <!-- Edit Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">借用詳細資料</h4>
            </div>
            <!-- End of Edit Modal Header -->
            <!-- Edit Modal Body -->
          <div class="modal-body">
              <div class="EditPage">
                  <form action="{{asset ( '/admin/searchall/update/'.$mis->id) }}" method="post">{{ csrf_field()}}
              <div class="EditInfo">
                <!-- Edit Modal Table -->
                <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
                  <tr><th>借用序號 : </th><th><input  class="form-control" type="text" disabled value="{{ $mis->id}}"> </th></tr>
                  <tr>
                    <th>更新日期 :</th> 
                    <th>
                      @if(($mis->status)==='待審核')
                      <input  class="form-control" type="datetime" name="date" value="{{ $mis->created_at }}" disabled>
                      @elseif(($mis->status)==='借用中')
                      <input  class="form-control" type="datetime" name="date" value="{{ $mis->borrowat }}" required>
                      @elseif(($mis->status)==='已歸還')
                      <input  class="form-control" type="datetime" name="date" value="{{ $mis->returnat }}" required>
                      @endif
                    </th>
                  </tr>
                  <tr><th>班級 :</th><th> <input  class="form-control" type="text" name="class" value="{{ $mis->class }}"></th></tr>
                    <tr><th>申請人 : </th><th> <input  class="form-control" type="text" name="name" value="{{ $mis->name }}"></th></tr>
                    <tr><th>電話 : </th><th> <input  class="form-control" type="text" name="phone" value="{{ $mis->phone }}" disabled></th></tr>
                    <tr><th>借用物品 :</th> <th> <input  class="form-control" type="text" name="item" value="{{ $mis->item }}"> </th></tr>
                    <tr><th>借用數量 :</th><th><input class="form-control" type="number" name="itemnum" value="{{ $mis->itemnum }}"></th></tr>
                    <tr><th>抵押證件 :</th><th> <input class="form-control" type="text" name="license" value="{{ $mis->license }}"></th></tr>
                    <tr><th>授課教室 :</th><th> <input class="form-control" type="text" name="classroom" value="{{ $mis->classroom }}"></th></tr>
                    <tr><th>授課教師 :</th><th> <input  class="form-control" type="text" name="teacher" value="{{ $mis->teacher }}"></th></tr>
                    <tr><th>狀態 :</th>
                      <th> 
                        <select class="form-control" name="status" required>
                          <option selected disabled style="display: none;"></option>
                          <option value="借用中" @if(($mis->status)==='借用中')selected @endif>借用中</option>
                          <option value="待審核" @if(($mis->status)==='待審核') selected @endif>待審核</option>
                          <option value="已歸還" @if(($mis->status)==='已歸還') selected @endif>已歸還</option>
                        </select>
                      </th>
                    </tr>
                    @if(($mis->status)==='已歸還')
                    <tr><th>審核者 :</th><th>  <input class="form-control" type="text" name="audit" value="{{ $mis->audit }}" disabled></th></tr>
                    @endif
                    <tr><th>備註 :</th><th> <textarea class="form-control" name="note7">{{ $mis->note7 }}</textarea></th></tr>
                    
                    <input type="text" name="oldstatus" value="{{$mis->status}}" hidden>
                    <!-- ↑↑↑視為傳遞原始狀態的變數 -->
                    <input type="text" name="searchcontent" value="{{$content}}" hidden>
                    <!-- ↑↑↑視為傳遞搜尋關鍵字的變數 -->
                </table>
                <!-- End of Edit Modal Table -->
              </div>
              </div>
            </div>
            <!-- End of Edit Modal Body -->
            <!-- Modal Footer -->
            <div class="modal-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold; background-color: #00FA9A;">Edit</button>
                    </form>
                    <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold; background-color: #FF0000; color: white;" data-toggle="modal" data-target="#DeleteModal{{$mis->id}}">Delete</button>
                    <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- End of Edit Modal Footer -->
        </div>
        <!-- End of Edit Modal Content -->
      </div>
      <!-- End of Edit Modal Dialog -->
  </div>
  @endforeach
  <!-- End of Edit Modal -->

  <!-- User Modal -->
  @foreach($users as $user)
        <?php 
            $olduseremail = str_replace('@', '.', $user->email);
            $useremail = str_replace('.', '', $olduseremail)
        ?>
        <div id="UserModal{{$useremail}}" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" >
            <div class="modal-dialog">

                    <!-- User Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="EditPage">
                                <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">修改 Edit</h4>
                            </div>
                        </div> <!-- End of User Modal Header -->
                         
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form class="form-horizontal" method="post" action="{{ asset('/admin/searchall/userupdate')}}">
                                     {{ csrf_field() }}
                                    <div class="EditPage">
                                        <div class="EditInfo">
                                            <!-- Edit Modal Table -->
                                            <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
                                                <tr><th>使用者 : </th><th><label style="text-align: center; width: 100%;">{{ $user->name}}</label> </th></tr>
                                                <tr><th>信箱 :</th> <th><input  class="form-control" type="email" name="email" value="{{ $user->email }}" disabled></th></tr>
                                                <tr><th>電話 :</th> <th><input class="form-control" type="phone" value="{{ $user->phone }}" disabled></th></tr>
                                                <tr><th>違規點數 :</th><th> <input  class="form-control" type="number" name="violation" value="{{ $user->violation }}" min="0"></th></tr>
                                                <tr><th>違規事由 :</th><th> <input  class="form-control" id="reasonbox" type="text" name="reason" required></th></tr>
                                                <tr><th>權限等級 :</th>
                                                    <th> 
                                                        <input class="form-control" type="text" value="{{ $user->level }}" disabled></th>
                                                    </th>
                                                </tr>
                                            </table>
                                            <!-- End of Edit Modal Table -->
                                            <input name="useremail" value="{{$user->email}}" hidden >
                                            <!-- ↑視為傳遞User email的變數 不會顯示在頁面上 -->
                                            <input name="username" value="{{$user->name}}" hidden >
                                            <!-- ↑視為傳遞User names的變數 不會顯示在頁面上 -->
                                            @if(Auth::check())
                                            <input name="reasoncreator" value="{{Auth::user()->name}}" hidden >
                                            <!-- ↑視為傳遞Creator的變數 不會顯示在頁面上 -->
                                            @endif
                                            <input name="searchcontent" value="{{$content}}" hidden>
                                            <!-- ↑視為傳遞搜尋關鍵字的變數 不會顯示在頁面上 -->
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
                        <!-- End of User Modal Footer -->
                                    </form>
                    </div> 
                    <!-- End of User Modal Content -->
            </div>
        </div>
    @endforeach
    <!-- End of User Modal -->

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
                          <form action="{{ asset ('/admin/searchall')}}" method="post" style="width: 100%;">{{ csrf_field()}}
                              <label style="font-family: Microsoft JhengHei; height: 50px;font-size: 30px;">搜尋:&nbsp;</label>
                              <input  class="searchcontent" name="searchcontent" type="text"  placeholder="請輸入內容...."  value="" style="width: 70%;" autofocus>
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

    <!-- Delete Modal -->
  @foreach($miss as $mis)
        <div id="DeleteModal{{$mis->id}}" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
    <!-- Delete Modal content-->
                <!-- Delete Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="DeletePage">
                                <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei; font-weight: bolder;">刪除借用資料</h4>
                            </div>
                        </div> <!-- End of Modal Header -->
                         
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form class="form-horizontal" method="post" action="{{ asset('/admin/searchall/delete/'.$mis->id)}}">
                                     {{ csrf_field() }}
                                    <div class="DeletePage">
                                        <div class="DeleteInfo">
                                            <!-- Delete Modal Table -->
                                            <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
                                              <tr>
                                                <th>借用序號 : </th>
                                                <th>
                                                  <input  class="form-control" type="text" disabled value="{{ $mis->id}}"> 
                                                </th>
                                              </tr>
                                              <tr>
                                                <th>更新日期 :</th> 
                                                <th>
                                                  @if($mis->status==='待審核')
                                                    <input  class="form-control" type="datetime" name="date" value="{{ $mis->created_at }}" disabled>
                                                  @elseif($mis->status==='借用中')
                                                    <input  class="form-control" type="datetime" name="date" value="{{ $mis->borrowat }}" disabled>
                                                  @endif
                                                </th>
                                              </tr>
                                              <tr>
                                                <th>班級 :</th>
                                                <th> 
                                                  <input  class="form-control" type="text" name="class" value="{{ $mis->class }}" disabled>
                                                </th>
                                              </tr>
                                                <tr>
                                                  <th>申請人 : </th>
                                                  <th> 
                                                    <input  class="form-control" type="text" name="name" value="{{ $mis->name }}" disabled>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>電話 : </th>
                                                  <th> 
                                                    <input  class="form-control" type="text" name="phone" value="{{ $mis->phone }}" disabled>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>借用物品 :</th> 
                                                  <th> 
                                                    <input  class="form-control" type="text" name="item" value="{{ $mis->item }}" disabled> 
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>借用數量 :</th>
                                                  <th>
                                                    <input class="form-control" type="number" name="itemnum" value="{{ $mis->itemnum }}" disabled>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>抵押證件 :</th>
                                                  <th> 
                                                    <input class="form-control" type="text" name="license" value="{{ $mis->license }}" disabled>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>授課教室 :</th>
                                                  <th> 
                                                    <input class="form-control" type="text" name="classroom" value="{{ $mis->classroom }}" disabled>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>授課教師 :</th>
                                                  <th> 
                                                    <input  class="form-control" type="text" name="teacher" value="{{ $mis->teacher }}" disabled>
                                                  </th>
                                                </tr>
                                                <tr><th>狀態 :</th>
                                                  <th> 
                                                    <input  class="form-control" type="text" name="teacher" value="{{ $mis->status }}" disabled>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th>備註 :</th>
                                                  <th> 
                                                    <textarea class="form-control" name="note7" disabled>{{ $mis->note7 }}</textarea>
                                                  </th>
                                                </tr>
                                            </table>
                                            <!-- End of Delete Modal Table -->
                                            <input name="searchcontent" value="{{$content}}" hidden>
                                            <!-- ↑視為傳遞搜尋關鍵字的變數 不會顯示在頁面上 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End of Modal Body -->
                        <div class="modal-footer">
                              <div class="form-group" style="text-align: center;">
                                <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold; background-color: #FF0000; color: white;">Delete</button></form>
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 20px; font-weight: bold;">Back</button>
                              </div>
                        </div> 
                        <!-- End of Modal Footer -->
                    </div> 
                    <!-- End of Delete Modal Content -->
            </div>
        </div>
        @endforeach
        <!-- End of Delete Modal -->

  <!-- End of Modal Section -->

  @unless(count($miss)>= 1)
  <div style=" font-family: Microsoft JhengHei; text-align: center; font-weight: bolder; font-size: 40px; color: red;" >
    查無此資料!!!
  </div>
  @endunless
  <div style="text-align: center;">
    <form action="{{ asset('/admin/searchall') }}" method="post">{{ csrf_field() }}
        <input type="text" name="searchcontent" value="{{$content}}" style="display: none;">
        <button class="resetButton" id="testbtn">重新整理</button>
    </form>
  </div>

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
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
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

