<template>
    <div class="min-h-screen bg-gradient-to-br from-red-50 to-rose-100 dark:from-[#0a0a0a] dark:to-[#1a1a1a] transition-all rounded-2xl duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <!-- Заголовок -->
            <div class="text-center mb-16">
                <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
                    Components Library
                    <span class="block text-3xl md:text-4xl font-normal mt-4 text-gray-700 dark:text-gray-300">
                        Browse & Integrate with Ease
                    </span>
                </h1>

                <!-- Поисковая строка -->
                <div class="mt-12 max-w-2xl mx-auto relative">
                    <input
                        type="text"
                        placeholder="Search components..."
                        v-model="searchQuery"
                        class="w-full px-6 py-4 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10] placeholder-gray-400 dark:placeholder-gray-600 outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                    />
                    <i class="ri-search-line absolute right-6 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-600"></i>
                </div>
            </div>

            <!-- Сетка компонентов -->
            <div v-if="filteredCategories.length" v-auto-animate="{ duration: 300 }" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    v-for="category in filteredCategories"
                    :key="category.id"
                    class="group p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20 dark:border-[#ffffff10] hover:border-red-100/50 dark:hover:border-red-900/30"
                >
                    <!-- Заголовок карточки -->
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 bg-red-100/50 dark:bg-red-900/20 rounded-xl flex items-center justify-center">
                            <i :class="category.icon" class="text-3xl text-red-600 dark:text-red-400"></i>
                        </div>
                        <span class="px-3 py-1 bg-red-100/50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-full text-sm">
                    {{ category.name }}
                </span>
                    </div>

                    <!-- Описание категории -->
                    <h3 class="text-2xl font-bold mb-4 dark:text-white">{{ category.name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 md:truncate">{{ category.description }}</p>

                    <!-- Превью компонентов -->
                    <div class="mb-6 p-4 bg-gray-50/50 dark:bg-[#19191a] rounded-xl space-y-4">
                        <div
                            v-for="component in category.components"
                            :key="component.id"
                        >
                            <div v-if="component.dynamicComponent" v-html="component.dynamicComponent"></div>
                            <p v-else class="text-gray-500 dark:text-gray-400">Loading...</p>
                        </div>
                    </div>

                    <!-- Ссылка на категорию -->
                    <div class="flex items-center justify-between">
                        <Link
                            :href="`/components/${category.slug}`"
                            class="text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-500 transition-colors flex items-center"
                        >
                            View All Components ({{ category.components.length }})
                            <i class="ri-arrow-right-line ml-2"></i>
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Если ничего не найдено -->
            <div v-else class="text-center py-16 text-gray-500 dark:text-gray-400">
                No components found for "{{ searchQuery }}"
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref, computed} from 'vue';
import {Link} from '@inertiajs/vue3';

const props = defineProps({
    categories: Array,
});

const searchQuery = ref('');

// Обрабатываем категории и их компоненты
const allCategories = computed(() => {
    return props.categories.map(category => ({
        ...category,
        icon: category.icon || "ri-file-code-line",
        components: (category.components || []).map(component => ({
            ...component,
            dynamicComponent: component.code
        }))
    }));
});

// Фильтрация категорий
const filteredCategories = computed(() => {
    if (!searchQuery.value) return allCategories.value;

    const query = searchQuery.value.toLowerCase().trim();
    return allCategories.value.filter(category => {
        const matchesCategory = category.name.toLowerCase().includes(query) ||
            category.description.toLowerCase().includes(query);

        const matchesComponent = category.components.some(component =>
            component.name.toLowerCase().includes(query) ||
            component.description.toLowerCase().includes(query)
        );

        return matchesCategory || matchesComponent;
    });
});
</script>
