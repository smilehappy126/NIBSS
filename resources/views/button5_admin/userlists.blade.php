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
    .editButton{
        font-family: Microsoft JhengHei;
        text-align: center;
        font-size: 17px;
        border-width: 1px;
        border-radius: 40px;
        width: 70px;
        background-color: #D8BFD8;
        transition: 0.3s;
    }
    .editButton:hover{
        width: 100px;
        background-color: #F5DEB3;
        transition: 0.3s;
    }
   </style>
@stop

@section('content')
<div class="container">
    <table class="table" id="TableTop" style="table-layout: fixed;">
        <tr>    
            <th style="width: 80px; text-align: center;">使用者</th>
            <th style="width: 180px; text-align: center;">信箱</th>
            <th style="text-align: center;">權限等級</th>
            <th style="text-align: center;">違規次數</th>
            <th style="text-align: center;">修改資料</th>
        </tr>
    </table>
    @foreach($users as $users)
        <table class="table" id="TableContent" style="table-layout: fixed;"">
            <th style="width: 80px; text-align: center;">{{ $users->name }}</th>
            <th style="width: 180px; text-align: center;">{{ $users->email }}</th>
            <th style="text-align: center;">{{ $users->level }}</th>
            <th style="text-align: center;">{{ $users->violation }}</th>
            <th style="text-align: center;">
                <button class="editButton" type="button"><span class="glyphicon glyphicon-wrench"></span> 修改</button>
            </th>
        </table>
    @endforeach
</div>
@endsection

@section('js')

@stop