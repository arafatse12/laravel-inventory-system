 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Category</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row card container">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Category Insert
            <router-link to="/store-category" class="btn btn-sm btn-info" id="add_new"> Add New</router-link>
          </div>
          <div class="card-body">
            <div class="card-body">
              <div class="table-responsive">
                <label>Search</label>
               <input type="text" v-model="searchTerm" class="form-control" style="width:200px; "><br>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="category in filtersearch" :key="category.id">
                      <td>{{ category.category_name }}</td>
                      <td>
                        <router-link :to="{name: 'edit-category', params:{id: category.id} }" class="btn btn-sm btn-info">Edit</router-link>
                        <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
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

        created(){
        this.AllCategory();
        },

        data(){
          return{
            categorys:[],
            searchTerm:'',
          }
        },
       computed:{
         filtersearch(){
          return this.categorys.filter(category => {
             return category.category_name.match(this.searchTerm)
           })
         }
       },
        methods:{
          AllCategory(){
            axios.get('/api/category/')
            .then(({data}) => (this.categorys = data))
            .catch()
          },
          deleteCategory(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              axios.delete('/api/category/'+id)
              .then(()=>{
                 this.categorys = this.categorys.filter(category =>{
                    return category.id !=id
                 })
              })
              .catch(()=>{
                 this.$router.push({name: 'category'})
              })
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
           })
          }
        },

    }



</script>

<style>

#add_new{
	float: right;
}
#em_photo{
  height: 40px;
  width: 40px;
}

</style>
