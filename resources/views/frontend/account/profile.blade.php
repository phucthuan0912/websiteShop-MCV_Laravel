@extends('frontend.layouts.app');
@section('content');
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Account</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">account</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">My product</a></h4>
								</div>
							</div>
							
						</div><!--/category-products-->
					
						
					</div>
				</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Update user</h2>
						 <div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{route('account.update')}}" method="post" enctype="multipart/form-data" >
                            @csrf
							<input type="text" name="name" value="{{Auth::user()->name}}" placeholder="Name"/>
							<input type="email"name="email" value="{{Auth::user()->email}}" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password (leave blank to keep current)"/>
                            <input type="text"name="phone" value="{{Auth::user()->phone}}" placeholder="Phone">
                            <input type="text" value="{{ $user->country ? $user->country->name : '' }}" placeholder="Country">
                            <input type="file" name="avatar"/>
                        
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
                         @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection