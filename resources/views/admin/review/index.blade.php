@extends('layouts.admin')
@section('content')
    @include('admin.review.buttons', ['id' => 1])

    @include('components.review')

@endsection
