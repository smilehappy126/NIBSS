@extends('layouts.layout') 
@section('title', '預約狀況') 
@section('css')
<style>
.errorMessage {
    color: red;
}

.rwd-table {
            background: #fff;
            overflow: hidden;
        }

            .rwd-table tr:nth-of-type(2n) {
                background: #eee;
            }

            .rwd-table th, .rwd-table td {
                margin: 0.5em 1em;
            }

        .rwd-table {
            min-width: 100%;
        }

            .rwd-table th {
                display: none;
            }

            .rwd-table td {
                display: block;
            }

                .rwd-table td:before {
                    content: attr(data-th) " : ";
                    font-weight: bold;
                    width: 6.5em;
                    display: inline-block;
                }

            .rwd-table th, .rwd-table td {
                text-align: left;
            }

                .rwd-table th, .rwd-table td:before {
                    color: #25517d;
                    font-weight: bold;
                }

        @media (min-width: 480px) {
            .rwd-table td:before {
                display: none;
            }

            .rwd-table th, .rwd-table td {
                display: table-cell;
                padding: 0.25em 0.5em;
            }

                .rwd-table th:first-child, .rwd-table td:first-child {
                    padding-left: 0;
                }

                .rwd-table th:last-child, .rwd-table td:last-child {
                    padding-right: 0;
                }

            .rwd-table th, .rwd-table td {
                padding: 1em !important;
            }
        }
/*
        .rwd-table {
  border: 1px solid #000000;
  border-collapse: collapse;
}
  .rwd-table th, td {
    border: 1px solid #000000;
    padding: 2px 4px;
    text-align: center;
  }
   
@media screen and (max-width: 451px) {
   
  .rwd-table tr {
    border: 1px solid #000000;
  }
   
  .rwd-table th {
      display: none;
  }
   
  .rwd-table td {
      display: block;
      border: none;
  }
   
  .rwd-table td:before {
      content: attr(data-th) " ";
      float: left;
      font-weight: bold;
  }
}
*/




</style>
@stop 

@section('content')

<?php
$date = new DateTime($thisMonday);
$dateString = $date->format('Y-m-d');

$pre = strtotime('previous monday', strtotime($dateString));
$next = strtotime('next monday', strtotime($dateString)); 
$preString = date('Y-m-d',$pre);
$nextString = date('Y-m-d',$next);


// echo "現在所在教室: ", $currentClassroom;
?>

<div class="container">
    
    <!--顯示出錯訊息(課程重疊了)-->
    @if (session('alert'))
    <div class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Oops...出錯了!</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{ session('alert') }}
    </div>
    @endif
     @if (Route::has('login'))
        @if (Auth::check())
             @if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
    <!--新增教室資料按鈕-->
    <button type="button" class="btn btn-link btn-lg">
        <a href="{{ asset('/newclassroom') }}"><div>新增教室資料</div></a>
    </button>

    <!--修改刪除教室資料按鈕-->
    <button type="button" class="btn btn-link btn-lg">
        <a href="{{ asset('/editclassroom') }}"><div>修改刪除/教室資料</div></a>
    </button>

    <!--新增課程資訊按鈕-->
    <button type="button" class="btn btn-link btn-lg">
        <a href="{{ asset('/inputClass/' . $currentClassroom) }}"><div>固定課程預約</div></a>
    </button>
    
    <button type="button" class="btn btn-link btn-lg" data-toggle="modal" data-target="#excelModal">
        Excel匯入單一多筆資料
    </button>
            @endif
        @endif
    @endif
    <div class="modal fade" id="excelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excel匯入單一多筆資料</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
    <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
                    {{ csrf_field() }}
        <br/>

        <button class="btn btn-md btn-primary">Import CSV or Excel File</button>

    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>   
<br>         
<!-- excel -->
   <!--  <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="file" name="import_file" />
                    {{ csrf_field() }}
        <br/>

        <button class="btn btn-primary">Import CSV or Excel File</button>

    </form>
     -->
    <!--教室按鈕-->
    @foreach ($classrooms as $classroom)
<!--
    <button id="{{ $classroom->roomname }}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#classModal{{ $classroom->roomname }}">
        <a href="{{ asset('/reserve/017') }}">{{ $classroom->roomname }}</a>
    </button>
-->
<!--classModal先不顯示，等跳轉之後再顯示-->
    <div class="btn-group btn-group-lg">
        <a href="{{ asset('/reserve/' . $classroom->roomname ) }}" class="btn btn-primary classBtn" id="{{ $classroom->roomname }}">{{ $classroom->roomname }}</a>
    </div>
<!--   classModal   -->
    <!-- <div class="modal fade" id="classModal{{ $classroom->roomname }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $classroom->roomname }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $classroom->word }}
                    <img id="image" src="{{$classroom->imgurl}}" height="200" width="400">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div> -->

    @endforeach
    
    <p></p>

    <!--上一週/下一週按鈕-->
    <div class="row">
        
        <a href="{{ asset('/reserve/'.$currentClassroom.'/'.$preString) }}" class="btn btn-info col col-md-offset-1 col-md-1"><<上一週</a>

        <a href="{{ asset('/reserve/'.$currentClassroom.'/'.$nextString) }}" class="btn btn-info col col-md-offset-8 col-md-1">下一週>></a>
        
    </div>


<div class="container">
    <table BORDER="5" align=center width="1200" height="800" class="table table-bordered rwd-table" style="border:8px #00BBFF groove;">

        <tr style="font-weight:bold;" id="monitor">
            <th> </th>
            <th>時間</th>

            <th>
                星期一 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </th>
            <th>
                星期二 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </th>
            <th>
                星期三 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </th>
            <th>
                星期四 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </th>
            <th>
                星期五 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </th>
            <th>
                星期六 <br>
                <?php
                echo $date->format('Y-m-d');
                $date->add(new DateInterval('P1D'));
                ?>
            </th>
            <th>
                星期日 <br>
                <?php
                echo $date->format('Y-m-d');
                // $date->add(new DateInterval('P1D'));
                ?>
            </th>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">1</td>
            <td>0800 至 0850</td>
            <td class="Curriculum" id="Mon_1">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_1">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_1">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_1">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_1">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_1">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_1">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">2</td>
            <td>0900 至 0950</td>
            <td class="Curriculum" id="Mon_2">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime" hidden></p>
                <p class="cell_end_classTime" hidden></p>
            </td>
            <td class="Curriculum" id="Tue_2">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_2">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_2">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_2">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_2">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_2">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">3</td>
            <td>1000 至 1050</td>
            <td class="Curriculum" id="Mon_3">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_3">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_3">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_3">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_3">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_3">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_3">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">4</td>
            <td>1100 至 1150</td>
            <td class="Curriculum" id="Mon_4">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_4">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_4">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_4">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>            
            </td>
            <td class="Curriculum" id="Fri_4">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_4">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_4">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">午休</td>
            <td>1200 至 1250</td>
            <td class="Curriculum" id="Mon_noon">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_noon">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_noon">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_noon">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_noon">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_noon">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_noon">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">5</td>
            <td>1300 至 1350</td>
            <td class="Curriculum" id="Mon_5">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_5">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_5">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_5">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_5">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_5">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_5">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">6</td>
            <td>1400 至 1450</td>
            <td class="Curriculum" id="Mon_6">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_6">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_6">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_6">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_6">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_6">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_6">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">7</td>
            <td>1500 至 1550</td>
            <td class="Curriculum" id="Mon_7">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_7">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_7">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_7">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_7">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_7">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_7">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">8</td>
            <td>1600 至 1650</td>
            <td class="Curriculum" id="Mon_8">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_8">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_8">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_8">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_8">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_8">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_8">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">9</td>
            <td>1700 至 1750</td>
            <td class="Curriculum" id="Mon_9">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_9">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_9">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_9">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_9">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_9">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_9">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;"><font size="3">A</td>
            <td>1800 至 1850</td>
            <td class="Curriculum" id="Mon_A">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_A">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_A">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_A">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_A">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_A">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_A">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                <font size="3">B</td>
            <td>1900 至 1950</td>
            <td class="Curriculum" id="Mon_B">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_B">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_B">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_B">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_B">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_B">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_B">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">
                <font size="3">C</td>
            <td>2000 至 2050</td>
            <td class="Curriculum" id="Mon_C">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Tue_C">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Wed_C">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Thu_C">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Fri_C">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sat_C">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
            <td class="Curriculum" id="Sun_C">
                <p class="cell_id" hidden></p>
                <p class="cell_content"></p>
                <p class="cell_teacher"></p>
                <p class="cell_start_classTime hidden"></p>
                <p class="cell_end_classTime hidden"></p>
            </td>
        </tr>
    </table>
</div>


@foreach ($results as $course)

    <ul>
        <h2>{{$course->content}}, {{$course->teacher}}</h2>
        <li>{{$course->roomname}},
         {{$course->start_classTime}}, {{$course->end_classTime}},{{$course->weekFirst}}
        </li>
    </ul>
@endforeach


</div>


@if (Route::has('login'))
    @if (Auth::check())
        @if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
<!--點選空白格子Modal: 新增-->
<div class="modal fade" id="cellModal_create" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">新增課程</h4>
            </div>
            <div class="modal-body">
                <form action="{{ asset('reserve/createCourse') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>內容</label>
                        <input type="text" class="form-control" name="content" 
                            value="" required>
                    </div>
                    <div class="form-group">
                        <label>老師</label>
                        <input type="text" class="form-control" name="teacher"
                            value="" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>開始時間</label>
                        <select class="form-control select_start create_classTime" name="start_classTime"></select>
                    </div>
                    <div class="form-group">
                        <label>結束時間</label>
                        <select class="form-control select_end create_classTime" name="end_classTime"></select>
                    </div>
                    <div class="form-group">
                        <label>教室: {{$currentClassroom}}</label>
                        <input name="roomname" value="{{$currentClassroom}}" hidden>
                        <br>
                        <label>該週週一: {{$thisMonday}}</label>
                        <input name="weekFirst" value="{{$thisMonday}}" hidden>
                        <p class="errorMessage"></p>
                    </div> 
            </div>
            <div class="modal-footer">
                <div class="row">    
                    <div class="col-md-10">
                    <button class="btn btn-primary form_submit" type="submit">新增</button>
                    </div>
                    </form>
                    <div class="col-md-2">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
         @endif
     @endif
 @endif


<!--點選課表格子Modal: 修改-->
@foreach ($results as $course)
@if (Route::has('login'))
    @if (Auth::check())
        @if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
<div class="modal fade" id="cellModal{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">課程資訊</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>內容</label>
                        <input type="text" class="form-control" name="content" 
                            value="{{$course->content}}" required>
                    </div>
                    <div class="form-group">
                        <label>老師</label>
                        <input type="text" class="form-control" name="teacher"
                            value="{{$course->teacher}}" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>開始時間</label>
                        <select class="form-control select_start modify_classTime" id="modify_start{{$course->id}}" name="start_classTime"></select>
                    </div>
                    <div class="form-group">
                        <label>結束時間</label>
                        <select class="form-control select_end modify_classTime" id="modify_end{{$course->id}}" name="end_classTime"></select>
                    </div>
                    <div class="form-group">
                        <label>此項目id: {{$course->id}}</label>
                        <input name="roomname" value="{{$course->roomname}}" hidden>
                        <input name="weekFirst" value="{{$course->weekFirst}}" hidden>
                        <p class="errorMessage"></p>
                    </div> 
            </div>
            <div class="modal-footer">
                <div class="row">    
                    <div class="col-md-10">
                    <button class="btn btn-primary form_submit" type="submit" formaction="{{ asset('reserve/updateCourse/'.$course->id) }}">儲存</button>
                    </div>
                    </form>
                    <div class="col-md-2">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
         @endif
     @endif
 @endif

@endforeach

<!--modal 要放哪: 放div container外面-->
<!--div container好像沒包好?? 包好包滿才能work-->

@endsection 

@section('js')
<script language="JavaScript" type="text/javascript">  
    
// 用來取時間區間
var classTime_array = ["Mon_1","Mon_2","Mon_3","Mon_4","Mon_noon","Mon_5","Mon_6","Mon_7","Mon_8","Mon_9","Mon_A","Mon_B","Mon_C",
"Tue_1","Tue_2","Tue_3","Tue_4","Tue_noon","Tue_5","Tue_6","Tue_7","Tue_8","Tue_9","Tue_A","Tue_B","Tue_C",
"Wed_1","Wed_2","Wed_3","Wed_4","Wed_noon","Wed_5","Wed_6","Wed_7","Wed_8","Wed_9","Wed_A","Wed_B","Wed_C",
"Thu_1","Thu_2","Thu_3","Thu_4","Thu_noon","Thu_5","Thu_6","Thu_7","Thu_8","Thu_9","Thu_A","Thu_B","Thu_C",
"Fri_1","Fri_2","Fri_3","Fri_4","Fri_noon","Fri_5","Fri_6","Fri_7","Fri_8","Fri_9","Fri_A","Fri_B","Fri_C",
"Sat_1","Sat_2","Sat_3","Sat_4","Sat_noon","Sat_5","Sat_6","Sat_7","Sat_8","Sat_9","Sat_A","Sat_B","Sat_C",
"Sun_1","Sun_2","Sun_3","Sun_4","Sun_noon","Sun_5","Sun_6","Sun_7","Sun_8","Sun_9","Sun_A","Sun_B","Sun_C"];
var start=-1;
var end=-1;

var curId;

    
$( document ).ready(function() {
    
    /* alert進入的教室 */
    $(".classBtn").click(function() {
        
        var classroomBtn;// 所在教室
        classroomBtn = this.id;
        
        alert("你進入了 " + classroomBtn + " 教室頁面");
        
    });
    

    /* 在對應的格子放入資料 */
    @foreach ($results as $course)
    
        @if ($course->weekFirst == $dateString)// 篩選出本週的資料
    
            //indexOf()內加上雙引號才會是字串
            start = classTime_array.indexOf("{{$course->start_classTime}}");
            end = classTime_array.indexOf("{{$course->end_classTime}}");
    

            @if (Route::has('login'))
                @if (Auth::check())
                    @if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
                        /* for管理員: 刪除課程按鈕 */
                        var form_delete = $("<form/>", 
                                         { action:"{{ asset('reserve/deleteCourse/'.$course->id) }}",
                                           method:"post",
                                           class:"deleteCourse"
                                         }
                        );
                        form_delete.append( 
                            $("<input/>", 
                                 { type:"hidden",  
                                   name:"_token", 
                                   value:"{{csrf_token()}}" }
                             )
                        );
                        form_delete.append( 
                             $("<input/>", 
                                  { type:"hidden", 
                                    name:"_method", 
                                    value:"delete" }
                               )
                        );
                        form_delete.append( 
                             $("<button>刪除</button>", 
                                  { type:"submit" }
                               )
                        );
                        /* end */

                        //加入刪除課程按鈕至table
                        $("#"+classTime_array[end]).append(form_delete);

                    @endif
                @endif
             @endif
    
    
            // 將資料放入<td>裡 
            for (i = start; i<=end; i++){
                
                $("#"+classTime_array[i]).children("p.cell_id").text("{{$course->id}}");
                $("#"+classTime_array[i]).children("p.cell_content").text("{{$course->content}}");
                $("#"+classTime_array[i]).children("p.cell_teacher").text("{{$course->teacher}}");
                $("#"+classTime_array[i]).children("p.cell_start_classTime").text("{{$course->start_classTime}}");
                $("#"+classTime_array[i]).children("p.cell_end_classTime").text("{{$course->end_classTime}}");
            }
    
        @endif
    @endforeach
    
    

    /* 按下課表內格子顯示cellModal */
    $(".Curriculum").click(function() {
        
        /* 有課程資料的Modal部分用foreach (每個課都有自己的modal，再去對應顯示) */
        
          // 取得<td>中的課程id
          var thisId = $(this).children("p.cell_id").text();
        
          if(thisId == ""){ // 沒資料: 進入新增課程Modal
              $("#cellModal_create").modal("show");
          }else{ // 有資料: 修改Modal
              $("#cellModal"+thisId).modal("show");
              curId = thisId;
          }
          
          /* ps: 可以這樣取<td>內的資料 */
//        var thisId = $(this).children("p.cell_id").text();
//        var thisContent = $(this).children("p.cell_content").text();
//        var thisTeacher = $(this).children("p.cell_teacher").text();
//        var thisStart = $(this).children("p.cell_start_classTime").text();
//        var thisEnd = $(this).children("p.cell_end_classTime").text();

    });
    
    /* 刪除課程按鈕，阻止修改modal被呼叫 */
    $(".deleteCourse").click(function(){
        //終止事件傳導
        event.stopPropagation();
    });
    

    /* 根據目前星期幾，顯示cellModal中不同的select option */
    $(".Curriculum").click(function() {
        
        var thisId = $(this).children("p.cell_id").text();
        
        if(thisId == ""){ // 沒資料: 新增課程Modal
            
            var day = this.id;// 直接取該格子id作為起始結束節次
            
            if(day.match("^Mon")){ // 以"Mon"開頭
                populate_Mon(".select_start");
                populate_Mon(".select_end");
            }
            else if(day.match("^Tue")){
                populate_Tue(".select_start");
                populate_Tue(".select_end");
            }
            else if(day.match("^Wed")){
                populate_Wed(".select_start");
                populate_Wed(".select_end");
            }
            else if(day.match("^Thu")){
                populate_Thu(".select_start");
                populate_Thu(".select_end");
            }
            else if(day.match("^Fri")){
                populate_Fri(".select_start");
                populate_Fri(".select_end");
            }
            else if(day.match("^Sat")){
                populate_Sat(".select_start");
                populate_Sat(".select_end");
            }
            else if(day.match("^Sun")){
                populate_Sun(".select_start");
                populate_Sun(".select_end");
            }
            
            // 設置select中的預設option
            // selected func 參數:(class, 要被selected的節次)
            selected(".select_start", day);
            selected(".select_end", day);
            
        }else{ // 有資料: 修改Modal
            
            var start = $(this).children("p.cell_start_classTime").text();//起始節次
            var end = $(this).children("p.cell_end_classTime").text();//結束節次
            
            if(start.match("^Mon")){ // 以"Mon"開頭
                populate_Mon(".select_start");
                populate_Mon(".select_end");
            }
            else if(start.match("^Tue")){
                populate_Tue(".select_start");
                populate_Tue(".select_end");
            }
            else if(start.match("^Wed")){
                populate_Wed(".select_start");
                populate_Wed(".select_end");
            }
            else if(start.match("^Thu")){
                populate_Thu(".select_start");
                populate_Thu(".select_end");
            }
            else if(start.match("^Fri")){
                populate_Fri(".select_start");
                populate_Fri(".select_end");
            }
            else if(start.match("^Sat")){
                populate_Sat(".select_start");
                populate_Sat(".select_end");
            }
            else if(start.match("^Sun")){
                populate_Sun(".select_start");
                populate_Sun(".select_end");
            }
            
            // 設置select中的預設option
            selected(".select_start", start);
            selected(".select_end", end);
        }
        
        //清空#errorMessage
        $(".errorMessage").text("");
        //提交按鈕恢復正常
        $(".form_submit").prop('disabled', false);

        
        function selected(mClass,day) {
            $(mClass+" [value="+day+"]").prop('selected', true);
        }

        function populate_Mon(selector) {
          $(selector).html(''); // 讓原有select options清空
          $(selector)
            .append('<option value="Mon_1">Mon_1</option>')
            .append('<option value="Mon_2">Mon_2</option>')
            .append('<option value="Mon_3">Mon_3</option>')
            .append('<option value="Mon_4">Mon_4</option>')
            .append('<option value="Mon_noon">Mon_noon</option>')
            .append('<option value="Mon_5">Mon_5</option>')
            .append('<option value="Mon_6">Mon_6</option>')
            .append('<option value="Mon_7">Mon_7</option>')
            .append('<option value="Mon_8">Mon_8</option>')
            .append('<option value="Mon_9">Mon_9</option>')
            .append('<option value="Mon_A">Mon_A</option>')
            .append('<option value="Mon_B">Mon_B</option>')
            .append('<option value="Mon_C">Mon_C</option>')
        }
        function populate_Tue(selector) {
          $(selector).html('');
          $(selector)
            .append('<option value="Tue_1">Tue_1</option>')
            .append('<option value="Tue_2">Tue_2</option>')
            .append('<option value="Tue_3">Tue_3</option>')
            .append('<option value="Tue_4">Tue_4</option>')
            .append('<option value="Tue_noon">Tue_noon</option>')
            .append('<option value="Tue_5">Tue_5</option>')
            .append('<option value="Tue_6">Tue_6</option>')
            .append('<option value="Tue_7">Tue_7</option>')
            .append('<option value="Tue_8">Tue_8</option>')
            .append('<option value="Tue_9">Tue_9</option>')
            .append('<option value="Tue_A">Tue_A</option>')
            .append('<option value="Tue_B">Tue_B</option>')
            .append('<option value="Tue_C">Tue_C</option>')
        }
        function populate_Wed(selector) {
          $(selector).html('');
          $(selector)
            .append('<option value="Wed_1">Wed_1</option>')
            .append('<option value="Wed_2">Wed_2</option>')
            .append('<option value="Wed_3">Wed_3</option>')
            .append('<option value="Wed_4">Wed_4</option>')
            .append('<option value="Wed_noon">Wed_noon</option>')
            .append('<option value="Wed_5">Wed_5</option>')
            .append('<option value="Wed_6">Wed_6</option>')
            .append('<option value="Wed_7">Wed_7</option>')
            .append('<option value="Wed_8">Wed_8</option>')
            .append('<option value="Wed_9">Wed_9</option>')
            .append('<option value="Wed_A">Wed_A</option>')
            .append('<option value="Wed_B">Wed_B</option>')
            .append('<option value="Wed_C">Wed_C</option>')
        }
        function populate_Thu(selector) {
          $(selector).html('');
          $(selector)
            .append('<option value="Thu_1">Thu_1</option>')
            .append('<option value="Thu_2">Thu_2</option>')
            .append('<option value="Thu_3">Thu_3</option>')
            .append('<option value="Thu_4">Thu_4</option>')
            .append('<option value="Thu_noon">Thu_noon</option>')
            .append('<option value="Thu_5">Thu_5</option>')
            .append('<option value="Thu_6">Thu_6</option>')
            .append('<option value="Thu_7">Thu_7</option>')
            .append('<option value="Thu_8">Thu_8</option>')
            .append('<option value="Thu_9">Thu_9</option>')
            .append('<option value="Thu_A">Thu_A</option>')
            .append('<option value="Thu_B">Thu_B</option>')
            .append('<option value="Thu_C">Thu_C</option>')
        }
        function populate_Fri(selector) {
          $(selector).html('');
          $(selector)
            .append('<option value="Fri_1">Fri_1</option>')
            .append('<option value="Fri_2">Fri_2</option>')
            .append('<option value="Fri_3">Fri_3</option>')
            .append('<option value="Fri_4">Fri_4</option>')
            .append('<option value="Fri_noon">Fri_noon</option>')
            .append('<option value="Fri_5">Fri_5</option>')
            .append('<option value="Fri_6">Fri_6</option>')
            .append('<option value="Fri_7">Fri_7</option>')
            .append('<option value="Fri_8">Fri_8</option>')
            .append('<option value="Fri_9">Fri_9</option>')
            .append('<option value="Fri_A">Fri_A</option>')
            .append('<option value="Fri_B">Fri_B</option>')
            .append('<option value="Fri_C">Fri_C</option>')
        }
        function populate_Sat(selector) {
          $(selector).html('');
          $(selector)
            .append('<option value="Sat_1">Sat_1</option>')
            .append('<option value="Sat_2">Sat_2</option>')
            .append('<option value="Sat_3">Sat_3</option>')
            .append('<option value="Sat_4">Sat_4</option>')
            .append('<option value="Sat_noon">Sat_noon</option>')
            .append('<option value="Sat_5">Sat_5</option>')
            .append('<option value="Sat_6">Sat_6</option>')
            .append('<option value="Sat_7">Sat_7</option>')
            .append('<option value="Sat_8">Sat_8</option>')
            .append('<option value="Sat_9">Sat_9</option>')
            .append('<option value="Sat_A">Sat_A</option>')
            .append('<option value="Sat_B">Sat_B</option>')
            .append('<option value="Sat_C">Sat_C</option>')
        }
        function populate_Sun(selector) {
          $(selector).html('');
          $(selector)
            .append('<option value="Sun_1">Sun_1</option>')
            .append('<option value="Sun_2">Sun_2</option>')
            .append('<option value="Sun_3">Sun_3</option>')
            .append('<option value="Sun_4">Sun_4</option>')
            .append('<option value="Sun_noon">Sun_noon</option>')
            .append('<option value="Sun_5">Sun_5</option>')
            .append('<option value="Sun_6">Sun_6</option>')
            .append('<option value="Sun_7">Sun_7</option>')
            .append('<option value="Sun_8">Sun_8</option>')
            .append('<option value="Sun_9">Sun_9</option>')
            .append('<option value="Sun_A">Sun_A</option>')
            .append('<option value="Sun_B">Sun_B</option>')
            .append('<option value="Sun_C">Sun_C</option>')
        }

    });
    
    
    /* form validation: check結束節次應大於起始節次 */
    $(".create_classTime").change(function(){

        var index_start = classTime_array.indexOf($(".select_start option:selected").val());
        var index_end = classTime_array.indexOf($(".select_end option:selected").val());
        
        // alert("index_start: " + index_start);
        // alert("index_end: " + index_end);
        
        if(index_start > index_end){
            $(".form_submit").prop('disabled', true);
            $(".errorMessage").text("起始節次應早於結束節次");
        }else{
            $(".form_submit").prop('disabled', false);
            $(".errorMessage").text("");
        }
        
    });
    $(".modify_classTime").change(function(){
        
        // alert(curId);
        // var getValue = $("#modify_start"+curId).val();
        // alert(getValue);
        var index_start = classTime_array.indexOf($("#modify_start" + curId).val());
        var index_end = classTime_array.indexOf($("#modify_end" + curId).val());
        
        // alert("index_start: " + index_start);
        // alert("index_end: " + index_end);
        
        if(index_start > index_end){
            $(".form_submit").prop('disabled', true);
            $(".errorMessage").text("起始節次應早於結束節次");
        }else{
            $(".form_submit").prop('disabled', false);
            $(".errorMessage").text("");
        }
        
    });
    

});
</script>

@stop
