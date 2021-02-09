@extends('/blog_themes/main')


@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
                <div class="post-preview">
                    <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <p class="text-secondary">{{$post->category}}</p>
                        <h3 class="post-body font-weight-normal mb-4">{{ substr($post->body, 0,  250) }}
                        </h3>
                    </a>
                    <a href="post/{{$post->id}}" class="bg-info text-white p-2">Read more</a>
                    <p class="post-meta pt-2">Posted by
                        <a href="#">Start Bootstrap</a>
                        on {{$post->created_at}}</p>
                </div>
                </div>
        @endforeach
        <!-- Pager -->
            <div class="clearfix">
                {{$posts->links() }}
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
@endsection
