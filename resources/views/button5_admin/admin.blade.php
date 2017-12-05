@extends('layouts.layout')
@section('title', '管理者模式')
@section('css')
<style type="text/css">
	.Search{
		border: 0px;
		border-radius: 8px;
		background-color: pink;
		left: 0px;
		right: 0px;
		width: 100%;
		height: 100%;
		bottom: :0;
		float: left;
		font-family: Microsoft JhengHei;
		font-size: 80px;
	}
	.Search:hover{
		background-color: #FF8888;
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
	.searchButton:hover{
	    background-color: #DDDDDD;
    }
    .searchcontent{
    	height: 80px;
    	font-size: 50px;
    }
    .notice{
    	font-family: Microsoft JhengHei;
    	font-weight: bolder;
    	font-size: 100px;
    	color: #FF3333;
    }

</style>
@stop

@section('content')
<div class="container" style="width: 80%;">
	@if(Auth::check())
		@if(Auth::user()->level === '管理員')
			<div class="content" style="position: relative;">
				<table class="table" style="border: 0px; height: 100%; table-layout: fixed; text-align: center;">
					<tr>
						<th>
							<button class="Search" type="button" data-toggle="modal" data-target="#SearchModal">搜尋</button>
						</th>
						<th>
						<form action=" {{asset('/admin/userlists')}} " method="get" >{{ csrf_field() }}
						<button class="Search" type="submit">使用者</button>
						</form>
						</th>
					</tr>
					<tr>
						<th>
							<button class="Search" type="button">3</button>
						</th>
						<th>
							<button class="Search" type="button">4</button>
						</th>
					</tr>
				</table>
			</div>
		@endif
	@endif
	
	@unless(Auth::user()->level === '管理員')
		<div class="content">
			<label class="notice">只限管理員使用，請先登入!!!</label>
		</div>
	@endunless
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
                                    <form action="{{ asset ('/borrow/searchall')}}" method="post" style="width: 100%;">{{ csrf_field()}}
										<input  class="searchcontent" name="searchcontent" id="searchcontent" type="text"  placeholder="請輸入內容...."  value="" style="width: 100%;">
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

        <!-- User Modal -->
        <div id="UserModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" style="opacity: 0.9;">
            <div class="modal-dialog">

                    <!-- User Modal content-->
                    <div class="modal-content">
                        <!-- Begin of Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="UserPage">
                               <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">使用者 User</h4>
                            </div>
                        </div>
                        <!-- End of Modal Header -->

                        <!-- Begin of Modal Body -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <table class="table" style="table-layout: fixed; text-align: center; font-family: Microsoft JhengHei;">
                                    	
                                    		<th style="text-align: center;">使用者</th>
                                    		<th style="width: 180px; text-align: center;">信箱</th>
                                    		<th style="text-align: center;">權限等級</th>
                                    		<th style="text-align: center;">違規次數</th>
                                    	
                                    </table>
                                    @foreach($users as $users)
                                    <table class="table" style="table-layout: fixed; text-align: center; font-family: Microsoft JhengHei;">
                                    	<th style="text-align: center;">{{ $users->name }}</th>
                                    	<th style="width: 180px; text-align: center;">{{ $users->email }}</th>
                                    	<th style="text-align: center;">{{ $users->level }}</th>
                                    	<th style="text-align: center;">{{ $users->violation }}</th>

                                    </table>

                                    @endforeach
		                        </div>    
                            </div>
                        </div>

                        <!--  End of Modal Body -->

                        <!-- Begin of Modal Footer -->
                        <div class="modal-footer">
                              <div class="form-group">
                                    <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">User</button>
                                    <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                              </div>
                        </div>
                        <!-- End of Modal Footer -->
                                
                    </div>
                    <!-- End of User Modal Conent -->
            </div>
        </div>        
        <!-- End of User Modal -->

<!-- ↑↑↑ End of Modal Section ↑↑↑ -->


@endsection

@section('js')

@stop