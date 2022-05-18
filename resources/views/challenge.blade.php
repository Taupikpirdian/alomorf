
@extends('layouts.app')

@section('content')

<div id="content" class="site-content">
	<div class="single-course-title">
				<div class="container">
					<div class="row">
						<div class="thumb">
							<img src="{{URL::asset('front/images/werd.jpg')}}" alt="">
						</div><!-- .thumb -->

						<div class="info">
							<h1>JUDUL LOMBA YANG AKAN DI ADAKAN</h1>
							<div class="course-detail">
								<ul>
									<li>Start: January 20, 2016 - 08:00 am</li>
									<li>End: January 22, 2016 - 05:00 am</li>
									<li>Address: Unisas Campus, Cambridge St, Boston</li>
								</ul>
							</div><!-- .course-detail -->

							<form class="single-apply-form" action="#" method="get">
								<h2 style="color:#fff">TEMA LOMBA YANG AKAN DI ADAKAN</h2><br>
									<tr>
										<td>
										 	<input type="submit" class="button large primary rounded apply-button" value="Apply now">
										</td>
									</tr>
							</form>
						</div><!-- .info -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div>

			<nav class="course-nav">
				<div class="container">
					<ul class="nav-scroll">
						<li><a href="#course-sponsors" class="">Sponsors</a></li>
						<li><a href="#course-map" class="">About Event</a></li>
						<li><a href="#course-map" class="">Rules</a></li>
					</ul>
				</div>
			</nav>

			<section id="course-about" class="course-section">
				<div class="container">
					<h2 class="title">About the event</h2>
					<p>Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat id. Vivamus interdum urna at sapien varius elementum. Suspendisse ut mi felis et interdum libero lacinia vel. Aenean elementum odio ut lorem cursus, eu auctor magna pellentesque.  Cras facilisis quam sed rhoncus dapibus. Quisque lorem enim, dictum at magna eu, hendrerit hendrerit arcu. Etiam vulputate ac tortor ac gravida. Proin accumsan placerat rutrum. Praesent ut eros ac nisi ultrices rhoncus et nec nunc</p>

					<p>Nulla fermentum eros vitae est finibus dapibus. Aliquam porta nulla a elit varius efficitur. In in magna sed turpis venenatis tristique eu eget neque. Duis condimentum libero ornare quam tincidunt interdum. Phasellus porttitor nisi ut lectus pellentesque, ut fringilla leo convallis. </p>

					<blockquote>
						<p>Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.</p>
						<p><strong>- Steve Job’s</strong></p>
					</blockquote>
				</div>
			</section>
</div><!-- .site-content -->
@endsection