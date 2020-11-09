<template>
    <div class="zoomviewer">
        <div id="viewer"></div>

        <div id="toolbarDiv" class="autohide">
            <a id="zoom-in" href="#zoom-in" title="zoom in"><i class="fa fa-plus"></i></a>
            <a id="zoom-out" href="#zoom-out" title="zoom out"><i class="fa fa-minus"></i></a>
            <a id="home" href="#home" title="zoom to fit"><i class="fa fa-home"></i></a>
            <a id="full-page" href="#full-page" title="zobraz fullscreen"><i class="fa fa-expand"></i></a>
            <template v-show="items.length > 1">
                <a id="previous" href="#previous" title="předchozí související dílo"><i class="fa fa-arrow-up"></i></a>
                <a id="next" href="#next" title="následující související dílo"><i class="fa fa-arrow-down"></i></a>
            </template>
        </div>

        <div class="credit" v-if="credit">&copy; {{ credit }}</div>

        <a class="btn btn-default btn-outline return" :href="backUrl" role="button"><i class="fa fa-arrow-left"></i> zpět</a>

        <div class="autohide" v-if="items.length > 1">
            <div class="currentpage">{{ page }} / {{ items.length }}</div>
        </div>

    </div>
</template>

<script>
export default {

    data() {
        return {
            items: [],
            credit: null,
            endpoint_items: '/api/items?size=50&author=',
        };
    },

    props: ['author', 'page', 'backUrl'],

    mounted() {
        axios.get(this.endpoint_items + this.author)
            .then(items => {
                this.items = items.data.data;
                this.initViewer();
            });
    },

    methods: {
        getPreviousPage() {
            if (this.viewer.currentPage() > 0) {
                this.viewer.goToPage(this.viewer.currentPage() - 1);
            }
        },
        getNextPage() {
            if (this.viewer.currentPage() < this.items.length - 1) {
                this.viewer.goToPage(this.viewer.currentPage() + 1);
            }
        },
        shortenCopyright() {
            if ($(window).width() > 960) {
                this.credit = this.items[this.page - 1].document.content.gallery;
            } else if (this.credit.indexOf(',') > -1) {
                this.credit = this.credit.split(',').pop();
            }
        },
        initViewer() {
            const options = {
                id: 'viewer',
                toolbar: 'toolbarDiv',
                zoomInButton: 'zoom-in',
                zoomOutButton: 'zoom-out',
                homeButton: 'home',
                fullPageButton: 'full-page',
                nextButton: 'next',
                previousButton: 'previous',
                showNavigator: false,
                visibilityRatio: 1,
                minZoomLevel: 0,
                defaultZoomLevel: 0,
                autoResize: false,
                tileSources: this.items.map(item => {
                    return `https://img.webumenia.sk/zoom/?path=${item.document.content.images[0]}.dzi`;
                })
            };

            if (this.items.length > 1) {
                $.extend(options, {
                    autoHideControls: false,
                    controlsFadeDelay: 1000,
                    controlsFadeLength: 500,
                    sequenceMode: true,
                    showReferenceStrip: true,
                    referenceStripSizeRatio: 0.07,
                    referenceStripScroll: 'vertical',
                    initialPage: this.page - 1
                });
            }

            this.viewer = OpenSeadragon(options);
            this.viewer.addHandler('page', event => {
                this.page = event.page + 1;
            });

            window.addEventListener('resize', () => {
                var newSize = new OpenSeadragon.Point(window.innerWidth, window.innerHeight);
                this.viewer.viewport.resize(newSize, false);
                this.viewer.viewport.goHome(true);
                this.viewer.forceRedraw();
            });

            // zoom out instead of showing context menu on right click
            this.viewer.canvas.oncontextmenu = () => { $('#zoom-out').click(); return false; };

            $(viewer.canvas).mousedown(() => {
                if (e.button === 2) {
                    viewer.viewport.zoomBy(0.45); //0.9 * 0.5
                    return false;
                }
                return true;
            });

            $('a.return').click(() => {
                if (document.referrer.split('/')[2] === window.location.host) {
                    parent.history.back();

                    // fallback when opening in new tab/window and history.back() is disabled but referrer is defined
                    setTimeout(() => {
                        window.location.href = this.backUrl;
                    }, 500);

                    return false;
                } else {
                    window.location.href = this.backUrl;
                }
            });

            document.onkeydown = (evt) => {
                evt = evt || window.event;
                switch (evt.keyCode) {
                    case 37:
                        getPreviousPage();
                        break;
                    case 39:
                        getNextPage();
                        break;
                    case 38: //up arrow
                        getPreviousPage();
                        break;
                    case 40: //down arrow
                        getNextPage();
                        break;
                }
            };

            // hide on inactivity
            let interval = 1;
            const timeoutval = 3;

            setInterval(() => {
                if(interval === timeoutval){
                    $('.autohide, .referencestrip').fadeOut();
                    interval = 1;
                }
                interval += 1;
            }, 1000);

            $(this.viewer.canvas).bind('mousemove keydown', () => {
                $('.autohide, .referencestrip').fadeIn();
                interval = 1;
            });

            this.viewer.addHandler('canvas-click', () => {
                $('.autohide, .referencestrip').fadeIn();
                interval = 1;
            });

            $(window).resize(() => {
                this.shortenCopyright();
            });

            this.shortenCopyright();
        }
    }
}
</script>
