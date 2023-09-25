<template>
    <nav class="dnd-menu">
        <ul>
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/about">About</router-link></li>
            <li><router-link to="/sign-in">Sign in</router-link>/<router-link to="/sign-up">Sign up</router-link></li>
            <li><router-link to="/rules">Read Rules</router-link></li>
            <li><router-link to="/dice-roller">Dice roller</router-link></li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "NavigationMenu"
}
</script>

<style scoped>
.dnd-menu {
    background-color: rgba(178, 45, 45, 0.91);
    padding: 5px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    text-align: center;
    font-family: 'Old English Text MT', serif;
    font-size: 24px;
    color: #fff;
}

.dnd-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex; /* Горизонтальное расположение элементов */
    justify-content: center; /* Выравнивание элементов по центру */
}

.dnd-menu li {
    margin: 10px 20px; /* Расстояние между элементами */
}

.dnd-menu a {
    text-decoration: none;
    color: #ffcc00;
    transition: color 0.3s;
}

.dnd-menu a:hover {
    color: #ff9900;
}
</style>
