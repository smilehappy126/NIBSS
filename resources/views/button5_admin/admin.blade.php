@extends('layouts.layout')
@section('title', '管理者模式')
@section('css')
<style type="text/css">

.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
  margin-top:15%;
}

.hovereffect .overlay {
  position: absolute;
  overflow: hidden;
  width: 80%;
  height: 80%;
  left: 10%;
  top: 10%;
  border-bottom: 1px solid #FFF;
  border-top: 1px solid #FFF;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: scale(0,1);
  -ms-transform: scale(0,1);
  transform: scale(0,1);
}

.hovereffect:hover .overlay {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.35s;
  transition: all 0.35s;
}

.hovereffect:hover img {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feComponentTransfer color-interpolation-filters="sRGB"><feFuncR type="linear" slope="0.6" /><feFuncG type="linear" slope="0.6" /><feFuncB type="linear" slope="0.6" /></feComponentTransfer></filter></svg>#filter');
  filter: brightness(0.6);
  -webkit-filter: brightness(0.6);
}

.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 17px;
  background-color: transparent;
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,-100%,0);
  transform: translate3d(0,-100%,0);
}

.hovereffect a, .hovereffect p {
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,100%,0);
  transform: translate3d(0,100%,0);
}

.hovereffect:hover a, .hovereffect:hover p, .hovereffect:hover h2 {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

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
        font-weight: bolder;
    }
    .FormButton{
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
	.FormButton:hover{
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
        height: 35px;
        font-size: 20px;
  }
  .notice{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 100px;
        color: #FF3333;
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
        font-family: DFKai-sb;
        font-size: 60px;
        text-align: center;
        font-weight: bolder;
    }
    .FormButton{
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
        font-size: 40px;
    }
    .FormButton:hover{
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
        height: 35px;
        font-size: 20px;
    }
    .notice{
        font-family: Microsoft JhengHei;
        font-weight: bolder;
        font-size: 100px;
        color: #FF3333;
    }
}

/*End of Mobile CSS Section*/

</style>
@stop

@section('content')
<div class="container" style="width: 100%; padding-top: 0px;">
    <!-- PC Section -->
    <div class="PCsection">
        <div class="TopTitle">
          管理者專區
        </div>
        @if(Auth::check())
    		@if(Auth::user()->level === '管理員')
    			<div class="content" style="position: relative;">
    				<table class="table" style="border: 0px; height: 100%; table-layout: fixed; text-align: center;">
    					<tr>
    						<th>
    							<button class="FormButton" type="button" data-toggle="modal" data-target="#SearchModal">歷史紀錄</button>
    						</th>
    						<th>
    						  <form action=" {{asset('/admin/userlists')}} " method="get" >{{ csrf_field() }}
    						      <button class="FormButton" type="submit">使用者清單</button>
    						  </form>
    						</th>
    					</tr>
    					<tr>
    						<th>
    							<form action=" {{asset('/admin/rule')}} " method="get"> {{ csrf_field() }}
                    <button class="FormButton" type="submit">編輯條例</button>
                  </form>
    						</th>
    						<th>
                  <form action=" {{asset('/admin/item')}}" method="get" >{{ csrf_field() }}
    							   <button class="FormButton" type="submit">可借用物品</button>
                  </form>
    						</th>
    					</tr>
              <tr>
                <th>
                    <button class="FormButton" type="button" data-toggle="modal" data-target="#ViolationModal">違規上限</button>
                </th>
                <th>
                  <form action=" {{asset('/admin/reasons')}}" method="get" >{{ csrf_field() }}
                     <button class="FormButton" type="submit">違規紀錄</button>
                  </form>
                </th>
              </tr>
            </table>
    			</div>
          <!-- End of Content -->
    		@endif
    	@endif
    	
    	@unless(Auth::user()->level === '管理員')
    		<div class="content">
    			<label class="notice">只限管理員使用，請先登入!!!</label>
    		</div>
    	@endunless
    </div>
    <!-- End of PC Section -->

    
    <!-- Mobile Section -->
    <div class="Mobilesection">
        <div class="TopTitle">
          管理者專區
        </div>
        @if(Auth::check())
            @if(Auth::user()->level === '管理員')
                <div class="content" style="position: relative;">
                    <table class="table" style="border: 0px; height: 100%; table-layout: fixed; text-align: center;">
                        <tr>
                            <th>
                                <button class="FormButton" type="button" data-toggle="modal" data-target="#SearchModal">歷史紀錄</button>
                            </th>
                            <th>
                            <form action=" {{asset('/admin/userlists')}} " method="get" >{{ csrf_field() }}
                                <button class="FormButton" type="submit">使用者清單</button>
                            </form>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <form action=" {{asset('/admin/rule')}} " method="get"> {{ csrf_field() }}
                                    <button class="FormButton" type="submit">編輯條例</button>
                                </form>
                            </th>
                            <th>
                                <form action=" {{asset('/admin/item')}}" method="get" >{{ csrf_field() }}
                                    <button class="FormButton" type="submit">可借用物品</button>
                                </form>
                            </th>
                            <tr>
                                <th>
                                    <button class="FormButton" type="button" data-toggle="modal" data-target="#ViolationModal">違規上限</button>
                                </th>
                                <th>
                                    <form action=" {{asset('/admin/reasons')}}" method="get" >{{ csrf_field() }}
                                       <button class="FormButton" type="submit">違規紀錄</button>
                                    </form>
                                </th>
                            </tr>
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
    <!-- End of Mobile Section -->


</div>
<!-- End of Container -->

<!-- ↓↓↓ Modal Section ↓↓↓ -->
    <!-- Search Modal -->
        <div id="SearchModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
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
										<label style="font-family: Microsoft JhengHei; height: 50px;font-size: 30px;">搜尋:&nbsp</label>
                                        <input  class="searchcontent" name="searchcontent" id="searchcontent" type="text"  placeholder="請輸入內容...."  value="" style="width: 70%;" autofocus>
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

        <!-- Violation Modal -->
        <div id="ViolationModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" style="opacity: 0.9;">
            <div class="modal-dialog">

                    <!-- Violation Modal content-->
                    <div class="modal-content">
                        <!-- Begin of Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div id="ViolationPage">
                               <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">違規次數 </h4>
                            </div>
                        </div>
                        <!-- End of Modal Header -->

                        <!-- Begin of Modal Body -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <form action="{{ asset ('/admin/violationupdate')}}" method="post" style="width: 100%; text-align: center;">{{ csrf_field()}}
                                        <label style="font-family: Microsoft JhengHei; height: 50px;font-size: 30px; text-align: center;">規則制定者&nbsp:&nbsp{{$violations[0]->creator}}<br></label>
                                        <label style="font-family: Microsoft JhengHei; height: 50px;font-size: 30px;">
                                        違規次數超過&nbsp</label>
                                        <input  class="form-group" name="violationcontent" id="violationcontent" type="number" value="{{$violations[0]->violationnum}}" style="width: 12%; font-family: Microsoft JhengHei" autofocus>
                                        <label style="font-family: Microsoft JhengHei; height: 50px;font-size: 30px;">(包含)</label><br>
                                        <label style="font-family: Microsoft JhengHei; height: 50px;font-size: 30px; color: red;">立即停權</label>
                                        <input type="text" name="violationuser" value="{{ Auth::user()->name}}" style="display: none;">
                                </div>    
                            </div>
                        </div>

                        <!--  End of Modal Body -->

                        <!-- Begin of Modal Footer -->
                        <div class="modal-footer">
                              <div class="form-group">
                                    <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">變更</button>
                                    <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                              </div>
                        </div>
                        <!-- End of Modal Footer -->
                                </form>
                    </div>
                    <!-- End of Violation Modal Conent -->
            </div>
        </div>        
        <!-- End of Violation Modal -->

<!-- ↑↑↑ End of Modal Section ↑↑↑ -->


@endsection

@section('js')

@stop