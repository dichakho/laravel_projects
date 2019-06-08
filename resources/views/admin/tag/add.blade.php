@extends('admin.index')
<!-- Page Content -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tags
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">           
                <form action="admin/tag/add" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Tag Name" />
                    </div>
                    
                    @if(count($errors) > 0)
                    <div style="color: red">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach 
                    </div>
                    @endif
                    @if(session('notice'))
                        <div style="color: green">
                            {{session('notice')}}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-default">Add Tags</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
