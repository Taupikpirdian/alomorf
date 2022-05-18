    @foreach($categories as $key => $category)
    <section id="home-popular">
        <div class="container">
            <h2 class="main-title ribbon"><span>{{$category->name}}</span></h2>
            <div class="team-slider carou-slider animation-element fade-in">
                <div class="slider">
                <?php
                    $stories = $story->where('id_category', $category->id_category);
                ?>
                @foreach($stories->slice(0,15) as $i=>$storys)
                    <div class="item">
                        <div class="team box shadow clearfix">
                            <div class="thumb">
                                <a href="{{ url('/book-detail/'.$storys->id_story) }}"><img src="{{URL::asset('images/story/thumbs/'.$storys->cover_photo)}}" alt=""></a>
                            </div>

                            <div class="p-info">
                                <h3 class="p-title"><a href="{{ url('/book-detail/'.$storys->id_story) }}"> {{ $storys->title }}</a></h3>
                                <div class="p-meta">
                                    <span class="p-cat">by <a href="{{ url('/book-detail') }}">{{ $storys->nama_user }}</a></span> 
                                    <br>
                                    <span class="p-cat">Genre :<a href="{{ url('/book-detail') }}">{{ $storys->nama_category }}</a></span> 
                                </div>
                                
                                <div class="p-desc">
                                    <p>{{ str_limit($storys->description, 180) }} </p>
                                </div>
                                <div class="course-meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true">  {{ $storys->viewer }}</i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
    <hr>
    @endforeach