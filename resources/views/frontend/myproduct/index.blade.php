@extends('frontend.layouts.app');
@section('content')
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
						<h2 class="title text-center">My Products</h2>
						
						@if(session('success'))
							<div class="alert alert-success">{{ session('success') }}</div>
						@endif
						
						<div class="mb-3">
							<a href="{{ route('myproduct.create') }}" class="btn btn-primary">Add New Product</a>
						</div>
						
						<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td class="image">Image</td>
										<td class="description">Name</td>
										<td class="price">Price</td>
										<td class="total">Action</td>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $item)
									<tr>
										<td class="cart_product">
											<a href=""><img src="{{$item->getImageUrl(0)}}" alt="" style="width: 100px; height: 140px;"></a>
										</td>
										<td class="cart_description">
											<h4><a href="">{{$item->name}}</a></h4>
											@if($item->status == 1)
												<span>Sale {{number_format($item->sale)}}%</span>
											@else
												<span>New</span>
											@endif
										</td>
										<td class="cart_price">
											@if($item->status == 1)
												<p>
													<del>${{number_format($item->price)}}</del><br>
													${{number_format($item->final_price)}}
												</p>
											@else
												<p>${{number_format($item->price)}}</p>
											@endif
										</td>
										<td class="cart_total">
											<a href="{{route('myproduct.edit',$item->id)}}" class="btn btn-sm btn-warning">Edit</a>
											<a href="{{route('myproduct.delete',$item->id)}}" class="btn btn-sm btn-danger">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
@endsection