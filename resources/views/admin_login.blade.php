<!DOCTYPE html>
<html lang="en"> @include('back-end.includes.head') <body class="bg-login">
    <!-- wrapper -->
    <div class="wrapper">
      <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
        <div class="row">
          <div class="col-12 col-lg-8 mx-auto">
            <div class="card radius-15 overflow-hidden">
              <div class="row g-0">
                <div class="col-xl-6">
                  <div class="card-body p-5">
                    <div class="text-center">
                      <img src="{{url('public/assets/images/logo-icon.png')}}" width="80" alt="">
                      <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                    </div>
                    <div class="">
                      <div class="d-grid">
                       
                        <a href="javascript:;" class="btn btn-facebook">
                          <i class="bx bxl-facebook"></i>Sign in with Facebook </a>
                      </div>
                     
                      <div class="form-body">
                        <p class="login-box-msg">Sign in to start your session</p>
                        <form action="{{url('Home/checkDetails')}}" method="post" id="loginForm"> @if(Session::has('msg')) <p class="error">{{ Session::get('msg') }}</p> @endif <form class="row g-3">
                            <div class="col-12">
                              <label for="inputEmailAddress" class="form-label">Email Address</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" >
                            </div>
                            <div class="col-12">
                              <label for="inputChoosePassword" class="form-label">Enter Password</label>
                              <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control border-end-0" id="password" name="password" placeholder="Enter Password">
                                <a href="javascript:;" class="input-group-text bg-transparent">
                                  <i class="bx bx-hide"></i>
                                </a>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                              </div>
                            </div>
                            <div class="col-md-6 text-end">
                              <a href="{{ url('/forgot-password/')}}">Forgot Password ?
                            </div>
                            <div class="col-12">
                              <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                  <i class="bx bxs-lock-open"></i>Sign in </button>
                              </div>
                            </div>
                            <div class="col-12 text-center">
                              <p>Don't have an account yet? <a href="{{ url('/register/')}}">Sign up here</a>
                              </p>
                              <div class="col-4">
                                <input type="hidden" name="redirect_url" id="redirect_url" value="{{url('admin/login')}}">
                                <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token" />
                              </div>
                            </div>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                  <img src="{{url('public/assets/images/login-images/login-frent-img.jpg')}}" class="img-fluid" alt="...">
                </div>
              </div>
              <!--end row-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end wrapper --> @include('back-end.includes.script')
  </body>
</html>