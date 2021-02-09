@extends('blog_themes/main')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            <form action="/storeupdate/{{$post->id}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pavadinimas" name="title" value="{{$post->title}}" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Kategorija" name="category" value="{{$post->category}}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Tekstas" name="body">{{$post->body}}"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit edited</button>
            </form>
        </div>
    </div>


@endsection
