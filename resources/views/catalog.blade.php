@extends('layouts.app')

@push('scripts')
    <script>
$.get('/api/items?collapse=author&sort=additionals.order&size=50', function (items) {
    $.get('/api/authors?size=' + items.total, function (authors) {
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
