import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import ProductdetailsIndex from './modules/Productdetails'
import ProductdetailsSingle from './modules/Productdetails/single'
import VendorsIndex from './modules/Vendors'
import VendorsSingle from './modules/Vendors/single'
import ProductpricesIndex from './modules/Productprices'
import ProductpricesSingle from './modules/Productprices/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
        ProductdetailsIndex,
        ProductdetailsSingle,
        VendorsIndex,
        VendorsSingle,
        ProductpricesIndex,
        ProductpricesSingle,
    },
    strict: debug,
})
