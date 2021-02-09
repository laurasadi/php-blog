@extends('blog_themes/main')

@section('content')
    <div class="row">
        <div clas="col-lg-8 col-md-10 mx-auto">
            <h2>{{$post -> title}}</h2>
            <p>{{$post -> body}}</p>
        </div>
    </div>
@endsection
