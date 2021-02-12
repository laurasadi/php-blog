@extends('/blog_themes/main')


@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
                <div class="post-preview">
                    <div class="post-preview">
                        <a href="#">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                            <p class="text-secondary">{{$post->namecat}}</p>
                            <h3 class="post-body font-weight-normal mb-4">{{ substr($post->body, 0,  250) }}
                            </h3>

                            <div>
                            <img src="{{asset($post->img)}}">
                            </div>

                        </a>
                        <a href="post/{{$post->id}}" class="bg-info text-white p-2">Read more</a>
                        <p class="post-meta pt-2">Posted by
                            <a href="#">{{$post->name}}</a>
                            on {{$post->created_at}}</p>

                        <a href="/edit/{{$post->id}}" class="bg-info text-white p-2">Edit</a>
                        <a href="/delete/{{$post->id}}" class="bg-info text-white p-2">Delete</a>

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
