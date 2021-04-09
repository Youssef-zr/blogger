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
                            <li class="ml-1"><a href="#"><label class="badge badge-primary">{{$category->title}}</label></a></li>
                        @else
                            <li class="ml-1"><a href="#"><label class="badge badge-danger">{{$category->title}}</label></a></li>
                        @endif

                        @php
                            $i++;
                        @endphp
                    @endforeach

                </ul>
            </div>
            <div class="post-date mb-3">
                <span class="text-underline" style="font-size:16px">
                    <i class="fa fa-clock-o ml-2" style="font-size:18px"></i>
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
   <section class="recent-post card">
        <div class="card-header text-right p-2">
            <a href="#">
                <h4 class="bg-primary text-white p-2 d-inline-block my-0"> 
                    <i class="fa fa-history ml-2"></i>
                    مواضيع ذات صلة
                </h4>
            </a>
        </div>
         {{-- posts carousel --}}
         <div class="card-body posts-cards">
             <div class="owl-carousel owl-theme">
                 @foreach ($related_posts as $posts)
                    @foreach ($posts as $post)
                        {{-- post card --}}
                        <div class="post-card text-right">
                            <div class="post-image">
                                <img src="{{ image_path($post->image) }}" class="img-thumbnail" alt="post image">
                            </div>
                            <div class="post-content">
                                <p class="post-summary mt-2">{{ $post->summary }}</p>
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
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive:{
                0: {
                    items: 1,
                },
                452: {
                    items: 2,
                },
                550: {
                    items: 3,
                },
                992: {
                    items: 5,
                },
            }
        });

    })
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

    <style>
        .post-image{
            width:200px;
            margin: 15px 0;
        }

        .post-image img{
            max-width: 100%
        }
    </style>
@endsection