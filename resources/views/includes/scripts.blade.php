<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"
        integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.min.js"></script>
<script src="{{ asset('js/vue-resource.min.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#vue',
        data: {
            message: ""
        },
        methods: {
            submit: function () {
                this.$http({url: 'apply?string=' + this.message, method: 'GET'}).then(function (response) {
                    this.$set('message', response.data);
                }, function (response) {
                    console.error(response);
                });
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
