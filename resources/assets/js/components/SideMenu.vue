<template>
    <div class="side-menu"
         :class="{ isOpen: isOpen }">
        <div class="side-menu-opener"
             @click="toggle">{{openerText}}</div>
        <ul class="side-menu-menu">
            <li class="side-menu-text"
                >Hello, {{user.name}}</li>
            <li class="side-menu-item"
                >
                <a href="/home">Home</a>
            </li>
            <li class="side-menu-item"
                v-text="newRequest"></li>
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
                    name:''
                },
                openerText: 'Open',
                isOpen: false,
                home:'Home',
                newRequest:'New holiday request',
                manageRequests: 'Manage requests',
                manageEmployees: 'Manage employees',
                changePassword: 'Change password',
                logout: 'Logout'
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
        fetchUser(){
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