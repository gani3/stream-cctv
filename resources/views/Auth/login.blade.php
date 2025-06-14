@section('title', 'Login')
@include('layouts.header')
<style>
    .card-primary:not(.card-outline)>.card-header{
        background-color: #FFF201 !important;
    }
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-primary">
      <div class="card-header text-center">
      <img src="{{asset('image/cctv_pln_tahuna.png')}}" width="100" alt="">
      <p href="{{asset('template')}}/index2.html" class="h1" style="color: #01AEEF !important;"><b>CCTV</b> PLN TAHUNA</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login.proses') }}" method="POST">
            @csrf
        @error('pesan-login')
          <div class="alert alert-danger" role="alert">
              {{ $message }}
          </div>
        @enderror
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" value="{{ @old('username') }}" id="floatingInput" placeholder="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@include('layouts.footer')
