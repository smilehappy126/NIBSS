@extends('layouts.layout')
@section('title', '借用狀況')
@section('css')
	<style>
/*PC CSS Section*/
	@media screen and (min-width: 900px){
        .Mobilesection{
	    	display: none;
	    }

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
	    .contentdata:hover{
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
	    .note7button{
	    	width: 100%;
	    	transition: 0.3s;
	    	border-width: 0px;
	    	border-radius: 20px;
	    	background-color: #99BBFF;
	    }
	    .note7button:hover{
	    	transition: 0.3s;
	    	background-color: #5599FF;
	    }
	}
/*End of PC section*/
	


/*Mobile CSS Section*/
    @media screen and (max-width: 900px) and (min-width: 300px) and (max-height: 1024px){
        .PCsection{
        	display: none;
        }
        
        #MobileTable{
        	background-color: pink;
        	border-width: 1px;
        }
        .TopTitle{
			background-color: transparent;
			font-family: DFKai-sb;
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
	    	background-color: #99BBFF;
	    }
	    .note7button:hover{
	    	transition: 0.3s;
	    	background-color: #5599FF;
	    }
    }
/*End of Mobile CSS Section*/
    
}
    </style>
	
@stop

@section('content')
<div class="container" style=" padding-top: 0px;">
	<div class="PCsection">
		<div class="TopTitle">借用狀況</div>
		<!-- Table Head -->
		<div class="TableTop">
			<table class="table" id="TitleTable" style="text-align: center; table-layout: fixed;">
				<tr>
					<!-- 序號 -->
					<th style="text-align: center;">
						<button id="idSortButton" type="button" onclick="sortTable(0)" style="border-radius: 100px; border: none; background-color: transparent;">借用序號</button>
					</th>  
					<!-- 日期 -->
	  				<th style="text-align: center;">
						<button id="dateSortButton" type="button" onclick="sortTable(1)" style="border-radius: 100px; border: none; background-color: transparent;">更新日期</button>
					</th>
				    <!-- 班級 -->
	  	    		<th style="text-align: center;">
						<button id="classSortButton" type="submit" onclick="sortTable(2)" style="border-radius: 100px; border: none; background-color: transparent;">班級</button>
					</th>
				    <!-- 申請人 -->
	   				<th style="text-align: center;">
						<button id="nameSortButton" type="submit" onclick="sortTable(3)" style="border-radius: 100px; border: none; background-color: transparent;">申請人</button>
					</th>
					@if (Route::has('login'))
						@if (Auth::check())
							@if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
					<!-- 電話 -->
	   				<th style="text-align: center;">
						<button id="phoneSortButton" type="submit" onclick="sortTable(4)" style="border-radius: 100px; border: none; background-color: transparent;">電話</button>
					</th>
							@endif
	     				@endif
	    			@endif
				 	<!-- 借用物品-->
	   				<th style="text-align: center;">
						<button id="itemSortButton" type="submit" onclick="sortTable(5)" style="border-radius: 100px; border: none; background-color: transparent;">借用物品</button>
					</th>
					<!-- 借用數量 -->
	   				<th style="text-align: center;">
						<button id="itemnumSortButton" type="submit" onclick="sortTable(6)" style="border-radius: 100px; border: none; background-color: transparent;">借用數量</button>
					</th>
					<!-- 抵押證件 -->
	   				<th style="text-align: center;">
						<button id="licenseSortButton" type="submit" onclick="sortTable(7)" style="border-radius: 100px; border: none; background-color: transparent;">抵押證件</button>
					</th>
				    <!-- 授課教室 -->
	   				<th style="text-align: center;">
						<button id="classroomSortButton" type="button" onclick="sortTable(8)" style="border-radius: 100px; border: none; background-color: transparent;">授課教室</button>
					</th>
					<!-- 授課教師 -->
	   				<th style="text-align: center;">
						<button id="teacherSortButton" type="button" onclick="sortTable(9)" style="border-radius: 100px; border: none; background-color: transparent;">授課教師</button>
					</th>
					@if (Route::has('login'))
						@if (Auth::check())
							@if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
					<!-- 備註 -->
					<th style="text-align: center;">
						<button id="note7SortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">備註</button>
					</th>
							@endif
						@endif
	    			@endif
					<!-- 編輯資料 -->
					@if (Route::has('login'))
						@if (Auth::check())
							@if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
	   	 			<th style="text-align: center;">
						<button id="editSortButton" type="button" onclick="sortTable(11)" style="border-radius: 100px; border: none; background-color: transparent;">編輯資料</button>
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
					<!-- 序號 -->
					<td id="id-{{$mis->id}}">{{$mis->id}}</td>
					<!-- 更新日期 -->
					@if(($mis->status)==='待審核')
						<td id="date-{{$mis->id}}">{{$mis->created_at}}</td>
					@elseif(($mis->status)==='借用中')
						<td id="date-{{$mis->id}}">{{$mis->borrowat}}</td>
					@endif
					<!-- 班級 -->
					<td id="class-{{$mis->id}}">{{$mis->class}}</td>
					<!-- 借用者 -->
					@if (Route::has('login'))
						@if (Auth::check())
							@if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
			   					<!-- 是管理員的話可以更改違規點數 -->
			   					<td id="name-{{$mis->id}}">
			   						<button class="UserModalButton" data-toggle="modal" data-target="#UserModal{{$mis->phone}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp; {{$mis->name}}</button>
			   					</td>
			   				@endif
			   				@if( (Auth::user()->level)==='一般使用者' )
			   					<!-- 不是管理員的話不可以更改 -->
			   					<td id="name-{{$mis->id}}">{{$mis->name}}</td>
			   				@endif
			   			@else
			   				<!-- 沒登入的話也不可以更改 -->
			   					<td id="name-{{$mis->id}}">{{$mis->name}}</td>
			   			@endif
	    			@endif
	    			<!-- 借用者電話 -->
					@if (Route::has('login'))
						@if (Auth::check())
							@if( (Auth::user()->level)==='管理員'|| (Auth::user()->level) ==='工讀生')
					<td id="phone-{{$mis->id}}">{{$mis->phone}}</td>
							@endif
						@endif
	    			@endif
	    			<!-- 借用物品 -->
					<td id="item-{{$mis->id}}">{{$mis->item}}</td>
					<!-- 借用數量 -->
					<td id="itemnum-{{$mis->id}}">{{$mis->itemnum}}</td>
					<!-- 抵押證件 -->
					<td id="license-{{$mis->id}}">{{$mis->license}}</td>
					<!-- 借用教室 -->
					<td id="classroom-{{$mis->id}}">{{$mis->classroom}}</td>
					<!-- 指導老師 -->
					<td id="teacher-{{$mis->id}}">{{$mis->teacher}}</td>
					<!-- 備註 -->
					@if (Route::has('login'))
						@if (Auth::check())
							@if( (Auth::user()->level)==='管理員'|| (Auth::user()->level)==='工讀生')
								@if( ($mis->note7)==='無')
									<td></td>
								@else
						<td id="note7-{{$mis->id}}">
							<button class="note7button" type="button" data-toggle="modal" data-target="#Note{{$mis->id}}">
								<span class="glyphicon glyphicon-pencil"></span>
								備註
							</button>
						</td>
								@endif
							@endif
						@endif
	    			@endif
					<!-- 編輯按鈕 -->
					@if (Route::has('login'))
						@if (Auth::check())
							@if( (Auth::user()->level)==='管理員'|| (Auth::user()->level)==='工讀生')
								@if( ($mis->status)==='借用中' )
									<td>
									 	<a href="#" class="btn btn-sm btn-primary" id="edit-message-{{ $mis->id }}" data-toggle="modal" data-target="#myModal{{$mis->id}}">
									 		借用中
									 	</a>
									</td>
								@elseif( ($mis->status)==='待審核' )
									<td>
									 	<a href="#" class="btn btn-sm btn-danger" id="edit-message-{{ $mis->id }}" data-toggle="modal" data-target="#myModal{{$mis->id}}">
									 		待審核
									 	</a>
									</td>
								@endif
							@endif
						@endif
	    			@endif
	    		</tr>
				@endforeach
			</table>
		</div>
		<!-- End of Table Content -->
	</div>
	<!-- End of PCsection -->

	<!-- Mobile Section -->
	<div class="Mobilesection">
		<div class="TopTitle">借用狀況</div>
		<!-- Table -->
		<div>
			@foreach($miss as $mis)
			<table class="table-bordered" id="MobileTable" style="text-align: center; table-layout: fixed; width: 100%; background-color: #FDF5E6;">
				<!-- 序號 -->
				<tr>
					<th class="TableTop" style="text-align: center;">
						<button id="idSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">借用序號</button>
					</th>
					<td class="TableContent" id="id-{{$mis->id}}">
						{{$mis->id}}
					</td>
				</tr>
				<!-- 日期 -->
				<tr> 
	  				<th class="TableTop" style="text-align: center;">
						<button id="dateSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">更新日期</button>
					</th>
					<td class="TableContent" id="date-{{$mis->id}}">
						{{$mis->borrowat}}
					</td>
				</tr>
				<!-- 班級 -->
				<tr>
	  	    		<th class="TableTop" style="text-align: center;">
						<button id="classSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">班級</button>
					</th>
					<td class="TableContent" id="class-{{$mis->id}}">
						{{$mis->class}}
					</td>
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
			   						<button class="UserModalButton" style="width: 130px;" data-toggle="modal" data-target="#UserModal{{$mis->phone}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp; {{$mis->name}}</button>
			   					</td>
			   				@else
			   					<td class="TableContent" id="name-{{$mis->id}}">
									{{$mis->name}}
								</td>
			   				@endif
			   			@endif
			   		@endif
				</tr>
				@if (Route::has('login'))
					@if (Auth::check())
						@if( (Auth::user()->level)==='管理員'||(Auth::user()->level)==='工讀生')
				<!-- 電話 -->
				<tr>
	   				<th class="TableTop" style="text-align: center;">
						<button id="phoneSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">電話</button>
					</th>
					<td class="TableContent" id="phone-{{$mis->id}}">
						{{$mis->phone}}
					</td>
				</tr>
	     				@endif
	    			@endif
	    		@endif
				<!-- 借用物品-->
				<tr>
	   				<th class="TableTop" style="text-align: center;">
						<button id="itemSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">借用物品</button>
					</th>
					<td class="TableContent" id="item-{{$mis->id}}">
						{{$mis->item}}
					</td>
				</tr>
				<!-- 借用數量 -->
				<tr>
	   				<th class="TableTop" style="text-align: center;">
						<button id="itemnumSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">借用數量</button>
					</th>
					<td class="TableContent" id="itemnum-{{$mis->id}}">
						{{$mis->itemnum}}
					</td>
				</tr>
				<!-- 抵押證件 -->
				<tr>
	   				<th class="TableTop" style="text-align: center;">
						<button id="licenseSortButton" type="submit" disabled style="border-radius: 100px; border: none; background-color: transparent;">抵押證件</button>
					</th>
					<td class="TableContent" id="license-{{$mis->id}}">
						{{$mis->license}}
					</td>
				</tr>
				<!-- 授課教室 -->
				<tr>
	   				<th class="TableTop" style="text-align: center;">
						<button id="classroomSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">授課教室</button>
					</th>
					<td class="TableContent" id="classroom-{{$mis->id}}">
						{{$mis->classroom}}
					</td>
				</tr>
				<!-- 授課教師 -->
				<tr>
	   				<th class="TableTop" style="text-align: center;">
						<button id="teacherSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">授課教師</button>
					</th>
					<td class="TableContent" id="teacher-{{$mis->id}}">
						{{$mis->teacher}}
					</td>
				</tr>
			    <!-- 狀態 -->
			    <!-- <tr>
	   				<th class="TableTop" style="text-align: center;">
						<button id="statusSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">狀態</button>
					</th>
					<td class="TableContent" id="status-{{$mis->id}}">
						{{$mis->status}}
					</td>
				</tr> -->
				<!-- 備註 -->
				@if (Route::has('login'))
					@if (Auth::check())
						@if( (Auth::user()->level)==='管理員'|| (Auth::user()->level)==='工讀生')
				<tr>
	   				<th class="TableTop" style="text-align: center;">
						<button id="note7SortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">備註</button>
					</th>
					@if(($mis->note7)==='無')
					<td class="TableContent" id="note7-{{$mis->id}}" ></td>
					@else
					<td class="TableContent" id="note7-{{$mis->id}}" >
						<button class="note7button" type="button" data-toggle="modal" data-target="#Note{{$mis->id}}">
							<span class="glyphicon glyphicon-pencil"></span>
							備註
						</button>
					</td>
					@endif
				</tr>
						@endif
					@endif
	    		@endif
				<!-- 編輯資料 -->
				@if (Route::has('login'))
					@if (Auth::check())
						@if( (Auth::user()->level)==='管理員'|| (Auth::user()->level)==='工讀生')
						<tr>
			   	 			<th class="TableTop" style="text-align: center;">
								<button id="editSortButton" type="button" disabled style="border-radius: 100px; border: none; background-color: transparent;">編輯資料</button>
							</th>
							@if(($mis->status)==='借用中')
								<td class="TableContent">
								 	<a href="#" class="btn btn-sm btn-primary" id="edit-message-{{ $mis->id }}" data-toggle="modal" data-target="#myModal{{$mis->id}}">
								 		借用中
								 	</a>
								</td>
							@elseif( ($mis->status)==='待審核' )
								<td class="TableContent">
								 	<a href="#" class="btn btn-sm btn-danger" id="edit-message-{{ $mis->id }}" data-toggle="modal" data-target="#myModal{{$mis->id}}">
								 		待審核
								 	</a>
								</td>
							@endif
						</tr> 
						@endif
					@endif
	    		@endif
	    	</table>
	    	<br>
	    	@endforeach
		</div>
	 	<!-- End of Table-->
	</div>

	<!-- End of Mobile Section -->


	<!-- Modal Section -->
	
	<!-- Edit Modal -->
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
	           			<form action="{{asset ( '/borrow/update/'.$mis->id) }}" method="post">{{ csrf_field()}}
							<div class="EditInfo">
								<!-- Edit Modal Table -->
								<table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
									<tr><th>借用序號 : </th><th><input  class="form-control" type="text" disabled value="{{ $mis->id}}"> </th></tr>
									<tr>
										<th>更新日期 :</th> 
										<th>
											@if($mis->status==='待審核')
												<input  class="form-control" type="datetime" name="date" value="{{ $mis->created_at }}" disabled>
											@elseif($mis->status==='借用中')
												<input  class="form-control" type="datetime" name="date" value="{{ $mis->borrowat }}">
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
    										<select class="form-control" name="status" value="{{ $mis->status }}" required>
    											<option selected disabled style="display: none;"></option>
    											<option value="借用中">借用中</option>
    											<option value="待審核">待審核</option>
    											@if($mis->status==='借用中')
    											<option value="已歸還">已歸還</option>
    											@endif
    										</select>
    									</th>
    								</tr>
    								<tr><th>備註 :</th><th> <textarea class="form-control" name="note7">{{ $mis->note7 }}</textarea></th></tr>
								</table>
								<!-- End of Edit Modal Table -->
								@if(Auth::check())
								<input name="audit" value="{{Auth::user()->name}}" hidden>
    								<!-- ↑抓取登入使用者的名字，不會顯示在頁面上 -->
    							@endif
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
	@endforeach
	<!-- End of Edit Modal -->
	
	
	<!-- User Modal -->
	@foreach($users as $user)
        <div id="UserModal{{$user->phone}}" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" >
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
                                    <form class="form-horizontal" method="post" action="{{ asset('/borrow/userupdate')}}">
                                     {{ csrf_field() }}
                                    <div class="EditPage">
                                        <div class="EditInfo">
                                            <!-- Edit Modal Table -->
                                            <table class="table" id="contentTable" style="table-layout: fixed; text-align: left; line-height: 10px;">
                                                <tr><th>使用者 : </th><th><label style="text-align: center; width: 100%;">{{ $user->name}}</label> </th></tr>
                                                <tr><th>信箱 :</th> <th><input  class="form-control" type="email" name="email" value="{{ $user->email }}" disabled></th></tr>
                                                <tr><th>電話 :</th> <th><input class="form-control" type="phone" value="{{ $user->phone }}" disabled></th></tr>
                                                <tr><th>違規點數 :</th><th> <input  class="form-control" type="number" name="violation" value="{{ $user->violation }}" min="0"></th></tr>
                                                <tr><th>違規事由 :</th><th> <input  class="form-control" type="text" name="reason" required></th></tr>
                                                <tr><th>權限等級 :</th>
                                                    <th> 
                                                        <input class="form-control" type="text" value="{{ $user->level }}" disabled></th>
                                                    </th>
                                                </tr>
                                            </table>
                                            <!-- End of Edit Modal Table -->
                                            <input name="phone" value="{{$user->phone}}" hidden >
                                            <!-- ↑視為傳遞User phone的變數 不會顯示在頁面上 -->
                                            <input name="username" value="{{$user->name}}" hidden >
                                            <!-- ↑視為傳遞User names的變數 不會顯示在頁面上 -->
                                            @if(Auth::check())
                                            <input name="reasoncreator" value="{{Auth::user()->name}}" hidden >
                                            <!-- ↑視為傳遞Creator的變數 不會顯示在頁面上 -->
                                            @endif
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

    <!-- Note Modal -->

    @foreach($miss as $mis)
    <div class="modal fade" id="Note{{$mis->id}}" role="dialog"  style="height: 600px;">
	    <div class="modal-dialog" >
	    	<!-- Note Modal content-->
	    	<div class="modal-content">
	        	<!-- Note Modal Header -->
	        	<div class="modal-header">
	           		<button type="button" class="close" data-dismiss="modal">&times;</button>
	           		<h4 class="modal-title">備註</h4>
	        	</div>
	        	<!-- End of Edit Modal Header -->
	        	<!-- Edit Modal Body -->
	     		<div class="modal-body">
	        		<div class="EditPage">
	           			<form action="{{asset ( '/borrow/updatenote/'.$mis->id) }}" method="post">{{ csrf_field()}}
							<div class="EditInfo">
								<textarea class="form-control" name="note7">{{$mis->note7}}</textarea>
							</div>
	        		</div>
	        	</div>
	        	<!-- End of Note Modal Body -->
	        	<!-- Modal Footer -->
	        	<div class="modal-footer">
	          		<button type="submit" class="btn btn-default">變更</button>	
	           			</form>
	          		<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
	        	</div>
	        	<!-- End of Note Modal Footer -->
	    	</div>
	    	<!-- End of Note Modal Content -->
	    </div>
	    <!-- End of Note Modal Dialog -->
	</div>
	@endforeach
	<!-- End of Note Modal -->

	<!-- End of Modal Section -->

	<div style="text-align: center;">
		<form action="{{ asset('/borrow') }}" method="get">
			<button class="resetButton" id="testbtn">重新整理</button>
		</form>
	</div>
</div>
<!-- End of Container -->


@endsection

@section('js')
<script>
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
    for (i = 0; i < (rows.length - 1); i++) 
    {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") 
      {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) 
        {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } 
      else if (dir == "desc") 
      {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) 
        {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }//End For Loop
    
    if (shouldSwitch) 
    {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } 
    else 
    {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") 
      {
        dir = "desc";
        switching = true;
      }
    }
  }//End While Loop
}//End Function
</script>
@stop

