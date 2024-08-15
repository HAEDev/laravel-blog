@extends(config("laravel-blog.view_layout", "laravel-blog::layout"))

@section(config("laravel-blog.view_content", "content"))

    <div class="row">

        <div class="col-sm-12">
            <h3>{{ isset($post) ? 'Edit' : 'New' }} {{ config("laravel-blog.taxonomy", "Blog") }} Post</h3>
            <hr />

            @include("laravel-blog::actions")

            @include("laravel-blog::posts.form")
        </div>

    </div> <!-- End .row -->

    @push('head')
        <link rel="stylesheet" href="{{ asset("vendor/lnch/laravel-blog/js/jodit/jodit.min.css") }}" />
        <script src="{{ asset("vendor/lnch/laravel-blog/js/jodit/jodit.min.js") }}"></script>
        <script src="{{ asset("vendor/lnch/laravel-blog/js/init-jodit-editor.js") }}"></script>
    @endpush

@endsection