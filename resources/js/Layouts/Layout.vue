<template>
    <div v-auto-animate class="min-h-screen">
        <!-- Header -->
        <header class="fixed z-50 shadow-lg w-full h-20">
            <Header />
        </header>

        <!-- Main Content с анимацией -->
        <transition
            mode="out-in"
            enter-active-class="transition-all duration-500 ease-out"
            enter-from-class="opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100"
            leave-active-class="transition-all duration-500 ease-in"
            leave-from-class="opacity-100 scale-100"
            :key="usePage()"
        >
            <main class="h-auto pt-40 max-w-screen">
                <Container>
                    <slot />
                </Container>
            </main>
        </transition>

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
import {usePage} from "@inertiajs/vue3";

export default {
    name: 'Layout',
    methods: {
        usePage,
    },
    components: {
        Header,
        Footer,
        Container
    },
}
</script>
