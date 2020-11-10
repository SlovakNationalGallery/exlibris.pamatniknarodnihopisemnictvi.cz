<template>
    <div class="authors">
        <a href="#" class="set-filter"
                v-on:click="only_with_awards = !only_with_awards"
                :class="{'active': only_with_awards}">ocenění</a>

        <item-component v-for="item in filteredItems()" :firstItem="item" :count="counts[item.document.content.author[0]]" :key="item.document.content.author[0]"></item-component>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                counts: {},
                items: [],
                only_with_awards: false,
                endpoint_items: '/api/items?collapse=author&size=50',
                endpoint_authors: '/api/authors?size=50'
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
            },

            filteredItems() {
                if(!this.only_with_awards) return this.items;

                var activeItems = [];
                this.items.forEach(function(item) {
                    if (item.document.content.additionals.award) {
                        activeItems.push(item);
                    }
                });

                return activeItems;
            }
        }
    }
</script>
