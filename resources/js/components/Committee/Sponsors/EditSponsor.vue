<template>
    <div>
        <h3 class="text-center">Edit Sponsor</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateSponsor">
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

                    <button type="submit" class="btn btn-primary">Update Sponsor</button>
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
    created() {
        this.axios
            .get(`http://localhost:8000/api/sponsors/edit/${this.$route.params.id}`)
            .then((response) => {
                this.event = response.data;
                // console.log(response.data);
            });
    },
    methods: {
        updateSponsor() {
            this.axios
                .post(`http://localhost:8000/api/sponsors/update/${this.$route.params.id}`, this.sponsor)
                .then((response) => {
                    this.$router.push({name: 'Sponsors'});
                }).catch(()=>{
                console.log("Error.....")
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>

<style scoped>

</style>
