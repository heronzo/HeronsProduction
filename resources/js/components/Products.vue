<template>
    <div>
        <h2>Products</h2>
        <form @submit.prevent="addProduct()" class="mb-2">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" v-model="product.name">
            </div>
            <div class="form-group">
                <input type="tex" class="form-control" placeholder="Supplier_id" v-model="product.supplier_id">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Save</button>
        </form>
        <div class="card card-body mb-2" v-for="product in ourProducts" v-bind:key="id">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Product Name: {{product.name}}</h4>
                    <h4>Supplier: {{product.supplier_id}}</h4>
                    <button @click="editProduct(product)" class="btn btn-warning mb-2">Edit</button>
                    <button @click="deleteProduct(product.id)" class="btn btn-danger mb-2">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                ourProducts: [],
                product: {
                    id: '',
                    name: '',
                    supplier_id: ''
                }, id: '',
                pagination: {},
                edit: false
            }
        },
        created() {
            this.fetchProducts();
        },
        methods: {
            fetchProducts() {
                fetch('/api/products').then(res => res.json()).then(res => {
                    this.ourProducts = res.data;
                })
            },
            deleteProduct(id) {
                if (confirm('Are you sure you want to delete the product')) {
                    fetch('/delete/product/{id}', {
                            method: 'delete'
                        }
                    )
                        .then(res => res.json())
                        .then(data => {
                            alert('product removed');
                            this.fetchProducts();
                        })
                        .catch(err => console.log(err))
                }
            },
            addProduct() {
                if (this.edit === false) {
                    // add
                    fetch('api/add/product', {
                        method: 'post', body: JSON.stringify(this.product),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(data => {
                            this.product.name = '';
                            this.product.supplier_id = '';
                            this.fetchProducts();
                        })
                        .catch(err => console.log(err))
                } else {
                    // update
                    fetch('api/add/product', {
                        method: 'put', body: JSON.stringify(this.product),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                        .then(res => res.json())
                        .then(data => {
                            this.product.name = '';
                            this.product.supplier_id = '';
                            this.fetchProducts();
                        })
                        .catch(err => console.log(err))
                }
            },
            editProduct(product) {
                this.edit = true;
                this.product.id = product.id;
                this.product.id = product.id;
                this.product.name = product.name;
                this.product.supplier_id = product.supplier_id;
            }
        }
    }
</script>