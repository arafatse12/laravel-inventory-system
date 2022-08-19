 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row container">
         <div class="card col-lg-12">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Product Update
            <router-link to="/product" class="btn btn-sm btn-info" id="add_new"> All Product</router-link>
          </div>
          <div class="card-body">
          	  <form @submit.prevent="resultUpdate" >
                  
<div class="form-group">
	            
                 <div class="form-row">
                     <div class="col-md-6">
	                  <div class="form-group">
					    <label for="exampleFormControlSelect1">Category</label>
					    <select class="form-control" id="exampleFormControlSelect1" v-model="form.category_id">
						    <option value="">Select</option>
					      <option :value="category.id"  v-for="category in categorys">
                              		{{ category.category_name }}</option>
					    </select>
					    <small class="text-danger" v-if="errors.category_id">{{ errors.category_id[0] }}</small>
					  </div>
	               </div>
			   <div class="col-md-6">
	                <div class="form-group">
				    <label for="product_name">Product Name</label>
	                  <input type="text" v-model="form.product_name" class="form-control"   required="">
	                  <small class="text-danger" v-if="errors.product_name">{{ errors.product_name[0] }}</small>
	                  
	                </div>
	               </div>
                 </div>

		     <div class="form-row">
                   
                   <div class="col-md-6">
	                <div class="form-group">
				<label for="product_code"> Product Code</label>
	                  <input type="text" v-model="form.product_code" class="form-control"  required="">
	                  <small class="text-danger" v-if="errors.product_code">{{ errors.product_code[0] }}</small>
	                </div>
	               </div>
			   <div class="col-md-4">
	                <div class="form-group">
				<label for="buying_price">Buying Price</label>
	                  <input type="number" v-model="form.buying_price" class="form-control"   required="">
	                  <small class="text-danger" v-if="errors.buying_price">{{ errors.buying_price[0] }}</small>
	                </div>
	               </div>
	                <br>
	             </div>

			 <div class="form-row">
                   
                   <div class="col-md-6">
	                <div class="form-group">
				 <label for="selling_price"> Selling Price</label>
	                  <input type="number" v-model="form.selling_price" class="form-control"  required="">
	                  <small class="text-danger" v-if="errors.selling_price">{{ errors.selling_price[0] }}</small>
	                </div>
	               </div>
			    <div class="col-md-6">
	                <div class="form-group">
				 <label for="product_quantity">Quantity</label>
	                  <input type="number" v-model="form.product_quantity" class="form-control"  required="">
	                  <small class="text-danger" v-if="errors.product_quantity">{{ errors.product_code[0] }}</small>
	                </div>
	               </div>
	                <br>
	             </div>


	          </div>
               <button type="submit" class="btn btn-success">Update</button>
              </form>
          </div>

         </div>
       </div>
   </div>
</template>

<script>

    export default {
    	mounted(){
            if (!User.loggedIn()) {
               this.$router.push({ name:'/' })
            }
        },
        data(){
        	return{
        		form:{
        			category_id :'',
        			product_name:'',
        			product_code:'',
        			buying_price:'',
        			selling_price:'',
        			product_quantity:''

        		},
        		errors:{},
                categorys:{}
        	}
        },
        created(){
        	let id = this.$route.params.id
        	axios.get('/api/product/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()
        	axios.get('/api/product')
        	.then(({data}) => (this.products = data))
		axios.get('/api/category')
        	.then(({data}) => (this.categorys = data))
        },
        methods:{
        	resultUpdate(){
        		let id = this.$route.params.id
        		axios.patch('/api/product/'+id,this.form)
        		.then(() => {
        			this.$router.push({ name: 'product' })
        			Notification.success()
        		})
        		.catch(error => this.errors = error.response.data.errors)
        	},

        }


    }




</script>

<style>

#add_new{
	float: right;
}

</style>
