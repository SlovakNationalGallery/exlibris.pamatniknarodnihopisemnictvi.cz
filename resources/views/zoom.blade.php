@extends('layouts.app', ['fullHeight' => true])

@section('content')
    <zoom-component author="{{ $author }}"
                    back-url="{{ route('catalog') }}#{{ $author }}"
                    v-bind:page="{{ $page }}"
    ></zoom-component>
@endsection
