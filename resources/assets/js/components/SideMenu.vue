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
            <li class="side-menu-home"v-if="user.isadmin">
                <a href="/team">Manage employees</a>
            </li>
            <li class="side-menu-home"v-if="user.isadmin">
                <a href="/viewrequests">Manage requests</a>
            </li>
            <li class="side-menu-home">
                <a href="/myrequests">My requests</a>
            </li>
            <li class="side-menu-home">
                <a href="/newrequest">New holiday request</a>
            </li>
            <li class="side-menu-home">
                <a href="/changepassword">Change password</a>
            </li>
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
        data: function(){
            return{

                user:{
                    id:'',
                    name:''
                },
                openerText: 'Open',
                isOpen: false,

            };

        },
        created: function(){
            this.fetchUser();
        },

        methods: {
            open: function() {
                this.openerText = 'Close';
                this.isOpen = true;
            },
            close: function() {
                this.openerText = 'Open';
                this.isOpen = false;
            },
            toggle: function() {
                if (this.isOpen) {
                    this.close();
                } else {
                    this.open();
                }
            },
            fetchUser: function() {
                fetch('user', { credentials: 'include' })
                    .then(res => res.json()) //glitch on team/id
                    .then(res => {
                        console.log(res.name);
                        console.log(res.id);
                        this.user = res;
                    })

            },
        }
    }
</script>