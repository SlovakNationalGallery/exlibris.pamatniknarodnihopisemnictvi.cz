<template>
    <div>
        <div class="item my-5" v-for="item in items">
            <div class="row no-gutters align-items-end border-bottom py-4">
                <div class="col-8 col-md-4">
                    <a class="" href="#zoom">
                        <img :src="getImage(item.document.content.id)" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-4 offset-md-4 pt-2 pl-md-3 font-weight-bold font-serif">
                    <a href="#prev"><</a>
                    1/{{ counts[item.model.author] }}
                    <a href="#next">></a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-md-8 border-right-md pr-3">
                    <h2 class="font-serif mb-3 mt-1 mt-md-0">{{ item.document.content.author.toString() }}</h2>
                    <p>
                        {{ item.document.content.description }}
                    </p>
                </div>
                <div class="col-md-4 pl-md-3 pt-3">
                    <h4 class="text-primary mb-3">
                        {{ item.document.content.additionals.award }}
                    </h4>
                    <p class="font-weight-bold">
                        {{ item.document.content.author.toString() }}<br>
                        {{ item.document.content.title }}<br>
                        {{ item.document.content.technique.toString() }}<br>
                        <!-- {{ item.document.content.measurement }}<br> -->
                        <!-- @todo - measurement is empty now -->
                        {{ item.document.content.date_earliest }}
                    </p>
                    <p class="font-weight-bold">
                        inv. číslo: {{ item.document.content.identifier }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                counts: {},
                items: [],
                endpoint_items: 'api/items?collapse=author&size=50',
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
            getImage(id) {
                return 'https://www.webumenia.local/dielo/nahlad/'+ id + '/600';
            }
        }
    }
</script>
