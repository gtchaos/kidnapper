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

    <alert :show.sync="showRight" placement="top" duration="3000" type="success" width="400px" dismissable>
        <span class="icon-info-circled alert-icon-float-left"></span>
        <strong>Hey dude!</strong>
        <p>@{{message}}</p>
    </alert>

    <alert :show.sync="showFalse" placement="top" duration="3000" type="danger" width="400px" dismissable>
        <span class="icon-info-circled alert-icon-float-left"></span>
        <strong>Hey dude!</strong>
        <p>@{{message}}</p>
    </alert>

</div>
<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.2/vue-resource.min.js"></script>
<script src="{{ asset("js/vue-strap.min.js") }}"></script>
<script type="text/javascript">
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

    new Vue({
        components: {
            'alert': VueStrap.alert
        },
        el: '#team-post',
        data: {
            name: null,
            showRight: false,
            showFalse: false,
            message: null
        },
        methods: {
            createTeam: function () {
                var vm = this;
                if (vm.name) {
                    vm.$http.post("/profile", {name: vm.name})
                            .then(function (response) {

                                if (response.body.ret == 200) {
                                    a = "{{URL::to("dialog/index")}}";
                                    vm.showRight = true;
                                    vm.message = 'create your team successfully!';
                                    setTimeout(function(){
                                        window.location.href = a;
                                    }, 2000);

                                } else {
                                    vm.message = 'Oops.. ' + response.body.retMsg;
                                    vm.showFalse = true;
                                }

                            }, function (response) {
                                // error handle
                            });
                }

            }
        }
    })


</script>

</body>
</html>
