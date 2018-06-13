<template>
    <div class="side-menu"
         :class="{ isOpen: isOpen }">
        <div class="side-menu-opener"
             @click="toggle">{{openerText}}</div>
        <ul class="side-menu-menu">
            <li class="side-menu-text">
                Hello, {{user.name}}</li>
            <li class="side-menu-home">
                <a href="/home">Home</a>
            </li>
            <li class="side-menu-home">
                <a href="/newrequest">New holiday request</a>
            </li>
            <li class="side-menu-item"
                v-text="manageRequests"></li>
            <li class="side-menu-item"
                v-text="manageEmployees"></li>
            <li class="side-menu-item"
                v-text="changePassword"></li>
            <li class="side-menu-item">
                <form method="POST" class="route" id="logout_form" action="/logout">
                    <a  href="javascript:logout_form.submit();">Logout</a>
                </form>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "side-menu",
        data(){
            return{

                user:{
                    id:'',
                    name:''
                },
                openerText: 'Open',
                isOpen: false,
                newRequest:'New holiday request',
                manageRequests: 'Manage requests',
                manageEmployees: 'Manage employees',
                changePassword: 'Change password',
            }

        },
        created(){
            this.fetchUser();
        },

        methods: {
            open() {
                this.openerText = 'Close';
                this.isOpen = true;
            },
            close() {
                this.openerText = 'Open';
                this.isOpen = false;
            },
            toggle() {
                if (this.isOpen) {
                    this.close();
                } else {
                    this.open();
                }
            },
            fetchUser() {
                fetch(`user`, { credentials: 'include' })
                    .then(res => res.json())
                    .then(res => {
                        console.log(res.name);
                        console.log(res.id);
                        this.user = res;
                    })

            },


        }
    }
</script>

<style scoped>

</style>