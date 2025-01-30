<template>
    <header class="sticky top-0 bg-white/80 dark:bg-[#161616]/80 backdrop-blur-lg border-b border-white/20 dark:border-[#ffffff10]">
        <Container>
            <div class="h-20 flex justify-between items-center">
                <!-- Logo Section -->
                <Link
                    href="/"
                    class="flex items-center space-x-3 group"
                >
                    <div class="p-2 bg-red-100/50 dark:bg-red-900/20 rounded-lg transition-all duration-300 group-hover:bg-red-200/50 dark:group-hover:bg-red-900/30">
                        <img
                            :src="image"
                            alt="Logo"
                            class="w-8 h-8 transition-transform duration-300 group-hover:scale-110"
                        />
                    </div>
                    <span class="text-2xl font-black bg-gradient-to-r from-red-600 to-orange-500 bg-clip-text text-transparent">
                        Cuprite
                    </span>
                </Link>

                <!-- Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <Link
                        href="/components"
                        class="px-4 py-2 text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 transition-all duration-300 font-semibold flex items-center gap-2"
                    >
                        <i class="ri-attachment-line text-lg"></i>
                        Components
                    </Link>

                    <Link
                        href="/templates"
                        class="px-4 py-2 text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 transition-all duration-300 font-semibold flex items-center gap-2"
                    >
                        <i class="ri-layout-line text-lg"></i>
                        Templates
                    </Link>

                    <div class="w-px h-6 bg-gray-200 dark:bg-gray-700 mx-4"></div>

                    <ThemeToggle class="text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400" />
                </div>

                <!-- Mobile Menu Button -->
                <button
                    @click="isOpen = !isOpen"
                    class="md:hidden p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800"
                >
                    <i class="ri-menu-line text-xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div
                v-show="isOpen"
                class="md:hidden py-4 space-y-4 border-t border-gray-100 dark:border-gray-800"
            >
                <Link
                    href="/components"
                    class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400"
                >
                    Components
                </Link>
                <Link
                    href="/templates"
                    class="block px-4 py-2 text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400"
                >
                    Templates
                </Link>
            </div>
        </Container>
    </header>
</template>

<script>
import { ref } from 'vue'
import Container from "./Container.vue";
import ThemeToggle from "./Layouts/ThemeToggle.vue";
import { Link } from '@inertiajs/vue3'

export default {
    name: "Header",
    components: { ThemeToggle, Container, Link },
    data() {
        return {
            image: new URL("@/images/logo.svg", import.meta.url).href,
            isOpen: false
        }
    },
    setup() {
        return {
            isOpen: ref(false)
        }
    }
};
</script>
