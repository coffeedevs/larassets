<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="{{ asset('js/tether.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"
        integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script src="{{ asset('js/vue.min.js')  }}"></script>
<script src="{{ asset('js/vue-resource.min.js') }}"></script>
<script>
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
    Vue.transition('zoom', {
        enterClass: 'zoomInUp',
        leaveClass: 'zoomOutDown'
    });
    var vm = new Vue({
        el: '#vue',
        data: {
            placeholder: "For example:\r\n\r\n<link rel=\"stylesheet\" href=\"\/css\/coffeedevs.css\">\r\n<link href=\'https:\/\/fonts.googleapis.com\/css?family=Source+Code+Pro\' rel=\'stylesheet\' type=\'text\/css\'>\r\n\r\n OR \r\n\r\n<script src=\"\/js\/clipboard.min.js\"><\/script>\r\n<script src=\"http:\/\/cdnjs.cloudflare.com\/ajax\/libs\/vue\/1.0.16\/vue.min.js\"><\/script>\r\n<script src=\"\/js\/vue-resource.min.js\"><\/script>\r\n",
            stub: "<link rel=\"stylesheet\" href=\"\/css\/coffeedevs.css\">\r\n<link href=\'https:\/\/fonts.googleapis.com\/css?family=Source+Code+Pro\' rel=\'stylesheet\' type=\'text\/css\'>\r\n<script src=\"\/js\/clipboard.min.js\"><\/script>\r\n<script src=\"http:\/\/cdnjs.cloudflare.com\/ajax\/libs\/vue\/1.0.16\/vue.min.js\"><\/script>\r\n<script src=\"\/js\/vue-resource.min.js\"><\/script>\r\n",
            message: "",
            processed: "",
            isSecure: false,
            show: false,
            elixirResources: [],
            elixirResourceInput: ""
        },
        methods: {
            submit: function () {
                request = vm.$http({
                    url: 'apply',
                    method: 'post',
                    data: {
                        "string": vm.message,
                        "secure": vm.isSecure,
                        "elixirResources": vm.elixirResources
                    }
                }).then(function (response) {
                    vm.processed = "";
                    response.data.forEach(function (item) {
                        vm.processed += item + '\n';
                    });
                    if (!vm.show)
                        vm.show = true;
                    else {
                        $('#processed').removeClass('zoomInUp animated').addClass('zoomInUp animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                            $(this).removeClass('zoomInUp animated');
                        });
                    }
                }, function (response) {
                    if (!vm.show)
                        vm.show = true;
                    else {
                        $('#processed').removeClass('shake animated').addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                            $(this).removeClass('shake animated');
                        });
                    }
                    vm.processed = "There was an error processing your request: " + response.status + " " + response.statusText;
                });
            },
            clear: function () {
                vm.message = "";
            },
            secure: function () {
                console.log("Secured!");
                vm.isSecure = !vm.isSecure;
                if (vm.isSecure)
                    $('#secure').removeClass('btn-primary').addClass('btn-success').text("Secure!");
                else $('#secure').removeClass('btn-success').addClass('btn-primary').text("Secure asset?");
            },
            test: function () {
                request = vm.$http({
                    url: 'apply',
                    method: 'post',
                    data: {"string": vm.stub, "secure": vm.isSecure}
                }).then(function (response) {
                    vm.processed = "";
                    response.data.forEach(function (item) {
                        vm.processed += item + '\n';
                    });
                    if (!vm.show)
                        vm.show = true;
                    else {
                        $('#processed').removeClass('zoomInUp animated').addClass('zoomInUp animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                            $(this).removeClass('zoomInUp animated');
                        });
                    }
                }, function (response) {
                    console.error(response);
                });
            },
            addElixirResource: function () {
                var text = this.elixirResourceInput.trim();
                if (text) {
                    this.elixirResources.push({name: text});
                    this.elixirResourceInput = '';
                }
            },
            removeElixirResource: function (index) {
                this.elixirResources.splice(index, 1)
            }
        }
    })
</script>
<script>
    var clipboard = new Clipboard('#clipboard');
    clipboard.on('success', function (e) {
        var $clipText = $('#clipboardText');
        $clipText.fadeOut("slow", function () {
            $clipText.text("Copied!");
            $clipText.fadeIn("slow", function () {
                $clipText.fadeOut("slow", function () {
                    $clipText.text("Copy to clipboard!");
                    $clipText.fadeIn("slow");
                });
            });
        });
    });
    clipboard.on('error', function (e) {
        var $clipText = $('#clipboardText');
        $clipText.fadeOut("slow", function () {
            $clipText.text("Press Ctrl+C!");
            $clipText.fadeIn("slow", function () {
                $clipText.fadeOut("slow", function () {
                    $clipText.text("Copy to clipboard!");
                    $clipText.fadeIn("slow");
                });
            });
        });
    })
</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-63308453-8', {'siteSpeedSampleRate': 50});
    ga('send', 'pageview');
</script>
<script type="text/javascript">
    window.heap = window.heap || [], heap.load = function (e, t) {
        window.heap.appid = e, window.heap.config = t = t || {};
        var n = t.forceSSL || "https:" === document.location.protocol, a = document.createElement("script");
        a.type = "text/javascript", a.async = !0, a.src = (n ? "https:" : "http:") + "//cdn.heapanalytics.com/js/heap-" + e + ".js";
        var o = document.getElementsByTagName("script")[0];
        o.parentNode.insertBefore(a, o);
        for (var r = function (e) {
            return function () {
                heap.push([e].concat(Array.prototype.slice.call(arguments, 0)))
            }
        }, p = ["clearEventProperties", "identify", "setEventProperties", "track", "unsetEventProperty"], c = 0; c < p.length; c++)heap[p[c]] = r(p[c])
    };
    heap.load("2834137027");
</script>