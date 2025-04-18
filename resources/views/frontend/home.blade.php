@extends('frontend.layouts.app')

@section('main-content')
    @if(request()->query('search'))
        <div class="row">
            <div class="col-md-12">
                <h3>Result For: <strong>{{ request()->query('search') }}</strong></h3>
            </div>
        </div>
    @endif
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 col-sm-6 col-xs-12 mb50">
                <h4 class="blog-title">
                    <a href="{{ route('frontend.singleBlog', $post->slug) }}">{{ $post->title }}</a>
                </h4>
                <div class="blog-three-attrib">
                    <span class="icon-calendar"></span>Dec 15 2019 |
                    <span class=" icon-pencil"></span><a href="#">{{ $post->author->name }}</a>
                </div>
                <img src="{{ asset($post->thumbnail_path) }}" class="img-responsive" alt="image blog">
                <p class="mt25">
                    {{ $post->excerpt }}
                </p>
                <a href="{{ route('frontend.singleBlog', $post->slug) }}" class="button button-gray button-xs">Read More <i class="fa fa-long-arrow-right"></i></a>

            </div>
        @endforeach
    </div>

    {{ $posts->appends(request()->query())->links('frontend.partials._pagination') }}

@endsection
