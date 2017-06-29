@extends('layouts.layout')
@section('title', '預約狀況')
@section('css')

@stop

@section('content')
  <script>
    window.onload = function(){     
      var cells = document.getElementById('monitor').getElementsByTagName('font');
      var clen = cells.length;
      var currentFirstDate;
      var formatDate = function(date){       
        var year = date.getFullYear()+'年';
        var month = (date.getMonth()+1)+'月';
        var day = date.getDate();
        var week = ['星期天','星期一','星期二','星期三','星期四','星期五','星期六'][date.getDay()]; 
 
        return week+' '+year+month+day;
      };
      var addDate= function(date,n){    
        date.setDate(date.getDate()+n);    
        return date;
      };
      var setDate = function(date){       
        var week = date.getDay()-1;
        date = addDate(date,week*-1);
        currentFirstDate = new Date(date);
 
        for(var i = 0;i<clen;i++){         
          cells[i].innerHTML = formatDate(i==0 ? date : addDate(date,1));
        }        
      };       
      document.getElementById('last-week').onclick = function(){
        setDate(addDate(currentFirstDate,-7));     
      };       
      document.getElementById('next-week').onclick = function(){         
        setDate(addDate(currentFirstDate,7));
      };   
      setDate(new Date());
    }
  </script>
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    選擇教室查看預約情形
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="" onClick="return confirm('I_314描述：  座位數:17-28 基本設備：筆記型電腦(含網路)、投影機、冷氣、麥克風，網路：無線網路，聲音輸入：講桌3.5音源輸入');">I_314</a></li>
    <li><a href="" onClick="return confirm('I_315描述：  座位數:34 基本設備：筆記型電腦(含網路)、投影機、麥克風、冷氣，網路：無線網路、網路孔，聲音輸入：講桌3.5音源輸入');">I_315</a></li>
    <li><a href="" onClick="return confirm('I1_002描述：  座位數:54 基本設備：筆記型電腦(含網路)、投影機、麥克風、冷氣，網路：無線網路、網路孔，聲音輸入：講桌3.5音源輸入');">I1_002</a></li>
    <li><a href="" onClick="return confirm('I1_017描述：  座位數:138-144  基本設備：筆記型電腦(含網路)、投影機、麥克風、冷氣，網路：無線網路，聲音輸入：講桌3.5音源輸入，備註:139-144之座位需自行搬活動椅');">I1_017</a></li>
    <li><a href="" onClick="return confirm('I1_105描述：  座位數:80  基本設備：電子講桌(含網路)、投影機、麥克風、冷氣，網路：無線網路，聲音輸入：講桌3.5音源輸入');">I1_105</a></li>
    <li><a href="" onClick="return confirm('I1_107描述：  座位數:80 基本設備：電子講桌(含網路)、電子白板、投影機、麥克風、冷氣，網路：無線網路，聲音輸入：講桌3.5音源輸入');">I1_107</a></li>
    <li><a href="" onClick="return confirm('I1_223描述：  座位數:15 基本設備：筆記型電腦(含網路)、無線網路、投影機、冷氣，網路：無線網路，聲音輸入：無，備註:本教室無麥克風');">I1_223</a></li>
    <li><a href="" onClick="return confirm('I1_404描述：  座位數:64 基本設備：電子講桌(含網路)、無線網路、投影機、麥克風、冷氣，網路：無線網路，聲音輸入：講桌3.5音源輸入，備註:假日及週間17:00以後不外借');">I1_404</a></li>
  </ul>
</div>
<nav aria-label="...">
  <ul class="pager">
    <li class="previous" id="last-week"><a href="#"><span aria-hidden="true">&larr;</span> 上一週</a></li>
    <li class="next" id="next-week"><a href="#">下一週 <span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav>

	<table BORDER="5" align=center width="1200" height="800" style="border:8px #00BBFF groove;">

	<tr style="font-weight:bold;" id="monitor">
	    <td> </td>
		<td>時間</td>
		<td><font size="3"></td>
		<td><font size="3"></td>
		<td><font size="3"></td>
		<td><font size="3"></td>
		<td><font size="3"></td>
		<td><font size="3"></td>
		<td><font size="3"></td>
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
@endsection

@section('js')

@stop
