@extends('layouts.admin')
@section('content')
<div class="content">
    {{-- <link href="https://unpkg.com/intro.js/minified/introjs.min.css" rel="stylesheet"> --}}
    <!-- Add IntroJs RTL styles -->
    <link href="{{ asset('dist/introjs.css')}}" rel="stylesheet">
    <link href="{{ asset('dist/introjs-rtl.css')}}" rel="stylesheet">

@include('dashboard')
@include('dashboard_2')
@include('sectionDas')

</div>
@endsection
{{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
{{-- <script src="{{ asset('dist/js/adminlte.js') }}"></script> --}}
<script src="{{ asset('dist/intro.js') }}"></script>

@section('scripts')

@endsection