// Start Authentication
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;
///end authentication------
let home = require('./components/home.vue').default;

let userSearch = require('./components/user/index.vue').default;


//category component
let category = require('./components/category/index.vue').default;
let storecategory = require('./components/category/create.vue').default;
let editcategory = require('./components/category/edit.vue').default;
//product component
let product = require('./components/product/index.vue').default;
let storeproduct = require('./components/product/create.vue').default;
let editproduct = require('./components/product/edit.vue').default;

export const routes = [

  { path: '/', component: login, name:'/' },
  { path: '/register', component: register , name:'register' },
  { path: '/forget', component: forget , name:'forget' },
  { path: '/logout', component: logout , name:'logout' },
  { path: '/home', component: home , name:'home' },
  { path: '/userSearch', component: userSearch, name:'userSearch' },

  //category routes--
  { path: '/store-category', component: storecategory, name:'store-category' },
  { path: '/category', component: category, name:'category' },
  { path: '/edit-category/:id', component: editcategory, name:'edit-category' },

   //product routes--
 { path: '/store-product', component: storeproduct, name:'store-product' },
 { path: '/product', component: product, name:'product' },
 { path: '/edit-product/:id', component: editproduct, name:'edit-product' },

]
