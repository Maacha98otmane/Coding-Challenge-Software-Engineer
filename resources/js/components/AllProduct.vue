<template>
    <div class="text-center">
        <h3 >Products</h3>
        <div class="mt-4">
            <div v-for="(product, index) in products_data" :key="product.name + index" class="card mb-3">
                <img class="card-img-top" style="max-height: 18rem; object-fit: cover" :src="'/storage/' + product.img_path" alt="Card image cap">
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
                               this.fetch();
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