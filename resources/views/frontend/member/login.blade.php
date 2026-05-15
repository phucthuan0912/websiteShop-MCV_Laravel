@extends('frontend.layouts.app')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action=" {{ route('member.login.post') }} " method="post" >
							@csrf
							<input type="text" name="email" placeholder="Email"/>
							<input type="password" name="password" placeholder="Password"/>          
							<button type="submit" class="btn btn-default">Login</button>
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
