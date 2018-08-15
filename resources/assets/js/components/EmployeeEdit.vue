<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Employee View</h1>
                <h3>{{employee.name}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col" >
                <h5><b>Email: </b>{{employee.email}}</h5>
                <h5><b>Role: </b>{{employee.role}}</h5>
                <h5><b>Holiday allowance: </b>{{employee.holiday_allowance}}</h5>
                <h5><b>Holidays left: </b>{{employee.holiday_allowance - employee.holiday_taken}}</h5>
                <h5><b>Comments: </b>{{employee.comment}}</h5>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "employee-edit",
        data: function() {
            return{
                employee: {
                    id: '',
                    name:'',
                    email:'',
                    holiday_allowance: '',
                    holiday_taken: '',
                    comment:'',
                    role:''
                },
            }

        },
        created: function(){
            this.fetchEmployee(this['$attrs']['id']);
        },


        methods:{
            fetchEmployee: function(id){
                fetch('employee/'+id, { credentials: 'include' })
                    .then(res => res.json())
                    .then(res => {
                        if (res.status) {
                            this.employee = res.data; //assign list of employees to this array
                        } else {
                            alert('User not found');
                        }
                        console.log(res);//JSON.stringify(res)

                    })
            },
            showEmployee: function(){
                alert(this['$attrs']['id']);//reference to blade and controller
            },

        }
    }
</script>
