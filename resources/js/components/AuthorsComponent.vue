<template>
    <div class="authors">
        <div class="filters mb-4">
            <a href="#" class="set-filter lead"
                    v-on:click="toggleOnlyWithAwards()"
                    :class="{'active': only_with_awards}">ocenění</a>

            <a href="#" class="set-filter lead ml-3"
                    v-on:click="toggleOnlyWithoutAwards()"
                    :class="{'active': only_without_awards}">ostatní</a>
        </div>

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
                only_without_awards: false,
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

                        self.$nextTick(() => {
                            const id = location.hash.substring(1);
                            const el = document.getElementById(id);
                            if (el) {
                                el.scrollIntoView({
                                    behavior: 'smooth'
                                });
                            }
                        })
                    }));
            },

            filteredItems() {
                if(!this.only_with_awards && !this.only_without_awards) return this.items;

                let activeItems = [];
                let self = this;
                this.items.forEach(function(item) {
                    if (self.only_with_awards && item.document.content.additionals.award) {
                        activeItems.push(item);
                    }

                    if (self.only_without_awards && !item.document.content.additionals.award) {
                        activeItems.push(item);
                    }
                });

                return activeItems;
            },

            toggleOnlyWithAwards() {
                this.only_with_awards = !this.only_with_awards;
                this.only_without_awards = false;
            },

            toggleOnlyWithoutAwards() {
                this.only_without_awards = !this.only_without_awards;
                this.only_with_awards = false;
            }
        }
    }
</script>
