<template>
    <div class="col-lg-12 dashboard-body">
        <h4 class="main-heading">
            <strong>{{ "Local Covid19 Live Updates" }}</strong>
        </h4>

        <div>
            <liveUpdate :localUpdates="localUpdates" />
        </div>
        <div v-if="authenticated">
            <addNewHelpAndGuide />
        </div>
    </div>
</template>

<script>
    import liveUpdate from "./partials/_livUpdate.vue";
    import addNewHelpAndGuide from "./AddNewHelpAndGuid.vue";
    import { mapGetters } from "vuex";
import axios from 'axios'

    export default {
        data() {
            return {
                helpAndGuides: [],
                localUpdates: {},
            };
        },

        computed: {
            ...mapGetters({
                authenticated: "authenticated",
                user: "user",
            }),
        },

        components: {
            liveUpdate,
            addNewHelpAndGuide,
        },

        mounted() {
            this.getAllHelpAndGuides();
            this.getLiveUpdateOfLocalCovid();
        },

        methods: {
            getAllHelpAndGuides() {
                axios.get("/api/get-all-help-and-guides").then(response => {
                    if (response.data) {
                        this.helpAndGuides = response.data;
                    }
                });
            },

            getLiveUpdateOfLocalCovid() {
                axios.get("/api/get-live-local-covid-updates").then(response => {
                    if (response.data) {
                        this.localUpdates = response.data;
                    }
                });
            },
        },
    };
</script>

<style></style>
