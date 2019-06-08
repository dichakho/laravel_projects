@extends('admin.index')
@section('content')
<div id="page-wrapper">
    <br>
    @if(session('notice'))
        <div class="alert alert-success">
            {{session('notice')}}
        </div>
    @endif 
</div>
@endsection