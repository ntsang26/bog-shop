@extends('layouts.app')

@section('content')
<form action="{{ route('bai-viet.store') }}" method="post" class="col-3 m-auto">
    @csrf
    <div>
        <label for="title">Tiêu đề: </label>
        <input type="text" name="title" class="form-control"/>
        <div>
            @error('title')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
    </div>
    <div>
        <label for="content">Nội dung: </label>
        <br>
        <textarea class="form-control" name="content" cols="25" rows="8"></textarea>
        <div>
            @error('content')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <button class="btn btn-success mt-2">Đăng bài</button>
</form>
@endsection

