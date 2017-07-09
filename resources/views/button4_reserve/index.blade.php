@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')

@stop

@section('content')

<div class="container">
<button type="button" class="btn btn-link">
<a href="{{ asset('/newclassroom') }}"><div>新增教室資料</div></a>
</button>
@foreach ($classrooms as $classroom)
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $classroom->roomname }}">{{ $classroom->roomname }}</button>
   
   <div class="modal fade" id="{{ $classroom->roomname }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  </div>
@endforeach

  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#I_315">I_315</button>
   
   <div class="modal fade" id="I_315" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">I_315</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        I_315描述：  座位數:34 基本設備：筆記型電腦(含網路)、投影機、麥克風、冷氣，網路：無線網路、網路孔，聲音輸入：講桌3.5音源輸入
        <img id="image" src="1234.jpg" height="200" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#I1_002">I1_002</button>
   
   <div class="modal fade" id="I1_002" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">I1_002</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        I1_002描述：  座位數:54 基本設備：筆記型電腦(含網路)、投影機、麥克風、冷氣，網路：無線網路、網路孔，聲音輸入：講桌3.5音源輸入
        <img id="image" src="1234.jpg" height="200" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#I1_017">I1_017</button>
   
   <div class="modal fade" id="I1_017" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">I1_017</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        I1_017描述：  座位數:138-144  基本設備：筆記型電腦(含網路)、投影機、麥克風、冷氣，網路：無線網路，聲音輸入：講桌3.5音源輸入，備註:139-144之座位需自行搬活動椅
        <img id="image" src="1234.jpg" height="200" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#I1_105">I1_105</button>
   
   <div class="modal fade" id="I1_105" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">I1_105</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        I1_105描述：  座位數:80  基本設備：電子講桌(含網路)、投影機、麥克風、冷氣，網路：無線網路，聲音輸入：講桌3.5音源輸入
        <img id="image" src="1234.jpg" height="200" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#I1_107">I1_107</button>
   
   <div class="modal fade" id="I1_107" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">I1_107</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        I1_107描述：  座位數:80 基本設備：電子講桌(含網路)、電子白板、投影機、麥克風、冷氣，網路：無線網路，聲音輸入：講桌3.5音源輸入
        <img id="image" src="1234.jpg" height="200" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#I1_223">I1_223</button>
   
   <div class="modal fade" id="I1_223" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">I1_223</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        I1_223描述：  座位數:15 基本設備：筆記型電腦(含網路)、無線網路、投影機、冷氣，網路：無線網路，聲音輸入：無，備註:本教室無麥克風
        <img id="image" src="1234.jpg" height="200" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#I1_404">I1_404</button>
   
   <div class="modal fade" id="I1_404" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">I1_404</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        I1_404描述：  座位數:64 基本設備：電子講桌(含網路)、無線網路、投影機、麥克風、冷氣，網路：無線網路，聲音輸入：講桌3.5音源輸入，備註:假日及週間17:00以後不外借
        <img id="image" src="1234.jpg" height="200" width="400">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- </div> -->
<br>
  <!-- <img id="image" src="1234.jpg" height="200" width="400"> --> 

<?php
    $date =  new DateTime($weekfirst);
    $pre = strtotime('previous monday', strtotime($date->format('Y-m-d')));
    $next = strtotime('next monday', strtotime($date->format('Y-m-d')));
    
?>

<div class="row">
  

  <form action="{{ asset('/goWeek') }}" method="post" class="col col-md-2"> 
  {{ csrf_field() }}
    <input type="hidden" value="{{ date('Y-m-d',$pre) }}" name="weekfirst">
    <button type="submit" class="btn btn-primary" name=""><<上一週>></button>
  </form>

  <form action="{{ asset('/goWeek') }}" method="post" class="col col-md-offset-8 col-md-1"> 
    {{ csrf_field() }}
      <input type="hidden" value="{{date('Y-m-d',$next)}}" name="weekfirst" >
      <button type="submit" class="btn btn-primary" name=""><<下一週>></button>
    </form>
</div>

  <table BORDER="5" align=center width="1200" height="800" class="table table-bordered" style="border:8px #00BBFF groove;">

  <tr style="font-weight:bold;" id="monitor">
      <td> </td>
    <td>時間</td>
    
    <td>
    星期一 <br>
    <?php
      echo $date->format('Y-m-d');
      $date->add(new DateInterval('P1D'));
    ?>
    </td>
    <td>
    星期二 <br>
    <?php
      echo $date->format('Y-m-d');
      $date->add(new DateInterval('P1D'));
    ?>
    </td>
    <td>
    星期三 <br>
    <?php
      echo $date->format('Y-m-d');
      $date->add(new DateInterval('P1D'));
    ?>
    </td>
    <td>
    星期四 <br>
    <?php
      echo $date->format('Y-m-d');
      $date->add(new DateInterval('P1D'));
    ?>
    </td>
    <td>
    星期五 <br>
    <?php
      echo $date->format('Y-m-d');
      $date->add(new DateInterval('P1D'));
    ?>
    </td>
    <td>
    星期六 <br>
    <?php
      echo $date->format('Y-m-d');
      $date->add(new DateInterval('P1D'));
    ?>
    </td>
    <td>
    星期日 <br>
    <?php
      echo $date->format('Y-m-d');
      $date->add(new DateInterval('P1D'));
    ?>
    </td>
    
    

  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">1</td>
    <td>0800
至
0850</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">2</td>
    <td>
0900
至
0950</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">3</td>
    <td>
1000
至
1050</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">4</td>
    <td>
1100
至
1150</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">午休</td>
    <td>
1200
至
1250</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>

  <tr>
  <td style="font-weight:bold;"><font size="3">5</td>
    <td>1300
至
1350</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">6</td>
    <td>1400
至
1450</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">7</td>
    <td>1500
至
1550</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">8</td>
  <td>
1600
至
1650</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">9</td>
    <td>
1700
至
1750</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>

  <tr>
  <td style="font-weight:bold;"><font size="3">A</td>
    <td>1800
至
1850
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">B</td>
    <td>1900
至
1950</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td style="font-weight:bold;"><font size="3">C</td>
    <td>2000
至
2050</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  
    
  </table>
  </div>
@endsection

@section('js')
<script>

  </script>
  
@stop
