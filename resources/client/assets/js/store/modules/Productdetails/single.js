function initialState() {
    return {
        item: {
            id: null,
            name: null,
            type: null,
            parent_product: null,
            vendor: [],
            price:[],
            image: [],
            uploaded_image: [],
        },
        productdetailsAll: [],
        usersAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    productdetailsAll: state => state.productdetailsAll,
    usersAll: state => state.usersAll,
    
}

const actions = {
    storeData({ commit, state, dispatch }) {

        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }
            console.log(params);
            if (_.isEmpty(state.item.price)) {
                params.set('price', '')
            } else {
                // console.log(state.item.price);
                // for (let index in state.item.price) {
                //     params.set('price['+index+']', state.item.price[index].id)
                // }
            }

            if (_.isEmpty(state.item.parent_product)) {
                params.set('parent_product_id', '')
            } else {
                params.set('parent_product_id', state.item.parent_product.id)
            }
            if (_.isEmpty(state.item.vendor)) {
                params.delete('vendor')
            } else {
                // console.log(state.item.vendor);
                
                // for (let index in state.item.vendor) {
                //     params.set('vendor['+index+']', state.item.vendor[index].id)
                // }
            }
            params.set('uploaded_image', state.item.uploaded_image.map(o => o['id']))

            axios.post('/api/v1/productdetails', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.parent_product)) {
                params.set('parent_product_id', '')
            } else {
                params.set('parent_product_id', state.item.parent_product.id)
            }
            if (_.isEmpty(state.item.vendor)) {
                params.delete('vendor')
            } else {
                for (let index in state.item.vendor) {
                    params.set('vendor['+index+']', state.item.vendor[index].id)
                }
            }
            params.set('uploaded_image', state.item.uploaded_image.map(o => o['id']))

            axios.post('/api/v1/productdetails/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/productdetails/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchProductdetailsAll')
    dispatch('fetchUsersAll')
    },
    fetchProductdetailsAll({ commit }) {
        axios.get('/api/v1/productdetails')
            .then(response => {
                commit('setProductdetailsAll', response.data.data)
            })
    },
    fetchUsersAll({ commit }) {
        axios.get('/api/v1/users')
            .then(response => {
                commit('setUsersAll', response.data.data)
            })
    },
    setName({ commit }, value) {
        commit('setName', value)
    },
    setType({ commit }, value) {
        commit('setType', value)
    },
    setPrice({ commit }, value) {
        commit('setPrice', value)
    },
    setParent_product({ commit }, value) {
        commit('setParent_product', value)
    },
    setVendor({ commit }, value) {
        commit('setVendor', value)
    },
    setImage({ commit }, value) {
        commit('setImage', value)
    },
    destroyImage({ commit }, value) {
        commit('destroyImage', value)
    },
    destroyUploadedImage({ commit }, value) {
        commit('destroyUploadedImage', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setName(state, value) {
        state.item.name = value
    },
    setType(state, value) {
        state.item.type = value
    },
    setPrice(state, value) {
        //state.item.vendor.price = value
        // for (let i in value) {
        //     let price = value[i];
        //     if (typeof price === "object") {
        //         state.item.price.push(price);
        //     }
        // }
    },
    setParent_product(state, value) {
        state.item.parent_product = value
    },
    setVendor(state, value) {
        console.log(state);

        var elem = document.createElement('tr');
            // this.setVendor(value)
            state.item.vendor.push({
                price: "",
                vendorid: "",
            });
        // for (let i in value) {
        //     let vendor = value[i];
        //     if (typeof vendor === "object") {
        //         state.item.vendor.push(vendor);
        //     }
        // }
        // this.item.vendor.push({
        //     price: "",
        //     vendor: "",
        // });
                
    },
    setImage(state, value) {
        for (let i in value) {
            let image = value[i];
            if (typeof image === "object") {
                state.item.image.push(image);
            }
        }
    },
    destroyImage(state, value) {
        for (let i in state.item.image) {
            if (i == value) {
                state.item.image.splice(i, 1);
            }
        }
    },
    destroyUploadedImage(state, value) {
        for (let i in state.item.uploaded_image) {
            let data = state.item.uploaded_image[i];
            if (data.id === value) {
                state.item.uploaded_image.splice(i, 1);
            }
        }
    },
    setProductdetailsAll(state, value) {
        state.productdetailsAll = value
    },
    setUsersAll(state, value) {
        state.usersAll = value
    },
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
