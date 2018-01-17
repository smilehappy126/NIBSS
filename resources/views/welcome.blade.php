<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>資管系-資訊系統</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
        <script src="js/modernizr.js"></script> <!-- Modernizr -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 75px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
           
            .m-b-md {
                margin-bottom: 30px;
            }

            .LoginPanel{
                float: right;
                position: absolute;
                margin-right: 10px;
                top: 70%;
                z-index: 1;
            }
            .ErrorMessages{
                float: right;
                position: absolute;
                margin-right: 10px;
                top: 70%;

            }
            .notice{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 39px;
                
            }
            .LogoutButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 22px;
                background-color:#FFE4B5;
                width: 100px;
                height: 40px;
                border-radius: 100px;
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
                opacity: 0.7;

            }
            .LogoutButton:hover{
                background-color: #F4A460;
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
            /*背景圖片的位置: /ncumisborrowsystem/public/img*/
            .background{
                background-image: url("/img/5.jpg"); 
                width: 100%;
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
               
            }
            .title{
                background-color: black;
                opacity: 0.6;
                color: white;
                font-weight: bolder;
                z-index: 10;
                position: relative;
            }
            .TitleText{
                background-color: transparent;
                z-index: 100;
                font-size: 50px;
                position: absolute;
                text-align: center;
                top:10%;
                font-family: Microsoft JhengHei;
                font-size: 45px;
                color: white;
                right: 0px;
                left: 0px;
            }
            
/*PC CSS Section*/
@media screen and (min-width: 900px){
            /*模糊效果*/
            .BlurEffect{
                -webkit-filter: blur(10px);
                filter: blur(2px);
                height: 180px;
            }
            .LinkText{
                background-color: transparent;
                z-index: 100;
                font-size: 30px;
                top: 42%;
                text-align: center;
                position: absolute;
                right: 0px;
                left: 0px;
                color: pink;
            }
            .LinkText > a {
                color:  #FFE4B5;
                padding: 0 25px;
                font-size: 24px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .LoginButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 30px;
                background-color:#B0C4DE;
                width: 180px;
                height: 70px;
                border-radius: 100px;
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
                opacity: 0.6;
            }

            .LoginButton:hover{
                background-color: #CCDDFF;
                width:280px;
                transition: 0.3s;

            }

}
/*Mobile CSS Section*/
@media screen and (max-width: 900px) and (min-width: 300px){
            /*模糊效果*/
            .BlurEffect{
                -webkit-filter: blur(10px);
                filter: blur(2px);
                height: 250px;
            }
            .LinkText{
                background-color: transparent;
                z-index: 100;
                font-size: 30px;
                top: 33%;
                text-align: center;
                position: absolute;
                right: 0px;
                left: 0px;
                color: pink;
            }
            .LinkText > a {
                color:  #FFE4B5;
                padding: 0 25px;
                font-size: 24px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .LoginButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 30px;
                background-color:#B0C4DE;
                width: 180px;
                height: 65px;
                border-radius: 100px;
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
                opacity: 0.6;
                z-index: 1;
            }

            .LoginButton:hover{
                background-color: #CCDDFF;
                width:280px;
                transition: 0.3s;

            }

}

                          
            
        </style>
        <script type="text/javascript">
            
      
        </script>
    </head>
    <body>
        
      <div class="flex-center position-ref full-height background">
         
            
            <!-- 登出按鈕 -->
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <form action=" {{ asset('/logout') }}" method="post" >{{ csrf_field() }} <button class="LogoutButton" type="submit">Logout </button></form>
                    @endif
                </div>
            @endif
            <!-- 登入按鈕 -->
            <div class="LoginPanel">
            @if (Route::has('login'))
                @if(Auth::check())
                    <label class="notice" style="text-transform: uppercase; text-align: center;">
                        Welcome, {{ Auth::user()->name }} <br><br>
                        目前違規次數 : {{ Auth::user()->violation }}
                    </label> 
                @endif
            @endif
                @unless(Auth::check())
                <!-- Trigger the Login modal with a button -->
                <button class="LoginButton" type="button" data-toggle="modal" data-target="#LoginModal">Login</button>
                @endunless
            </div>
            <!-- 登入錯誤的系統提示 -->
            <div class="ErrorMessages">
            @if ($errors->has('email'))
                <br>
                <span class="help-block">
                    <strong style="color:red;">{{ $errors->first('email') }} Please try again.</strong>
                </span>
            @elseif($errors->has('LoginPassword'))
                <br>
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            
            </div>
            
            
        
            <!-- 主選單 -->
            <div class="content" style="position: relative;">
                <div style="position: relative;">
                <!-- 標題 -->
                <div style="align-items: center;">
                    <div class="title m-b-md BlurEffect">
                        &nbsp
                    </div>
                    <span class="TitleText">
                        設備管理系統
                    </span>
                    <span class="links LinkText">    
                        @if(Auth::check())
                        <a  href="{{ url('/create') }}">新增申請單</a>|
                        @endif
                        <a  href="{{ url('/borrow') }}">借用狀況</a>|
                        <a  href="{{ url('/return') }}">已歸還資料</a>|
                        <a  href="{{ url('/reserve') }}">預約狀況</a>|
                        <a  href="{{ url('http://140.115.80.30:81/phpbook/') }}">書籍借用與預約系統</a>
                    @if (Route::has('login'))
                        @if(Auth::check())
                            @if( (Auth::user()->level)==='管理員')   
                        | <br> | <a  href="{{ url('/admin') }}">管理者模式</a>|
                            @endif
                        @endif
                    @endif
                    </span>
                </div>
                
                <!-- 分頁連結-->
                <div class="links" style="align-items: center; visibility: hidden;" >
                    <span class="links">
                        @if(Auth::check())
                        <a  href="{{ url('/create') }}">新增申請單</a>|
                        @endif
                        <a  href="{{ url('/borrow') }}">借用狀況</a>|
                        <a  href="{{ url('/return') }}">已歸還資料</a>|
                        <a  href="{{ url('/reserve') }}">預約狀況</a>|
                        <a  href="{{ url('http://140.115.80.30:81/phpbook/') }}">書籍借用與預約系統</a>
                    @if (Route::has('login'))
                        @if(Auth::check())
                            @if( (Auth::user()->level)==='管理員')   
                        |<a  href="{{ url('/admin') }}">管理者模式</a>
                            @endif
                        @endif
                    @endif
                    </span>
                    
                </div>
            </div>
                
            </div><!-- End of Content -->
        
      </div>
        
        
        
        <!-- ↓↓↓ Modal Section ↓↓↓ -->

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
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}" style="text-align: center;">
                                        
                                            
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
                                        <label for="email" class="col-md-4 control-label">電子信箱</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="LoginInput" name="email" value="{{ old('email') }}" style="text-align: left; font-size: 20px; font-family: Microsoft JhengHei; display:inline-block;" required>

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
                                            <input id="password" type="password" class="LoginInput" name="password" placeholder="At least 6 characters..." style="text-align:left; font-size: 20px; font-family: Microsoft JhengHei; display:inline-block;" required>
                                            
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
            
    </body>
    <!-- Switch Modal -->
    
</html>
