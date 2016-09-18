@extends('main')
@section('content')
    <h1 class="text-center title profile-title">Create Your Team</h1>

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <p class="login-tip">
                If you first use it, please input your team's name and initial coins.
            </p>
            <form role="form">
                <div class="form-group">

                    <div class="input-group">
                        <label class="sr-only" for="teamName">Team Name:</label>
                        <input type="text" class="form-control team-name" id="teamName" v-model="name"
                               placeholder="Enter Your Team Name">
                        <label class="sr-only" for="coins">Team Current Coins:</label>
                        <input type="text" class="form-control team-name" id="coins" v-model="score"
                               placeholder="Enter Your Current Coins">
                        <a v-on:click="createTeam" href="#" class="input-group-addon profile-submit">
                            <span>Submit</span>
                        </a>
                    </div>
                </div>
            </form>

            <p class="login-tip">
                If you have a group name, please login directly.
            </p>
            <form role="form">
                <div class="form-group">

                    <div class="input-group">
                        <label class="sr-only" for="oldTeamName">Team Name:</label>
                        <input type="text" class="form-control team-name" id="oldTeamName" v-model="oldName"
                               placeholder="Enter Your Team Name">
                        <a v-on:click="loginTeam" href="#" class="input-group-addon profile-submit">
                            <span>Login</span>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6" id="introduction">
            <h3>
                Instructions:
            </h3>
            <p>
                Every level is a different mission. Select 1, 2, 3 to choose your answer.
            </p>
            <h3>
                Story:
            </h3>
            <p>
                Your team member is kidnapped by one local aboriginal. Since he considers that your team has robbed the resources and land. He wants to warn you and take a revenge.
            </p>
            <p>
                A negotiator is more than a guy who knows how to talk.He is a specialist and a perceiver,a soldier who needs words than guns to fight his battles.
            </p>
            <h3>
                Warning:
            </h3>
            <p>
                Choose your words very carefully.
            </p>

        </div>
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
@endsection
@section('scripts')
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

        new Vue({
            components: {
                'alert': VueStrap.alert
            },
            el: 'body',
            data: {
                name: null,
                oldName: null,
                score: null,
                showRight: false,
                showFalse: false,
                message: null
            },
            methods: {
                createTeam: function (e) {
                    e.preventDefault();
                    var vm = this;
                    if(isNaN(vm.score)){
                        vm.message = 'Oops.. please input a legal number';
                        vm.showFalse = true;
                        return;
                    }
                    if (vm.name) {
                        vm.$http.post("/profile", {name: vm.name, score: vm.score})
                                .then(function (response) {

                                    if (response.body.ret == 200) {
                                        a = "{{URL::to("dialog")}}";
                                        vm.showRight = true;
                                        vm.message = 'create your team successfully!';
                                        setTimeout(function () {
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

                },
                loginTeam: function (e) {
                    var vm = this;
                    e.preventDefault();
                    if (vm.oldName) {
                        vm.$http.post("/api/login", {oldName: vm.oldName})
                                .then(function (response) {

                                    if (response.body.ret == 200) {
                                        a = "{{URL::to("dialog")}}";
                                        vm.showRight = true;
                                        vm.message = 'login successfully!';
                                        setTimeout(function () {
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
@endsection
