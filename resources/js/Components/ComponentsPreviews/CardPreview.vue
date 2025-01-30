<template>
    <div class="max-w-xs mx-auto">
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
                    <a href="#" class="py-2 px-3 hover:bg-red-100/50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                        <i class="ri-github-fill text-xl text-red-600 dark:text-red-400"></i>
                    </a>
                    <a href="#" class="py-2 px-3 hover:bg-red-100/50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                        <i class="ri-linkedin-fill text-xl text-red-600 dark:text-red-400"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
