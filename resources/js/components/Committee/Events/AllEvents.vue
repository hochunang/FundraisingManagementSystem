<template>
    <div>
        <h3 class="modal-header">Event's Info</h3><br/>
        <button type="button" class="btn btn-success float-right" @click="addEvent()">Add Event</button>

        <div v-if="events.length==0" class="font-italic">No Record Found</div>
        <table class="table table-bordered" v-if="events.length!=0">
            <thead>
            <tr>
                <th>No. </th>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Event Description</th>
                <th>Donation Received</th>
                <th>Organizer</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(event,index) in events" :key="event.id">
                <td>{{ index }}</td>
                <td><router-link :to="{name: 'ShowEvent', params: { id: event.id }}">{{ event.eventId }}</router-link></td>
                <td>{{ event.eventName }}</td>
                <td>Location: {{ event.location }}<br>
                    Duration: {{ event.startTime }} - {{event.endTime}}
                </td>
                <td>RM {{ event.donationReceived }}</td>
                <td>{{ event.organizer }}</td>
                <td class="text-danger">{{ event.status }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'EditEvent', params: { id: event.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteEvent(event.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            events: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/events')
            .then(response => {
                this.events = response.data;
                console.log(this.events)
            });
    },
    methods: {
        deleteEvent(id) {
            this.axios
                .delete(`http://localhost:8000/api/events/delete/${id}`)
                .then(response => {
                    let i = this.events.map(item => item.id).indexOf(id);
                    this.events.splice(i, 1)
                });
        },
        addEvent() {
            //this.$router.push({path: '/committee/events/add', component:'CreateEvent'});
            this.$router.push({name: 'CreateEvent'})
        }
    }
}
</script>
