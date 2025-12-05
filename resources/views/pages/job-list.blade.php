@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')
@endsection

@section('content')
    <livewire:job-listing />
@endsection

@section('footer')
    @include('patrials.footer')
@endsection
