<!DOCTYPE html>
<html xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container" id="team-post">
    <h1 class="text-center title">Create Your Team</h1>

    <div class="col-md-offset-3 col-md-6">
        <form role="form">
            <div class="form-group">
                <div class="input-group">
                    <label class="sr-only" for="teamName">Team Name:</label>
                    <input type="text" class="form-control team-name" id="teamName" v-model="name"
                           placeholder="Enter Your Team Name">
                    <a v-on:click="createTeam" href="#" class="input-group-addon profile-submit">
                        <span>Submit</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <button class="btn btn-default btn-lg" @click="show = !show">
    Click
    </button>


    <modal :show.sync="show" effect="fade" width="400">
        <div slot="modal-header" class="modal-header">

            <h4 class="modal-title">
                <i>Custom</i> <code>Modal</code> <b>Title</b>
            </h4>
        </div>
        <div slot="modal-body" class="modal-body">...</div>
        <div slot="modal-footer" class="modal-footer">
            <button type="button" class="btn btn-default" @click="show = false">Cancel</button>
            <button type="button" class="btn btn-success" @click="sure">Sure</button>
        </div>
    </modal>

</div>
<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.2/vue-resource.min.js"></script>
<script src="{{ asset("js/vue-strap.min.js") }}"></script>
<script type="text/javascript">
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

    new Vue({
        components: {
            'modal':VueStrap.modal,
            'alert': VueStrap.alert
        },
        el: '#team-post',
        data: {
            name:null,
            show: false
        },
        methods: {
            createTeam: function () {
                var vm = this;
                if (vm.name) {
                    vm.$http.post("/profile", {name: vm.name})
                            .then(function (response) {
                                if (response.status == 200) {
                                    //a = "{{URL::to("dialog/index")}}";
                                    vm.show = true;
                                    //window.location.href = a;
                                } else {
                                    alert(response.retMsg);
                                }

                            }, function (response) {
                                // error handle
                            });
                }

            },
            sure: function () {
                var vm = this;
                a = "{{URL::to("dialog/index")}}";
                vm.show = false;
                window.location.href = a;
            }
        }
    })


</script>

</body>
</html>
