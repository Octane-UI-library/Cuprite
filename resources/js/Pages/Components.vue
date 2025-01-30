<template>
    <div class="min-h-screen bg-gradient-to-br from-red-50 to-rose-100 dark:from-[#0a0a0a] dark:to-[#1a1a1a] transition-all duration-500">
        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <!-- Page Header -->
            <div class="text-center mb-16">
                <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
                    Components Library
                    <span class="block text-3xl md:text-4xl font-normal mt-4 text-gray-700 dark:text-gray-300">
                        Browse & Integrate with Ease
                    </span>
                </h1>

                <!-- Search Bar -->
                <div class="mt-12 max-w-2xl mx-auto">
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Search components..."
                            class="w-full px-6 py-4 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10] placeholder-gray-400 dark:placeholder-gray-600 outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                        >
                        <i class="ri-search-line absolute right-6 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-600"></i>
                    </div>
                </div>
            </div>

            <!-- Components Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Component Card -->
                <div
                    v-for="(component, index) in components"
                    :key="index"
                    class="group p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20 dark:border-[#ffffff10] hover:border-red-100/50 dark:hover:border-red-900/30"
                >
                    <!-- Card Header -->
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 bg-red-100/50 dark:bg-red-900/20 rounded-xl flex items-center justify-center">
                            <i :class="component.icon" class="text-3xl text-red-600 dark:text-red-400"></i>
                        </div>
                        <span class="px-3 py-1 bg-red-100/50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-full text-sm">
                            {{ component.category }}
                        </span>
                    </div>

                    <!-- Card Content -->
                    <h3 class="text-2xl font-bold mb-4 dark:text-white">{{ component.name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">{{ component.description }}</p>

                    <!-- Component Preview -->
                    <div class="mb-6 p-4 bg-gray-50/50 dark:bg-[#19191a] rounded-xl">
                        <component :is="component.preview" class="space-y-4" />
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between">
                        <Link
                            :href="`/docs/components/${component.slug}`"
                            class="text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-500 transition-colors flex items-center"
                        >
                            View Docs
                            <i class="ri-arrow-right-line ml-2"></i>
                        </Link>
                        <button
                            class="py-2 px-3 hover:bg-red-100/50 dark:hover:bg-red-900/20 rounded-lg transition-colors"
                            @click="toggleCode(component.slug)"
                        >
                            <i class="ri-code-s-slash-line text-red-600 dark:text-red-400"></i>
                        </button>
                    </div>

                    <!-- Code Snippet -->
                    <div
                        v-if="shownCode === component.slug"
                        class="mt-6 p-4 bg-gray-800 rounded-lg overflow-x-auto"
                    >
                        <pre class="text-sm font-mono text-gray-100">{{ component.code }}</pre>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center gap-2">
                <button
                    v-for="page in 3"
                    :key="page"
                    class="w-10 h-10 flex items-center justify-center bg-white/80 dark:bg-[#212124]/80 rounded-lg shadow hover:shadow-lg transition-all"
                    :class="{ 'bg-red-600 text-white': page === 1 }"
                >
                    {{ page }}
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Импорт превью компонентов
import ButtonPreview from '@/js/Components/ComponentsPreviews/ButtonPreview.vue';
import CardPreview from '@/js/Components/ComponentsPreviews/CardPreview.vue';
import InputPreview from '@/js/Components/ComponentsPreviews/InputPreview.vue';

const shownCode = ref(null);

const components = [
    {
        name: 'Animated Button',
        category: 'Buttons',
        icon: 'ri-cursor-fill',
        description: 'Interactive buttons with hover animations',
        preview: ButtonPreview,
        slug: 'animated-button',
        code: `<button class="px-6 py-3 rounded-xl font-semibold transition-all duration-300 ease-out bg-red-600 text-white shadow-lg hover:shadow-xl hover:-translate-y-0.5">
            Primary Button
        </button>

        <button class="px-6 py-3 rounded-xl font-semibold transition-all duration-300 ease-out bg-gradient-to-r from-red-500 to-rose-500 text-white shadow-lg hover:shadow-xl hover:scale-[1.02]">
            Gradient Magic
        </button>

        <button class="px-6 py-3 rounded-xl font-semibold transition-all duration-300 ease-out border-2 border-red-200 dark:border-red-900/50 text-red-600 dark:text-red-400 hover:bg-red-50/50 dark:hover:bg-red-900/20">
            <i class="ri-heart-line mr-2"></i>
            With Icon
        </button>`
    },
    {
        name: 'Profile Card',
        category: 'Cards',
        icon: 'ri-profile-line',
        description: 'Modern user profile cards with social links',
        preview: CardPreview,
        slug: 'profile-card',
        code: `<div class="max-w-xs mx-auto">
        <div class="relative group">
            <!-- Avatar -->
            <div class="relative rounded-xl overflow-hidden mb-4">
                <img
                    src="https://randomuser.me/api/portraits/men/1.jpg"
                    alt="User avatar"
                    class="w-full h-48 object-cover transform group-hover:scale-105 transition-all duration-500"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
            </div>

            <!-- Content -->
            <div class="text-center">
                <h3 class="text-xl font-bold mb-1 dark:text-white">John Anderson</h3>
                <p class="text-red-600 dark:text-red-400 mb-4">Senior Designer</p>

                <!-- Socials -->
                <div class="flex justify-center space-x-3">
                    <a href="#" class="p-2 hover:bg-red-100/50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                        <i class="ri-github-fill text-xl text-red-600 dark:text-red-400"></i>
                    </a>
                    <a href="#" class="p-2 hover:bg-red-100/50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                        <i class="ri-linkedin-fill text-xl text-red-600 dark:text-red-400"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>`
    },
    {
        name: 'Floating Input',
        category: 'Forms',
        icon: 'ri-input-method-line',
        description: 'Input fields with floating labels',
        preview: InputPreview,
        slug: 'floating-input',
        code: `<div class="space-y-6 max-w-xs mx-auto">
        <!-- Floating Input -->
        <div class="relative">
            <input
                type="email"
                placeholder=" "
                class="w-full px-4 py-3 bg-transparent border-2 border-red-200 dark:border-red-900/50 rounded-xl outline-none focus:border-red-500 transition-colors peer"
            />
            <label class="absolute left-4 top-1/2 -translate-y-1/2 p-1 rounded-md bg-gray-50 dark:bg-[#19191a] text-gray-500 dark:text-gray-400 transition-all duration-300 pointer-events-none peer-focus:top-0 peer-focus:text-sm peer-focus:text-red-600 dark:peer-focus:text-red-400 peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base">
                Email Address
            </label>
        </div>

        <!-- Password Input -->
        <div class="relative">
            <input
                type="password"
                placeholder=" "
                class="w-full px-4 py-3 bg-transparent border-2 border-red-200 dark:border-red-900/50 rounded-xl outline-none focus:border-red-500 transition-colors peer"
            />
            <label class="absolute left-4 top-1/2 -translate-y-1/2 p-1 rounded-md bg-gray-50 dark:bg-[#19191a] text-gray-500 dark:text-gray-400 transition-all duration-300 pointer-events-none peer-focus:top-0 peer-focus:text-sm peer-focus:text-red-600 dark:peer-focus:text-red-400 peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base">
                Password
            </label>
        </div>
    </div>`
    },
    // Добавьте больше компонентов
];

const toggleCode = (slug) => {
    shownCode.value = shownCode.value === slug ? null : slug;
};
</script>
