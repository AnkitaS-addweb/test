<template>
    <section class="" style="min-height: 960px;">
        <section class="content-header">
            <h1>Select Variations</h1>
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
                                            <th>Variations</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="value in item.variations" class="m-datatable_row">
                                                <td>{{ value['name'] }}</td>
                                                <td><a v-bind:href="''+item.url +'/'+ value['id']+''" class="btn btn-primary">Select</a></td>
                                            </tr>
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
            item:{variations:[],url:null,},
        }
    },
    created() {
        this.item.url = this.$route.path
        this.getChildProduct(this.$route.params.id)
    },
    methods: {
        getChildProduct(id){
            var parentId = id;
            axios.get('/api/v1/shop/'+ parentId)
                .then(response => {
                    this.item.variations = response.data.data
                })
        }
    }
}
</script>
