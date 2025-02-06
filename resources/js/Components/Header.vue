<template>
    <header class="sticky top-0 bg-white/80 dark:bg-[#161616]/80 backdrop-blur-lg border-b border-white/20 dark:border-[#ffffff10] !z-10">
        <Container>
            <div class="h-20 p-6 md:p-0 flex justify-between items-center">
                <!-- Logo Section -->
                <Link
                    :href="route('home')"
                    class="flex items-center space-x-3 group"
                >
                    <div class="p-2 bg-red-100/50 dark:bg-red-900/20 rounded-lg transition-all duration-300 group-hover:bg-red-200/50 dark:group-hover:bg-red-900/30">
                        <img
                            :src="image"
                            alt="Logo"
                            class="w-8 h-8 transition-transform duration-300 group-hover:scale-110"
                        />
                    </div>
                    <span class="text-2xl font-black bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
                        Cuprite
                    </span>
                </Link>

                <!-- Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <Link
                        :href="route('components')"
                        class="px-4 py-2 text-gray-600 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 transition-all duration-300 font-semibold flex items-center gap-2"
                    >
                        <i class="ri-attachment-line text-lg"></i>
                        Components
                    </Link>

                    <Link
                        :href="route('about')"
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
                    @click="toggleMenu"

                    class="md:hidden py-2 px-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1f1f22] transition-colors"
                >
                    <i  class=" text-xl transition-transform" :class="isOpen ? 'ri-close-line' : 'ri-menu-line'"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <transition
                enter-active-class="transition-all duration-300 ease-out"
                leave-active-class="transition-all duration-200 ease-in"
                enter-from-class="opacity-0 -translate-y-4"
                enter-to-class="opacity-100 translate-y-0"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 -translate-y-4"
            >
                <div
                    v-show="isOpen"
                    class="md:hidden absolute inset-x-0 mt-2 bg-white/90 dark:bg-[#161616]/95 backdrop-blur-xl rounded-2xl mx-4 shadow-xl dark:shadow-black/40 border border-white/20 dark:border-[#ffffff10]"
                    v-click-outside="closeMenu"
                >
                    <div class="p-4 space-y-2">
                        <div class="flex justify-between items-center px-2  pt-4 pb-6 border-b border-gray-100 dark:border-gray-800">
                            <span class="text-sm font-semibold text-gray-500 dark:text-gray-400">Navigation</span>
                        </div>

                        <Link
                            :href="route('components')"
                            class="flex items-center p-3 space-x-3 rounded-xl group hover:bg-gray-100/50 dark:hover:bg-[#1f1f22] transition-all duration-300"
                        >
                            <div class="p-2 bg-red-100/50 dark:bg-red-900/20 rounded-lg">
                                <i class="ri-attachment-line text-lg text-red-600 dark:text-red-400"></i>
                            </div>
                            <span class="font-semibold text-gray-700 dark:text-gray-200">Components</span>
                            <i class="ri-arrow-right-s-line ml-auto text-xl text-gray-400 group-hover:text-red-500 transition-colors"></i>
                        </Link>

                        <Link
                            :href="route('about')"
                            class="flex items-center p-3 space-x-3 rounded-xl group hover:bg-gray-100/50 dark:hover:bg-[#1f1f22] transition-all duration-300"
                        >
                            <div class="p-2 bg-blue-100/50 dark:bg-blue-900/20 rounded-lg">
                                <i class="ri-layout-line text-lg text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <span class="font-semibold text-gray-700 dark:text-gray-200">Templates</span>
                            <i class="ri-arrow-right-s-line ml-auto text-xl text-gray-400 group-hover:text-blue-500 transition-colors"></i>
                        </Link>

                        <div class="pt-4 mt-4 border-t border-gray-100 dark:border-gray-800">
                            <ThemeToggle class="w-full justify-center px-4 py-3 hover:bg-gray-100/50 dark:hover:bg-[#1f1f22] rounded-xl" />
                        </div>
                    </div>
                </div>
            </transition>
        </Container>
    </header>
</template>

<script>
import { ref } from 'vue'
import { directive as clickOutside } from 'v-click-outside'
import Container from "./Container.vue";
import ThemeToggle from "./Layouts/ThemeToggle.vue";
import { Link } from '@inertiajs/vue3'

export default {
    methods: {

    },
    directives: {
        clickOutside
    },
    components: { ThemeToggle, Container, Link },
    setup() {
        const isOpen = ref(false)

        const toggleMenu = () => {
            isOpen.value = !isOpen.value
        }

        const closeMenu = () => {
            isOpen.value = false
        }

        return {
            image: new URL("@/images/logo.svg", import.meta.url).href,
            isOpen,
            toggleMenu,
            closeMenu
        }
    }
};
</script>
