<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Productdetails</h1>
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
                                    <label for="name">Name *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Enter Name *"
                                            :value="item.name"
                                            @input="updateName"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="type">Type *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="type"
                                            placeholder="Enter Type *"
                                            :value="item.type"
                                            @input="updateType"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="parent_product">Parent product id *</label>
                                    <v-select
                                            name="parent_product"
                                            label="name"
                                            @input="updateParent_product"
                                            :value="item.parent_product"
                                            :options="productdetailsAll"
                                            />
                                </div>
                                <div class="form-group">
                                     <table class="table">
                                        <thead>
                                            <tr>
                                                <td><strong>Vendor</strong></td>
                                                <td><strong>Price</strong></td>
                                                <td><strong>action</strong></td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(row, index) in item.vendor">
                                                <td>
                                                    <v-select
                                                    label="name"
                                                    :value="row.vendorid"
                                                    :options="usersAll"
                                                    />
                                                </td>
                                                
                                                <td><input type="text" v-model="row.price"></td>
                                                <td>
                                                    <a v-on:click="removeElement(index);" style="cursor: pointer">Remove</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div>
                                        <a class="button btn-primary" @click="addRow">Add row</a>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="vendor">Vendor</label>
                                    <v-select
                                            name="vendor"
                                            label="name"
                                            @input="updateVendor"
                                            :value="item.vendor"
                                            :options="usersAll"
                                            multiple
                                            />
                                </div> -->
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input
                                            type="file"
                                            class="form-control"
                                            @change="updateImage"
                                            multiple="multiple"
                                    >
                                    <ul v-if="item.image || item.uploaded_image" class="list-unstyled">
                                        <li v-for="image in item.uploaded_image">
                                            {{ image.file_name }}
                                            <button class="btn btn-xs btn-danger"
                                                    type="button"
                                                    @click="removeUploadedImage($event, image.id);"
                                            >
                                                Remove file
                                            </button>
                                        </li>
                                        <li v-for="(image, index) in item.image">
                                            {{ image.name }}
                                            <button class="btn btn-xs btn-danger"
                                                    type="button"
                                                    @click="removeImage($event, index);"
                                            >
                                                Remove file
                                            </button>
                                        </li>
                                    </ul>
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
        }
    },
    computed: {
        ...mapGetters('ProductdetailsSingle', ['item', 'loading', 'productdetailsAll', 'usersAll'])
    },
    created() {
        this.fetchProductdetailsAll(),
        this.fetchUsersAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('ProductdetailsSingle', ['storeData', 'resetState', 'setName', 'setType', 'setParent_product', 'setVendor', 'setImage','setPrice', 'destroyImage', 'destroyUploadedImage', 'fetchProductdetailsAll', 'fetchUsersAll']),
        updateName(e) {
            this.setName(e.target.value)
        },
        addRow(value) {
            // var elem = document.createElement('tr');
            this.setVendor(value)
        },
        removeElement: function(index) {
            this.rows.splice(index, 1);
        },
        updateType(e) {
            this.setType(e.target.value)
        },
        updateParent_product(value) {
            this.setParent_product(value)
        },
        updateVendor(value) {
            this.setVendor(value)
        },
        updatePrice(e){
            this.setPrice(e.target.value)
        },
        removeImage(e, id) {
            this.$swal({
                title: 'Are you sure?',
                text: "To fully delete the file submit the form.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#dd4b39',
                focusCancel: true,
                reverseButtons: true
            }).then(result => {
                if (typeof result.dismiss === "undefined") {
                    this.destroyImage(id);
                }
            })
        },
        updateImage(e) {
            this.setImage(e.target.files);
            this.$forceUpdate();
        },
        removeUploadedImage (e, id) {
        this.$swal({
          title: 'Are you sure ? ',
          text: "To fully delete the file submit the form.",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete',
          confirmButtonColor: '#dd4b39',
          focusCancel: true,
          reverseButtons: true
        }).
        then(result => {
            if (typeof result.dismiss === "undefined") {
                this.destroyUploadedImage(id);
            }
        })
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'productdetails.index' })
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
