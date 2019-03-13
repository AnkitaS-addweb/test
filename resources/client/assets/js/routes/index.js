import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import ProductdetailsIndex from '../components/cruds/Productdetails/Index.vue'
import ProductdetailsCreate from '../components/cruds/Productdetails/Create.vue'
import ProductdetailsShow from '../components/cruds/Productdetails/Show.vue'
import ProductdetailsEdit from '../components/cruds/Productdetails/Edit.vue'
import VendorsIndex from '../components/cruds/Vendors/Index.vue'
import VendorsCreate from '../components/cruds/Vendors/Create.vue'
import VendorsShow from '../components/cruds/Vendors/Show.vue'
import VendorsEdit from '../components/cruds/Vendors/Edit.vue'
import ProductpricesIndex from '../components/cruds/Productprices/Index.vue'
import ProductpricesCreate from '../components/cruds/Productprices/Create.vue'
import ProductpricesShow from '../components/cruds/Productprices/Show.vue'
import ProductpricesEdit from '../components/cruds/Productprices/Edit.vue'
import ShopIndex from '../components/shop/index.vue'
import ShopShow from '../components/shop/show.vue'
import ShopToken from '../components/shop/veriation.vue'
import CartShow from '../components/cart/show.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/productdetails', component: ProductdetailsIndex, name: 'productdetails.index' },
    { path: '/productdetails/create', component: ProductdetailsCreate, name: 'productdetails.create' },
    { path: '/productdetails/:id', component: ProductdetailsShow, name: 'productdetails.show' },
    { path: '/productdetails/:id/edit', component: ProductdetailsEdit, name: 'productdetails.edit' },
    { path: '/vendors', component: VendorsIndex, name: 'vendors.index' },
    { path: '/vendors/create', component: VendorsCreate, name: 'vendors.create' },
    { path: '/vendors/:id', component: VendorsShow, name: 'vendors.show' },
    { path: '/vendors/:id/edit', component: VendorsEdit, name: 'vendors.edit' },
    { path: '/productprices', component: ProductpricesIndex, name: 'productprices.index' },
    { path: '/productprices/create', component: ProductpricesCreate, name: 'productprices.create' },
    { path: '/productprices/:id', component: ProductpricesShow, name: 'productprices.show' },
    { path: '/productprices/:id/edit', component: ProductpricesEdit, name: 'productprices.edit' },
    { path: '/shop', component: ShopIndex, name: 'shop.index' , meta: {auth: false}},
    { path: '/shop/:id', component: ShopShow, name: 'shop.show', meta: {auth: false} },
    { path: '/shop/:id/:token', component: ShopToken, name: 'shop.veriation', meta: {auth: false} },
    { path: '/cart/:token', component: CartShow, name: 'cart.show' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
