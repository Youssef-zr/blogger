@extends('/website/layout/master')

@section('content')
    {{-- section single post --}}
   <section class="single-post text-right">
        <div class="container">
            <div class="post-category">
                <ul class="list-unstyled d-flex justify-content-start p-0 mb-2">
                    @php
                        $i = 0;
                    @endphp

                    @foreach ($post->categories as $category)
                        @if ($i%2==0)
                            <li class="ml-1"><a href="{{ url('/category/'.$category->slug) }}"><label class="badge badge-success">{{$category->title}}</label></a></li>
                        @else
                            <li class="ml-1"><a href="{{ url('/category/'.$category->slug) }}"><label class="badge badge-info">{{$category->title}}</label></a></li>
                        @endif

                        @php
                            $i++;
                        @endphp
                    @endforeach

                </ul>
            </div>
            <div class="post-date mb-3">
                <span style="font-size:14px">
                    <i class="fa fa-clock-o ml-2 text-primary" style="font-size:19px"></i>
                    {{ $post->created_at }}
                </span>
            </div>
            <div class="post-title">
                <h4 class="text-white bg-primary p-2"> {{ $post->title }} </h4>
            </div>
            <div class="post-content">
                <div class="post-image my-3">
                    <img src="{{ image_path($post->image) }}" alt="post image" class="img-responsive">
                </div>
                <div class="description" style="line-height: 1.8;font-size:18px;padding-left:46px">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
   </section>
@endsection

@php
    // declare this variable to show recent post section in the single page only
    $recent='';
@endphp

@section('recent-posts')
   {{-- Recent Posts --}}
   <section class="recent-post card mt-5">
        <div class="card-header text-right p-2">
            <a href="#">
                <h4 class="bg-primary text-white p-2 d-inline-block my-0"> 
                    <i class="fa fa-history ml-2"></i>
                    مواضيع ذات صلة
                </h4>
            </a>
        </div>
         {{-- posts carousel --}}
         <div class="card-body posts-cards pt-1 pb-3 pb-md-4">
            <div class="slick-slider">
                 @foreach ($related_posts as $posts)
                    @foreach ($posts as $post)
                        {{-- post card --}}
                        <div class="post-card text-right">
                            <div class="post-image">
                                <img src="{{ image_path($post->image) }}" class="img-thumbnail" alt="post image">
                            </div>
                            <div class="post-content">
                                <p class="post-summary mt-2 pl-3">{{ $post->summary }}</p>
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
                 @endforeach
             </div>
         </div>
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
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            focusOnSelect:true,
            rtl:true,
            responsive: [
                {
                    breakpoint: 480,
                    settings: {
                        arrows: true,
                        centerMode: true,
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
                    breakpoint: 968,
                    settings: {
                        slidesToShow: 4
                    }
                },
             
                {
                    breakpoint: 2000,
                    settings: {
                        slidesToShow: 5
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

    <style>
        .post-image{
            width:100%;
            margin: 15px 0;
        }

        .owl-carousel .post-image{
            width:150px !important
        }


        .post-image img{
            max-width: 100%
        }
    </style>
@endsection