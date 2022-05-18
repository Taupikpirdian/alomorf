@extends('layouts.app')

@section('content')

<div id="content" class="site-content">
	<section class="main-slider fullscreen">
                    <div class="slider">
                        <div class="item">
                            <img src="front/images/event/comingsoon.jpg" alt="" >
                            <div class="container">
                                <div class="slider-content">
                                    <div class="desc">
                                        <h2>Segera Hadir Event Alomorf</h2>
                                        <p>"Menulislah sebanyak mungkin. Kelak jika kau telah tiada, yang dapat mengingatkanmu adalah tulisanmu."</p>
                                    </div>
<!--                                     <div class="button-action">
                                        <a href="#" class="button primary rounded large">Apply Now</a>
                                    </div> -->
                                </div><!-- .slider-content -->
                            </div><!-- .container -->
                        </div><!-- .item -->
                    </div><!-- .slider -->
                </section><!-- .main-slider -->
                <br>
                <hr>
	<div class="container">
		<div class="row">
			<main id="main" class="site-main col-md-12">
			
<!-- 				<div class="filter">
					<ul>
						<li><a class="active" href="#" data-filter="*">All</a></li>
						<li><a href="#" data-filter=".paid">Paid</a></li>
						<li><a href="#" data-filter=".free">Free</a></li>
					</ul>
				</div> -->
				<!-- .filter -->

				<div class="events layout column-3 isotope">
					<div class="event isotope-item paid">
						<div class="event-inner shadow">
							<div class="event-thumb">
								<a class="mini-zoom" href="{{ url('/challenge') }}"><img src="{{URL::asset('front/images/cover.png')}}" alt=""></a>
							</div><!-- .event-thumb -->

							<div class="event-date">
								<span>06</span>feb
							</div>

							<div class="event-info">
								<h3 class="post-title"><a href="{{ url('/challenge') }}">The new era of positive psychology</a></h3>
								<ul class="event-meta">
									<li>At  8:30 am</li>
									<li>Brigde Campus, New York</li>
								</ul>
							</div><!-- .event-info -->
						</div><!-- .event-inner -->
					</div><!-- .course -->

					<div class="event isotope-item free">
						<div class="event-inner shadow">
							<div class="event-thumb">
								<a class="mini-zoom" href="{{ url('/challenge') }}"><img src="{{URL::asset('front/images/cover.png')}}" alt=""></a>
							</div><!-- .event-thumb -->

							<div class="event-date">
								<span>18</span>feb
							</div>
								
							<div class="event-info">
								<h3 class="post-title"><a href="{{ url('/challenge') }}">Cambridge Campus, New York</a></h3>
								<ul class="event-meta">
									<li>At  9:00 am</li>
									<li>Cambridge Campus, New York</li>
								</ul>
							</div><!-- .event-info -->
						</div><!-- .event-inner -->
					</div><!-- .course -->

					<div class="event isotope-item free">
						<div class="event-inner shadow">
							<div class="event-thumb">
								<a class="mini-zoom" href="{{ url('/challenge') }}"><img src="{{URL::asset('front/images/cover.png')}}" alt=""></a>
							</div><!-- .event-thumb -->

							<div class="event-date">
								<span>22</span>feb
							</div>
								
							<div class="event-info">
								<h3 class="post-title"><a href="{{ url('/challenge') }}">How to connect social community?</a></h3>
								<ul class="event-meta">
									<li>At  10:00 am</li>
									<li>Universum Campus, London</li>
								</ul>
							</div><!-- .event-info -->
						</div><!-- .event-inner -->
					</div><!-- .course -->

					<div class="event isotope-item paid">
						<div class="event-inner shadow">
							<div class="event-thumb">
								<a class="mini-zoom" href="{{ url('/challenge') }}"><img src="{{URL::asset('front/images/cover.png')}}" alt=""></a>
							</div><!-- .event-thumb -->

							<div class="event-date">
								<span>29</span>feb
							</div>
								
							<div class="event-info">
								<h3 class="post-title"><a href="{{ url('/challenge') }}">What are animals thinking?</a></h3>
								<ul class="event-meta">
									<li>At  8:30 am</li>
									<li>Brigde Campus, New York</li>
								</ul>
							</div><!-- .event-info -->
						</div><!-- .event-inner -->
					</div><!-- .course -->

					<div class="event isotope-item paid">
						<div class="event-inner shadow">
							<div class="event-thumb">
								<a class="mini-zoom" href="{{ url('/challenge') }}"><img src="{{URL::asset('front/images/cover.png')}}" alt=""></a>
							</div><!-- .event-thumb -->

							<div class="event-date">
								<span>01</span>mar
							</div>
								
							<div class="event-info">
								<h3 class="post-title"><a href="{{ url('/challenge') }}">College success in science</a></h3>
								<ul class="event-meta">
									<li>At  9:30 am</li>
									<li>Brigde Campus, New York</li>
								</ul>
							</div><!-- .event-info -->
						</div><!-- .event-inner -->
					</div><!-- .course -->

					<div class="event isotope-item paid">
						<div class="event-inner shadow">
							<div class="event-thumb">
								<a class="mini-zoom" href="{{ url('/challenge') }}"><img src="{{URL::asset('front/images/cover.png')}}" alt=""></a>
							</div><!-- .event-thumb -->

							<div class="event-date">
								<span>02</span>mar
							</div>
								
							<div class="event-info">
								<h3 class="post-title"><a href="{{ url('/challenge') }}">Teach teachers how to create magic</a></h3>
								<ul class="event-meta">
									<li>At  10:00 am</li>
									<li>Universum Campus, London</li>
								</ul>
							</div><!-- .event-info -->
						</div><!-- .event-inner -->
					</div><!-- .course -->
				</div><!-- .courses -->

				<nav class="pagination">
					<ul>
						<li class="prev"><a href="#">Previous</a></li>
						<li><span class="current">1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><span>...</span></li>
						<li><a href="#">68</a></li>
						<li class="next"><a href="#">Next</a></li>
					</ul>
				</nav></br>
			</main><!-- .site-main -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .site-content -->
@endsection