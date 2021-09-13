<template>
    <div>
        <h3 class="text-center">Edit Event</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateEvent">
                    <div class="form-group">
                        <label>Event ID</label>
                        <input type="text" class="form-control" v-model="event.eventId">
                    </div>
                    <div class="form-group">
                        <label>Event Name</label>
                        <input type="text" class="form-control" v-model="event.eventName">
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" v-model="event.location">
                    </div>
                    <div class="form-group">
                        <label>Starting Time</label>
                        <datetime format="DD-MM-YYYY H:i:s" v-model="event.startTime"></datetime>
                    </div>
                    <div class="form-group">
                        <label>Ending Time</label>
                        <datetime format="DD-MM-YYYY H:i:s" v-model="event.endTime"></datetime>
                    </div>
                    <div class="form-group">
                        <label>Donation Received</label>
                        <input type="text" class="form-control" v-model="event.donationReceived">
                    </div>
                    <div class="form-group">
                        <label>Organizer</label>
<!--                        <input type="text" class="form-control" v-model="event.organizer">-->
                        <select v-model="event.organizer" class="form-control">
                            <option v-for="item in options">
                                {{item}}
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Event</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import datetime from 'vuejs-datetimepicker';

export default {
    components: { datetime },
    data() {
        return {
            event: {},
            options:[
                'Accounting Society', 'Actuarial Science Society', 'Architecture Society', 'Building and Property Management Society',
                'Built Environment Society', 'Chinese Medicine Society', 'Corporate Communication Society', 'Early Childhood Society',
                'Engineering Society', 'Graphic Design and Multimedia Society', 'International Business & Global Economics Society',
                'Journalism in Chinese Media Society', 'Media and Digital Animation Society', 'Medical and Health Sciences Society',
                'Postgraduate Chinese Studies Society', 'Physiotherapy Society', 'Asian Cultural Society', 'Astronomy Club', 'Buddhist Society',
                'Career Development Club', 'Catholic Society', 'Chinese Language Society', 'Christian Fellowship Society', 'Entrepreneurship and Management Club',
                'Finance and Investment Society', 'Hindu Society', 'Information Technology Society', 'E-Sports and Video Games Club',
                'International Friendship Society', 'Japanese Culture Club', 'Makers Club', 'Mathematics Society', 'Robotics Society ',
                'Sustainable Development Club', 'Yoga Society', 'Arts & Crafts Society', 'Dance Club', 'Drama & Public Speaking Society',
                'Film Club', 'Music Club', 'Photography Society', 'Board Games Club', 'Sports Club', "Traveler's Den", 'Aikido Club',
                'Hapkido Club', 'Karatedo Club', 'Taekwondo Club', 'Wushu Club', 'Askar Wataniah', 'Community Service Society', 'Crime Prevention Society',
                'Student Representative Council (SRC)', 'First Aid Society', 'Others'
            ]
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/events/edit/${this.$route.params.id}`)
            .then((response) => {
                this.event = response.data;
                // console.log(response.data);
            });
    },
    methods: {
        updateEvent() {
            this.axios
                .post(`http://localhost:8000/api/events/update/${this.$route.params.id}`, this.event)
                .then((response) => {
                    this.$router.push({name: 'Events'});
                }).catch(()=>{
                console.log("Error.....")
            })
        }
    }
}
</script>

<style scoped>

</style>
