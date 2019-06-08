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
                <h1 class="page-header">Tag
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
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <td>Status</td>
                        <th>CreatedAt</th>
                        <th>UpdatedAt</th>
                        <th>DeletedAt</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($tag as $tg)
                        <tr class="odd gradeX" align="center">
                            <td>{{$tg->id}}</td>
                            <td>{{$tg->name}}</td>
                            <td>{{$tg->status}}</td>
                            <td>{{$tg->created_at}}</td>
                            <td>{{$tg->updated_at}}</td>
                            <td>{{isset($tg->deleted_at)?$tg->deleted_at:'No data'}}</td>
                            @if($tg->deleted_at == null)           
                                <td class="btn btn-danger" id="delete"><i class="fa fa-trash-o fa-fw"></i><a href="admin/tag/delete/{{$tg->id}}"> Delete </a></td>
                                
                                <td class="btn btn-info" id="edit"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tag/edit/{{$tg->id}}"> Edit </a></td>
                            @elseif ($tg->deleted_at != null)                              
                                <td class="btn btn-success" id="recycle"><i class="fa fa-recycle fa-fw"></i><a href="admin/tag/restore/{{$tg->id}}"> Restore </a></td>
                            @endif
                        </tr>
                    @endforeach
                        
                </tbody>
            </table>
            {{$tag->links()}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection