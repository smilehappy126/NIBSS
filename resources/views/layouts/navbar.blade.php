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
</nav>