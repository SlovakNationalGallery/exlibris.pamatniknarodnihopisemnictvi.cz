<template>
    <div>
        <div class="item" v-for="author in authors">
            <div class="row no-gutters align-items-end border-bottom py-4">
                <div class="col-8 col-md-4">
                    <a class="" href="#zoom">
                        <img src="https://www.webumenia.local/dielo/nahlad/CZE:PNP.1_2020_F-112/600" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-4 offset-md-4 pt-2 pl-md-3 font-weight-bold font-serif">
                    <a href="#prev"><</a>
                    1/{{ author.doc_count }}
                    <a href="#next">></a>
                </div>
            </div>
            <div class="row no-gutters align-items-start">
                <div class="col-md-8 border-right-md pr-3">
                    <h2 class="font-serif mb-3 mt-1 mt-md-0">{{ author.key }}</h2>
                    <p>
                        ..
                    </p>
                </div>
                <div class="col-md-4 pl-md-3 pt-3">
                    <h4 class="text-primary mb-3">
                        grand prix
                    </h4>
                    <p class="font-weight-bold">
                        Barbora Bieylonovič<br>
                        Ex libris BB<br>
                        Fáze ženy III., ze série Ticho Lept, akvatinta – C3 + C5 118 x 80 mm<br>
                        2020
                        inv. číslo:<br>
                    </p>
                    <p class="font-weight-bold">
                        inv. číslo: 1/2020/F - 112
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
                authors: [],
                endpoint: 'api/authors'
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch() {
                axios.get(this.endpoint)
                    .then(({data}) => {
                        this.authors = data;
                    });
            }
        }
    }
</script>
