<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">All Products</router-link>
                    <router-link to="/create" class="nav-item nav-link">Create Product</router-link>
                    <router-link to="/allcategory" class="nav-item nav-link">All Category</router-link>
                    <router-link to="/createcategory" class="nav-item nav-link">Create Category</router-link>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>