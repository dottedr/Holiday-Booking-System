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
                <p>Holiday pending</p>
                <p>TBD</p>
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
        data() {
            return {

                user: {
                    name: '',
                    holiday_allowance:'',
                    holiday_taken:''
                }
            }
        },
        created(){
            this.fetchUser();
        },
        methods: {
            fetchUser() {
                fetch('api/user/2') //TODO:id
                    .then(res => res.json())
                    .then(res => {
                        console.log(res.name);
                        this.user = res;
                    })

            }
        }
    }
</script>

<style scoped>

</style>