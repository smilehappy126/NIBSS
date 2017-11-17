<style type="text/css">
  .LoginButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 20px;
                background-color: #B0C4DE;
                width: 100px;
                height: 30px;
                border-radius: 50px;
                border-width: 0px;
                transition: 0.3s;
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
                background-color:#B0C4DE;
                width: 100px;
                height: 40px;
                border-radius: 100px;
                border-width: 0px;
                transition: 0.3s;
                cursor: pointer;
                

            }

            .LogoutButton:hover{
                background-color: #CCDDFF;
                width:150px;
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
                        <form action=" {{ url('logout') }}" method="post" >{{ csrf_field() }} 
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

     <!-- Modal -->
        <div id="LoginModal" class="modal fade" role="dialog">
             <div class="modal-dialog">

        <!-- Modal content-->
                   <div class="modal-content">
                       <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                               <h4 class="modal-title" style="text-align: center; font-size: 45px; font-family: Microsoft JhengHei">登入 Login</h4>
                       </div>
                       <form action=" {{ asset('/loginNow') }} " method="post">  
                       <div class="modal-body">
                           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <p align="center"><label class="LoginInput" for="email" style="text-align: center; font-size: 25px; font-family: Microsoft JhengHei; display:inline-block; "> 帳號:</label>
                                {{ csrf_field() }} <input type="email" name="email" id="email"  value="{{ old('email') }}" style="height: 30px; width: 40%; display: inline-block; font-size: 15px;font-family: Microsoft JhengHei; font-weight: bold;" required autofocus></input>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                              </p>
                           </div>
                           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <p align="center"><label class="LoginInput" for="password" style="text-align: center; font-size: 25px; font-family: Microsoft JhengHei; display:inline-block; "> 密碼:</label>
                                {{ csrf_field() }} <input type="password" name="password" id="password"  value="" style="height: 30px; width: 40%; display: inline-block; font-size: 15px;font-family: Microsoft JhengHei; font-weight: bold;" required></input>
                                @if ($errors->has('LoginPassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </p>
                           </div>
                       </div>
                       <div class="modal-footer">
                              <div class="form-group">
                              <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">Login</button>
                              <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                              </div>
                       </div>
                      
                       </form>
                    </div>

            </div>
        </div> <!-- Modal End -->
</nav>