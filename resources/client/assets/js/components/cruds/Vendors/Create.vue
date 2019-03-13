<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Vendor</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="user">User id *</label>
                                    <v-select
                                            name="user"
                                            label="name"
                                            @input="updateUser"
                                            :value="item.user"
                                            :options="usersAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="contact_person_name">Contact person name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="contact_person_name"
                                            placeholder="Enter Contact person name *"
                                            :value="item.contact_person_name"
                                            @input="updateContact_person_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="contact_person_phone">Contact person phone</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="contact_person_phone"
                                            placeholder="Enter Contact person phone"
                                            :value="item.contact_person_phone"
                                            @input="updateContact_person_phone"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="contact_person_email">Contact person email</label>
                                    <input
                                            type="email"
                                            class="form-control"
                                            name="contact_person_email"
                                            placeholder="Enter Contact person email"
                                            :value="item.contact_person_email"
                                            @input="updateContact_person_email"
                                            >
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('VendorsSingle', ['item', 'loading', 'usersAll'])
    },
    created() {
        this.fetchUsersAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('VendorsSingle', ['storeData', 'resetState', 'setUser', 'setContact_person_name', 'setContact_person_phone', 'setContact_person_email', 'fetchUsersAll']),
        updateUser(value) {
            this.setUser(value)
        },
        updateContact_person_name(e) {
            this.setContact_person_name(e.target.value)
        },
        updateContact_person_phone(e) {
            this.setContact_person_phone(e.target.value)
        },
        updateContact_person_email(e) {
            this.setContact_person_email(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'vendors.index' })
                    this.$eventHub.$emit('create-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
