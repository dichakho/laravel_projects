@extends('admin.index')
<!-- Page Content -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            @if(session('notice'))
                        <div style="color: green">
                            {{session('notice')}}
                        </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead
                    <tr align="center">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $us)   
                    <tr class="odd gradeX" align="center">
                        <td>{{$us->id}}</td>
                        <td>{{$us->username}}</td>
                        <td>
                            
                            @if($us->role == 2)
                            {{'Admin'}}
                            @elseif($us->role == 1)
                            {{'Author'}}
                            @elseif($us->role == 0)
                            {{'User'}}
                            @endif
                        
                        </td>
                        <td>{{$us->created_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$us->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$us->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection