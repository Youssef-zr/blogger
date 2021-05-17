<aside class="mb-5 mb-lg-0">
    {{-- Latest post --}}
    <section class="latest-posts">
        <h4 class="bg-primary text-right text-white p-2">
            <i class="fa fa-th-list ml-2"></i>
            اخر الأخبار 
        </h4>
        <ul class="list-group pr-0">
            @foreach ($latest_six_posts as $item)
                {{-- post content --}}
                <li class="list-group-item">
                    <article class="post">
                        <div class="row">
                            <div class="col-4 px-0 d-flex align-items-center">
                                <div class="post-image d-block h-75">
                                    <img src="{{ image_path($item->image) }}" class="img-responsive img-thumbnail h-100" alt="post image">
                                </div>
                            </div>
                            <div class="col-8 pl-1 py-0 d-flex flex-column align-items-end justify-content-center">
                                <div class="post-title my-0">
                                    <a href="{{ url('/post/'.$item->slug) }}" class="text-dark">
                                        <p>{{ \Illuminate\Support\Str::limit($item->summary, 82, '...') }}</p>
                                    </a>
                                </div>
                                <div class="post-categories mt-1">
                                    <ul class="list-unstyled d-flex justify-content-start pl-0 ml-auto">
                                        @if (count($item->categories->toArray())>0)
                                            @foreach ($item->categories as $category)
                                                <li class="ml-1"><a href="{{ url('/category/'.$category->slug) }}"><label class="badge badge-success">{{$category->title}}</label></a></li>
                                            @endforeach
                                        @else
                                            <li class="ml-1"><a href="#"><label class="badge badge-secondary">غير مصنف</label></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                </li> 
            @endforeach
        </ul>
    </section>
        
    {{-- Advertising space --}}
    <section class="advertising-space mt-5 mb-2">
       <h4 class="bg-primary text-right text-white p-2 "><i class="fa fa-bullhorn ml-2"></i> مساحة اعلانية </h4>
       <div class="ads">
       </div>
    </section>
    
</aside>