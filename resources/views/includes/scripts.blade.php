<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"
        integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.min.js"></script>
<script src="{{ asset('js/vue-resource.min.js') }}"></script>
<script>
    Vue.config.delimiters = ['[[', ']]']
    var vm = new Vue({
        el: '#vue',
        data: {
            message: "",
            secure: false
        },
        methods: {
            submit: function () {
                request = this.$http({
                    url: 'apply',
                    method: 'post',
                    data: {"string": this.message, "secure": this.secure},
                    emulateHTTP: true
                }).then(function (response) {
                    vm.message = "";
                    response.data.forEach(function (item) {
                        vm.message += item + '\n';
                    });
                }, function (response) {
                    console.error(response);
                });
            },
            clear: function () {
                vm.message = "";
            }
        }
    })
</script>
<script>
    var clipboard = new Clipboard('#clipboard');
    clipboard.on('success', function (e) {
        var $clipElement = $('#clipboard');
        var height = $clipElement.height;
        var width = $clipElement.width();
        $clipElement.fadeOut("slow", function () {
            $clipElement.height(height);
            $clipElement.width(width);
            $clipElement.text("Copied!");
            $clipElement.fadeIn("slow", function () {
                $clipElement.fadeOut("slow", function () {
                    $clipElement.text("Copy to clipboard!");
                    $clipElement.fadeIn("slow");
                });
            });
        });
    });
</script>
