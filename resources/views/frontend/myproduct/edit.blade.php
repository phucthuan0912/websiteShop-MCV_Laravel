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
					<h2 class="title text-center">Edit Product</h2>
					<div class="signup-form">
						<form action="{{route('myproduct.update', $product->id)}}" method="post" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							
							<input type="text" name="name" placeholder="Product Name" value="{{$product->name}}"/>
							<input type="number" name="price" placeholder="Price"  value="{{number_format($product->price)}}"/>
							
							<select name="id_category">
								<option value="">-- Select Category --</option>
								@foreach ($categories as $cat)
									<option value="{{ $cat->id }}" {{ $product->id_category == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
								@endforeach
							</select>
							
							<select name="id_brand">
								<option value="">-- Select Brand --</option>
								@foreach ($brands as $brand)
									<option value="{{ $brand->id }}" {{ $product->id_brand == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
								@endforeach
							</select>
							
							<select name="status" id="status">
								<option value="0" {{ $product->status == 0 ? 'selected' : '' }}>New</option>
								<option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Sale</option>
							</select>
							

							<input type="number" name="sale" id="sale" placeholder="Sale % (ví dụ: 10, 20)" step="0.01" min="0" max="100" value="{{number_format($product->sale)}}" style="display: {{ $product->status == 1 ? 'block' : 'none' }};"/>
							
							<input type="text" name="company" placeholder="Company" value="{{$product->company}}"/>
							<textarea name="detail" placeholder="Detail" rows="5">{{$product->detail}}</textarea>
							
							<div style="margin-bottom: 10px;">
								<strong>Ảnh hiện tại:</strong><br>
				
								@if(!empty($product->images) && is_array($product->images))
                                    @foreach($product->images as $index => $img)
                                        <div style="display: inline-block; margin-right: 10px;">
                                            <img src="{{ $product->getImageUrl($index) }}" style="width: 80px;">
                                            <br>
                                            <input type="checkbox" name="hinhxoa[]" value="{{$img}}"> Xóa
                                        </div>
                                    @endforeach
                                @else
                                    <p>Chưa có ảnh nào.</p>
                                @endif
							</div>
							
							<input type="file" name="image[]" multiple accept="image/*"/>
							<small>Upload tối đa 3 hình ảnh mới (mỗi file < 3MB). Nếu không chọn ảnh mới, ảnh cũ sẽ được giữ nguyên.</small>
							
							<button type="submit" class="btn btn-default">Update Product</button>
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
