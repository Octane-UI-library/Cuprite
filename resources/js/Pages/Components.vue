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
            <div v-if="filteredComponents.length" v-auto-animate="{ duration: 300 }" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    v-for="component in filteredComponents"
                    :key="component.id"
                    class="group p-8 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/20 dark:border-[#ffffff10] hover:border-red-100/50 dark:hover:border-red-900/30"
                >
                    <!-- Заголовок карточки -->
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 bg-red-100/50 dark:bg-red-900/20 rounded-xl flex items-center justify-center">
                            <i :class="component.category_icon" class="text-3xl text-red-600 dark:text-red-400"></i>
                        </div>
                        <span class="px-3 py-1 bg-red-100/50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-full text-sm">
                            {{ component.category_name }}
                        </span>
                    </div>

                    <!-- Описание -->
                    <h3 class="text-2xl font-bold mb-4 dark:text-white">{{ component.category_name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 md:truncate">{{ component.category_description }}</p>

                    <!-- Превью -->
                    <div class="mb-6 p-4 bg-gray-50/50 dark:bg-[#19191a] rounded-xl">
                        <div v-if="component.dynamicComponent" v-html="component.dynamicComponent" class="space-y-4"></div>
                        <p v-else class="text-gray-500 dark:text-gray-400">Loading...</p>
                    </div>

                    <!-- Действия -->
                    <div class="flex items-center justify-between">
                        <Link
                            :href="`/components/${component.category_slug}`"
                            class="text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-500 transition-colors flex items-center"
                        >
                            View Components
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
import {ref, computed, defineAsyncComponent} from 'vue';
import {Link} from '@inertiajs/vue3';

const props = defineProps({
    categories: Object, // Laravel передает коллекции в виде объектов
});

const searchQuery = ref('');

// Преобразование categories в массив компонентов
const allComponents = computed(() => {
    if (!props.categories || typeof props.categories !== 'object') return [];

    return Object.values(props.categories).flatMap(category =>
        (category.components || []).slice(0, 3).map(component => ({
            ...component,
            category_name: category.name,
            category_icon: category.icon || "ri-file-code-line",
            category_slug: category.slug,
            category_description: category.description,
            dynamicComponent: loadComponent(component.code),
        }))
    );
});

// Фильтрация компонентов по поисковому запросу
const filteredComponents = computed(() => {
    if (!searchQuery.value) return allComponents.value;

    const query = searchQuery.value.toLowerCase().trim();
    return allComponents.value.filter(component =>
        component.name.toLowerCase().includes(query) ||
        component.category_name.toLowerCase().includes(query) ||
        component.description.toLowerCase().includes(query)
    );
});
function loadComponent(code) {
    return code;
}


</script>
