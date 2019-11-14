<!DOCTYPE html>
<html>
<head>
    <title>Admin - CMS</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
</head>
<body>
    @if(session('thongbao'))
        <script type="text/javascript">Swal.fire('{{session('thongbao')}}')</script>
    @endif
    <form class="box" method="POST" action="{{route('xu-ly-dang-nhap')}}" >
        @csrf
        <h1>Login</h1>
        <input type="text" name="tai_khoan" id="tai_khoan" placeholder="Username" required="">
        <input type="password" name="mat_khau" id="mat_khau" placeholder="Password" required="">
        <button class="btn btn-danger btn-block" type="submit"> Login </button>
    </form>
</body>
</html>

      