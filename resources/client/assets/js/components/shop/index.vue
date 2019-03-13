<template>
    <section class="" style="min-height: 960px;">
        <section class="content-header">
            <h1>Select Product</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="form-group">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="value in item.parent_product" class="m-datatable_row">
                                            <td>{{ value['name'] }}</td>
                                            <td><a v-bind:href="'shop/'+value['id']+''" class="btn btn-primary">Select</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>


<script>

export default {
    data() {        
        return {
            item:{parent_product:[]},
            loading: false,
        }
    },
    created() {
        this.fetchProductdetailsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        fetchProductdetailsAll() {
            axios.get('/api/v1/shop')
                .then(response => {
                    this.item.parent_product = response.data.data
                })
        }
    }
}
</script>
