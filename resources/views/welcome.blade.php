@extends('main')
@section('content')
    <h1 class="text-center title" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">Negotiate With The Kidnapper</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="name-area pull-left">
                Team : &nbsp;<span class="name">{{ $teamName }}</span>
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
            <p class="role">Negotiator's Choices: <i class="fa fa-hand-o-down" aria-hidden="true"></i></p>
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
                Your Coins: <br>
                <p class="score"><span>@{{ score }}</span></p>
                Count Down: <br>
                <p class="time"><span> @{{ time }}"</span></p>
                <button class="btn btn-default btn-rounded" onclick="responsiveVoice.speak('');" value="Play" @click="onPlay">Play</button>
            </div>


        </div>
        <div class="col-md-5">
            <p class="role">Kidnapper's Reply:</p>
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
                    <li>If you give up saving your partner and go away,you loose 200 coins.
                    </li>
                    <li>Or you decide to take out all the treasures to exchange your partner, you will have nothing
                        right now, but get 0 coin. (No treasure, 0 coins)
                    </li>
                    <li>But you have only one shot left!
                    </li>
                    <li><span style="color:red;">The bullet rate is 50%. If you shoot correctly,you get 400 coins. If you don’t shoot correctly, the kidnapper will kill your partner directly, you lose 400 coins.</span>
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
                <button type="button"  onclick="responsiveVoice.cancel();"  value="Play" class="close" @click="over = false"><span>×</span></button>
                <h5 class="modal-title">
                    The Game Results
                </h5>
            </div>
            <div slot="modal-body" class="modal-body">
                <p class="text-center over-body">
                    @{{ content }}
                </p>
            </div>
            <div slot="modal-footer" class="modal-footer footer-align">
                <p>Your Current Coins: &nbsp;<span class="score">@{{ score }}</span></p>
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
                    <li> <span style="color:red;">The bullet rate is 50%. If you shoot correctly, you get 400 coins. If you don’t shoot correctly, the kidnapper will kill your partner directly, you will lose 400 coins. </span>
                    </li>
                    <li> Or you give up saving your partner and go away, you loose 200 coins.
                    </li>
                    <li> Or you decide to take out all the treasures to exchange your partner, you will have nothing
                        right now, but get 0 coin.
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
                <h5 class="modal-title">
                    Choose Up Or Down
                </h5>
            </div>
            <div slot="modal-body" class="modal-body">
                <p class="text-center">
                    <button class="btn btn-danger choose-btn" @click="giveUp">
                    Give up your partner and go away
                    </button>
                </p>
                <p class="text-center">
                    <button class="btn btn-success choose-btn" @click="surrender">
                    Take out all treasures to exchange
                    </button>
                </p>
            </div>
            <div slot="modal-footer" class="modal-footer footer-align">
                <p>Your Current Coins: &nbsp;<span class="score">@{{ score }}</span></p>
            </div>

        </modal>
        <modal title="keep treasures" small :show.sync="keep" backdrop="false" effect="fade" width="400">
            <div slot="modal-header" class="modal-header over-header">
                <h5 class="modal-title">
                    Keep Treasures
                </h5>
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
                <p>Your Current Coins: &nbsp;<span class="score">@{{ score }}</span></p>
            </div>

        </modal>

    </template>

@endsection

@section('scripts')
    <script type="text/javascript">
        Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
        // speaker
        function speak(content, voice){
            if(voice == 1) {
                responsiveVoice.setDefaultVoice("US English Male");
            } else {
                responsiveVoice.setDefaultVoice("US English Female");
            }
            setTimeout(function(){
                responsiveVoice.speak(content);
            }, 100);
        }
        
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
                charIndex = charIndex + 3;
            }
            initString = initString + theChar + "<SPAN id='blink'>_</SPAN>";
            document.getElementById('myContent').innerHTML = initString;

            charIndex = charIndex + 1;
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
                    flag: 0,
                    list: [],
                    timer: null,
                    reply: "",
                    time: 120,
                    play: false,
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
       


            },
            methods: {
                onPlay: function() {
                    var vm = this;
                    // 2分钟倒计时开始
                    if (vm.play) {
                        return false;
                    }
                    vm.timer = setInterval(function () {
                        vm.time--;
                        if (vm.time == 0) {
                            recorder.update({id: vm.uid}, {score: -100}).then(function (response) {
                                // 响应成功回调
                                vm.score = parseInt(vm.score) - 100;
                                vm.content = "TIME OUT";
                                vm.choose = false;
                                vm.show = false;
                                vm.shoot = false;
                                vm.keep = false;
                                vm.over = true;
                            });
                            clearInterval(vm.timer);
                            return false;
                        }
                    }, 1000)
                    vm.play = true;

                },
                updateDialog: function (dialog) {
                    var vm = this;
                    if(!vm.play) {
                        return false;
                    } 
                    if (responsiveVoice.isPlaying()) {
                        return false;
                    }
                    //  如果游戏还没结束
                    if (vm.flag != 1) {
                        speak(dialog.word);
                    }
                    //查取绑匪的对话回复
                    vm.reply = "";
                    charIndex = -1;
                    stringLength = 0;

                    if (vm.flag  == 1) {
                        responsiveVoice.cancel();
                        vm.content = "Game Over! Please refresh the current page and try it again";
                        vm.over = true;
                        return false;
                    }
                    if (vm.time == 0) {
                        recorder.update({id: vm.uid}, {score: -200}).then(function (response) {
                            // 响应成功回调
                            vm.score = parseInt(vm.score) - 200;
                            vm.content = "TIME OUT";
                            vm.flag = 1; //表明比赛已结束
                            vm.over = true;
                        });

                        return false;
                    }
                    kidnapper.get({id: dialog.word_id}).then(function (response) {
                        vm.reply = response.body.reply;
                        vm.status = response.body.status;
                        if (vm.reply) {
                            setTimeout(function () {

                                var stl = setInterval(function() {
                                    if(!responsiveVoice.isPlaying()){
                                        speak(vm.reply, 1);
                                        setTimeout(function(){
                                            document.getElementById('myContent').innerHTML = '';
                                            writeContent(true);
                                        }, 300);

                                        clearInterval(stl);
                                    }
                                },100);
                            }, 3000);
                        }

                        // 根据谈判者先前不同的选项,做出不同的回应
                        setTimeout(function () {
                            //每隔100毫秒检测是否还有人在说话,没有人说话,继续
                            var str = setInterval(function() {
                                if(!responsiveVoice.isPlaying()){
                                    // st = 0 继续谈判
                                    if (vm.status == 0) {
                                        setTimeout(function () {
                                            //谈判者继续对话
                                            negotiator.get({id: dialog.word_id}).then(function (response) {
                                                vm.list = response.body;
                                            });
                                        }, 1000);
                                    }
                                    // st = 1 选择 treasure or partner
                                    if (vm.status == 1) {
                                        vm.show = true;
                                    }
                                    // st = 2 big success
                                    if (vm.status == 2) {
                                        recorder.update({id: vm.uid}, {score: 400}).then(function (response) {
                                            // 响应成功回调
                                            vm.score = parseInt(vm.score) + 400;
                                            vm.content = "Big success! You have saved your partner successfully.";
                                            clearInterval(vm.timer);
                                            vm.flag = 1; //表明比赛已结束
                                            vm.over = true;

                                        });
                                    }
                                    // st = 3 shoot or not
                                    if (vm.status == 3) {
                                        vm.shoot = true;
                                    }
                                    // st = 4 直接kill the 人质
                                    if (vm.status == 4) {
                                        recorder.update({id: vm.uid}, {score: -200}).then(function (response) {
                                            // 响应成功回调
                                            vm.score = parseInt(vm.score) - 200;
                                            vm.content = "the kidnapper killed your partner.";
                                            clearInterval(vm.timer);
                                            vm.flag = 1; //表明比赛已结束
                                            vm.over = true;
                                        });
                                    }
                                    if (vm.status == 5) {
                                        if (parseInt(vm.score) > 0) {
                                            vm.score = -vm.score;
                                        }
                                        recorder.update({id: vm.uid}, {score: vm.score}).then(function (response) {
                                            // 响应成功回调
                                            vm.score = parseInt(vm.score);
                                            vm.content = "You have nothing in it";
                                            clearInterval(vm.timer);
                                            vm.flag = 1; //表明比赛已结束
                                            vm.over = true;
                                        });
                                    }
                                    clearInterval(str);
                                }
                            },100);
                        }, 5000);


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
                    recorder.update({id: vm.uid}, {score: -200}).then(function (response) {
                        // 响应成功回调
                        vm.score = parseInt(vm.score) - 200;
                        vm.content = "You give up";
                        clearInterval(vm.timer);
                        vm.flag = 1; //表明比赛已结束
                        vm.over = true;
                    });
                },
                surrender: function () {
                    var vm = this;
                    vm.show = false;
                    vm.choose = false;
                    if (vm.score > 0) {
                        vm.score = -vm.score;
                    } else {
                        vm.content = "You have no more coins! Sorry, you have to choose the other one";
                        vm.choose = true;
                        return false;
                    }

                    recorder.update({id: vm.uid}, {score: vm.score}).then(function (response) {
                        // 响应成功回调
                        vm.score = parseInt(vm.score) + parseInt(vm.score);
                        vm.content = "You have surrendered";
                        clearInterval(vm.timer);
                        vm.flag = 1; //表明比赛已结束
                        vm.over = true;

                    });

                },
                shootKidnapper: function () {
                    var vm = this;
                    vm.shoot = false;
                    vm.keep = false;
                    // rand < 0.5 表明未射中
                    if (Math.random() < 0.5) {
                        recorder.update({id: vm.uid}, {score: -400}).then(function (response) {
                            // 响应成功回调
                            vm.score = parseInt(vm.score) - 400;
                            vm.content = "You don’t shoot correctly!";
                            clearInterval(vm.timer);
                            vm.flag = 1; //表明比赛已结束
                            vm.over = true;
                        });
                    } else {
                        recorder.update({id: vm.uid}, {score: 200}).then(function (response) {
                            // 响应成功回调
                            vm.score = parseInt(vm.score) + 200;
                            vm.content = "Congratulation! you shoot correctly.";
                            clearInterval(vm.timer);
                            vm.flag = 1; //表明比赛已结束
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