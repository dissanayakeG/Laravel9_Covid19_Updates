<template>
    <div>
        <div class="row">
            <h6 class="container main-heading">
                <strong>{{ "Add New Help Guide" }}</strong>
            </h6>
            <h6 class="container main-heading" v-if="success">
                <div class="alert alert-success" role="alert">
                    Help & Guide  successfully saves!
                </div>
            </h6>
        </div>
        <div class="row">
            <div class="container help-and-guide-add-form">
                <form>
                    <div class="form-group">
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control"
                                v-model="link"
                                placeholder="Link"
                            />

                            <div class="text-danger" v-if="res_errors.link">
                                <h6>{{ res_errors.link[0] }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea
                            class="form-control"
                            rows="3"
                            v-model="description"
                            placeholder="Description"
                        ></textarea>
                        <div class="text-danger" v-if="res_errors.description">
                            <h6>{{ res_errors.description[0] }}</h6>
                        </div>
                    </div>
                    <button type="button" class="btn btn-info" @click="submit">
                        {{ "Submit" }}
                    </button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    import store from "../store/index";
    import axios from 'axios'


    export default {
        data() {
            return {
                description: "",
                link: "",
                user: store.getters.user,
                res_errors: {},
                success:false
            };
        },

        methods: {
            submit() {
                let save_data = {
                    user_id: this.user.id,
                    link: this.link,
                    description: this.description,
                };

                axios.post("/api/add-new-help-and-guid", save_data).then(response => {
                    if (response.data.data && response.data.data.errors) {
                        this.res_errors = response.data.data.errors.validations;
                    } else {
                        this.success = true;
                        this.link = '';
                        this.description = '';
                        this.res_errors = {};
                    }
                });
            },
        },
    };
</script>

<style></style>
