<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light navbar">
            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarNav"
            >
                <ul class="navbar-nav">
                    <template>
                        <h5 class="nav-link text-primary" v-if="authenticated">hello {{user.name}}</h5>
                        <li
                            class="nav-item"
                            v-if="this.$route.name != 'dashBoard'"
                        >
                            <router-link
                                class="nav-link text-info"
                                :to="{ path: '/dashBoard' }"
                            >Dashboard
                            </router-link>
                        </li>

                        <li
                            class="nav-item"
                            v-if="this.$route.name != 'help-and-guides'">
                            <router-link
                                class="nav-link text-info"
                                :to="{ path: '/help-and-guides' }"
                            >Help & Guide
                            </router-link>
                        </li>

                        <li class="nav-item" v-if="authenticated">
                            <a
                                href="#"
                                class="nav-link text-info"
                                @click.prevent="signOut"
                            >Logout</a>
                        </li>
                    </template>
                    <template v-if="!authenticated">
                        <li class="nav-item active">
                            <router-link class="nav-link text-info" to="/login">Login</router-link>
                        </li>
                        <li class="nav-item active">
                            <router-link class="nav-link text-info" to="/register">Register</router-link>
                        </li>
                    </template>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from "vuex";

    export default {
        data() {
            return {};
        },
        computed: {
            ...mapGetters({
                authenticated: "authenticated",
                user: "user"
            })
        },

        methods: {
            ...mapActions({
                signOutAction: "signOut"
            }),
            signOut() {
                this.signOutAction().then(() => {
                    this.$router.replace({
                        name: "Login"
                    });
                });
            }
        }
    };
</script>
