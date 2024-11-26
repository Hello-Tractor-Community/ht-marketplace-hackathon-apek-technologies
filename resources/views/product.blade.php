@extends('layouts.app', ['title' => $product->name])
@section('content')
<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">

				<div class="s_Product_carousel">
					<div class="single-prd-item">
						<img class="img-fluid" src="{{asset('storage/products/' . $product->path)}}" alt="">
					</div>
					<div class="single-prd-item">
						<img class="img-fluid" src="{{asset('storage/products/' . $product->path)}}" alt="">
					</div>
					<div class="single-prd-item">
						<img class="img-fluid" src="{{asset('storage/products/' . $product->path)}}" alt="">
					</div>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3>{{$product->name}}</h3>
					<h2>{{$product->price}}</h2>
					<ul class="list">
						<li><a class="active" href="#"><span>Category</span> : {{$product->category}}</a></li>
						<li><a href="#"><span>Availibility</span> :
								{{$product->isAvailable ? 'In Stock' : 'Out of Stock'}}</a></li>
					</ul>

					<div class="card_area d-flex align-items-center">
						<a class="primary-btn" href="{{route('wish.create', ['product_id' => $product->id])}}">Add to
							Wish</a>
						<a class="primary-btn"
							href="{{route('chat.create', ['owner_id' => $product->user_id])}}">Contact
							Owner</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="home-tab" data-toggle="tab" href="#desc" role="tab" aria-controls="home"
					aria-selected="true">Description</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#specs" role="tab" aria-controls="profile"
					aria-selected="false">Specification</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					aria-selected="false">Reviews</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="home-tab">
				<p>{{$product->description}}</p>
			</div>
			<div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="profile-tab">
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>
									<h5>Brand</h5>
								</td>
								<td>
									<h5>{{$product->brand->name}}</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Year Of Purchase</h5>
								</td>
								<td>
									<h5>{{$product->yop}}</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Engine Hours</h5>
								</td>
								<td>
									<h5>{{$product->engine_hours}}</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Location</h5>
								</td>
								<td>
									<h5>{{$product->seller->location}}</h5>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Implement</h5>
								</td>
								<td>
									<h5>{{$product->implement}}</h5>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col-md-4">
						<div class="row total_rate">
							<div class="col-6">
								<div class="box_total">
									<h5>Overall</h5>
									<h4>4.0</h4>
									<h6>(03 Reviews)</h6>
								</div>
							</div>
							<div class="col-6">
								<div class="rating_list">
									<h3>Based on 3 Reviews</h3>
									<ul class="list">
										<li><a href="#">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-star"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="review_list">
							<div class="review_item">
								<div class="media">
									<div class="d-flex">
										<img src="img/product/review-1.png" alt="">
									</div>
									<div class="media-body">
										<h4>Blake Ruiz</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>
								<p></p>
							</div>
						</div>
					</div>
					<!-- <div class="col-lg-6">
						<div class="review_box">
							<h4>Add a Review</h4>
							<p>Your Rating:</p>
							<ul class="list">
								<li><input type="radio" style="appearance:none;" value="1" class="fa fa-star stars"
										onclick="changeColor(this.value)"></li>
								<li><input type="radio" style="appearance:none;" value="2" class="fa fa-star stars"
										onclick="changeColor(this.value)"></li>
								<li><input type="radio" style="appearance:none;" value="3" class="fa fa-star stars"
										onclick="changeColor(this.value)"></li>
								<li><input type="radio" style="appearance:none;" value="4" class="fa fa-star stars"
										onclick="changeColor(this.value)"></li>
								<li><input type="radio" style="appearance:none;" value="5" class="fa fa-star stars"
										onclick="changeColor(this.value)"></li>
							</ul>
							<script>
								var inputs = document.getElementsByClassName('stars')
								function changeColor(val) {
									for (let index = 0; index < inputs.length; index++) {
										const element = inputs[index];
										element.style.color = 'black'
									}
									for (let input = 0; input < val; input++) {
										const element = inputs[input];
										element.style.color = ''
										element.style.color = 'orange'
									}
								}
							</script>
							<p>Outstanding</p>
							<form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
								novalidate="novalidate">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name"
											placeholder="Your Full name" onfocus="this.placeholder = ''"
											onblur="this.placeholder = 'Your Full name'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="email" class="form-control" id="email" name="email"
											placeholder="Email Address" onfocus="this.placeholder = ''"
											onblur="this.placeholder = 'Email Address'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" id="number" name="number"
											placeholder="Phone Number" onfocus="this.placeholder = ''"
											onblur="this.placeholder = 'Phone Number'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="message" id="message" rows="1"
											placeholder="Review" onfocus="this.placeholder = ''"
											onblur="this.placeholder = 'Review'"></textarea></textarea>
									</div>
								</div>
								<div class="col-md-12 text-right">
									<button type="submit" value="submit" class="primary-btn">Submit Now</button>
								</div>
							</form>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Product Description Area =================-->
@endsection