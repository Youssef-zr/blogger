@extends('/website/layout/master')

@section('content')
    {{-- posts section --}}
    <section class="posts-content mt-4 mt-md-5">
        <div class="container">
            {{-- card section --}}
            <div class="card bg-light">
                {{-- posts heading --}}
                <div class="card-header bg-white text-right"><a href="#"><h3 class="text-white"> <span>مجتمع <i class="fa fa-chevron-circle-left"></i></span></h3></a></div>

                {{-- posts carousel --}}
                <div class="card-body posts-cards">
                    <div class="owl-carousel owl-theme">
                        {{-- post card --}}
                        <div class="post-card text-right">
                            <div class="post-image">
                                <img src="{{url('assets/img/default.jpg')}}" class="img-thumbnail" alt="post image">
                            </div>
                            <div class="post-content">
                                <p class="post-summary mt-2">عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها</p>
                                <div class="post-publish-date mb-2">
                                    <span class="text-danger">
                                        <i class="fa fa-clock-o"></i>
                                        30 مارس 2021
                                    </span>
                                </div>
                                
                                <div class="read-more mt-3">
                                    <a href="#" class="btn btn-danger btn-sm">اقرأ المزيد <i class="fa fa-chevron-circle-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- card section --}}
            <div class="card bg-light mt-4 mt-md-5">
                {{-- posts heading --}}
                <div class="card-header bg-white text-right"><a href="#"><h3 class="text-white"> <span>اقتصاد <i class="fa fa-chevron-circle-left"></i></span></h3></a></div>

                {{-- posts carousel --}}
                <div class="card-body posts-cards">
                    <div class="owl-carousel owl-theme">
                        {{-- post card --}}
                        <div class="post-card text-right">
                            <div class="post-image">
                                <img src="{{url('assets/img/default.jpg')}}" class="img-thumbnail" alt="post image">
                            </div>
                            <div class="post-content">
                                <p class="post-summary mt-2">عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها</p>
                                <div class="post-publish-date mb-2">
                                    <span class="text-danger">
                                        <i class="fa fa-clock-o"></i>
                                        30 مارس 2021
                                    </span>
                                </div>
                                
                                <div class="read-more mt-3">
                                    <a href="#" class="btn btn-danger btn-sm">اقرأ المزيد <i class="fa fa-chevron-circle-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- card section --}}
            <div class="card bg-light mt-4 mt-md-5">
                {{-- posts heading --}}
                <div class="card-header bg-white text-right"><a href="#"><h3 class="text-white"> <span>رياضة <i class="fa fa-chevron-circle-left"></i></span></h3></a></div>

                {{-- posts carousel --}}
                <div class="card-body posts-cards">
                    <div class="owl-carousel owl-theme">
                        {{-- post card --}}
                        <div class="post-card text-right">
                            <div class="post-image">
                                <img src="{{url('assets/img/default.jpg')}}" class="img-thumbnail" alt="post image">
                            </div>
                            <div class="post-content">
                                <p class="post-summary mt-2">عودة حركة الملاحة عبر قناة السويس بعد نحو أسبوع حبست خلالها التجارة العالمية أنفاسها</p>
                                <div class="post-publish-date mb-2">
                                    <span class="text-danger">
                                        <i class="fa fa-clock-o"></i>
                                        30 مارس 2021
                                    </span>
                                </div>
                                
                                <div class="read-more mt-3">
                                    <a href="#" class="btn btn-danger btn-sm">اقرأ المزيد <i class="fa fa-chevron-circle-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            margin:10,
            nav:true,
            center:true,
            rtl: true,
            lazyLoad: true,
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:false,
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
                600: {
                    items: 4
                },
                992: {
                    items: 5,
                    nav: false
                },
                1100: {
                    items: 6,
                    nav: false
                },
            }
        });

        // $('.owl-nav,.owl-dots').remove()
    })
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
@endsection