<template>
    <footer class="bg-white/50 dark:bg-[#161616]/50 backdrop-blur-lg border-t border-white/20 dark:border-[#ffffff10] mt-24">
        <Container>
            <div class="py-16">
                <div class="p-6 md:p-0 grid grid-cols-1 md:grid-cols-4 gap-12">
                    <!-- Brand Column -->
                    <div class="space-y-6">
                        <Link href="/" class="flex items-center gap-3 group">
                            <div class="p-2 bg-red-100/50 dark:bg-red-900/20 rounded-lg transition-all group-hover:bg-red-200/50 dark:group-hover:bg-red-900/30">
                                <img
                                    :src="logo"
                                    alt="Cuprite Logo"
                                    class="w-8 h-8 transition-transform group-hover:scale-110"
                                />
                            </div>
                            <span class="text-2xl font-black bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
                                Cuprite
                            </span>
                        </Link>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                            Modern UI components library for next-generation web experiences.
                        </p>
                        <div class="flex items-center gap-4">
                            <a
                                v-for="(social, index) in socials"
                                :key="index"
                                :href="social.link"
                                target="_blank"
                                class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors"
                            >
                                <i :class="social.icon" class="text-xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Docs Column -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Documentation</h4>
                        <nav class="space-y-2">
                            <Link
                                href="/getting-started"
                                class="flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors text-sm"
                            >
                                <i class="ri-rocket-line"></i>
                                Getting Started
                            </Link>
                            <Link
                                href="/components"
                                class="flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors text-sm"
                            >
                                <i class="ri-boxing-line"></i>
                                Components
                            </Link>
                            <Link
                                href="/templates"
                                class="flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors text-sm"
                            >
                                <i class="ri-layout-masonry-line"></i>
                                Templates
                            </Link>
                        </nav>
                    </div>

                    <!-- Resources Column -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Resources</h4>
                        <nav class="space-y-2">
                            <a
                                href="https://github.com/Octane-UI-library/Cuprite"
                                target="_blank"
                                class="flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors text-sm"
                            >
                                <i class="ri-github-line"></i>
                                GitHub Repository
                            </a>
                            <Link
                                href="/changelog"
                                class="flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors text-sm"
                            >
                                <i class="ri-history-line"></i>
                                Changelog
                            </Link>
                            <Link
                                href="/license"
                                class="flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors text-sm"
                            >
                                <i class="ri-scales-line"></i>
                                License
                            </Link>
                        </nav>
                    </div>

                    <!-- Newsletter Column -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Stay Updated</h4>
                        <form class="space-y-3">
                            <input
                                type="email"
                                placeholder="Enter your email"
                                class="w-full px-4 py-3 bg-white/80 dark:bg-[#212124]/80 border border-gray-200 dark:border-[#ffffff10] rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-sm outline-none"
                            >
                            <button
                                type="submit"
                                class="w-full px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-all duration-300 text-sm font-semibold"
                            >
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-100 dark:border-gray-800 mt-12 pt-8 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        © 2025 Cuprite UI. All rights reserved.
                        <a
                            href="/privacy"
                            class="hover:text-red-600 dark:hover:text-red-400 transition-colors"
                        >
                            Privacy Policy
                        </a>
                    </p>
                </div>
            </div>
        </Container>
    </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import Container from './Container.vue'

const logo = new URL('@/images/logo.svg', import.meta.url).href

const socials = [
    { icon: 'ri-github-line', link: 'https://github.com/Octane-UI-library/Cuprite' },
    { icon: 'ri-twitter-x-line', link: 'https://twitter.com' },
    { icon: 'ri-discord-line', link: 'https://discord.gg' },
    { icon: 'ri-youtube-line', link: 'https://youtube.com' }
]
</script>
