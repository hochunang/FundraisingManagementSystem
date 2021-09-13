<template>
    <div>
        <h3 class="modal-header">Sponsor's Info</h3><br/>
        <button type="button" class="btn btn-success float-right" @click="addEvent()">Add Sponsor</button>
        <div v-if="sponsors.length==0" class="font-italic">No Record Found</div>
        <table class="table table-bordered" v-if="sponsors.length!=0">
            <thead>
            <tr>
                <th>No. </th>
                <th>Organization/Company</th>
                <th>Field</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(sponsor,index) in sponsors" :key="sponsor.id">
                <td>{{ index }}</td>
                <td><router-link :to="{name: 'ShowSponsor', params: { id: sponsor.id }}">{{ sponsor.name }}</router-link></td>
                <td>{{sponsor.field}}</td>
                <td>{{ sponsor.email }}</td>
                <td>{{ sponsor.contactNumber }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'EditSponsor', params: { id: sponsor.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteSponsor(sponsor.id)">Delete</button>
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
            sponsors: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/sponsors')
            .then(response => {
                this.sponsors = response.data;
            });
    },
    methods: {
        deleteEvent(id) {
            this.axios
                .delete(`http://localhost:8000/api/sponsors/delete/${id}`)
                .then(response => {
                    let i = this.sponsors.map(item => item.id).indexOf(id);
                    this.sponsors.splice(i, 1)
                });
        },
        addEvent() {
            //this.$router.push({path: '/committee/events/add', component:'CreateEvent'});
            this.$router.push({name: 'CreateSponsor'})
        }
    }
}
</script>
