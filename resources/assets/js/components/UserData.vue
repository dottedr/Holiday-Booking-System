<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tile">
                    <h4>Holiday allowance</h4>
                    <h4>{{user.holiday_allowance}}</h4>
                </div>
            </div>
            <div class="col">
                <div class="tile">
                    <h4>Holiday left</h4>
                    <h4>{{user.holiday_allowance - user.holiday_taken}}</h4>
                </div>
            </div>
            <div class="col">
                <div class="tile">
                    <h4>Holiday taken</h4>
                    <h4>{{user.holiday_taken}}</h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "user-data",
        data: function() {
            return {

                user: {
                    name: '',
                    holiday_allowance:'',
                    holiday_taken:'',
                    id:''
                }
            }
        },
        created: function(){
            this.fetchUserForDashboard();
        },
        methods: {
            fetchUserForDashboard() {
                fetch('/user', { credentials: 'include' }
                )
                    .then(res => res.json())
                    .then(res => {
                        console.log('User data fetched:'+res.name);
                        this.user = res;
                    })

            }
        }
    }
</script>