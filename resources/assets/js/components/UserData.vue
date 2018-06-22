<template>
    <div class="row">
        <div class="col">
            <div class="tile">
                <p>Holiday allowance</p>
                <p>{{user.holiday_allowance}}</p>
            </div>
        </div>
        <div class="col">
            <div class="tile">
                <p>Holiday left</p>
                <p>{{user.holiday_allowance - user.holiday_taken}}</p>
            </div>
        </div>

        <div class="col">
            <div class="tile">
                <p>Holiday taken</p>
                <p>{{user.holiday_taken}}</p>
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