<template>
    <div class="space-y-6 max-w-xs mx-auto">
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
    </div>
</template>

