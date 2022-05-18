@extends('layouts.app')

@section('content')
        

<div id="content" class="site-content shop-content">
            <div class="page-title parallax-window" data-parallax="scroll" data-image-src="images/placeholder/shop-title.jpg">
                <div class="container">
                    <h1>Shop Grid</h1>
                    <div class="breadcrumb">
                        <div class="contact-form">
                            <h3 class="title">LOGIN</h3><br>
                            <form action="#" method="get">
                                <input class="input-text" type="text" placeholder="Email *">
                                <input class="input-text" type="email" placeholder="Password *">
                                <input class="button primary rounded" type="submit" value="LOGIN">
                                <input class="button primary rounded" type="submit" value="REGISTER">
                            </form>
                        </div>
                    </div><!-- .breadcrumb -->
                </div><!-- .container -->
            </div><!-- .page-title -->
            <div class="container">
                <div class="row">
                    <main id="main" class="site-main col-md-9">
                        <div class="sort clearfix">
                            <form action="#" class="ordering pull-left">
                                <div class="selectbox">
                                    <select class="orderby" name="orderby">
                                        <option value="menu_order">GENRE</option>
                                        <option value="popularity">ROMANCE</option>
                                        <option value="rating">FAN-FICTION</option>
                                        <option value="date">FANTASY</option>
                                        <option value="price">SCIENCE-FICTION</option>
                                        <option value="price-desc">CLASSIC</option>
                                        <option value="price">ADULT</option>
                                        <option value="price">POEM</option>
                                        <option value="price">NON-FICTION</option>
                                        <option value="price">BIOGRAPY</option>
                                    </select>
                                </div>
                            </form>
                            <div class="style-switch pull-right clearfix">                              
                                <a class="active" href="#" data-view="grid"><i class="fa fa-th"></i></a>
                                <a href="#" data-view="list"><i class="fa fa-th-list"></i></a>
                            </div>
                        </div><!-- .sort -->
                        <h3>KATEGORI</h3>
                        <br>
                    </main>
                    <main id="main" class="site-main col-md-9">
                        <div class="products layout grid column-4">
                            <div class="product">
                                <div class="p-inner shadow clearfix">
                                    <span class="badge onnew">New</span>
                                    <div class="p-thumb">
                                        <a href="single-product.html"><img src="images/placeholder/product1.jpg" alt=""></a>
                                    </div><!-- .p-thumb -->

                                    <div class="p-info">
                                        <h3 class="p-title"><a href="single-product.html">Furiously Happy: A Funny Book About Horrible</a></h3>
                                        <div class="p-meta">
                                            <span class="p-cat">by <a href="#">Jenny Lawson</a></span> 
                                            <br>
                                            <span class="p-cat">Genre :<a href="#">HORROR</a></span> 
                                        </div><!-- .p-meta -->
                                        
                                        <div class="p-desc">
                                            <p>In Furiously Happy, #1 New York Times bestselling author Jenny Lawson explores her lifelong battle with mental illness. A hysterical, ridiculous book about crippling depression and anxiety? That sounds like a terrible idea. Donec faucibus quam consectetur, elementum turpis ut, fringilla nisi. Mauris sit amet sollicitudin libero, maximus sollicitudin enim. </p>
                                        </div>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true">10k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true">50k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-list" aria-hidden="true">4</i></a>
                                                </li>
                                            </ul>
                                        </div><!-- .p-rating -->
                                    </div><!-- .p-info -->

                                    <div class="p-actions">
                                        <a class="button rounded primary add-to-cart-button" href="#"><i class="fa fa-shopping-bag"></i> Add to Cart</a>
                                        <a class="compare-button" href="#"><i class="fa fa-retweet"></i> Compare</a>
                                        <span class="saperator"> | </span>
                                        <a class="wishlist-button" href="#"><i class="fa fa-heart"></i> Wishlist</a>
                                    </div><!-- .p-actions -->
                                </div><!-- .p-inner -->
                            </div><!-- .product -->

                            <div class="product">
                                <div class="p-inner shadow clearfix">
                                    <div class="p-thumb">
                                        <a href="single-product.html"><img src="images/placeholder/product2.jpg" alt=""></a>
                                    </div><!-- .p-thumb -->

                                    <div class="p-info">
                                        <h3 class="p-title"><a href="single-product.html">The Boiling River: Adventures and Discovery in the Amazon</a></h3>
                                        <div class="p-meta">
                                            <span class="p-cat">by <a href="#">Andrés Ruzo</a></span>
                                            <br>
                                            <span class="p-cat">Genre :<a href="#">HORROR</a></span>    
                                        </div><!-- .p-meta -->
                                        
                                        <div class="p-desc">
                                            <p>In this exciting adventure mixed with amazing scientific discovery, a young, exuberant explorer and geoscientist, journeys deep into the Amazon—where rivers boil and legends come to life. Praesent vitae dui id risus convallis ornare. Proin magna libero, blandit sit amet pulvinar a, volutpat ac quam. Integer rutrum sem at purus tristique, ut accumsan tortor posuere.</p>
                                        </div>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true">10k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true">50k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-list" aria-hidden="true">4</i></a>
                                                </li>
                                            </ul>
                                        </div><!-- .p-rating -->
                                    </div><!-- .p-info -->

                                    <div class="p-actions">
                                        <a class="button rounded primary add-to-cart-button" href="#"><i class="fa fa-shopping-bag"></i> Add to Cart</a>
                                        <a class="compare-button" href="#"><i class="fa fa-retweet"></i> Compare</a>
                                        <span class="saperator"> | </span>
                                        <a class="wishlist-button" href="#"><i class="fa fa-heart"></i> Wishlist</a>
                                    </div><!-- .p-actions -->
                                </div><!-- .p-inner -->
                            </div><!-- .product -->

                            <div class="product">
                                <div class="p-inner shadow clearfix">
                                    <div class="p-thumb">
                                        <a href="single-product.html"><img src="images/placeholder/product3.jpg" alt=""></a>
                                    </div><!-- .p-thumb -->

                                    <div class="p-info">
                                        <h3 class="p-title"><a href="single-product.html">Big Magic: Creative Living Beyond Fear</a></h3>
                                        <div class="p-meta">
                                            <span class="p-cat">by <a href="#">Elizabeth Gilbert</a></span>
                                            <br>
                                            <span class="p-cat">Genre :<a href="#">HORROR</a></span>  
                                        </div><!-- .p-meta -->
                                        
                                        <div class="p-desc">
                                            <p>Readers of all ages and walks of life have drawn inspiration and empowerment from Elizabeth Gilbert’s books for years. Now this beloved author digs deep into her own generative process to share her wisdom and unique perspective about creativity. With profound empathy and radiant generosity, she offers potent insights into the mysterious nature of inspiration.</p>
                                        </div>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true">10k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true">50k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-list" aria-hidden="true">4</i></a>
                                                </li>
                                            </ul>
                                        </div><!-- .p-rating -->
                                    </div><!-- .p-info -->

                                    <div class="p-actions">
                                        <a class="button rounded primary add-to-cart-button" href="#"><i class="fa fa-shopping-bag"></i> Add to Cart</a>
                                        <a class="compare-button" href="#"><i class="fa fa-retweet"></i> Compare</a>
                                        <span class="saperator"> | </span>
                                        <a class="wishlist-button" href="#"><i class="fa fa-heart"></i> Wishlist</a>
                                    </div><!-- .p-actions -->
                                </div><!-- .p-inner -->
                            </div><!-- .product -->

                            <div class="product">
                                <div class="p-inner shadow clearfix">
                                    <div class="p-thumb">
                                        <a href="single-product.html"><img src="images/placeholder/product4.jpg" alt=""></a>
                                    </div><!-- .p-thumb -->

                                    <div class="p-info">
                                        <h3 class="p-title"><a href="single-product.html">TED Book: How We'll Live on Mars</a></h3>
                                        <div class="p-meta">
                                            <span class="p-cat">by <a href="#">Stephen Petranek</a></span> 
                                            <br>
                                            <span class="p-cat">Genre :<a href="#">HORROR</a></span>  
                                        </div><!-- .p-meta -->
                                        
                                        <div class="p-desc">
                                            <p>It sounds like science fiction, but award-winning journalist Stephen Petranek considers it fact: Within 20 years, humans will live in Mars. We’ll need to. In this sweeping, provocative book. Donec faucibus quam consectetur, elementum turpis ut, fringilla nisi. Mauris sit amet sollicitudin libero, maximus sollicitudin enim. Duis malesuada rhoncus tortor nec semper. </p>
                                        </div>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true">10k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true">50k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-list" aria-hidden="true">4</i></a>
                                                </li>
                                            </ul>
                                        </div><!-- .p-rating -->
                                    </div><!-- .p-info -->

                                    <div class="p-actions">
                                        <a class="button rounded primary add-to-cart-button" href="#"><i class="fa fa-shopping-bag"></i> Add to Cart</a>
                                        <a class="compare-button" href="#"><i class="fa fa-retweet"></i> Compare</a>
                                        <span class="saperator"> | </span>
                                        <a class="wishlist-button" href="#"><i class="fa fa-heart"></i> Wishlist</a>
                                    </div><!-- .p-actions -->
                                </div><!-- .p-inner -->
                            </div><!-- .product -->
                        </div><!-- .products -->
                    </main><!-- .site-main -->
                    <div id="sidebar" class="sidebar col-md-3">
                        <aside class="widget">
                            <h3 class="widget-title">LOGIN/SIGN UP</h3>
                            <br>
                                <form class="w3-container form-horizontal" role="form" method="POST">
                                    <div class="form-group">
                                        <label for="email" class="col-md-3 control-label">E-Mail </label>
                                        <div class="col-md-3">
                                            <input id="email" class="w3-input w3-border" type="text"  name="email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md-3 control-label">Password</label>
                                        <div class="col-md-3">
                                            <input id="password" class="w3-input w3-border" type="password" name="password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary" style="background-color:#086100">
                                                Login
                                            </button>
                                            <a href="{{ env('APP_URL') }}/landing-register"><button type="button" class="btn btn-primary" style="background-color:#C90500" a href="{{ env('APP_URL') }}/landing-register">
                                                Register
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                        </aside><!-- .widget -->
                    </div>

                    <main id="main" class="site-main col-md-9">
                        <h3>KATEGORI</h3>
                        <br>
                        <div class="products layout grid column-4">
                            <div class="product">
                                <div class="p-inner shadow clearfix">
                                    <span class="badge onnew">New</span>
                                    <div class="p-thumb">
                                        <a href="single-product.html"><img src="images/placeholder/product1.jpg" alt=""></a>
                                    </div><!-- .p-thumb -->

                                    <div class="p-info">
                                        <h3 class="p-title"><a href="single-product.html">Furiously Happy: A Funny Book About Horrible</a></h3>
                                        <div class="p-meta">
                                            <span class="p-cat">by <a href="#">Jenny Lawson</a></span> 
                                            <br>
                                            <span class="p-cat">Genre :<a href="#">HORROR</a></span> 
                                        </div><!-- .p-meta -->
                                        
                                        <div class="p-desc">
                                            <p>In Furiously Happy, #1 New York Times bestselling author Jenny Lawson explores her lifelong battle with mental illness. A hysterical, ridiculous book about crippling depression and anxiety? That sounds like a terrible idea. Donec faucibus quam consectetur, elementum turpis ut, fringilla nisi. Mauris sit amet sollicitudin libero, maximus sollicitudin enim. </p>
                                        </div>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true">10k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true">50k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-list" aria-hidden="true">4</i></a>
                                                </li>
                                            </ul>
                                        </div><!-- .p-rating -->
                                    </div><!-- .p-info -->

                                    <div class="p-actions">
                                        <a class="button rounded primary add-to-cart-button" href="#"><i class="fa fa-shopping-bag"></i> Add to Cart</a>
                                        <a class="compare-button" href="#"><i class="fa fa-retweet"></i> Compare</a>
                                        <span class="saperator"> | </span>
                                        <a class="wishlist-button" href="#"><i class="fa fa-heart"></i> Wishlist</a>
                                    </div><!-- .p-actions -->
                                </div><!-- .p-inner -->
                            </div><!-- .product -->

                            <div class="product">
                                <div class="p-inner shadow clearfix">
                                    <div class="p-thumb">
                                        <a href="single-product.html"><img src="images/placeholder/product2.jpg" alt=""></a>
                                    </div><!-- .p-thumb -->

                                    <div class="p-info">
                                        <h3 class="p-title"><a href="single-product.html">The Boiling River: Adventures and Discovery in the Amazon</a></h3>
                                        <div class="p-meta">
                                            <span class="p-cat">by <a href="#">Andrés Ruzo</a></span>
                                            <br>
                                            <span class="p-cat">Genre :<a href="#">HORROR</a></span>    
                                        </div><!-- .p-meta -->
                                        
                                        <div class="p-desc">
                                            <p>In this exciting adventure mixed with amazing scientific discovery, a young, exuberant explorer and geoscientist, journeys deep into the Amazon—where rivers boil and legends come to life. Praesent vitae dui id risus convallis ornare. Proin magna libero, blandit sit amet pulvinar a, volutpat ac quam. Integer rutrum sem at purus tristique, ut accumsan tortor posuere.</p>
                                        </div>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true">10k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true">50k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-list" aria-hidden="true">4</i></a>
                                                </li>
                                            </ul>
                                        </div><!-- .p-rating -->
                                    </div><!-- .p-info -->

                                    <div class="p-actions">
                                        <a class="button rounded primary add-to-cart-button" href="#"><i class="fa fa-shopping-bag"></i> Add to Cart</a>
                                        <a class="compare-button" href="#"><i class="fa fa-retweet"></i> Compare</a>
                                        <span class="saperator"> | </span>
                                        <a class="wishlist-button" href="#"><i class="fa fa-heart"></i> Wishlist</a>
                                    </div><!-- .p-actions -->
                                </div><!-- .p-inner -->
                            </div><!-- .product -->

                            <div class="product">
                                <div class="p-inner shadow clearfix">
                                    <div class="p-thumb">
                                        <a href="single-product.html"><img src="images/placeholder/product3.jpg" alt=""></a>
                                    </div><!-- .p-thumb -->

                                    <div class="p-info">
                                        <h3 class="p-title"><a href="single-product.html">Big Magic: Creative Living Beyond Fear</a></h3>
                                        <div class="p-meta">
                                            <span class="p-cat">by <a href="#">Elizabeth Gilbert</a></span>
                                            <br>
                                            <span class="p-cat">Genre :<a href="#">HORROR</a></span>  
                                        </div><!-- .p-meta -->
                                        
                                        <div class="p-desc">
                                            <p>Readers of all ages and walks of life have drawn inspiration and empowerment from Elizabeth Gilbert’s books for years. Now this beloved author digs deep into her own generative process to share her wisdom and unique perspective about creativity. With profound empathy and radiant generosity, she offers potent insights into the mysterious nature of inspiration.</p>
                                        </div>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true">10k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true">50k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-list" aria-hidden="true">4</i></a>
                                                </li>
                                            </ul>
                                        </div><!-- .p-rating -->
                                    </div><!-- .p-info -->

                                    <div class="p-actions">
                                        <a class="button rounded primary add-to-cart-button" href="#"><i class="fa fa-shopping-bag"></i> Add to Cart</a>
                                        <a class="compare-button" href="#"><i class="fa fa-retweet"></i> Compare</a>
                                        <span class="saperator"> | </span>
                                        <a class="wishlist-button" href="#"><i class="fa fa-heart"></i> Wishlist</a>
                                    </div><!-- .p-actions -->
                                </div><!-- .p-inner -->
                            </div><!-- .product -->

                            <div class="product">
                                <div class="p-inner shadow clearfix">
                                    <div class="p-thumb">
                                        <a href="single-product.html"><img src="images/placeholder/product4.jpg" alt=""></a>
                                    </div><!-- .p-thumb -->

                                    <div class="p-info">
                                        <h3 class="p-title"><a href="single-product.html">TED Book: How We'll Live on Mars</a></h3>
                                        <div class="p-meta">
                                            <span class="p-cat">by <a href="#">Stephen Petranek</a></span> 
                                            <br>
                                            <span class="p-cat">Genre :<a href="#">HORROR</a></span>  
                                        </div><!-- .p-meta -->
                                        
                                        <div class="p-desc">
                                            <p>It sounds like science fiction, but award-winning journalist Stephen Petranek considers it fact: Within 20 years, humans will live in Mars. We’ll need to. In this sweeping, provocative book. Donec faucibus quam consectetur, elementum turpis ut, fringilla nisi. Mauris sit amet sollicitudin libero, maximus sollicitudin enim. Duis malesuada rhoncus tortor nec semper. </p>
                                        </div>
                                        <div class="course-meta">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true">10k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true">50k</i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-list" aria-hidden="true">4</i></a>
                                                </li>
                                            </ul>
                                        </div><!-- .p-rating -->
                                    </div><!-- .p-info -->

                                    <div class="p-actions">
                                        <a class="button rounded primary add-to-cart-button" href="#"><i class="fa fa-shopping-bag"></i> Add to Cart</a>
                                        <a class="compare-button" href="#"><i class="fa fa-retweet"></i> Compare</a>
                                        <span class="saperator"> | </span>
                                        <a class="wishlist-button" href="#"><i class="fa fa-heart"></i> Wishlist</a>
                                    </div><!-- .p-actions -->
                                </div><!-- .p-inner -->
                            </div><!-- .product -->
                        </div><!-- .products -->
                    </main><!-- .site-main -->

                    <div id="sidebar" class="sidebar col-md-3">
                        <aside class="widget courses-widget">
                            <h3 class="widget-title">NEWS FEED</h3>
                            <div class="courses">
                                <ul>
                                    <li>
                                        <a class="thumb" href="#"><img src="front/images/newsfeed/course-wd1.jpg" alt=""></a>
                                        <div class="info">
                                            <h4><a href="#">The Secret to Making Money by starting a small business.</a></h4>
                                            <span><i class="fa fa-users"></i> 2289</span>
                                        </div>
                                    </li>

                                    <li>
                                        <a class="thumb" href="#"><img src="front/images/newsfeed/course-wd2.jpg" alt=""></a>
                                        <div class="info">
                                            <h4><a href="#">Landscape Architecture, and Urban Planning</a></h4>
                                            <span><i class="fa fa-users"></i> 1762</span>
                                        </div>
                                    </li>

                                    <li>
                                        <a class="thumb" href="#"><img src="front/images/newsfeed/course-wd3.jpg" alt=""></a>
                                        <div class="info">
                                            <h4><a href="#">Lesson english how to write a paragraph (writing)</a></h4>
                                            <span><i class="fa fa-users"></i> 1226</span>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- .widget -->
                        </aside><!-- .widget -->
                    </div><!-- .sidebar -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .site-content -->
@endsection