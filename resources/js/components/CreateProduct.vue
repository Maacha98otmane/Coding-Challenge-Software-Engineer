<template>
    <div>
        <h3 class="text-center">Create Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProduct" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="description">
                    </div>
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" v-model="price">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" id="image" type="file" class="form-control" v-on:change="onChange">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" v-model="categories">
                            <option v-for="category in categoryi" :key="category.id" :value="category.id">{{ category.name }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
     export default {
        data() {
            return {
                name: '',
                description: '',
                price: '',
                image: '',
                categories: '',
                categoryi:[],
            }
        },

        methods: {
            addProduct() {
                let data = new FormData();
                    data.append("name", this.name);
                    data.append("description", this.description);
                    data.append("price", this.price);
                    data.append("image", this.image);
                    data.append("categories", this.categories);
                this.axios.post('/api/v1/products', data, {Headers: {'Content-Type': 'multipart/form-data'}})
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
            },
            getCategory() {
                this.axios.get('/api/v1/categories')
                    .then(response => (
                        this.categoryi = response.data.data
                    ))
                    .catch(err => console.log(err))
            },
             onChange(e) {
                this.image = e.target.files[0]
            },
        },
        mounted() {
            this.getCategory()
        }
    }
</script>