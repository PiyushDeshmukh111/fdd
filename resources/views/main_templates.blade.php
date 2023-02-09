<!DOCTYPE html>
<html lang="en">
@include('back-end.includes.head') 
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('public/images/logo-icon.png')}}" alt=>
  </div>

  <!-- Navbar -->
   @include('back-end.includes.header') 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('back-end.includes.side-bar') 
  <!-- Content Wrapper. Contains page content -->
 
   @yield('back-end.content')
  <!-- /.content-wrapper -->
  @include('back-end.includes.footer') 
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 @include('back-end.includes.script') 
<!-- jQuery -->

</body>
</html>
