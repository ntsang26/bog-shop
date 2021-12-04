@extends('frontend.layout_master')

@section('main-header')
    @include('frontend.include.header')
@endsection

@section('main-content')
    @include('frontend.include.category')
    @include('frontend.include.product')
@endsection

@section('main-footer')
    @include('frontend.include.footer')
@endsection