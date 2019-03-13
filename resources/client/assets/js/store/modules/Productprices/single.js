function initialState() {
    return {
        item: {
            id: null,
            vendor: null,
            price: null,
            product: null,
        },
        usersAll: [],
        productdetailsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    usersAll: state => state.usersAll,
    productdetailsAll: state => state.productdetailsAll,
    
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

            if (_.isEmpty(state.item.vendor)) {
                params.set('vendor_id', '')
            } else {
                params.set('vendor_id', state.item.vendor.id)
            }
            if (_.isEmpty(state.item.product)) {
                params.set('product_id', '')
            } else {
                params.set('product_id', state.item.product.id)
            }

            axios.post('/api/v1/productprices', params)
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

            if (_.isEmpty(state.item.vendor)) {
                params.set('vendor_id', '')
            } else {
                params.set('vendor_id', state.item.vendor.id)
            }
            if (_.isEmpty(state.item.product)) {
                params.set('product_id', '')
            } else {
                params.set('product_id', state.item.product.id)
            }

            axios.post('/api/v1/productprices/' + state.item.id, params)
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
        axios.get('/api/v1/productprices/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchUsersAll')
    dispatch('fetchProductdetailsAll')
    },
    fetchUsersAll({ commit }) {
        axios.get('/api/v1/users')
            .then(response => {
                commit('setUsersAll', response.data.data)
            })
    },
    fetchProductdetailsAll({ commit }) {
        axios.get('/api/v1/productdetails')
            .then(response => {
                commit('setProductdetailsAll', response.data.data)
            })
    },
    setVendor({ commit }, value) {
        commit('setVendor', value)
    },
    setPrice({ commit }, value) {
        commit('setPrice', value)
    },
    setProduct({ commit }, value) {
        commit('setProduct', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setVendor(state, value) {
        state.item.vendor = value
    },
    setPrice(state, value) {
        state.item.price = value
    },
    setProduct(state, value) {
        state.item.product = value
    },
    setUsersAll(state, value) {
        state.usersAll = value
    },
    setProductdetailsAll(state, value) {
        state.productdetailsAll = value
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
