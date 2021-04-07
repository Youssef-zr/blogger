@extends('/website/layout/master')

@section('content')
    {{-- posts categories --}}
    <section class="categories">
        <div class="container text-right">
            <h4 class="bg-primary text-white p-2 d-inline-block">
                <i class="fa fa-bandcamp ml-2"></i>
                {{ $catTitle }}
            </h4>
            <hr>

            <div class="category-posts">
                <div class="row">
                    @if (count($category_posts) > 0)
                        @foreach ($category_posts as $post)
                        {{-- post card --}}
                        <div class="col-sm-6 col-md-4 mb-4">
                            <div class="post-card text-right">
                                <div class="post-image">
                                    <img src="{{url('assets/img/default.jpg')}}" class="img-responsive" alt="post image">
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
                        </div>
                        @endforeach
                    @else
                        <div class="col">
                            <P class="alert alert-danger d-block text-center py-2 mt-5" style="font-size: 18px">
                                لا يوجد أي مقالات 
                            </P>
                        </div>
                    @endif
                </div>

                {{-- pagination --}}
                {{ $category_posts->links() }}

            </div>
        </div>
    </section>
@endsection