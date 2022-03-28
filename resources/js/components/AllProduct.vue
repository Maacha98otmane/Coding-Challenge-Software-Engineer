<template>
    <div class="text-center">
        <h3 >Products</h3>
        <form >
            <div class="form-row align-items-center justify-content-center">
                <div class="form-group col-auto">
                    <label for="sort-by">Sort By</label>
                    <select v-model="options.sortBy" class="form-control">
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                    </select>
                </div>
                <div v-if="options.sortBy" class="form-group col-auto">
                    <label for="sortingType">Sorting Type</label>
                    <select v-model="options.sortingType" class="form-control">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="mt-4">
            <div v-for="(product, index) in products_data" :key="product.name + index" class="card mb-3">
                <img class="card-img-top" style="max-height: 18rem; object-fit: cover" :src="'../storage/' + product.image" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ product.name }}</h5>
                    <p class="card-text">Description: {{ product.description }}</p>
                    <p>Price: {{ product.price }}</p>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
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
            options: {
                sortBy: 'name',
                sortingType: 'asc',
            },
            products_data: [],
        }
    },
    created() {
        this.fetch();
    },
    methods: {
        async fetch() {
            try {
                    this.products_data = (await axios.get('/api/v1/products', {params: this.options})).data.data;

            } catch (error) {

            }
        },
         deleteProduct(id) { 
                this.axios.delete(`/api/v1/products/${id}`)
                    .then(response => {
                        this.products_data = this.products_data.filter(product => product.id !== id);
                    });
            }
    },
    watch: {
        options: {
            handler() {
                this.fetch();
            },
            deep: true
        }
    }
}
</script>