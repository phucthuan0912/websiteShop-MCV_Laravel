@extends('admin.layouts.app')
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Add Blog</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
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
                <form action="{{ route('admin.blog.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Blog Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control"  accept="image/*">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description"  class="form-control" ></textarea>
                    </div>
                   
                    <div class="form-group ">
                        <label>Content</label>
                        <textarea name="content"  class="form-control" id="demo"></textarea>
                    </div>
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p style = "color: red;">{{ $error }}</p>
                            @endforeach
                        @endif
                    
                    <button type="submit" class="btn btn-primary">Add Blog</button>
                </form>
             
            </div>
        </div>
        </div>
    </div>
</div>
@endsection