<template>
    <div class="item my-5">
        <div class="row no-gutters align-items-end border-bottom py-4">
            <div class="col-8 col-md-4">
                <a class="" href="#zoom">
                    <img :src="getImage(item.document.content.id)" alt="" class="img-fluid">
                </a>
            </div>
            <div class="col-md-4 offset-md-4 pt-2 pl-md-3 font-weight-bold font-serif">
                <a href="#prev" v-on:click="getPrev()">&lt;</a>
                {{ page }}/{{ count }}
                <a href="#next" v-on:click="getNext()">&gt;</a>
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

</template>

<script>
    export default {
        data() {
            return {
                page: 1,
                item: this.firstItem,
                endpoint: 'api/items?size=1&page=',
            };
        },

        props: ['firstItem', 'count'],

        methods: {
            getImage(id) {
                return process.env.MIX_WEBUMENIA_URL + '/dielo/nahlad/' + id + '/600';
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
                const endpoint = this.endpoint + page + '&author=' + this.item.document.content.author.toString();

                axios.get(endpoint)
                    .then(({data}) => {
                        this.item = data.data[0];
                    });
            }
        }
    }
</script>
