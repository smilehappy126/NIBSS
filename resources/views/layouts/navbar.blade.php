<style type="text/css">
  .LoginButton{
                float: center;
                font-family: Microsoft JhengHei;
                font-weight: bolder;
                font-size: 20px;
                background-color: transparent;
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
        <li style="right: 10px; bottom:-6px; position: absolute;"><a><button class="LoginButton" type="button" data-toggle="modal" data-target="#LoginModal">Login</button></a></li>
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
                       <form action=" {{ asset('/login')}}" method="get">  
                       <div class="modal-body">
                       
                              <p style="text-align: center; font-size: 25px; font-family: Microsoft JhengHei">帳號 : 
                                {{ csrf_field() }} <input type="text" name="LoginAccount" value="" style="height: 30px; width: 150px;"></input>
                              </p>
                              <p style="text-align: center; font-size: 25px; font-family: Microsoft JhengHei">密碼 : 
                                {{ csrf_field() }} <input type="password" name="LoginPassword" value="" style="height: 30px; width: 150px;"></input>
                              </p>
                       </div>
                       <div class="modal-footer">
                              <button type="submit" class="btn btn-default" style="font-size: 20px; font-weight: bold;">Login</button>
                              <button type="button" class="btn btn-default" style="font-size: 20px; font-weight: bold;" data-dismiss="modal">Close</button>
                       </div>
                      
                       </form>
                    </div>

            </div>
        </div> <!-- Modal End -->
</nav>