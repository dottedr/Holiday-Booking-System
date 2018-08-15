<template>
    <div>
        <h1>Manage Requests</h1>
        <div class="outline">
            <div class="row">
                <div class="col">
                    Employee Name
                </div>
                <div class="col">
                    From
                </div>
                <div class="col">
                    To
                </div>
                <div class="col">
                    Status
                </div>
                <div class="col">
                    Edit
                </div>
                <div class="col">
                    Reply
                </div>
            </div>
            <div class="row" v-for="request in requests" v-bind:key="request.id">
                <div class="col">
                    {{request.title}}
                </div>
                <div class="col">
                    {{request.start}}
                </div>
                <div class="col">
                    {{request.end}}
                </div>
                <div class="col">
                    {{request.status}}
                </div>
                <div class="col">
                    <a v-bind:href="'/viewrequest/'+request.id">Edit</a>
                </div>
                <div class="col">
                    <label>Accept</label>
                    <input v-model="request.status" value="accepted" type="radio"/><br/>
                    <label>Reject</label>
                    <input v-model="request.status" value="rejected" type="radio"/><br/>
                    <button v-on:click="postReply(request.status, request.id)">Quick Reply</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "view-requests",
        data: function() {
            return {
                requests:[],
                request: {
                    id: '',
                    start:'',
                    end:'',
                    type:'',
                    status:'',
                    title:''
                }
            }
        },
        created: function(){
            this.fetchRequest();
        },

        methods:{
            fetchRequest: function() {
                fetch('/holidayrequests',  { credentials: 'include' })
                    .then(res => res.json())
                    .then(res => {
                            this.requests = res; //assign list of requests to this array
                        console.log(res);


                    })
            },
            postReply(status,id) {
                event.preventDefault();
                var data = new URLSearchParams();
                data.append('status', status);
                data.append('id', id);


                fetch('/updateholidayrequest', { //HolidayRequestController@update
                    credentials: 'include',
                    method:'post',
                    body: data,
                })
                    .then(console.log('gg ez'))
                    .then(alert('Reply sent'))

            }
        }
    }
</script>

