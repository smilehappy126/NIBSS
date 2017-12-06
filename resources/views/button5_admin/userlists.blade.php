@extends('layouts.layout')
@section('title', '使用者清單')
@section('css')
   <style type="text/css">
   #TableTop{
        font-family:  Microsoft JhengHei;
        font-size: 20px;
        text-align: center;
        word-break: break-word;
    }
    #TableContent{
        font-family:  Microsoft JhengHei;
        font-size: 15px;
        text-align: center;
        font-weight: bold;
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
   </style>
@stop

@section('content')
<div class="container">
    <!-- 表單表頭 -->
    <table class="table" id="TableTop" style="table-layout: fixed;">
        <tr>    
            <th style="width: 80px; text-align: center;">使用者</th>
            <th style="width: 180px; text-align: center;">信箱</th>
            <th style="text-align: center;">違規次數</th>
            <th style="text-align: center;">權限等級</th>
            <th style="text-align: center;">修改資料</th>
        </tr>
    </table>
    @foreach($users as $user)
    <!-- 表單內容 -->
    <table class="table" id="TableContent" style="table-layout: fixed;"">
        <th style="width: 80px; text-align: center;">{{ $user->name }}</th>
        <th style="width: 180px; text-align: center;">{{ $user->email }}</th>
        <th style="text-align: center;">{{ $user->violation }}</th>
        <th style="text-align: center;">{{ $user->level }}</th>
        <th style="text-align: center;">
            <button class="EditButton" type="button" data-toggle="modal" data-target="#EditModal{{$user->id}}"><span class="glyphicon glyphicon-wrench"></span> 修改</button>
        </th>
    </table>


        <!-- Edit Modal -->
        <div id="EditModal{{$user->id}}" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" >
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
                                    <form class="form-horizontal" method="post" action="{{ asset('/admin/userlists/update/'.$user->id)}}">
                                     {{ csrf_field() }}
                                    <div class="EditPage">
                                        <div class="EditInfo">
                                            <!-- Edit Modal Table -->
                                            <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
                                                <tr><th>使用者 : </th><th><label style="text-align: center; width: 100%;">{{ $user->name}}</label> </th></tr>
                                                <tr><th>信箱 :</th> <th><input  class="form-control" type="email" name="email" value="{{ $user->email }}"></th></th>
                                                <tr><th>違規次數 :</th><th> <input  class="form-control" type="text" name="violation" value="{{ $user->violation }}"></th></tr>
                                                <tr><th>權限等級 :</th>
                                                    <th> 
                                                        <select class="form-control" name="level" value="{{ $user->level }}">
                                                            <option value="管理員">管理員</option>
                                                            <option value="工讀生">工讀生</option>
                                                            <option value="一般使用者">一般使用者</option>
                                                        </select>
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
</div>


@endsection

@section('js')

@stop