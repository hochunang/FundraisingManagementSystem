require('./bootstrap');
window.Vue = require('vue').default;


import VueRouter from 'vue-router'
Vue.use(VueRouter)

// import Router from 'vue-router'
// const originalPush = Router.prototype.push
//
// Router.prototype.push = function push(location) {
//     return originalPush.call(this, location).catch(err => err)
// }
import VueAxios from "vue-axios";
import axios from 'axios'

Vue.use(VueAxios, axios)
//Vue.prototype.axios = axios;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('login-component', require('./components/LoginComponent.vue').default);
Vue.component('sponsor-dashboard', require('./components/SponsorDashboardComponent.vue').default);
Vue.component('committee-dashboard', require('./components/CommitteeDashboardComponent.vue').default);
Vue.component('dsa-dashboard', require('./components/DsaDashboardComponent.vue').default);
Vue.component('event-info-component', require('./components/Committee/Events/AllEvents.vue').default);

import vSelect from "vue-select";

Vue.component("v-select", vSelect);



//routes
// import App from './App'
import AllEvents from "./components/Committee/Events/AllEvents"
import CreateEvent from "./components/Committee/Events/CreateEvent"
import EditEvent from "./components/Committee/Events/EditEvent";
import ShowEvent from "./components/Committee/Events/ShowEvent";

import AllSponsors from "./components/Committee/Sponsors/AllSponsors";
import AddSponsor from "./components/Committee/Sponsors/AddSponsor";
import EditSponsor from "./components/Committee/Sponsors/EditSponsor";
import ShowSponsor from "./components/Committee/Sponsors/ShowSponsor";

const routes = [
    {
        name: 'Events',
        path: '/committee/events',
        component: AllEvents
    },

    {
        name: 'CreateEvent',
        path: '/committee/events/add',
        component: CreateEvent
    },

    {
        name: 'EditEvent',
        path: '/committee/events/edit/:id',
        component: EditEvent
    },

    {
        name: 'ShowEvent',
        path: '/committee/events/:id',
        component: ShowEvent
    },
    {
        name: 'Sponsors',
        path: '/committee/sponsors',
        component: AllSponsors
    },

    {
        name: 'CreateSponsor',
        path: '/committee/sponsors/add',
        component: AddSponsor
    },

    {
        name: 'EditSponsor',
        path: '/committee/sponsors/edit/:id',
        component: EditSponsor
    },

    {
        name: 'ShowSponsor',
        path: '/committee/sponsors/:id',
        component: ShowSponsor
    },
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

const app = new Vue({
    el: '#app',
    router: router,
});

Vue.use(vSelect)
