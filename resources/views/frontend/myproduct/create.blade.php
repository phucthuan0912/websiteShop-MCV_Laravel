@extends('frontend.layouts.app');
@section('content');
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Account</h2>
					<div class="panel-group category-products" id="accordian">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{ route('account.profile') }}">Account</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{ route('myproduct.index') }}">My Product</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">Create Product</h2>
					<div class="signup-form">
						<form action="{{route('myproduct.store')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="text" name="name" placeholder="Product Name"/>
							<input type="number" name="price" placeholder="Price" step="0.01"/>
							
							<select name="id_category">
								<option value="">-- Select Category --</option>
								@foreach ($categories as $cat)
									<option value="{{ $cat->id }}">{{ $cat->name }}</option>
								@endforeach
							</select>
							
							<select name="id_brand">
								<option value="">-- Select Brand --</option>
								@foreach ($brands as $brand)
									<option value="{{ $brand->id }}">{{ $brand->name }}</option>
								@endforeach
							</select>
							<select name="status" id="status">
								<option value="0">New</option>
								<option value="1">Sale</option>
							</select>
							
							<!-- Sale Percent (hidden by default) -->
							<input type="number" name="sale" id="sale" placeholder="Sale % (ví dụ: 10, 20)" step="0.01" min="0" max="100" style="display: none;"/>
							
							<input type="text" name="company" placeholder="Company" />
							<textarea name="detail" placeholder="Detail" rows="5"></textarea>
							
							<input type="file" name="image[]" multiple accept="image/*"/>
							<small>Upload tối đa 3 hình ảnh (mỗi file < 3MB)</small>
							
							<button type="submit" class="btn btn-default">Create Product</button>
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

<script>
	document.getElementById('status').addEventListener('change', function() {
		const saleInput = document.getElementById('sale');
		if (this.value === '1') {
			saleInput.style.display = 'block';
		} else {
			saleInput.style.display = 'none';
			saleInput.value = ''; // Clear value khi ẩn
		}
	});
</script>
@endsection