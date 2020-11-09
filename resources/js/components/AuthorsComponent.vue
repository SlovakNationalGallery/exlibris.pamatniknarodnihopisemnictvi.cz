<template>
    <div>
        <item-component v-for="item in items" :firstItem="item" :count="counts[item.model.author]" :key="item.model.author"></item-component>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                counts: {},
                items: [],
                endpoint_items: 'api/items?collapse=author&size=50',
                endpoint_authors: 'api/authors?size=50'
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch() {
                let self = this;
                axios.all([axios.get(this.endpoint_items), axios.get(this.endpoint_authors)])
                    .then(axios.spread(function (items, authors) {
                        self.items = items.data.data;
                        authors.data.forEach(author => {
                            self.counts[author.key] = author.doc_count;
                        });
                    }));
            }
        }
    }
</script>
