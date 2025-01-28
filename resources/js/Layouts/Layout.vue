
<template>
    <div class="absolute left-[30%] -top-48  w-[600px] h-[300px] bg-red-600/50 blur-[2000px] -z-10"></div>
    <div class="absolute left-[20%] -top-60  w-[500px] h-[400px] bg-purple-600/50 blur-[2000px] -z-10"></div>
    <div class="absolute left-[90%] -top-60  w-[500px] h-[400px] bg-blue-600/50 blur-[1000px] -z-10"></div>
    <div v-auto-animate class="overflow-y-hidden min-h-screen">
        <!-- Header -->
        <header class="h-20">
            <Header />
        </header>

        <!-- Main Content -->
        <main class="h-auto max-w-screen">
            <Container>
                <slot />
            </Container>
        </main>

        <!-- Footer -->
        <footer class="h-auto">
            <Footer />
        </footer>
    </div>
</template>

<script>
import Header from '../Components/Header.vue'
import Footer from '../Components/Footer.vue'
import Container from "../Components/Container.vue";
export default {
    name: 'Layout',
    components: {
        Header,
        Footer,
        Container
    },
}
</script>
