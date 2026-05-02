@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">List Blog</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Blog List</li>
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
                            
                                <h6 class="card-subtitle">List blog</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>tittle</th>
                                                <th>image</th>
                                                <th>description</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            @foreach($blog as $item)
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->image }}</td>
                                                <td>{{ $item->description }}</td>
                                              
                                               <td> <a href="{{route('admin.blog.delete', $item->id)}}" class="btn btn-danger">Delete</a></td>  
                                                <td> <a href="{{route('admin.blog.edit', $item->id)}}" class="btn btn-danger">Edit</a></td>  

                                            
                                            @endforeach
                                        </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.blog.create')}}" class="btn btn-primary">Add Blog</a>
            </div>
@endsection