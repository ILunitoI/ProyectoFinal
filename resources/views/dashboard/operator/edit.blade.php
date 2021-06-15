@extends('dashboard.master')
@section('content')
@include('dashboard.partials.validation-errors')
    <form action="{{route('operator.update', $operator->id)}}" method="POST">
        @method('PUT')
        @include('dashboard.operator._form')
    </form>
@endsection