<!DOCTYPE html>
<html lang="en">

@include('blog_themes/_partials/head')

<body>

<!-- Navigation -->
@include('blog_themes/_partials/nav')

<!-- Page Header -->
@include('blog_themes/_partials/header')

<!-- Main Content -->
<div class="container">
    @yield('content')
</div>

<hr>

<!-- Footer -->
@include('blog_themes/_partials/footer')

<!-- Bootstrap core JavaScript -->
<script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{URL::asset('js/clean-blog.min.js')}}"></script>

</body>

</html>
