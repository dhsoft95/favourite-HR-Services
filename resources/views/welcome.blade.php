@extends('layouts.main')

@section('navigation')
@include('patrials.heander')
@include('patrials.hero')

@endsection

@section('content')
@include('patrials.services')
@include('patrials.jobs')
@include('patrials.how-to-apply')
@endsection

@section('footer')
    <!-- Your custom footer -->
@endsection
