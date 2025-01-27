
<template>
    <div>
        <h1>Home</h1>
        <p>Welcome, {{ user.name }}</p>
    </div>
</template>

<script>
export default {
    name: 'Home',

    props: {
        user: Array
    },

    mounted() {
        console.log('Component mounted.')
    }
}
</script>
