<template>
    <section class="" style="min-height: 960px;">
        <section class="content-header">
            <h1>Product Details</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="form-group">
                                <div>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="m-datatable_row">
                                               <td><strong>Name:</strong> {{ productdetails['name'] }}</td>
                                            </tr>
                                            <tr class="m-datatable_row">
                                               <td><strong>Type:</strong> {{ productdetails['type'] }}</td> 
                                            </tr>
                                            <tr class="m-datatable_row">                                                
                                               <td><strong>Images:</strong> <div v-html="productdetails.image_link"></div> </td> 
                                            </tr>
                                            <tr>
                                                <td><strong>Vendor</strong></td>
                                                <td><strong>Price</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr v-for="value in price">
                                                <td>{{ value['vendor']['name'] }}</td>
                                                <td>{{ value['price'] }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Add</a>
                                                </td>
                                            </tr>
                                            <!-- <tr class="m-datatable_row">
                                               <td> {{ price }}</td>
                                            </tr>
                                            <tr class="m-datatable_row">
                                               <td> {{ productdetails }}</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
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
            price:[],
            productdetails:[]
        }
    },
    created() {
        this.getChildProduct(this.$route.params.id, this.$route.params.token )
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        getChildProduct(id, token){
            var parentId = id;
            axios.get('/api/v1/shop/'+ parentId+'/'+token)
                .then(response => {
                     this.productdetails = response.data.data
                })
            axios.get('/api/v1/productprice/'+token)
                .then(priceResponse => {
                     this.price = priceResponse.data.data
                })
        },
    }
}
</script>
