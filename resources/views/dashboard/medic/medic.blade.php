@extends('dashboard.master')
@section('content')
@include('dashboard.partials.validation-errors')
    <form action="{{route('medic.store')}}" method="POST">
        @include('dashboard.medic._form')
    </form>
@endsection


 