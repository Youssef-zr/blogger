{{-- start header section --}}
<header>
    <div class="container text-right">
        <div class="head">
            <div class="top-space bg-dark py-2">
                <div class="row">
                    <div class="col-5">
                        <ul class="list-unstyled d-flex mb-0">
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-7">
                        <ul class="list-unstyled d-flex mb-0 justify-content-end">
                            <li><a href="#">لاعلاناتكم</a></li>
                            <li><a href="#">اتصل بنا</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="logo py-3 py-4">
                <img src="{{url('/assets/img/logo-lg.png')}}" alt="logo">
            </div>
        </div>

        {{-- nav bar --}}
        <div class="nav-bar">
            {{-- nav brand --}}
            <div class="nav-brand bg-primary py-2 pr-3 mb-2">
                 <span class="text-white brand"><i class="fa fa-bars fa-2x"></i></span>
            </div>
            <nav class="navigation bg-primary py-auto">
                {{-- nav menu --}}
                <div class="menu">
                    <ul class="nav list-unstyled">
                        <li class="nav-item"><a href="{{url('/')}}">الرئيسية</a></li>
                        <li class="nav-item"><a href="{{url('/category/1')}}">أخبار</a></li>
                        <li class="nav-item"><a href="{{url('/post/1')}}">سياسة</a></li>
                        <li class="nav-item"><a href="#">اقتصاد</a></li>
                        <li class="nav-item"><a href="#">مجتمع</a></li>
                        <li class="nav-item"><a href="#">تربية وتعليم</a></li>
                        <li class="nav-item"><a href="#">رياضة</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        
    </div>
</header>
{{-- end header section --}}