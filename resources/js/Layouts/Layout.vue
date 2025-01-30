
<template>
    <div v-auto-animate class="overflow-y-hidden min-h-screen">
        <!-- Header -->
        <header class="fixed z-50 shadow-lg w-full  h-20">
            <Header />
        </header>

        <!-- Main Content -->
        <main class="h-auto pt-40 max-w-screen">
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

