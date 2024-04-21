@extends('layouts.admin')
@section('content')
    @include('admin.feedback.buttons', ['id' => 2])

    @include('admin.feedback.main', ['approve' => true])
@endsection
