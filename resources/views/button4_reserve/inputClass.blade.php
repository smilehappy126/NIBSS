@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')

@stop

@section('content')

<div class="container">

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

<?php
    $date =  new DateTime($weekfirst);
    $pre = strtotime('previous monday', strtotime($date->format('Y-m-d')));
    $next = strtotime('next monday', strtotime($date->format('Y-m-d')));
    
?>

<div class="row">
  

  <form action="{{ asset('/goWeek2') }}" method="post" class="col col-md-2"> 
  {{ csrf_field() }}
    <input type="hidden" value="{{ date('Y-m-d',$pre) }}" name="weekfirst">
    <button type="submit" class="btn btn-primary" name=""><<上一週>></button>
  </form>

  <form action="{{ asset('/goWeek2') }}" method="post" class="col col-md-offset-8 col-md-1"> 
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
      // $date->add(new DateInterval('P1D'));
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

@stop