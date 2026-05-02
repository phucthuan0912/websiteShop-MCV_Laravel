@extends('frontend.layouts.app')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action=" {{ route('member.register.post') }} " method="post" enctype="multipart/form-data" >
							@csrf
                            
							<input type="text" name="name" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
                            <input type="file" name="avatar" placeholder="Avatar"/>
							<button type="submit" class="btn btn-default">Signup</button>
                            @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p style = "color: red;">{{ $error }}</p>
                            @endforeach
                            @endif
						</form>

					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
