@extends('blog_themes/main')
@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @include('blog_themes/_partials/errors')
    <form action="/storepost" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Pavadinimas" name="title">
        </div>
        <div class="form-group">
            <select class="form-select" aria-label="Default select example" name="categoryid">
                <option selected>Choose Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <textarea class="form-control" placeholder="Tekstas" name="body"></textarea>
        </div>
        <div class="form-group">
            <label for="upload">Nuotrauka</label>
            <input type="file" class="form-control" id="upload" name="img">
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>
    </div>


@endsection
