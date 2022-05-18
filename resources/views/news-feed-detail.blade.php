@extends('layouts.app')

@section('content')

	<div id="content" class="site-content">
		<main id="main" class="site-main">
			<div id="content" class="site-content">
				<div class="container">
					<div class="row">
						<main id="main" class="site-main col-md-12">
							<div class="row">
								@foreach($newfeed as $i=>$new_feeds)
									<article class="col-md-4 col-sm-6 col-xs-6 post">
										<div class="item inner-post shadow">
											<div class="post-thumb">
												<a href="{{ url('/news-feeds/'.$new_feeds->id_new_feeds) }}" class="mini-zoom"><img src="/images/news-feed/thumbs/{{ $new_feeds->photo }}" alt=""></a>
											</div><!-- .post-thumb -->
											<div class="post-info">
												<div style="height: 120px;">
													<h4 class="post-title"><a href="{{ url('/news-feeds/'.$new_feeds->id_new_feeds) }}">{{ str_limit($new_feeds->title, 60) }}</a></h4>
												</div>
												<ul class="post-meta">
													<li><i class="fa fa-clock-o"></i> {{ $new_feeds->createdAtFormatIndo() }}</li>
												</ul>
												<div style="height: 200px;" class="post-desc">
													<p>{!! str_limit($new_feeds->text, 180) !!}</p>
												</div><!-- .post-desc -->
												<a href="{{ url('/news-feeds/'.$new_feeds->id_new_feeds) }}" class="link">Read more</a>
											</div><!-- .post-info -->
										</div><!-- .inner-post -->
									</article>
								@endforeach
							</div>
							{{ $newfeed->links() }}
							<!-- <a class="button large rounded load-more" href="#">Load more items</a> -->
						</main><!-- .site-main -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .site-content -->
			<hr>
			<section id="home-popular">
				<div class="container">
					<h2 class="main-title ribbon"><span>Popular story</span></h2>
					<div class="team-slider carou-slider animation-element fade-in">
						<div class="slider">
							@foreach($popular_stories as $i=>$storys)
								<div class="item">
									<div class="team box shadow clearfix">
										<!-- <span class="badge onnew">New</span> -->
										<div class="thumb">
										<a href="{{ url('/book-detail/'.$storys->id_story) }}"><img src="{{URL::asset('images/story/thumbs/'.$storys->cover_photo)}}" alt=""></a>
										</div>
										<div class="p-info">
												<h3 class="p-title"><a href="{{ url('/book-detail/'.$storys->id_story) }}"> {{ $storys->title }}</a></h3>
											<div class="p-meta">
												<span class="p-cat">by <a href="{{ url('/book-detail') }}">{{ $storys->nama_user }}</a></span> 
												<br>
												<span class="p-cat">Genre :<a href="{{ url('/book-detail') }}">{{ $storys->nama_category }}</a></span> 
											</div><!-- .p-meta -->
											<div class="p-desc">
											<p>{{ str_limit($storys->description, 180) }} </p>
											</div>
											<div class="course-meta">
												<ul>
													<li>
														<a href="#"><i class="fa fa-eye" aria-hidden="true">  {{ $storys->viewer }}</i></a>
													</li>
												</ul>
											</div><!-- .p-rating -->
										</div><!-- .p-info -->
									</div><!-- .p-inner -->
								</div><!-- .item -->
							@endforeach
						</div><!-- .slider -->
					</div><!-- .team-slider -->
				</div><!-- .container -->
			</section>
			<hr>
		</main><!-- .site-main -->
	</div><!-- .site-content -->
@endsection
@section('js')
</script>
@endsection