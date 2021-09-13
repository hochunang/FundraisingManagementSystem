<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Organization/Company Name</h3>
                <p>{{sponsor.name}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3>Field</h3>
                <p>{{sponsor.field}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3>Email</h3>
                <p>{{sponsor.email}}</p>
            </div>
            <div class="col">
                <h3>Contact Number</h3>
                <p>{{sponsor.contactNumber}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h3>Event Supported</h3>
            </div>
        </div>


    </div>

</template>

<script>
export default {
    data() {
        return {
            sponsor: {}
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/sponsors/${this.$route.params.id}`)
            .then((response) => {
                this.sponsor = response.data;
            }).catch(err => {
                console.log(err)
            });
    },
}
</script>

<style scoped>
    .row {
        margin: 15px;
    }
</style>
