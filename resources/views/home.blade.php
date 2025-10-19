@extends('layouts.main')

@section('navigation')
@include('patrials.heander')
@include('patrials.hero')

@endsection

@section('content')
@include('patrials.services')
@include('patrials.jobs')
@include('patrials.how-to-apply')
@include('patrials.clients')
@include('patrials.trusted_brands')

@endsection

@section('footer')
    @include('patrials.footer')
@endsection
