<!DOCTYPE html>
<html>
<head>
  <base href="/">
    @include('partials._head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

   @include('partials._navbar')
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('partials._sidebar')
</aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- Nội dung thay thế-->
            @yield('content')
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
  <!-- /.content-wrapper -->
  
<!-- Nội dung thay thế -->

<footer class="main-footer">

    @include('partials._footer')

</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('partials._javascript')
@yield('script')
</body>
</html>
