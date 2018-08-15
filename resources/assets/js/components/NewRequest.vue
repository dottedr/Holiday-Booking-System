<template>
    <div class="container">
        <h1>Create a new request</h1>
        <form>
            <div class="row">
                <div class="col">
                    <label>Start (Format yyyy-mm-dd)</label>
                    <input v-model="request.start" type="text"/>
                    <label>End (Format yyyy-mm-dd)</label>
                    <input v-model="request.end" type="text"/>
                </div>
                <div class="col">
                    <label>Paid</label>
                    <input v-model="request.type" value="paid" type="radio"/><br/>
                    <label>Unpaid</label>
                    <input v-model="request.type" value="unpaid" type="radio"/><br/>
                    <label>Sick leave</label>
                    <input v-model="request.type" value="sick leave" type="radio"/><br/>

                </div>
            </div>
            <div class="row">
                <div class="col"><textarea v-model="request.comment" rows="6" class="comment-textfield"></textarea></div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="submit-button"
                            v-on:click="postRequest(request.start, request.end, request.status, request.type, request.created_by, $event) + postComment(request.comment, $event)">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

    export default {
        name: "new-request",
        data: function() {
            return {
                request: {
                    id: '',
                    start:'',
                    end:'',
                    type:'',
                    status:'pending',
                    created_by:'',
                    comment: '',
                }
            };
        },
        methods:{
            postRequest(start, end, status, type, created_by, event) {
                event.preventDefault();
                var data = new URLSearchParams();
                data.append('start', start);
                data.append('end', end);
                data.append('status', status);
                data.append('type', type);
                data.append('created_by', created_by);

                fetch('/newholidayrequest', {
                    credentials: 'include',
                    method:'post',
                    body: data,
                })
                    .then(console.log('gg ez'))


            },

            postComment(comment,id,event){
                event.preventDefault();
                var data = new URLSearchParams();
                data.append('comment',comment);
                data.append('status', status);
                data.append('request_id', id);

                fetch('/commentholidayrequest',
                    {
                        credentials:'include',
                        method: 'post',
                        body: data,
                    })
                    .then(console.log(comment))
            },
        }
    }
</script>