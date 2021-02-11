
@extends('blog_themes/main')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
{{--            @include('blog_themes/_partials/errors')--}}
            <form action="/store" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Category Name" name="namecat">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
