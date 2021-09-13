<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Event ID</h3>
                <p>{{event.eventId}}</p>
            </div>
            <div class="col">
                <h3>Event Name</h3>
                <p>{{event.eventName}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3>Location</h3>
                <p>{{event.eventId}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col"><h3>Duration</h3></div>
        </div>
        <div class="row">
            <div class="col"><p><strong>Starting Time: </strong>{{event.startTime}}</p></div>
            <div class="col"><p><strong>Ending Time: </strong>{{event.startTime}}</p></div>
        </div>

        <div class="row">
            <div class="col">
                <h3>Donation Received</h3>
                <p>RM {{event.donationReceived}}</p>
            </div>
            <div class="col">
                <h3>Organizer</h3>
                <p>{{event.organizer}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3>Status</h3>
                <p class="text-danger">{{event.status}}</p>
            </div>
        </div>


    </div>

</template>

<script>
export default {
    data() {
        return {
            event: {}
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/events/${this.$route.params.id}`)
            .then((response) => {
                this.event = response.data;
            });
    },
}
</script>

<style scoped>
    .row {
        margin: 15px;
    }
</style>
