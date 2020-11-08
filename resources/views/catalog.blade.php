@extends('layouts.app')

@push('scripts')
    <script>
$.get('/api/items?collapse=author&size=50', items => {
    $.get('/api/authors?size=' + items.total, authors => {
        const counts = {};

        authors.forEach(author => {
            counts[author.key] = author.doc_count;
        });

        items.data.forEach(item => {
            console.log(item, counts[item.model.author]);
        });
    });
});
    </script>
@endpush
