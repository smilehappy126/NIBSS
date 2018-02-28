<style type="text/css">
            
            
            .portal{
                background-color: transparent;
                transition: 0.3s;
                width: 140px;
                height: 20px;
                border-radius: 100px;
                cursor: pointer;
                border-width: 0px;
                font-size: 15px;
                font-weight: bold;
            }
            .portal:hover{
                background-color: #B0E0E6;
                width: 160px;
                height: 20px;
                transition: 0.3s;
            }
            .RegisterButton{
                background-color: transparent;
                transition: 0.3s;
                width: 140px;
                height: 20px;
                border-radius: 100px;
                cursor: pointer;
                border-width: 0px;
                font-size: 15px;
                font-weight: bold;
            }
            .RegisterButton:hover{
                background-color: #FF8888;
                width: 160px;
                height: 20px;
                transition: 0.3s;
            }
            /*子選單*/
            /* 將子選單加入+號 */
            li.dropdown-submenu>a:after{
                display:block;
                  content:"+";
                  float:right;
                  font-size: 15px;
                  margin-top:-1px;
                  margin-left:5px;
                  border: solid 1px #ccc;
                  padding:0 4px;
                  border-radius: 3px;
            }
            /* 選單開啟時變- */
            li.dropdown-submenu.open>a:after{
                  content:"-";
            }
            li.open ul.dropdown-menu>li.open>ul.dropdown-menu{
                  position: relative;
                  border: 0;
                  border-radius: 0;
                  box-shadow: none;
            }
            li.open ul.dropdown-menu>li.open>ul.dropdown-menu>li{
                  padding-left: 20px;
            }
            
            /* 滑入選單時變換底色 */  
            .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
                  background: rgba(0,0,0,0.1) !important;
            }
            .portal{
                background-color: transparent;
                transition: 0.3s;
                width: 140px;
                height: 20px;
                border-radius: 100px;
                cursor: pointer;
                border-width: 0px;
                font-size: 15px;
                font-weight: bold;
            }
            .portal:hover{
                background-color: #B0E0E6;
                width: 160px;
                height: 20px;
                transition: 0.3s;
            }
        
    /*PC CSS Section*/
    @media screen and (min-width: 900px){
            .MobileSection{
                display: none;
            }
            .adminpage{
                border-width: 0px;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 600;
                font-family: Microsoft JhengHei;
                color: rgb(255, 145, 145);
                background-color:transparent;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .SearchButton{
                transition: 0.3s;
                cursor: pointer;
                font-family: Microsoft JhengHei;
                font-size: 20px;
                font-weight: bolder;
                border-width: 0px;
                width: 100px;
                height: 40px;
                border-radius: 100px;
                background-color: #78B7BB;
            }
            .SearchButton:hover{
                transition: 0.3s;
                width: 120px;
                background-color: #3F7B70;
            }
            .LoginButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 20px;
                background-color: #B0C4DE;
                width: 100px;
                height: 40px;
                border-radius: 100px;
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
            }
            .LoginButton:hover{
                background-color: #CCDDFF;
                width:120px;
                transition: 0.3s;
            }
            .LogoutButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 20px;
                background-color:#FFE4B5;
                width: 100px;
                height: 40px;
                border-radius: 100px;
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
            }
            .LogoutButton:hover{
                background-color:#F4A460;
                width:120px;
                transition: 0.3s;
            }
            .brButton{
                float: right;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 20px;
                background-color:#CCCCFF;
                width: 200px;
                height: 40px;
                border-radius: 100px; 
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
            }
            .brButton:hover{
                background-color: #E8CCFF;
                width:210px;
                transition: 0.3s;

            }
    }
    /*End of PC CSS Section*/


    /*Mobile CSS Section*/
        @media screen and (max-width: 900px) and (min-width: 300px) and (max-height: 1024px){
            .PCSection{
                display: none;
            }
            .adminpage{
                border-width: 0px;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 600;
                font-family: Microsoft JhengHei;
                color: rgb(255, 145, 145);
                background-color:transparent;
                text-align: left;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .SearchButton{
                transition: 0.3s;
                cursor: pointer;
                font-family: Microsoft JhengHei;
                font-size: 20px;
                font-weight: bolder;
                border-width: 0px;
                width: 80px;
                height: 40px;
                border-radius: 100px;
                background-color: #78B7BB;
            }
            .SearchButton:hover{
                transition: 0.3s;
                width: 90px;
                background-color: #3F7B70;
            }
            .LoginButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 16px;
                background-color: #B0C4DE;
                width: 80px;
                height: 40px;
                border-radius: 100px;
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
            }
            .LoginButton:hover{
                background-color: #CCDDFF;
                width:100px;
                transition: 0.3s;
            }
            .LogoutButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 16px;
                background-color:#FFE4B5;
                width: 80px;
                height: 40px;
                border-radius: 100px;
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
            }
            .LogoutButton:hover{
                background-color:#F4A460;
                width:100px;
                transition: 0.3s;
            }
            .brButton{
                float: right;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 16px;
                background-color:#CCCCFF;
                width: 180px;
                height: 40px;
                border-radius: 100px; 
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
            }
            .brButton:hover{
                background-color: #E8CCFF;
                width:200px;
                transition: 0.3s;

            }
        }
    /*End of Mobile CSS Section*/
</style>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header"> 
      
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <button type="button" class="navbar-toggle btn btn-default" onclick="location.href='/'">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        </button> -->
      <a class="navbar-brand" href="{{ url('/') }}">
        <img alt="Brand" src="{{asset('img/layout/mis.png')}}">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @if(Auth::check())
        <li><a href="{{ url('/create') }}">新增申請單</a></li>
        @endif  
        <li><a href="{{ url('/borrow') }}">借用狀況</a></li>
        <li><a href="{{ url('/return') }}">已歸還資料</a></li>
        <li><a href="{{ url('/reserve') }}">教室預約狀況</a></li>
        <!-- 管理者模式 -->
        @if (Route::has('login'))
            @if(Auth::check())
                @if( (Auth::user()->level)==='管理員')   
                    <li>
                        <a  style="color: rgb(255, 145, 145); font-family: Microsoft JhengHei;" href="{{ url('/admin') }}">管理者專區</a>
                    </li>
                @endif
            @else
                <br><br>
            @endif
        @endif
        @if (Route::has('login'))
            @if(Auth::check())
                @if( (Auth::user()->level)==='管理員')
        <!-- PC版本 搜尋放左邊 -->
        <div class="PCSection">
            <li style="right: 350px; bottom:6px; position: absolute;"><button class="SearchButton" type="button" data-toggle="modal" data-target="#SearchModal">搜尋</button></li> 
        </div>
        <!-- Mobile版本 搜尋放左邊 -->
        <div class="MobileSection">
            <li><button class="SearchButton" type="button" data-toggle="modal" data-target="#SearchModal">搜尋</button></li> 
        </div>
               @endif
            @endif
        @endif
        <!-- PC版本 書籍借用放中間 -->
        <div class="PCSection">
            <li style="right: 134px; bottom:6px; position: absolute;"><button class="brButton" type="button" onclick="location.href='http://140.115.80.30:81/phpbook/'">書籍借用與預約系統</button></li> 
        </div>
        <!-- Mobile版本 書籍借用放中間 -->
        <div class="MobileSection">
            <li style="right: 100px; bottom:6px; position: absolute;"><button class="brButton" type="button" onclick="location.href='http://140.115.80.30:81/phpbook/'">書籍借用與預約系統</button></li> 
        </div>
    <!-- PC版本登入登出 -->
        <!-- 登出登入按鍵 -->
        @if (Route::has('login'))
                <div class="top-right links PCSection">
                    @if (Auth::check())
                        <form action=" {{ asset('/logout') }}" method="post" >{{ csrf_field() }} 
                          <li class="dropdown-submenu" style="right: 20px; bottom:6px; position: absolute;">
                            <button class="LogoutButton" type="submit">Logout </button>
                          </li>  
                        </form>
                    @else
                        
                    @endif
                </div>
            @endif
        @unless(Auth::check())
            <div class="LoginPanel PCSection">
                <!-- Trigger the LoginModal with a button -->
                <li style="right: 20px; bottom:6px; position: absolute;">
                    <a>
                        <button class="LoginButton" type="button" data-toggle="modal" data-target="#LoginModal">Login</button>
                    </a>
                </li>
            </div>
        @endunless
    <!-- PC版本結束 -->
    
    <!-- Mobile版本登入登出 -->
        <!-- 登出登入按鍵 -->
        @if (Route::has('login'))
                <div class="links MobileSection">
                    @if (Auth::check())
                        <form action=" {{ asset('/logout') }}" method="post" >{{ csrf_field() }} 
                          <li class="dropdown-submenu" style="right: 10px; bottom: 6px; position: absolute;">
                            <button class="LogoutButton" type="submit">Logout </button>
                          </li>  
                        </form>
                    @endif
                </div>
        @endif
        @unless(Auth::check())
            <div class="MobileSection">
                <!-- Trigger the LoginModal with a button -->
                <li style="right: 10px; bottom:6px; position: absolute;">
                    <a>
                        <button class="LoginButton" type="button" data-toggle="modal" data-target="#LoginModal">Login</button>
                    </a>
                </li>
            </div>
        @endunless

    <!-- Mobile版本登入登出結束 -->

      </ul>
      <!-- 搜尋功能 -->
      <!-- <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  	



    <!-- Modal Section -->
     
     <!-- Login Modal -->
        <div id="LoginModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
                <!-- Login Modal content-->
                <div class="modal-content">
                    <!-- Begin of Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div id="LoginPage">
                            <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">登入 Login</h4>
                        </div>
                    </div>
                    <!-- End of Modal Header -->

                    <!-- Begin of Modal Body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <form class="form-horizontal" action=" {{ asset('/loginNow') }} " method="post">
                                    <!-- Login Email -->
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="text-align: center;">
                                        <label class="col-md-4 control-label" for="email" style="font-weight: bold; ">電子信箱</label>{{ csrf_field() }} 
                                        <div class="col-md-6">
                                            <input class="LoginInput" type="email" name="email" id="email"  value="{{ old('email') }}" style="display: inline-block; font-size : 15px;font-family: Microsoft JhengHei;font-weight: bold;" required autofocus></input>
                                                    <!-- @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif -->
                                        </div> 
                                    </div>
                                    <!-- Login 密碼 -->
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}" style="text-align: center;">
                                        <label class="col-md-4 control-label" for="password" style="font-weight: bold;">密碼</label>{{ csrf_field() }} 
                                        <div class="col-md-6">
                                            <input type="password" name="password" id="password"  value="" style="display: inline-block; font-size: 15px;font-family: Microsoft JhengHei; font-weight: bold;" required>
                                                    <!-- @if ($errors->has('LoginPassword'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif -->
                                        </div>
                                        <br>
                                    </div>
                                    <!-- 額外功能區 -->
                                    <div class="form-group" align="center">
                                        <!-- 透過Portal登入的按鈕 -->
                                        <button class="portal" type="button" onclick="location.href='/signin'">Portal登入</button>
                                        <br><br>
                                        <!-- 註冊 -->
                                        <button class="RegisterButton" id="RegisterButton" type="button" onclick="switch()"  data-toggle="modal"  data-target="#RegisterModal">Register</button>
                                    </div>     
                            </div>    
                        </div>
                    </div>
                    <!--  End of Modal Body -->
                    
                    <!-- Begin of Modal Footer -->
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">Login</button>
                            <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- End of Modal Footer -->
                               </form>
                </div>
                <!-- End of Login Modal Conent -->
            </div>
        </div>        
        <!-- End of Login Modal -->

        <!-- Register Modal -->
        <div id="RegisterModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" >
            <div class="modal-dialog">
                <!-- Register Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div id="RegisterPage">
                            <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">註冊 Register</h4>
                        </div>
                    </div>
                    <!-- End of Modal Header -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <!-- Register 姓名 -->
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">姓名</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="LoginInput" name="name" value="{{ old('name') }}" style="text-align: left; font-size: 20px; font-family: Microsoft JhengHei; display:inline-block;" required autofocus>
                                                @if ($errors->has('name'))
                                               <span class="help-block">
                                               <strong>{{ $errors->first('name') }}</strong>
                                               </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Register E-Mail -->
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">電子信箱</label>
                                        <div class="col-md-6">
                                            <input id="registeremail" type="email" class="LoginInput" name="email" value="{{ old('email') }}" style="text-align: left; font-size: 20px; font-family: Microsoft JhengHei; display:inline-block;" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Register Phone -->
                                    <div class="form-group">
                                        <label for="phone" class="col-md-4 control-label">電話號碼</label>
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="LoginInput" name="phone" value="{{ old('phone') }}" style="text-align: left; font-size: 20px; font-family: Microsoft JhengHei; display:inline-block;" required>
                                        </div>
                                    </div>
                                    <!-- Register 密碼 -->
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                                        <label for="password" class="col-md-4 control-label">密碼</label>
                                        <div class="col-md-6">
                                            <input id="registerpassword" type="password" class="LoginInput" name="password"  placeholder="At least 6 characters..." style="text-align:left; font-size: 20px; font-family: Microsoft JhengHei; display:inline-block;" required>
                                            
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Register 確認密碼 -->
                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-4 control-label">確認密碼</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="LoginInput" name="password_confirmation" style="text-align: left; font-size: 20px; font-family: Microsoft JhengHei; display:inline-block;" required>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div> 
                    <!-- End of Modal Body --> 
                       
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">Register</button>
                            <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                        </div>
                    </div> 
                    <!-- End of Modal Footer -->
                                        </form>
                </div> 
                <!-- End of Register Modal Content -->
            </div>
        </div>
        <!-- End of Register Modal -->

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

    <!-- End of Modal Section -->
</nav>