@extends('admin.layouts.app')
@section('content')
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Blog</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.blog.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Blog Title</label>
                        <input type="text" name="title" class="form-control" value="{{$data->title}}">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <br>
                        <input type="text" class="form-control" value="{{ $data->image }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description"  class="form-control"  >{{$data->description}}</textarea>
                    </div>
                   
                    <div class="form-group ">
                        <label>Content</label>
                        <textarea name="content"  class="form-control"  id="demo">{{$data->content}}</textarea>
                    </div>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p style = "color: red;">{{ $error }}</p>
                            @endforeach
                        @endif
                    
                    <button type="submit" class="btn btn-primary">Edit Blog</button>
                </form>
             
            </div>
        </div>
        </div>
    </div>
</div>
@endsection