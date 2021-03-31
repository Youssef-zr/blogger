@include('/website/layout/header')
@include('/website/layout/nav')

{{-- section content --}}
<section class="content mt-4 mt-md-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-lg-4">
                @yield('content')
            </div>
            <div class="col-lg-4 my-4 mt-lg-0">
                @include('/website/layout/sidebar')
            </div>
        </div>
        {{-- recent posts section --}}
        @if (isset($recent))
            <div class="row mt-5">
                <div class="col">
                    @yield('recent-posts')
                </div>
            </div>
        @endif
    </div>
</section>

@include('/website/layout/footer')