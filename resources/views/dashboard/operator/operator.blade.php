@extends('dashboard.master')
@section('content')
@include('dashboard.partials.validation-errors')
    <form action="{{route('operator.store')}}" method="POST">
        @include('dashboard.operator._form')
    </form>
@endsection


 