<template>
    <div class="container">
    <div class="row">
        <div class="col">
            <h1>Team</h1>
        </div>
    </div>
        <div class="row">
            <div class="col" v-for="employee in employees" v-bind:key="employee.id">
                <div class="tile" >
                    <h2>{{employee.name}}</h2>
                    <a v-bind:href="'/team/' + employee.id">View details</a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="tile">
                    <a href="/newemployee">Add employee</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "team",
        data: function() {
            return{
                employees:[],
                employee: {
                    id: '',
                    name:'',
                    email:'',
                    holiday_allowance: '',
                    holiday_taken: '',
                    comment:'',
                    role:'',
                },
            }

        },
        created: function(){
            this.fetchEmployees();
        },


        methods:{
            fetchEmployees: function(){
                fetch('employees', { credentials: 'include' })
                    .then(res => res.json())
                    .then(res => {
                        if (res.status) {
                            this.employees = res.data; //assign list of employees to this array
                        } else {
                            alert('Not an admin');
                        }
                    console.log(res);

                })
            },
            showEmployee: function(){
               //alert(this['$attrs']['id']);//reference to blade and controller
            },

        }
    }
</script>
<style scoped>
    a{
        font-size: 30px;
    }
</style>