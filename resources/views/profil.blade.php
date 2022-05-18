@extends('layouts.app')
@section('content')

	<div id="content" class="site-content">
		<div class="single-course-title">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="thumb">
						 	@if($users->foto_profile)
							<img class="img-circle" src="{{URL::asset('images/foto_profile/'.$users->foto_profile)}}" alt=""  style="min-width:200px;height:200px">
			                @else
			                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-circle" alt=""  style="min-width:200px;height:200px">
			                @endif
						</div><!-- .thumb -->
					</div><!-- .col -->

					<div class="col-md-4">
						<h1>{{ $users->name }}</h1>
						<div class="course-meta">
								<p style="color:#fff">{{$users->tempat_lahir}}, {{ Carbon\Carbon::parse($users->tanggal_lahir)->formatLocalized(' %d %B %Y')}}</p>
								<p style="color:#fff">{{$users->sekolah}}</p>
								<p style="color:#fff">{{$users->kota}}</p>
								<p style="color:#fff">{{$users->email}}</p>
								@if(Auth::check())
								@if(Auth::user()->id == $users->id)
									<div class="editprofile">
										@if($users->userProfil)
										<a title="Edit Profil" href="{{ url('/create/view/'.$users->id) }}" class="btn btn-info-pink"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										@else
										<a title="Tambah Profil" href="{{ url('/add/view/'.$users->id) }}" class="btn btn-info-pink"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										@endif
									@if($user_writing)
									<a title="Program Novel" href='{{URL::action("HomeController@programNovel",array($user_writing->id
									))}}' class="btn btn-info-pink"><i class="fa fa-unlock" aria-hidden="true"></i> Program Novel</a>
									@endif
									@if($user_inkubasi)
									<a title="Inkubasi" href='{{URL::action("HomeController@homeInkubasi",array($user_inkubasi->id
									))}}' class="btn btn-info-pink"><i class="fa fa-unlock" aria-hidden="true"></i> Inkubasi</a>
									@endif
									</div>
								@endif
								@endif
							</div>
						</div>

						<div class="col-md-4">
							<h3 style="color:#fff" float="right">Bio</h3>
							<p style="color:#fff" float="right">{{ str_limit($users->deskripsi, 500)}}</p>
						</div>

					</div><!-- .info -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .single-course-title -->

		<section id="course-gallery" class="course-section">
			<div class="container">
				<h2 class="title">My Story</h2>
				<!-- <p>Aenean elementum odio ut lorem cursus, eu auctor magna pellentesque.  Cras facilisis quam sed rhoncus dapibus.</p> -->

				<div class="products grid2 column-2 isotope">
					@foreach($own_stories as $key => $own_story)
						<div class="product free isotope-item">
							<div class="p-inner shadow clearfix">
								<div class="p-thumb">
								@if($own_story->cover_photo)
								<a href="{{ url('/book-detail/'.$own_story->id_story) }}"><img src="/images/story/thumbs/{{$own_story->cover_photo}}" alt=""></a>
								@else
								<a href="{{ url('/book-detail/'.$own_story->id_story) }}">
									<img src="{{URL::asset('images/story/'.$own_story->cover_photo)}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{{$own_story->id_story}}}1">
								</a>
								@endif
								
								</div><!-- .p-thumb -->
								<div class="p-info">
									<h3 class="p-title"><a href="{{ url('/book-detail/'.$own_story->id_story) }}">{{$own_story->title}}</a></h3>
									<div class="course-meta">
										<ul class="mon-black">
											@if($own_story->viewer)
											<i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $own_story->viewer }}</i>
											@else
											<i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
											@endif 
											<i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $own_story->rating }}</i> 
											<i class="fa fa-th-list" aria-hidden="true"> {{$own_story->partStories->count()}}</i>
										</ul>
									</div>
									<div class="p-meta">
										<span class="p-cat">by <a href="#">{{$own_story->nama_user}}</a></span>	
									</div><!-- .p-meta -->
									
									<div class="p-desc">
										<p>{!! str_limit($own_story->description, 250) !!}</p>
									</div>
									<div class="p-rating">
										<!-- <div class="star-rating">
											<span style="width:80%"></span>
										</div> -->
										<span class="review">
											<a href="#">2 Review(s)</a> | <a href="#">Add Your Review</a>
										</span>
									</div><!-- .p-rating -->

									<!-- <p class="price">
										<ins><span class="amount">$219</span></ins>
									</p> -->
								</div><!-- .p-info -->
								<!-- <div class="p-actions">
									<a class="button rounded primary add-to-cart-button" href="#"><i class="fa fa-shopping-bag"></i> Add to Cart</a>
									<a class="compare-button" href="#"><i class="fa fa-retweet"></i> Compare</a>
									<span class="saperator"> | </span>
									<a class="wishlist-button" href="#"><i class="fa fa-heart"></i> Wishlist</a>
								</div> -->
							</div><!-- .p-inner -->
						</div><!-- .product -->
					@endforeach
			</div>
		</section><!-- #course-gallery -->

	  
	</div><!-- .site-content --></br>
@endsection