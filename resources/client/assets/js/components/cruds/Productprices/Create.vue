<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Productprice</h1>
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
                                    <label for="vendor">Vendor</label>
                                    <v-select
                                            name="vendor"
                                            label="name"
                                            @input="updateVendor"
                                            :value="item.vendor"
                                            :options="usersAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="price"
                                            placeholder="Enter Price"
                                            :value="item.price"
                                            @input="updatePrice"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="product">Product</label>
                                    <v-select
                                            name="product"
                                            label="name"
                                            @input="updateProduct"
                                            :value="item.product"
                                            :options="productdetailsAll"
                                            />
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
        ...mapGetters('ProductpricesSingle', ['item', 'loading', 'usersAll', 'productdetailsAll'])
    },
    created() {
        this.fetchUsersAll(),
        this.fetchProductdetailsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('ProductpricesSingle', ['storeData', 'resetState', 'setVendor', 'setPrice', 'setProduct', 'fetchUsersAll', 'fetchProductdetailsAll']),
        updateVendor(value) {
            this.setVendor(value)
        },
        updatePrice(e) {
            this.setPrice(e.target.value)
        },
        updateProduct(value) {
            this.setProduct(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'productprices.index' })
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
