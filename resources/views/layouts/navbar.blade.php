<style type="text/css">
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
                width:150px;
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
                width:150px;
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
      <!-- 之後可以加圖片 -->
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        <li class="active" ><a href="{{ url('/') }}">主選單<span class="sr-only">(current)</span></a></li>
        <li><a href="{{ url('/create') }}">新增申請單</a></li>
        <li><a href="{{ url('/borrow') }}">借用狀況</a></li>
        <li><a href="{{ url('/return') }}">已歸還資料</a></li>
        <li><a href="{{ url('/reserve') }}">預約狀況</a></li>
        <li><a href="{{ url('http://140.115.80.30:81/phpbook/') }}">書籍借用與預約系統</a></li>
        @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <form action=" {{ asset('/logout') }}" method="post" >{{ csrf_field() }} 
                          <li style="right: 10px; bottom:6px; position: absolute;">
                            <a>
                              <button class="LogoutButton" type="submit">Logout </button>
                            </a>  
                          </li>  
                        </form>
                    @else
                        
                    @endif
                </div>
            @endif
        @unless(Auth::check())
            <div class="LoginPanel">
                <!-- Trigger the modal with a button -->
                <li style="right: 10px; bottom:6px; position: absolute;"><a><button class="LoginButton" type="button" data-toggle="modal" data-target="#LoginModal">Login</button></a></li>
            </div>
        @endunless

        
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
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label" for="email" style="font-weight: bold; "> E-Mail</label>{{ csrf_field() }} 
                                                <div class="col-md-6">
                                                <input class="LoginInput" type="email" name="email" id="email"  value="{{ old('email') }}" style="display: 
                                                inline-block; font-size : 15px;font-family: Microsoft JhengHei;
                                                font-weight: bold;" required autofocus></input>
                                                    <!-- @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif -->
                                                </div> 
                                            
                                           
                                    </div>
                                    <!-- Login 密碼 -->
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                                        
                                            
                                                <label class="col-md-4 control-label" for="password" style="font-weight: bold;">密碼</label>{{ csrf_field() }} 
                                                <div class="col-md-6">
                                                <input type="password" name="password" id="password"  value="" style="display: inline-block; font-size: 15px;font-family: Microsoft JhengHei; font-weight: bold;" required></input>
                                                    <!-- @if ($errors->has('LoginPassword'))
                                                        <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif -->
                                                </div>
                                            
                                            <!-- 註冊按鈕 -->
                                            <!-- Trigger the Register modal with a button -->
                                                <br>
                                    </div>
                                    <!-- Register按鈕 -->
                                    <div class="form-group" align="center">
                                    <button class="RegisterButton" id="RegisterButton" type="button" onclick="switch()"  data-toggle="modal"  data-target="#RegisterModal">Register</button>
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
                        </div> <!-- End of Modal Header -->
                         
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
                                        <label for="email" class="col-md-4 control-label">E-Mail</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="LoginInput" name="email" value="{{ old('email') }}" style="text-align: left; font-size: 20px; font-family: Microsoft JhengHei; display:inline-block;" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Register 密碼 -->
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                                        <label for="password" class="col-md-4 control-label">密碼</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="LoginInput" name="password" style="text-align:left; font-size: 20px; font-family: Microsoft JhengHei; display:inline-block;" required>
                                            
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
                        </div> <!-- End of Modal Body --> 
                       
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
</nav>