<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">DataTable</div>

                    <div class="card-body">

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <strong>Search By :</strong>
                                </div>
                                <div class="col-md-3">
                                    <select v-model="queryFiled" class="form-control" id="fileds">
                                        <option value="name">Name</option>
                                        <option value="email">Email</option>
                                        <option value="phone">Phone</option>
                                        <option value="address">Address</option>
                                        <option value="total">Total</option>
                                    </select>
                                </div>
                                <div class="col-md-7">
                                    <input v-model="query" type="text" class="form-control" placeholder="Search">
                                </div>
                            </div>
                        </div>


                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Total</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(alldata,index) in alldata">
                                <th scope="row">{{ index+1 }}</th>
                                <td>{{ alldata.name}}</td>
                                <td>{{ alldata.email}}</td>
                                <td>{{ alldata.phone}}</td>
                                <td>{{ alldata.address}}</td>
                                <td>{{ alldata.total}}</td>
                                <td class="text-center">
                                    <button type="button" @click="show(alldata)" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" @click="edit(alldata)" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button"@click=""class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <pagination  v-if="pagination.last_page>1" :pagination="pagination" :offset="5" @paginate = "query === '' ? getData() : searchData()"></pagination>
                    </div>
                </div>
            </div>
        </div>
        <modal @clicked="checked"></modal>
        <vue-progress-bar></vue-progress-bar>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data:'',
                query: "",
                queryFiled: "name",
                alldata:[],
                pagination: {
                    current_page: 1
                }
            }
        },
        mounted(){
          console.log("mounted",sessionStorage.iActive);
            console.log('getdata',this.getData());
        },
        watch: {
            query: function(newQ, old) {
                if (newQ === "") {
                    this.getData();
                } else {
                    this.searchData();
                }
            }
        },
        methods:{
            getData(){
                this.$Progress.start();
                axios.get('/api/datatable?page='+ this.pagination.current_page)
                    .then(response =>{
                        this.alldata = response.data.data;
                        this.pagination = response.data.meta;
                        this.$Progress.finish();
                    })
                    .catch(e => {
                        console.log(e);
                        this.$Progress.fail();
                    })
            },
            add(){
                $('#myModal').modal('show');
            },
            checked(val){
                this.data = val;
                sessionStorage.setItem("iActive",this.data);
                console.log('emited data',this.data);
            },
            edit(alldata) {
                this.editMode = true;
                this.form.reset();
                this.form.clear();
                this.form.fill(alldata);
                $("#myModal").modal("show");
            },
            update() {
                this.$Progress.start();
                this.form.busy = true;
                this.form
                    .put("/api/customers/" + this.form.id)
                    .then(response => {
                        this.getData();
                        $("#myModal").modal("hide");
                        if (this.form.successful) {
                            this.$Progress.finish();
                            this.$snotify.success("Data Successfully Updated", "Success");
                        } else {
                            this.$Progress.fail();
                            this.$snotify.error(
                                "Something went wrong try again later.",
                                "Error"
                            );
                        }
                    })
                    .catch(e => {
                        this.$Progress.fail();
                        console.log(e);
                });
            },

            searchData() {
                this.$Progress.start();
                axios.get("/api/search/customers/" +this.queryFiled +"/" +this.query +"?page=" +this.pagination.current_page)
                    .then(response => {
                        this.customers = response.data.data;
                        this.pagination = response.data.meta;
                        this.$Progress.finish();
                    })
                    .catch(e => {
                        console.log(e);
                        this.$Progress.fail();
                    });
            }
        }
    }
</script>