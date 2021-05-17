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
                        <div class="slick-slider">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>

        $(()=>{
            $('.slick-slider').slick({
                adaptiveHeight:true,
                lazyLoad: 'ondemand',
                infinite: true,
                speed: 500,
                cssEase: 'linear',
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 4,
                slidesToScroll: 2,
                autoplay: true,
                autoplaySpeed: 2000,
                focusOnSelect:true,
                rtl:true,
                responsive: [
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: true,
                            centerPadding: '20px',
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 2000,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                ]
                
            });
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

    {{-- noty plugin --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css"/>
    {{--  noty plugin script  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script> 
    <style>
        .noty_type__success{
            text-align: right !important
        }
    </style>
@endsection