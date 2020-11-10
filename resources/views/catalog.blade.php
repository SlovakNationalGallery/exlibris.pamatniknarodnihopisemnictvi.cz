@extends('layouts.app')

@section('content')
    @include('components.header')

    <main class="container-fluid mb-6">
        <div class="row no-gutters">
            <div class="col-lg-6 offset-lg-3">
                <authors-component></authors-component>
            </div>
        </div>
    </main>

    @include('components.back-to-top')
@endsection
