
{{--  @php
var_dump(session()->get('user')); exit;
@endphp  --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    @include('admin.style')
    
</head>
<body>

    <div id="wrapper">

        @include('admin.header');
        
        <!-- Page Content -->
        @yield('content');
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
        @include('admin.script');
        @yield('script'); 
</body>

</html>
