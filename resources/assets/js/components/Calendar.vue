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
                    eventSources:['/publicholidays','/holidayrequestscalendar'],

                    eventRender: function(event, element) {
                        console.log(event)
                    },

                },
            };

        },
        methods: {

        }
    };
</script>
