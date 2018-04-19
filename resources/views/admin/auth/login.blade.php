<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="/public/admin_asset/css/main.css">
    <title>Vali Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Trường tiểu học Sen Xanh</h1>
        <h4 style="margin-left: 37%; color: red;font-size: 18px;
    font-family: arial;">
        
          @if(Session::has("msg"))
            {{Session::get("msg")}}
           @endif
          
        </h4> 
      </div>
      <div class="login-box">
        <form class="login-form" action="{{route('admin.user.postlogin')}}"  method="post">
          {{csrf_field()}}
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="username" name="username" autofocus required>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" required placeholder="Password">
          </div>
       
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block">SIGN IN<i class="fa fa-sign-in fa-lg"></i></button>
          </div>
        </form>
      </div>
    </section>
  </body>

  <script src="/public/admin_asset/js/jquery-2.1.4.min.js"></script>
<script src="/public/admin_asset/js/bootstrap.min.js"></script>
<script src="/public/admin_asset/js/plugins/pace.min.js"></script>
<script src="/public/admin_asset/js/main.js"></script>
</html>