@extends('admin.index')
<!-- Page Content -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Article
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/article/add" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    @if(count($errors) > 0)
                    <div style="color: red">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach 
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" placeholder="Please Enter Title" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" name="description" placeholder="Please Enter Description" />
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Chuyên mục</label>
                        <select class="form-control" name="grandParentCate" id="level1">
                            <option value="0">Không</option>
                            @foreach($category as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="display: none" id="title_level2">Trường tin</label>
                        <select style="display: none" class="form-control" name="parentCate" id="level2">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="display: none" id="title_level3">Loại tin</label>
                        <select style="display: none" class="form-control" name="childCate" id="level3">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="img">
                    </div>  
                    <div class="form-group">
                        <label>Tag</label>
                        <select class="selectTag" multiple="multiple" name="tag[]" data-placeholder="Nhập tag" style="width: 100%;" >
                            @foreach($tag as $tg)
                            <option value="{{$tg->id}}">{{$tg->name}}</option>
                            @endforeach
                        </select>
                    </div>               
                    <div class="form-group">
                        <label>Author</label>
                        
                        <input class="form-control" placeholder="Please Enter Author" disabled value="<?= session()->get('user')['username']?>"/>
                        <input class="form-control" type="hidden" name="author" placeholder="Please Enter Author" value="<?= session()->get('user')['id']?>"/>
                    </div>
                    <button type="submit" class="btn btn-default">Add Article</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
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
            $('.selectTag').select2()
        });
    </script>
    <script>
            $(document).ready(function () {
                $('#level1').change(function () {
                    let id = $(this).val();
                    if (id == "0") {
                        $('#title_level2').hide();
                        $('#level2').hide();
                        $('#title_level3').hide();
                        $('#level3').hide();
                    } else {
                        $('#title_level2').show();
                        $('#level2').show();
                        $.get('admin/ajax/category/'+id, function(data){
                            $('#level2').html('<option value="0">Không</option>'+data);
                        });
                    }
                });
            });
        </script>
        <script>
                $(document).ready(function () {
                    $('#level2').change(function () {
                        $('#level3 option[value!="0"] ').remove()
                        let id = $(this).val();
                        if (id == "0") {
                            $('#title_level3').hide();
                            $('#level3').hide();
                        } else {
                            $('#title_level3').show();
                            $('#level3').show();
                            $.get('admin/ajax/cate/'+id, function(data){
                                $('#level3').html('<option value="0">Không</option>'+data);
                            });
                        }
                    });
                });
            </script>
@endsection





