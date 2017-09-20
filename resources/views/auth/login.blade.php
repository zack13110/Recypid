<!DOCTYPE html>
<html>
@include('including/header')

<body class="hold-transition login-page bg-all">
<div class="login-box">
  <div class="login-logo">
  <img src="/bower_components/AdminLTE/dist/images/logo.png" height="50%" width="50%">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

  <form action="login" method="post">
  {{ csrf_field() }}
  <div class="form-group has-feedback">
    <input name="email" type="text" class="form-control" placeholder="Email/Username" value="{{ old('email') }}" required autofocus>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group has-feedback">
    <input name="password" type="password" class="form-control" placeholder="Password" required>
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
  </div>
  <div class="row">
    <div class="col-xs-8">
      <div class="checkbox icheck">
        <label>
          <input type="checkbox"> จดจำไว้ในระบบ
        </label>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
    </div>
    <!-- /.col -->
  </div>
</form>



    <a href="#">I forgot my password</a><br>
    <a href="register" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>



<!-- jQuery 3 -->
<script src="/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/bower_components/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
