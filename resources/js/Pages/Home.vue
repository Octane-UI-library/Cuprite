<template>
    <div class="min-h-screen bg-gradient-to-br from-red-50 to-rose-100 dark:from-[#0a0a0a] rounded-2xl dark:to-[#1a1a1a] transition-all duration-500">
        <!-- Hero Section -->
        <div class="py-24 md:py-32">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center space-y-8">
                    <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
                        Cuprite UI
                        <span class="block text-3xl md:text-4xl font-normal mt-4 text-gray-700 dark:text-gray-300">
                            Modern Components for Developers
                        </span>
                    </h1>

                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <Link
                            :href="route('components')"
                            class="px-8 py-4 shadow-xl bg-red-600 hover:bg-gray-100 dark:hover:bg-[#1f1f21] hover:text-rose-600 text-white font-semibold rounded-xl transition-all duration-300 ease-in-out hover:shadow-xl"
                        >
                            Get Started →
                        </Link>
                        <a
                            href="https://github.com/Octane-UI-library/Cuprite"
                            target="_blank"
                            class="px-8 py-4 border-2 shadow-xl border-red-200 dark:border-red-900/50 text-red-600 dark:text-red-400 font-semibold rounded-xl transition-all duration-300 hover:bg-rose-100 dark:hover:bg-red-900/20"
                        >
                            <i class="ri-github-fill mr-2"></i>
                            GitHub Stars
                            <span class="ml-2 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-300 px-3 py-1 rounded-full">
                                {{ stars }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Grid -->
        <div class="py-20 bg-white/50 dark:bg-[#161616]/50 backdrop-blur-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-3 gap-8">
                    <div
                        v-for="(feature, index) in features"
                        :key="index"
                        class="p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20 dark:border-[#ffffff10]"
                    >
                        <div class="w-14 h-14 bg-red-100/50 dark:bg-red-900/20 rounded-xl flex items-center justify-center mb-6">
                            <i :class="feature.iconClass" class="text-3xl text-red-600 dark:text-red-400"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 dark:text-white">{{ feature.title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ feature.description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Component Showcase -->
        <div class="py-20 bg-gradient-to-b from-white/50 to-transparent dark:from-[#161616]/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-bold text-center mb-16 dark:text-white">
                    <span class="bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
                        Featured Components
                    </span>
                </h2>

                <!-- Buttons Showcase -->
                <div class="mb-20">
                    <div class="space-y-8">
                        <div class="p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
                            <h3 class="text-2xl font-bold mb-8 dark:text-white">Interactive Buttons</h3>
                            <div class="flex flex-wrap gap-6">
                                <button class="px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-all duration-300 shadow hover:shadow-lg hover:-translate-y-1">
                                    Primary Action
                                </button>
                                <button class="px-6 py-3 border-2 border-red-200 dark:border-red-900/50 text-red-600 dark:text-red-400 rounded-xl hover:bg-red-50/50 dark:hover:bg-red-900/20 transition-all duration-300">
                                    Secondary
                                </button>
                                <button class="px-6 py-3 bg-gradient-to-r from-red-600 to-rose-500 text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-[1.02]">
                                    Gradient
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cards Showcase -->
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10] hover:shadow-2xl transition-all duration-300">
                        <div class="relative overflow-hidden rounded-xl mb-6">
                            <img
                                src="https://cdn.britannica.com/70/234870-050-D4D024BB/Orange-colored-cat-yawns-displaying-teeth.jpg"
                                alt="Component preview"
                                class="w-full h-64 object-cover transform hover:scale-105 transition-all duration-500"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 dark:text-white">Image Card</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Responsive cards with hover effects and gradient overlays
                        </p>
                        <div class="flex items-center text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-500 transition-colors">
                            <span class="mr-2">Explore Component</span>
                            <i class="ri-arrow-right-line"></i>
                        </div>
                    </div>

                    <!-- Больше компонентов -->
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    stars: Number,
})

const features = [
    {
        iconClass: 'ri-puzzle-line',
        title: "Modular Components",
        description: "Pre-built components with clean interfaces that work seamlessly together"
    },
    {
        iconClass: 'ri-code-s-slash-line',
        title: "Developer First",
        description: "TypeScript support and comprehensive documentation for smooth implementation"
    },
    {
        iconClass: 'ri-layout-masonry-line',
        title: "Responsive Design",
        description: "Mobile-first components that adapt perfectly to any screen size"
    }
]
</script>
