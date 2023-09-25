<template>
<!--    <div id="nav">
        <router-link to="/">Home</router-link> |
        <router-link to="/about">About</router-link> |
        <router-link to="/funny">Funny</router-link>
    </div>-->
    <NavigationMenu />
    <router-view />

</template>

<script>
import NavigationMenu from "./components/NavigationMenu.vue";
export default {
    name: "App",
    components: {
        NavigationMenu,
    },

}
</script>

<style scoped>

</style>
