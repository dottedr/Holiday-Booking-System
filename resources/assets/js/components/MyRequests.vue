<template>
    <div>
        <h1>My Requests</h1>
        <div class="outline">
            <div class="row">
                <div class="col">
                    From
                </div>
                <div class="col">
                    To
                </div>
                <div class="col">
                    Type
                </div>
                <div class="col">
                    Status
                </div>

            </div>
            <div class="row" v-for="request in requests" v-bind:key="request.id">
                
                <div class="col">
                    {{request.start}}
                </div>
                <div class="col">
                    {{request.end}}
                </div>
                <div class="col">
                    {{request.type}}
                </div>
                <div class="col">
                    {{request.status}}
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "my-requests",
        data: function () {
            return {
                requests: [],
                request: {
                    id: '',
                    start: '',
                    end: '',
                    type: '',
                    status: '',
                    title: ''
                }
            }
        },
        created: function () {
            this.fetchRequest();
        },

        methods: {
            fetchRequest: function () {
                fetch('/myholidayrequests', {credentials: 'include'})
                    .then(res => res.json())
                    .then(res => {
                        this.requests = res; //assign list of requests to this array
                        console.log(res);


                    })
            },
        }
    }
</script>

<style scoped>

</style>