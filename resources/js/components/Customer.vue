<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">DataTable</div>

                    <div class="card-body">
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
                                    <button type="button" @click="" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" @click="" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button"@click=""class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
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
        data() {
            return {
                alldata:[],
            }
        },
        mounted(){
          console.log("mounted");
            console.log('getdata',this.getData());
        },
        methods:{
            getData(){
                axios.get('/api/datatable')
                    .then(response =>{
                        this.alldata = response.data.data;
                    })
                    .catch(e => {
                        console.log(e);
                    })
            }
        }
    }
   
</script>