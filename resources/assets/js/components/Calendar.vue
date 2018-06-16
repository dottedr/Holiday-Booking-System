<template>
    <div class="row justify-content-center">
        <full-calendar :config="config" />
    </div>

</template>
<style>
    @import '~fullcalendar/dist/fullcalendar.css';
</style>
<script>
    export default {
        name: 'calendar',
        data: function() {
            return {
                config: {
                    defaultView: 'month',
                    eventSources:['/publicholidays','/holidayrequests'],

                    eventRender: function(event, element) {
                        console.log(event)
                    },
                    dayClick:function(date) {
                        console.log('clicked ' + date.format());


                    },
                },
            };

        },
        methods: {

        }
    };
</script>
