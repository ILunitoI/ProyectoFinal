@extends('dashboard.master')
@section('content')
@include('dashboard.partials.validation-errors')
    <form action="{{route('admin.store')}}" method="POST">
        @include('dashboard.admin._form')
    </form>
@endsection


 