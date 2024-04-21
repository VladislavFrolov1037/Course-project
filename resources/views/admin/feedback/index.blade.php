@extends('layouts.admin')
@section('content')
    @include('admin.feedback.buttons', ['id' => 1])

    @include('admin.feedback.main', ['approve' => false])
@endsection
