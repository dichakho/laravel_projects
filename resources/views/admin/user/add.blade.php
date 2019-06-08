@extends('admin.index')
<!-- Page Content -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            @if(count($errors) > 0)
                    <div style="color: red">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach 
                    </div>
                    @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/user/add" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="userName" placeholder="Please Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="pwd" placeholder="Nhập Mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="repwd" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" placeholder="Please Enter Số điện thoại" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Please Enter Email" />
                    </div>
                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">
                            <input name="userLevel" value="2" checked="" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                                <input name="userLevel" value="1" type="radio">Author
                        </label>
                        <label class="radio-inline">
                            <input name="userLevel" value="0" type="radio">Member
                        </label>
                        
                    </div>
                    <button type="submit" class="btn btn-default">Add User</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection