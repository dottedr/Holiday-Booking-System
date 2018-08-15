<template>
    <div class="container">
        <h1>Create a new employee</h1>
        <form>
            <div class="row">
                <div class="col">
                    <label>Name</label>
                    <br/>
                    <input v-model="employee.name" type="text"/>
                    <br/>
                    <label>Email</label>
                    <br/>
                    <input v-model="employee.email" type="text"/>
                    <br/>
                    <label>Holiday allowance</label>
                    <br/>
                    <input v-model="employee.holiday_allowance" type="text"/>
                    <br/>
                    <label>Role</label>
                    <br/>
                    <input v-model="employee.role" type="text"/>

                </div>
                <div class="col">
                    <label>Admin</label>
                    <input v-model="employee.isadmin" value="1" type="radio"/><br/>
                    <label>User</label>
                    <input v-model="employee.isadmin" value="0" type="radio"/><br/>


                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button v-on:click="postEmployee(
                    employee.isadmin,
                    employee.name,
                    employee.email,
                    employee.password,
                    employee.holiday_allowance,
                    employee.role)">Submit</button>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "new-employee",
        data: function() {
            return {
                employee: {
                    id: '',
                    isadmin:'',
                    name:'',
                    email:'',
                    password:'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                    holiday_allowance:'',
                    role:'',
                    remember_token:''

                }


            };
        },
        methods:{
            postEmployee(isadmin,name,email,password,holiday_allowance,role){
                event.preventDefault();
                var data = new URLSearchParams();
                data.append('isadmin', isadmin);
                data.append('name', name);
                data.append('email', email);
                data.append('password', password);
                data.append('holiday_allowance', holiday_allowance);
                data.append('role', role);


                fetch('/newemployeerequest', {
                    credentials: 'include',
                    method: 'post',
                    body: data,
                })
                    .then(res => res.json()) //glitch on team/id
                    .then(res => {
                        if (res.status) {
                            console.log(res.data.name);
                            console.log(res.data.id);
                            alert('User created: '+ res.data.name);

                        } else {

                        }
                    })
                //
            }
        }
    }
</script>

