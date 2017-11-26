@extends('layouts.layout')
@section('title', '借用狀況')
@section('css')
	<style>
	.TopTitle{
	background-color: transparent;
	font-family: DFKai-sb;
	font-size: 80px;
	text-align: center;
	}
	.search{
	background-color: transparent;
	font-family:  Microsoft JhengHei;
	text-align:right;
	
	font-weight: bold;
	}
	.searchButton{
	width: 41px;
    height: 28px;
    font-size: 12px;
    font-weight: bold;
    text-align: left;
    border: 0px;
    transition: 0.3s;
    cursor: pointer;
    background-color: transparent;
    font-family:  Microsoft JhengHei;
    border-radius: 5px;	
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
	background-color: transparent;
	font-family: Microsoft JhengHei;
	transition: 0.3s;
    cursor: pointer;
    border: 0px;
	}
	.EditButton:hover{
	background-color: #FF5511;
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
    width: 20px;
    height: 20px;
    font-size: 12px;
    font-weight: bold;
    text-align: left;
    border: 0px;
    transition: 0.3s;
    cursor: pointer;
    background-color: transparent;
    border-radius: 5px;	
    }
    #content:hover{
    background-color: #CCBBFF;
    }
    .sortButton:hover{
    background-color: #DDDDDD;
    }
    .searchButton:hover{
    background-color: #DDDDDD;
    }
    .resetButton{
    width:100px	;
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
    
}
   
    </style>
	
@stop

@section('content')
<div class="container">
	<div class="TopTitle">借用狀況</div>
	<!-- 透過名字搜尋 -->
	<div class="search">
		<form action="{{ asset ('/borrow/searchName')}}" method="post" style="width: 100%;">{{ csrf_field()}}
			<input  name="searchname" id="searchname" type="text"  placeholder="請輸入名字...."  value="" style="width: 20%;">
			<button class="searchButton" id="searchButton" type="submit">搜尋</button>
		</form>
	</div>

	<!-- Table Head -->
	<div class="TableTop">
		<table class="table" style="text-align: center; table-layout: fixed;">
			<tr>	
				<!-- 序號 -->
				<th style="text-align: center;">租借序號<br>
		   			<form action="{{ asset ('/borrow/idasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   		   			<form action="{{ asset ('/borrow/iddesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
   				</th>   	    
				<!-- 日期 -->
  				<th style="text-align: center;">租借日期<br>
   		   			<form action="{{ asset ('/borrow/dateasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	       			<form action="{{ asset ('/borrow/datedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
			    <!-- 班級 -->
  	    		<th style="text-align: center;">班級<br>
 	       			<form action="{{ asset ('/borrow/classasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
       	   			<form action="{{ asset ('/borrow/classdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
			    <!-- 申請人 -->
   				<th style="text-align: center;">申請人<br>
    	   			<form action="{{ asset ('/borrow/nameasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   		   			<form action="{{ asset ('/borrow/namedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
				@if (Route::has('login'))
					@if (Auth::check())
				<!-- 電話 -->
   				<th style="text-align: center;">電話<br>
    	   			<form action="{{ asset ('/borrow/phoneasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   		   			<form action="{{ asset ('/borrow/phonedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
     				@endif
    			@endif
			 	<!-- 借用物品-->
   				<th style="text-align: center;">借用物品<br>
   		   			<form action="{{ asset ('/borrow/itemasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	   	   			<form action="{{ asset ('/borrow/itemdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
				<!-- 借用數量 -->
   				<th style="text-align: center;">借用數量<br>
    	   			<form action="{{ asset ('/borrow/itemnumasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   		   			<form action="{{ asset ('/borrow/itemnumdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
				<!-- 抵押證件 -->
   				<th style="text-align: center;">抵押證件<br>
    	   			<form action="{{ asset ('/borrow/licenseasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   		   			<form action="{{ asset ('/borrow/licensedesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
			    <!-- 授課教室 -->
   				<th style="text-align: center;">授課教室<br>
   		   			<form action="{{ asset ('/borrow/classroomasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   		   			<form action="{{ asset ('/borrow/classroomdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
				<!-- 授課教室 -->
   				<th style="text-align: center;">授課教師<br>
   		  			<form action="{{ asset ('/borrow/teacherasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   		   			<form action="{{ asset ('/borrow/teacherdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
			    <!-- 狀態 -->
   				<th style="text-align: center;">狀態<br>
   		   			<form action="{{ asset ('/borrow/statusasc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↑</button></form>&emsp;
   	       			<form action="{{ asset ('/borrow/statusdesc') }}" method="get" style="display: inline-block;">{{ csrf_field()}}<button class="sortButton" type="submit">↓</button></form>
     	   		</th>
				@if (Route::has('login'))
					@if (Auth::check())
						@if( (Auth::user()->email)==='test@cc.ncu.edu.tw')
				<!-- 編輯資料 -->
   	 			<th style="text-align: center;">編輯資料</th>
			</tr> 
						@endif
					@endif
    			@endif
    	</table>
    </div>
    <!-- End of Table Head -->

	<!-- Table Content -->
	@foreach($miss as $mis)
	
	<div class="TableContent">
		<table class="table" id="content" style="table-layout: fixed; text-align: center" >
			<tr>
				<td>{{$mis->id}}</td>
				<td>{{$mis->date}}</td>
				<td>{{$mis->class}}</td>
				<td>{{$mis->name}}</td>
				@if (Route::has('login'))
					@if (Auth::check())
				<td>{{$mis->phone}}</td>
					@endif
    			@endif
				<td>{{$mis->item}}</td>
				<td>{{$mis->itemnum}}</td>
				<td>{{$mis->license}}</td>
				<td>{{$mis->classroom}}</td>
				<td>{{$mis->teacher}}</td>
				<td>{{$mis->status}}</td>
				@if (Route::has('login'))
					@if (Auth::check())
						@if( (Auth::user()->name)==='admin')
				<td>
				 	<a href="#" class="btn btn-sm btn-primary" id="edit-message-{{ $mis->id }}" data-toggle="modal" data-target="#myModal{{$mis->id}}">
				 		<span class="glyphicon glyphicon-pencil"></span> 編輯
				 	</a>
				</td>
						@endif
					@endif
    			@endif
			</tr>
		</table>
	</div>
	<!-- End of Table Content -->





	<!-- Modal 浮現式視窗-->
	<div class="modal fade" id="myModal{{$mis->id}}" role="dialog"  style="height: 600px;">
	    <div class="modal-dialog" >
	    	<!-- Edit Modal content-->
	    	<div class="modal-content">
	        	<!-- Edit Modal Header -->
	        	<div class="modal-header">
	           		<button type="button" class="close" data-dismiss="modal">&times;</button>
	           		<h4 class="modal-title">租借詳細資料</h4>
	        	</div>
	        	<!-- End of Edit Modal Header -->
	        	<!-- Edit Modal Body -->
	     		<div class="modal-body">
	        		<div class="EditPage">
	           			<form action="{{asset ( '/borrow/update/'.$mis->id) }}" method="post">{{ csrf_field()}}
							<div class="EditInfo">
								<!-- Edit Modal Table -->
								<table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
									<tr><th>租借序號 : </th><th><input  class="form-control" type="text" disabled value="{{ $mis->id}}"> </th></tr>
									<tr><th>租借日期 :</th> <th><input  class="form-control" type="date" name="date" value="{{ $mis->date }}"></th></th>
									<tr><th>班級 :</th><th> <input  class="form-control" type="text" name="class" value="{{ $mis->class }}"></th></tr>
    								<tr><th>申請人 : </th><th> <input  class="form-control" type="text" name="name" value="{{ $mis->name }}"></th></tr>
    								<tr><th>電話 : </th><th> <input  class="form-control" type="text" name="phone" value="{{ $mis->phone }}"></th></tr>
    								<tr><th>借用物品 :</th> <th> <input  class="form-control" type="text" name="item" value="{{ $mis->item }}"> </th></tr>
    								<tr><th>借用數量 :</th><th><input class="form-control" type="number" name="itemnum" value="{{ $mis->itemnum }}"></th></tr>
    								<tr><th>抵押證件 :</th><th> <input class="form-control" type="text" name="license" value="{{ $mis->license }}"></th></tr>
    								<tr><th>授課教室 :</th><th> <input class="form-control" type="text" name="classroom" value="{{ $mis->classroom }}"></th></tr>
    								<tr><th>授課教師 :</th><th> <input  class="form-control" type="text" name="teacher" value="{{ $mis->teacher }}"></th></tr>
    								<tr><th>狀態 :</th>
    									<th> 
    										<select class="form-control" name="status" value="{{ $mis->status }}">
    											<option value="已歸還">已歸還</option><option value="借用中">借用中</option>
    										</select>
    									</th>
    								</tr>
								</table>
								<!-- End of Edit Modal Table -->
							</div>
	        		</div>
	        	</div>
	        	<!-- End of Edit Modal Body -->
	        	<!-- Modal Footer -->
	        	<div class="modal-footer">
	          		<button type="submit" class="btn btn-default">變更</button>	
	           			</form>
	          		<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
	        	</div>
	        	<!-- End of Edit Modal Footer -->
	    	</div>
	    	<!-- End of Edit Modal Content -->
	    </div>
	    <!-- End of Edit Modal Dialog -->
	</div>
	<!-- End of Edit Modal -->
	@endforeach
	<!-- End of Foreach -->

	<div style="text-align: center;">
		<form action="{{ asset('/borrow') }}" method="get">
			<button class="resetButton" id="testbtn">重新整理</button>
		</form>
	</div>
</div>
<!-- End of Container -->


@endsection

@section('js')
<!-- <script>
$(document).ready(function(){
	$('#testbtn').on('click',function(){
		$('#searchname').attr('value','21313');
		console.log($('#searchname').attr('name'));
		console.log($('#searchname').val());
		$('#searchButton').html("123");
	});
});

</script> -->
@stop

