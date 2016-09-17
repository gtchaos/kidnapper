@extends('main')
@section('content')
    <h1 class="text-center title">Negotiate With The Kidnapper</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="name-area pull-left">
                Team Name : &nbsp;<span class="name">{{ $teamName }}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="name-area pull-right">
                <a class="new" title="create new team" href="{{URL::to('profile/create')}}">
                    <span>+</span>
                </a>
            </div>
        </div>
    </div>


    <div class="row">
        <dialog-app></dialog-app>
    </div>
    <template id='dialog-template'>
        <div class="col-md-5">

            <ul class="list-group" id="team">
                <li class="list-group-item" v-for="(index, dialog) in list">
                    <a id="selectA" class="select" v-on:click="updateDialog(dialog)">
                        <span>@{{index + 1}}. &nbsp;</span> @{{ dialog.word }}
                    </a>
                </li>
            </ul>
        </div>

        {{--<div class="col-md-5">--}}
        {{--<dialog-app list="{{ $dialogs }}"></dialog-app>--}}
        {{--</div>--}}
        <div class="col-md-2">
            <div class="text-center score-area">
                Your Scores: <br>
                <p class="score"><span>@{{ score }}</span></p>
                Count Down: <br>
                <p class="time"><span> @{{ time }}"</span></p>
            </div>


        </div>
        <div class="col-md-5">
            <div id="myContent"></div>
            <p id="kidnapper" style="display:none"> @{{ reply }} </p>
        </div>


        <modal :show.sync="show" effect="fade" backdrop="false" width="400">
            <div slot="modal-header" class="modal-header treasure">
                <h2 class="modal-title text-center attention">
                    <i> Treasure or Partner</i>
                </h2>
            </div>
            <div slot="modal-body" class="modal-body">
                <ul>
                    <li>If you give up saving your partner and go away,you loose 100 marks.
                    </li>
                    <li>Or you decide to take out all the treasures to exchange your partner, you will have nothing
                        right now, but get 0 mark. (No treasure, 0 mark)
                    </li>
                    <li>But you have only one shot left!
                    </li>
                    <li>The bullet rate is 50%. If you shoot correctly,you get 100 marks. If you don’t shoot correctly,
                        the kidnapper will kill your partner directly, you lose 200 marks.
                    </li>
                </ul>

            </div>
            <div slot="modal-footer" class="modal-footer footer-align shoot-footer">
                <button type="button" class="btn btn-default left" @click="keepTreasure">Keep Treasure</button>
                <button type="button" class="btn btn-success right" @click="surrender">Give up Treasure</button>
            </div>
        </modal>

        <modal title="game over" small :show.sync="over" backdrop="false" effect="fade" width="400">
            <div slot="modal-header" class="modal-header over-header">
                <button type="button" class="close" @click="over = false"><span>×</span></button>
                <h4 class="modal-title">
                    The Game Results
                </h4>
            </div>
            <div slot="modal-body" class="modal-body">
                <p class="text-center over-body">
                    @{{ content }}
                </p>
            </div>
            <div slot="modal-footer" class="modal-footer footer-align">
                <p>Your Score: &nbsp;<span class="score">@{{ score }}</span></p>
            </div>
        </modal>

        <modal :show.sync="shoot" effect="fade" backdrop="false" width="400">
            <div slot="modal-header" class="modal-header">
                <h2 class="modal-title text-center attention">
                    <i>Game Tips</i>
                </h2>
            </div>
            <div slot="modal-body" class="modal-body">
                <ul>
                    <li> You have only one shot left!</li>
                    <li> The bullet rate is 50%. If you shoot correctly, you get 100 marks. If you don’t shoot
                        correctly, the kidnapper will kill your partner directly, you will lose 200 marks.
                    </li>
                    <li> Or you give up saving your partner and go away, you loose 100 marks.
                    </li>
                    <li> Or you decide to take out all the treasures to exchange your partner, you will have nothing
                        right now, but get 0 mark.
                    </li>
                </ul>
            </div>
            <div slot="modal-footer" class="modal-footer footer-align shoot-footer">
                <button type="button" class="btn btn-default left" @click="notShoot">Not Shoot</button>
                <button type="button" class="btn btn-success right" @click="shootKidnapper">Shoot</button>
            </div>
        </modal>


        <modal title="Choose" small :show.sync="choose" backdrop="false" effect="fade" width="400">
            <div slot="modal-header" class="modal-header over-header">
                <h4 class="modal-title">
                    Choose Up Or Down
                </h4>
            </div>
            <div slot="modal-body" class="modal-body">
                <p class="text-center">
                    <button class="btn btn-danger choose-btn" @click="giveUp">
                    Give up your partner and go away
                    </button>
                </p>
                <p class="text-center">
                    <button class="btn btn-success choose-btn" @click="surrender">
                    Take out all the treasures to exchange
                    </button>
                </p>
            </div>
            <div slot="modal-footer" class="modal-footer footer-align">
                <p>Your Current Score: &nbsp;<span class="score">@{{ score }}</span></p>
            </div>

        </modal>
        <modal title="keep treasures" small :show.sync="keep" backdrop="false" effect="fade" width="400">
            <div slot="modal-header" class="modal-header over-header">
                <h4 class="modal-title">
                    Keep Treasures
                </h4>
            </div>
            <div slot="modal-body" class="modal-body">
                <p class="text-center">
                    <button class="btn btn-danger choose-btn" @click="giveUp">
                    Give up your partner and go away
                    </button>
                </p>
                <p class="text-center">
                    <button class="btn btn-success choose-btn" @click="shootKidnapper">
                    Prepare to kill the kidnapper
                    </button>
                </p>
            </div>
            <div slot="modal-footer" class="modal-footer footer-align">
                <p>Your Current Score: &nbsp;<span class="score">@{{ score }}</span></p>
            </div>

        </modal>

    </template>
@endsection

@section('scripts')
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
        var charIndex = -1;
        var stringLength = 0;
        var inputText;
        function writeContent(init) {
            if (init) {
                inputText = document.getElementById('kidnapper').innerHTML;
            }

            if (charIndex == -1) {
                charIndex = 0;
                stringLength = inputText.length;
            }
            var initString = document.getElementById('myContent').innerHTML;
            initString = initString.replace(/<SPAN.*$/gi, "");

            var theChar = inputText.charAt(charIndex);
            var nextFourChars = inputText.substr(charIndex, 4);
            if (nextFourChars == '<BR>' || nextFourChars == '<br>') {
                theChar = '<BR>';
                charIndex += 3;
            }
            initString = initString + theChar + "<SPAN id='blink'>_</SPAN>";
            document.getElementById('myContent').innerHTML = initString;

            charIndex = charIndex / 1 + 1;
            if (charIndex % 2 == 1) {
                document.getElementById('blink').style.display = 'none';
            } else {
                document.getElementById('blink').style.display = 'inline';
            }

            if (charIndex <= stringLength) {
                setTimeout('writeContent(false)', 150);
            } else {
                blinkSpan();
            }
        }

        var currentStyle = 'inline';
        function blinkSpan() {
            if (currentStyle == 'inline') {
                currentStyle = 'none';
            } else {
                currentStyle = 'inline';
            }
            document.getElementById('blink').style.display = currentStyle;
            setTimeout('blinkSpan()', 500);

        }

        var kidnapper = Vue.resource('api/dialog{/id}');
        var negotiator = Vue.resource('dialog{/id}');
        var recorder = Vue.resource('group/score{/id}');
        var dialog = Vue.component('dialog-app', {
            template: '#dialog-template',
            components: {
                'modal': VueStrap.modal,
                'alert': VueStrap.alert
            },
            data: function () {
                return {
                    uid: 0,
                    list: [],
                    timer: null,
                    reply: "",
                    time: 10,
                    score: 0,
                    content: "",
                    status: 0,
                    show: false,
                    shoot: false,
                    choose: false,
                    keep: false,
                    over: false
                }
            },
            created: function () {
                var vm = this;
                // 初次加载页面数据
                this.$http.get('dialog/0').then(function (response) {
                    // 响应成功回调
                    vm.list = response.body;
                }, function (response) {
                    // 响应错误回调
                });
                //  获取小组分数
                this.$http.get('group/score').then(function (response) {
                    // 响应成功回调
                    vm.score = response.body.score;
                    vm.uid = response.body.uid;
                }, function (response) {
                    // 响应错误回调
                });
                // 2分钟倒计时开始
                vm.timer = setInterval(function () {
                    vm.time--;
                    if (vm.time == 0) {
                        clearInterval(vm.timer);
                        recorder.update({id: vm.uid}, {score: -100}).then(function (response) {
                            // 响应成功回调
                            vm.score = -100;
                            vm.content = "TIME OUT";
                            vm.choose = false;
                            vm.show = false;
                            vm.shoot = false;
                            vm.keep = false;
                            vm.over = true;
                        });
                        return false;
                    }
                }, 1000)


            },
            methods: {
                updateDialog: function (dialog) {
                    var vm = this;
                    //查取绑匪的对话回复
                    vm.reply = "";
                    charIndex = -1;
                    stringLength = 0;
                    if (vm.time == 0) {
                        recorder.update({id: vm.uid}, {score: -100}).then(function (response) {
                            // 响应成功回调
                            vm.score = -100;
                            vm.content = "TIME OUT";
                            vm.over = true;
                        });

                        return false;
                    }
                    kidnapper.get({id: dialog.word_id}).then(function (response) {
                        vm.reply = response.body.reply;
                        if (vm.reply) {
                            setTimeout(function () {
                                document.getElementById('myContent').innerHTML = '';
                                writeContent(true);
                            }, 100);
                        }

                        st = response.body.status;

                        // st = 0 继续谈判
                        if (st == 0) {
                            setTimeout(function () {
                                //谈判者继续对话
                                negotiator.get({id: dialog.word_id}).then(function (response) {
                                    vm.list = response.body;
                                });
                            }, 2000);
                        }
                        // st = 1 选择 treasure or partner
                        if (st == 1) {
                            vm.show = true;
                        }
                        // st = 2 big success
                        if (st == 2) {
                            recorder.update({id: vm.uid}, {score: 200}).then(function (response) {
                                // 响应成功回调
                                vm.score = 200;
                                vm.content = "BIG SUCCESS";
                                clearInterval(vm.timer);
                                vm.over = true;
                            });
                        }
                        // st = 3 shoot or not
                        if (st == 3) {
                            vm.shoot = true;
                        }
                        // st = 4 直接kill the 人质
                        if (st == 4) {
                            recorder.update({id: vm.uid}, {score: -200}).then(function (response) {
                                // 响应成功回调
                                vm.score = -200;
                                vm.content = "the kidnapper killed your partner.";
                                clearInterval(vm.timer);
                                vm.over = true;
                            });
                        }
                        if (st == 5) {
                            recorder.update({id: vm.uid}, {score: 0}).then(function (response) {
                                // 响应成功回调
                                vm.score = 0;
                                vm.content = "You have nothing in it";
                                clearInterval(vm.timer);
                                vm.over = true;
                            });
                        }

                    });

                },
                keepTreasure: function () {
                    var vm = this;
                    vm.show = false;
                    vm.keep = true;
                },
                notShoot: function () {
                    var vm = this;
                    vm.shoot = false;
                    vm.choose = true;
                },
                giveUp: function () {
                    var vm = this;
                    vm.choose = false;
                    vm.keep = false;
                    recorder.update({id: vm.uid}, {score: -100}).then(function (response) {
                        // 响应成功回调
                        vm.score = -100;
                        vm.content = "You give up";
                        clearInterval(vm.timer);
                        vm.over = true;
                    });
                },
                surrender: function () {
                    var vm = this;
                    vm.show = false;
                    vm.choose = false;
                    recorder.update({id: vm.uid}, {score: 0}).then(function (response) {
                        // 响应成功回调
                        vm.score = 0;
                        vm.content = "You have surrendered";
                        clearInterval(vm.timer);
                        vm.over = true;

                    });

                },
                shootKidnapper: function () {
                    var vm = this;
                    vm.shoot = false;
                    vm.keep = false;
                    // rand < 0.5 表明未射中
                    if (Math.random() < 0.5) {
                        recorder.update({id: vm.uid}, {score: -100}).then(function (response) {
                            // 响应成功回调
                            vm.score = -100;
                            vm.content = "You don’t shoot correctly!";
                            clearInterval(vm.timer);
                            vm.over = true;
                        });
                    } else {
                        recorder.update({id: vm.uid}, {score: 200}).then(function (response) {
                            // 响应成功回调
                            vm.score = 200;
                            vm.content = "Congratulation! you shoot correctly.";
                            clearInterval(vm.timer);
                            vm.over = true;
                        });

                    }

                }
            },
            computed: {
                square: function () {

                }
            }
        });


        new Vue({
            el: 'body'
        });

    </script>
@endsection