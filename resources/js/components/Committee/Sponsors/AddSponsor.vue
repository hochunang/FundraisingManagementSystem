<template>
    <div>
        <h3 class="text-center">Add Sponsor</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addSponsor">
                    <div class="form-group">
                        <label>Organization/Company Name</label>
                        <input type="text" class="form-control" v-model="sponsor.name">
                    </div>
                    <div class="form-group">
                        <label>Field</label>
                        <input type="text" class="form-control" v-model="sponsor.field">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="sponsor.email">
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" v-model="sponsor.contactNumber">
                    </div>

                    <button type="submit" class="btn btn-primary">Add Event</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sponsor: {},
        }
    },
    methods: {
        addSponsor() {
            this.axios
                .post('http://localhost:8000/api/sponsors/add', this.sponsor)
                .then(response => (
                    this.$router.push({name: 'Sponsors'})
                    // console.log(response.data)
                ))

        }
    }
}
</script>

<style scoped>

</style>
