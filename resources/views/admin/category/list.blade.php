@extends('admin.index')
<!-- Page Content -->
@section('content')
<style>
    #delete a{
        color: white !important;
    }
    #edit a{
        color: white !important;
    }
    #recycle a{
        color: white !important;
    }
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            @if(session('notice'))
                        <div style="color: green">
                            {{session('notice')}}
                        </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>URL_Name</th>
                        <th>Category Parent</th>
                        <th>CreatedAt</th>
                        <th>UpdatedAt</th>
                        <th>DeletedAt</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($category as $cate)
                        <tr class="odd gradeX" align="center">
                            <td>{{$cate->id}}</td>
                            <td>{{$cate->name}}</td>
                            <td>{{$cate->url_name}}</td>
                            <td>{{$cate->parent_id}}</td>
                            <td>{{$cate->created_at}}</td>
                            <td>{{$cate->updated_at}}</td>
                            <td>{{isset($cate->deleted_at)?$cate->deleted_at:'No data'}}</td>
                            @if($cate->deleted_at == null)           
                                <td class="btn btn-danger" id="delete"><i class="fa fa-trash-o fa-fw"></i><a href="admin/category/delete/{{$cate->id}}"> Delete </a></td>
                                
                                <td class="btn btn-info" id="edit"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/{{$cate->id}}"> Edit </a></td>
                            @elseif ($cate->deleted_at != null)                              
                                <td class="btn btn-success" id="recycle"><i class="fa fa-recycle fa-fw"></i><a href="admin/category/restore/{{$cate->id}}"> Restore </a></td>
                            @endif
                        </tr>
                    @endforeach
                        
                </tbody>
            </table>
            {{$category->links()}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection