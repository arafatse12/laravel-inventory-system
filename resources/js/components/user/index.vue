 <template>
    <div>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All User</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row card container">

          <div class="card-body">
            <div class="card-body">
              <div class="table-responsive">
                <label>Search</label>
               <input type="text" v-model="searchTerm" class="form-control" style="width:200px; "><br>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Birthday</th>

                    </tr>
                  </thead>

                  <tbody>

                    <tr v-for="user in filtersearch" :key="user.id">
                      <td>{{ user.name}}</td>
                      <td>{{ user.email}}</td>
                      <td>{{ user.birthday }}</td>

                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
         this.allUser();
        },

        data(){
          return{
            users:[],
            searchTerm:'',
          }
        },
       computed:{
         filtersearch(){
          return this.users.filter(user => {
             return user.birthday.toLowerCase().match(this.searchTerm) || user.birthday.match(this.searchTerm)

           })
         }
       },
        methods:{
          allUser(){
            axios.get('api/userSearch')
            .then(({data}) => (this.users = data))
            .catch()
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
