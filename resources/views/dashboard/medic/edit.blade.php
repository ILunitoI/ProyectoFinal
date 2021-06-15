@extends('dashboard.master')
@section('content')
@include('dashboard.partials.validation-errors')
    <form action="{{route('medic.update', $medic->id)}}" method="POST">
        @method('PUT')
        @include('dashboard.medic._form')
    </form>
@endsection