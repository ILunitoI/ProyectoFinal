@extends('dashboard.master')
@section('content')
@include('dashboard.partials.validation-errors')
    <form action="{{route('admin.update', $admin->id)}}" method="POST">
        @method('PUT')
        @include('dashboard.admin._form')
    </form>
@endsection