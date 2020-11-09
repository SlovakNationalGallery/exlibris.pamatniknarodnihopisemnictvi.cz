@extends('layouts.app')

@section('content')
    <main class="container-fluid">
        <div class="row no-gutters">
            <div class="col-lg-6 offset-lg-3">
                <authors-component></authors-component>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
$.get('/api/items?collapse=author&size=50', items => {
    $.get('/api/authors?size=' + items.total, authors => {
        const counts = {};

        authors.forEach(author => {
            counts[author.key] = author.doc_count;
        });

        items.data.forEach(item => {
            // console.log(item, counts[item.model.author]);
        });
    });
});
    </script>
@endpush
