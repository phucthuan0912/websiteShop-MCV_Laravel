@extends('admin.layouts.app')
@section('content')
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Add Country</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Country</li>
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
                <form action="{{ route('admin.country.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label >Country Name</label>
                        <input type="text" name="name" class="form-control">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p style = "color: red;">{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Add Country</button>
                </form>
             
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
