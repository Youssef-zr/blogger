@extends('/website/layout/master')

@section('content')
    {{-- posts section --}}
    <section class="posts-content">
        @if (count($latest_cat_posts)>0)
            @foreach ($latest_cat_posts as $category)
                {{-- category has postes published --}}
                {{-- card section --}}
                <div class="card bg-light mb-4">
                    {{-- posts heading --}}
                    <div class="card-header bg-white text-right py-2"><a href="{{ url('/category/'.$category->slug) }}"><h3 class="text-white my-0"> <span>{{ $category->title }} <i class="fa fa-chevron-circle-left"></i></span></h3></a></div>

                    {{-- posts carousel --}}
                    <div class="card-body posts-cards">
                        <div class="owl-carousel owl-theme">

                            @foreach ($category->posts()->get() as $post)
                            {{-- post card --}}
                            <div class="post-card text-right">
                                <div class="post-image h-75">
                                    <img src="{{image_path($post->image)}}" class="img-thumbnail" alt="post image">
                                </div>
                                <div class="post-content">
                                    <p class="post-summary mt-2">{{ \Illuminate\Support\Str::limit($post->summary, 130, '...') }}</p>
                                    <div class="post-publish-date mb-2">
                                        <span class="text-danger">
                                            <i class="fa fa-clock-o"></i>
                                            {{ $post->created_at }}
                                        </span>
                                    </div>
                                    
                                    <div class="read-more mt-3">
                                        <a href="{{ url('/post/'.$post->slug) }}" class="btn btn-danger btn-sm">اقرأ المزيد <i class="fa fa-chevron-circle-left"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col">
                <P class="alert alert-danger d-block text-center py-2 mt-5" style="font-size: 18px">
                    لا يوجد أي مقالات 
                </P>
            </div>
        @endif
    </section>
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>

    $(()=>{

        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:15,
            nav:false,
            center:true,
            rtl: true,
            lazyLoad: true,
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive:{
                0: {
                    items: 1
                },
                452: {
                    items: 2
                },
                550: {
                    items: 3
                },
                992: {
                    items: 4,
                },
            }
        });

    })
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    
    {{-- noty plugin --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css"/>
    {{--  noty plugin script  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script> 
@endsection