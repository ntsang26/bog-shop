@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Danh sách bài viết</h1>

        <div class="text-center">
            @foreach($articles as $article)
                <div>
                    {{ $article->title }}
                </div>
            @endforeach
        </div>
    
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection



