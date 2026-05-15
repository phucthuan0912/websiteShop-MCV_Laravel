@extends('frontend.layouts.app')

@section('styles')
<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection

@section('content')
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
											<li><a href="">Armani</a></li>
											<li><a href="">Prada</a></li>
											<li><a href="">Dolce and Gabbana</a></li>
											<li><a href="">Chanel</a></li>
											<li><a href="">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Households</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{ asset('frontend/images/home/shipping.jpg') }}" alt="" />
						</div><!--/shipping-->
					</div>
				</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3>{{ $blogDetail->title }}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<!-- <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span> -->
							</div>
							<a href="">
								<img src="{{ asset('frontend/uploads/avatar/'. $blogDetail->image) }}" alt="">
							</a>
							<div class="post-content">
                                {!! $blogDetail->content !!}      
                            </div>	
							<div class="pager-area">
								<ul class="pager pull-right">
                                    @if($baiVietTruoc)
                                                <li><a href="{{ route('member.blog.detail', ['id' => $baiVietTruoc->id]) }}">Pre</a></li>
                                    @endif		

                                    @if($baiVietTiep)
                                        <li><a href="{{ route('member.blog.detail', ['id' => $baiVietTiep->id]) }}">Next</a></li>
                                    @endif
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<h3>Rate this item:</h3>
						<div class="rate">
							<div class="vote">
								<div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
								<div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
								<div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
								<div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
								<div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
								<span class="rate-np">{{  round($rate, 0) }}</span>
							</div>
						</div>
						
						<ul class="tag" style="margin-top: 20px;">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="{{ asset('frontend/images/blog/socials.png') }}" alt=""></a>
					</div><!--/socials-share-->

					<!-- <div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-one.jpg" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div> --><!--Comments-->
					
					<div class="response-area">
						<h2>{{ count($cmtCha) }} RESPONSES</h2>
						<ul class="media-list">
							@forelse($cmtCha as $userCmt)
							<!-- Comment Cha -->
							<li class="media">
								<a class="pull-left" href="#">
									<img class="media-object" 
										 src="{{ $userCmt->avatar ? asset('admin/uploads/avatar/' . $userCmt->avatar) : asset('frontend/images/blog/man-two.jpg') }}" 
										 alt="{{ $userCmt->name }}"
										 style="width: 121px; height: 100px;">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i> {{ $userCmt->name }}</li>
										<li><i class="fa fa-clock-o"></i> {{ $userCmt->created_at ?? 'Just now' }}</li>
										<li><i class="fa fa-calendar"></i> {{ date('M d, Y') }}</li>
									</ul>
									<p>{{ $userCmt->cmt }}</p>
									<a class="btn btn-primary reply-btn" href="" data-comment-id="{{ $userCmt->id }}"><i class="fa fa-reply"></i> Reply</a>
									
									<div class="reply-form" style="display: none; margin-top: 15px;">
										<div class="blank-arrow">
											<label>Your Reply</label>
										</div>
										<span>*</span>
										<textarea class="reply-text form-control" placeholder="Nhập reply..." rows="5"></textarea>
										<a class="btn btn-primary postReply" href="" data-parent-id="{{ $userCmt->id }}" style="margin-top: 10px;">
											<i class="fa fa-paper-plane"></i> Post Reply
										</a>
									</div>
								</div>
							</li>
							
							<!-- Comment Con (Reply) -->
							@forelse($cmtCon[$userCmt->id] as $reply)
							<li class="media second-media "  >
								<a class="pull-left" href="#">
									<img class="media-object" 
										 src="{{ $reply->avatar ? asset('admin/uploads/avatar/' . $reply->avatar) : asset('frontend/images/blog/man-two.jpg') }}" 
										 alt="{{ $reply->name }}"
										 style="width: 121px; height: 100px;">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i> {{ $reply->name }}</li>
										<li><i class="fa fa-clock-o"></i> {{ $reply->created_at ?? 'Just now' }}</li>
										<li><i class="fa fa-calendar"></i> {{ date('M d, Y') }}</li>
									</ul>
									<p>{{ $reply->cmt }}</p>
								</div>
							</li>
							@empty
							@endforelse
							
							@empty
							<li class="media">
								<div class="alert alert-info">
									<i class="fa fa-info-circle"></i> No comments yet
								</div>
							</li>
							@endforelse
						</ul>					
					</div><!--/Response-area-->
					
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-12">
								<h2>Leave a Comment</h2>
								
								<div class="text-area">
									<div class="blank-arrow">
										<label>Your Comment</label>
									</div>
									<span>*</span>
									<div class="comment">
										<textarea 
											class="cmt form-control" 
											placeholder="Nhập comment của bạn..."
											rows="10"></textarea>
										<a class="btn btn-primary postCmt" href="" style="margin-top: 10px;">
											<i class="fa fa-paper-plane"></i> Post Comment
										</a>
									</div>
								</div>
							</div>
						</div>
					</div><!--/Repaly Box-->
				</div>	
			</div>
		</div>
	</section>
@endsection
@section('scripts')
<script>
    var blog_id = {{ $blogDetail->id }};
    var user_id = {{ Auth::id() ?? 'null' }};
    	$(document).ready(function(){
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			//vote
			$('.ratings_stars').hover(
	            // Handles the mouseover
	            function() {
	                $(this).prevAll().andSelf().addClass('ratings_hover');
	                // $(this).nextAll().removeClass('ratings_vote'); 
	            },
	            function() {
	                $(this).prevAll().andSelf().removeClass('ratings_hover');
	                // set_votes($(this).parent());
	            }
	        );

			$('.ratings_stars').click(function(){
                var checkLogin = '{{ Auth::Check() }}';
                if(checkLogin){ 
				var rate =  $(this).find("input").val();
		        
                    if ($(this).hasClass('ratings_over')) {
                        $('.ratings_stars').removeClass('ratings_over');
                        $(this).prevAll().andSelf().addClass('ratings_over');
                    } else {
                        $(this).prevAll().andSelf().addClass('ratings_over');
                    }
					$('.rate-np').text(rate);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('member.blog.rate') }}",
                        data: {
                            rate: rate,
                            blog_id: blog_id,
                            user_id: user_id,
                        },
                        success:function(data){
                            console.log(data);
                        }
                    })
                    
                }else {
                    alert("! Vui long Login !")
                }
		    });
		});
		document.addEventListener("DOMContentLoaded", function () {
			const stars = document.querySelectorAll('.ratings_stars');
			const rate = parseInt(document.querySelector('.rate-np').innerText);

			 stars.forEach((star, index) => {
				if (index < rate) {
					star.classList.add('ratings_over');
				}
			})
		});

		$('.postCmt').click(function(e){
			e.preventDefault(); 

			var checkLogin = '{{ Auth::Check() }}'; 
			if(checkLogin){ 
				var cmt = $('.cmt').val();
				
				$.ajax({
					type: 'POST',
					url: "{{ route('member.blog.cmt') }}",
					data: {
						cmt: cmt,
						blog_id: blog_id,
						user_id: user_id,
					},
					success:function(data){
						$('.cmt').val(''); 
						var avatarUrl = data.data.avatar 
							? "{{ asset('admin/uploads/avatar/') }}/" + data.data.avatar
							: "{{ asset('frontend/images/blog/man-two.jpg') }}";
						var html = '<li class="media"><a class="pull-left" href="#"><img class="media-object" src="' + avatarUrl + '" alt="' + data.data.name + '" style="width: 121px; height: 100px;"></a><div class="media-body"><ul class="sinlge-post-meta"><li><i class="fa fa-user"></i> ' + data.data.name + '</li><li><i class="fa fa-clock-o"></i> Just now</li><li><i class="fa fa-calendar"></i> ' + new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) + '</li></ul><p>' + data.data.cmt + '</p><a class="btn btn-primary reply-btn" href="" data-comment-id="' + data.data.id + '"><i class="fa fa-reply"></i> Reply</a><div class="reply-form" style="display: none; margin-top: 15px;"><div class="blank-arrow"><label>Your Reply</label></div><span>*</span><textarea class="reply-text form-control" placeholder="Nhập reply..." rows="5"></textarea><a class="btn btn-primary postReply" href="" data-parent-id="' + data.data.id + '" style="margin-top: 10px;"><i class="fa fa-paper-plane"></i> Post Reply</a></div></div></li>';
						$('.media-list').prepend(html);
						var currentCount = $('.media-list li.media').length; 
						$('.response-area h2').text(currentCount + ' RESPONSES'); 
					}
				})
				
			} else {
				alert("! Vui lòng Login !")
			}
		});

		$('.reply-btn').click(function(e){
			e.preventDefault();
			$(this).closest('.media-body').find('.reply-form').toggle();
			$(this).closest('.media-body').find('.reply-text').focus(); 
			return false;
		});
		
		$('.postReply').click(function(e){
			e.preventDefault();
			
			var checkLogin = '{{ Auth::Check() }}';
			if(checkLogin){
				var $btn = $(this); 
				var replyText = $btn.closest('.reply-form').find('.reply-text').val();
				var parentId = $btn.data('parent-id');
				
				$.ajax({
					type: 'POST',
					url: "{{ route('member.blog.cmt') }}",
					data: {
						cmt: replyText,
						blog_id: blog_id,
						user_id: user_id,
						level: parentId 
					},
					success: function(data){
						$btn.closest('.reply-form').find('.reply-text').val('');
						$btn.closest('.reply-form').hide();
						var avatarUrl = data.data.avatar
								? "{{ asset('admin/uploads/avatar/') }}/" + data.data.avatar
								: "{{ asset('frontend/images/blog/man-two.jpg') }}";
						var replyHtml = '<li class="media" style="margin-left: 40px; margin-top: 10px;"><a class="pull-left" href="#"><img class="media-object" src="' + avatarUrl + '" alt="' + data.data.name + '" style="width: 121px; height: 100px;"></a><div class="media-body"><ul class="sinlge-post-meta"><li><i class="fa fa-user"></i> ' + data.data.name + '</li><li><i class="fa fa-clock-o"></i> Just now</li><li><i class="fa fa-calendar"></i> ' + new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) + '</li></ul><p>' + data.data.cmt + '</p></div></li>';
						$btn.closest('.media').after(replyHtml);
						var totalCount = $('.media-list li.media').length;
						$('.response-area h2').text(totalCount + ' RESPONSES');
					}
				});	
			} else {
				alert("! Vui lòng Login !")
			}
		});

	



		
		
</script>
@endsection