<template>
    <div class="item mb-5" :id="getAuthorSlug(item)">
        <div class="row no-gutters align-items-end border-bottom pb-4">
            <div class="col-12 col-md-8 image-container">
                <a :href="`/zoom/${getAuthorAnchor(item)}/${page}`">
                    <img :src="getImage(item.document.content.id)" :alt="item.document.content.title">
                </a>
            </div>
            <div class="col-md-4 pt-2 pl-md-3 font-weight-bold font-serif">
                <a href="#prev" v-on:click="getPrev()" class="p-1">&lt;</a>
                {{ page }}/{{ count }}
                <a href="#next" v-on:click="getNext()" class="p-1">&gt;</a>
            </div>
        </div>
        <div class="row no-gutters border-bottom border-bottom-md-0">
            <div class="col-md-8 border-right-md pr-3">
                <h2 class="font-serif mb-3 mt-1 mt-md-0">{{ item.document.content.author.join(', ') }}</h2>
                <p v-html="getDescription(item)"></p>
            </div>
            <div class="col-md-4 pl-md-3 pt-3">
                <h4 class="text-primary mb-3" v-if="item.document.content.additionals.award">
                    {{ item.document.content.additionals.award }}
                </h4>
                <p class="font-weight-bold" v-if="item.document.content.additionals.award_category">
                    {{ item.document.content.additionals.award_category }}
                </p>
                <p class="font-weight-bold">
                    {{ item.document.content.author.join(', ') }}<br>
                    {{ item.document.content.title }}<br>
                    {{ item.document.content.technique.join(', ') }}<br>
                    {{ item.document.content.measurement.join(', ') }}<br>
                    {{ item.document.content.date_earliest }}
                </p>
                <p class="font-weight-bold">
                    inv. číslo: {{ item.document.content.identifier }}
                </p>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                page: 1,
                item: this.firstItem,
                endpoint: '/api/items?size=1&page=',
            };
        },

        props: ['firstItem', 'count'],

        methods: {
            getImage(id) {
                return process.env.MIX_WEBUMENIA_URL + '/dielo/nahlad/' + id + '/800';
            },
            getPrev() {
                this.page = (this.page-1) % this.count || this.count;
                this.fetchItem(this.page);
            },
            getNext() {
                this.page = (this.page+1) % this.count || this.count;
                this.fetchItem(this.page);
            },
            fetchItem(page) {
                const endpoint = this.endpoint + page + '&author=' + this.item.document.content.author[0];

                axios.get(endpoint)
                    .then(({data}) => {
                        this.item = data.data[0];
                    });
            },
            getAuthorSlug(item) {
                return slugify(item.document.content.author.join(', '), {
                    lower: true
                });
            },
            getAuthorAnchor(item) {
                return item.document.content.author.join(', ').replaceAll(' ', '+');
            },
            getDescription(item) {
                let replacement = '.<br><br>';
                let str = item.document.content.description;
                if (item.document.content.additionals.award_category=='Studentská kategorie') {
                    str = str.replace('.', replacement);
                }
                return str.replace(/\.([^\.]*)$/, replacement + '$1');
            }
        }
    }
</script>
