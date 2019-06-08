@extends('admin.index')
<!-- Page Content -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">           
                <form action="admin/category/add" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input class="form-control" name="categoryName" placeholder="Please Enter Category Name" />
                    </div>
                    <div class="form-group">
                            <label>Danh mục gốc</label>
                            <select class="form-control" name="parent_id" id="level1">
                                <option value="0">Không</option>
                                @foreach($category as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label style="display: none" id="child_id">Danh mục mẹ</label>
                        <select class="form-control" name="child_id" id="level2" style="display: none">
                            
                        </select>
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
                    <button type="submit" class="btn btn-default">Add Category</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#level1').change(function () {
            let id = $(this).val();
            if (id == "0") {
                $('#child_id').hide();
                $('#level2').hide();
            } else {
                $('#child_id').show();
                $('#level2').show();  
                $.get('admin/ajax/category/'+id, function(data){
                    $('#level2').html('<option value="0">Không</option>'+data);
                });
            }
        });
    });
</script>
@endsection
