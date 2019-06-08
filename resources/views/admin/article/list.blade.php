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
                <h1 class="page-header">Article
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($article as  $arti)
                    <tr class="odd gradeX" align="center">
                        <td>{{$arti->id}}</td>
                        <td>
                            {{str_limit($arti->title, 50)}}
                        </td>
                        <td>{{$arti->user->username}}</td>
                        <td>{{$arti->category->name}}</td>
                        
                        <td>
                            @if ($arti->tag)
                            @foreach ($arti->tag as $e)
                                <span class="mx-2 btn" style="background-color: #F6214B; color:white; padding:3px;">{{$e->name}}</span>
                            @endforeach
                            @endif
                            
                        </td>
                        
                        @if($arti->deleted_at == null)           
                            <td class="btn btn-danger" id="delete"><i class="fa fa-trash-o fa-fw"></i><a href="admin/article/delete/{{$arti->id}}"> Delete </a></td>
                                
                            <td class="btn btn-info" id="edit"><i class="fa fa-pencil fa-fw"></i> <a href="admin/article/edit/{{$arti->id}}"> Edit </a></td>
                        @elseif ($arti->deleted_at != null)                              
                            <td class="btn btn-success" id="recycle"><i class="fa fa-recycle fa-fw"></i><a href="admin/article/restore/{{$arti->id}}"> Restore </a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$article->links()}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection