<template>
    <div>
        <h2 class="text-center">Category List</h2>
 <form>
            <div class="form-row align-items-center justify-content-center">
                <div class="form-group col-auto">
                    <label for="sort-by">Sort By</label>
                    <select v-model="options.sortBy" class="form-control">
                        <option value="name">Name</option>
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
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories_data" :key="category.id" >
                <td>{{ category.id }}</td>
                <td>{{ category.name }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deleteCategory(category.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
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
            categories_data: [],
        }
    },
    created() {
        this.fetch();
    },
    methods: {
        async fetch() {
            try {
                    this.categories_data = (await axios.get('/api/v1/categories', {params: this.options})).data.data;

            } catch (error) {

            }
        },
         deleteCategory(id) { 
                this.axios.delete(`/api/v1/categories/${id}`)
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