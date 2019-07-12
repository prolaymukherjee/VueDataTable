<template>
    <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label >Name</label>
                            <input type="name" class="form-control"  placeholder="enter your name">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control"  placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label >Phone</label>
                            <input type="phone" class="form-control"  placeholder="enter your phone number">
                        </div>
                        <div class="form-group">
                            <label >Address</label>
                            <textarea class="form-control"  rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label >Total</label>
                            <input type="total" class="form-control"  placeholder="total">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="save()">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                someValue:3,
                alldata: [],
            }
        },

        mounted(){

        },

        methods:{
            save(){
                this.$emit('clicked', '3');
                $('#myModal').modal('hide');


            }
        }

    }

</script>