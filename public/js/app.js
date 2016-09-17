Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
new Vue({
    el: '#team-post',
    created: function () {
        var vm = this;
    },
    methods: {
        createTeam: function () {
            var vm = this;
            if (vm.name) {
                vm.$http.post("/profile", {name: vm.name})
                    .then(function (response) {
                        if (response.status == 200) {
                            a = "{{URL::to('dialog/index')}}";
                            window.location.href = a;
                        } else {
                            alert(response.retMsg);
                        }

                    }, function (response) {
                        // error handle
                    });
            }

        }
    }
})