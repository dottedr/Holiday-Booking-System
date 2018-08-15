<template>
    <div class="container">

        <div class="row">
            <div class="col">
                <form>
                    <h1>My Request View</h1>
                    <p>Start: {{request.start}}</p>
                    <p>End: {{request.end}}</p>
                    <p>Type: {{request.type}}</p>
                    <p>Status: {{request.status}}</p>
                    <h4>Comments</h4>
                    <div v-if="comments.length>0">
                        <div v-for="comment in comments" v-bind:key="comment.id"><p class="comment">{{comment.author + ': '+comment.comment}}</p></div>
                    </div>
                    <div v-else>No comments</div>
                    <h4>Reply</h4>
                    <textarea v-model="request.comment" rows="6" class="comment-textfield"></textarea>
                    <br/>
                    <button class="submit-button" v-on:click="postComment(request.comment, request.id, $event)">Send</button>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "my-single-request",
        data: function() {
            return{
                comments: [],
                comment:{
                    comment:'',
                    author: ''
                },
                request: {
                    id: '',
                    start:'',
                    end:'',
                    type: '',
                    status: '',
                    comment: '',

                    user:{
                        name: ''
                    }
                },
            }

        },
        created: function(){
            this.fetchRequest(this['$attrs']['id']);
            this.fetchComments(this['$attrs']['id']);
        },
        methods:{
            fetchRequest: function (id) {
                fetch('myholidayrequest/'+id, { credentials: 'include' })
                    .then(res => res.json())
                    .then(res => {
                        this.request = res;
                        console.log("Request", this.request);
                    })
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

            fetchComments:function (id) {
                fetch('getcomments/'+id, {credentials:"include"})
                    .then(res => res.json())
                    .then(res => {
                        this.comments = res;
                        console.log("Comments", this.comments);
                    })
            }
        }
    }
</script>
