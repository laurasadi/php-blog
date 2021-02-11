@extends('blog_themes/main')
@section('content')

    <div class="row">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($categories as $category)
                    <td>{{$category->id}}</td>
                    <td>{{$category -> namecat}}</td>
                    <td><a href="/deletecategory/{{$category->id}}">Delete</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
