<aside
    id="nav-menu-1"
    aria-label="Side navigation"
    class="fixed top-0 bottom-0 left-0 z-40 flex flex-col transition-transform -translate-x-full bg-white/80 dark:bg-[#151515]/90 border-r w-72 sm:translate-x-0 border-r-slate-200/50 dark:border-r-[#ffffff10] backdrop-blur-lg"
>
    <!-- Logo Section -->
    <a
        aria-label="Cuprite Admin Panel"
        class="flex items-center p-6 flex items-center space-x-3 group"
        href="/"
    >
        <div class="p-2 bg-red-100/50 dark:bg-red-900/20 rounded-lg transition-all duration-300 group-hover:bg-red-200/50 dark:group-hover:bg-red-900/30">
            <img
                src="{{ asset('favicon.ico') }}"
                alt="Logo"
                class="w-8 h-8 transition-transform duration-300 group-hover:scale-110"
            />
        </div>
        <span class="text-2xl font-black bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
            Cuprite
        </span>
    </a>

    <!-- Navigation -->
    <nav aria-label="side navigation" class="flex-1 overflow-auto divide-y divide-slate-100/50 dark:divide-[#ffffff10]">
        <div>
            <ul class="flex flex-col flex-1 gap-1 py-3">
                <li class="px-3">
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 p-3 transition-all duration-300 rounded-xl text-slate-700 dark:text-gray-300 hover:text-rose-600 dark:hover:text-red-400 hover:bg-rose-50/50 dark:hover:bg-red-900/20 focus:bg-rose-50/50 {{ request()->routeIs('admin.dashboard') ? 'bg-rose-100/50 dark:bg-red-900/20 text-rose-600 dark:text-red-400' : '' }}"
                    >
                        <div class="flex items-center self-center">
                            <i class="ri-home-4-line text-2xl"></i>
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm font-medium truncate">
                            Dashboard
                        </div>
                    </a>
                </li>

                <!-- Repeat similar structure for other menu items -->
                <li class="px-3">
                    <a
                        href="{{ route('admin.categories.index') }}"
                        class="flex items-center gap-3 p-3 transition-all duration-300 rounded-xl text-slate-700 dark:text-gray-300 hover:text-rose-600 dark:hover:text-red-400 hover:bg-rose-50/50 dark:hover:bg-red-900/20 focus:bg-rose-50/50 {{ request()->routeIs('admin.categories.index') ? 'bg-rose-100/50 dark:bg-red-900/20 text-rose-600 dark:text-red-400' : '' }}"
                    >
                        <div class="flex items-center self-center">
                            <i class="ri-file-copy-2-line text-2xl"></i>
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm font-medium truncate">
                            Categories
                        </div>
                    </a>
                </li>

                <!-- Components Menu Item -->
                <li class="px-3">
                    <a
                        href="{{ route('admin.components.index') }}"
                        class="flex items-center gap-3 p-3 transition-all duration-300 rounded-xl text-slate-700 dark:text-gray-300 hover:text-rose-600 dark:hover:text-red-400 hover:bg-rose-50/50 dark:hover:bg-red-900/20 focus:bg-rose-50/50 {{ request()->routeIs('admin.components.index') ? 'bg-rose-100/50 dark:bg-red-900/20 text-rose-600 dark:text-red-400' : '' }}"
                    >
                        <div class="flex items-center self-center">
                            <i class="ri-attachment-line text-2xl"></i>
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm font-medium truncate">
                            Components
                        </div>
                        <span class="px-2 py-1 text-xs bg-rose-100/50 dark:bg-red-900/30 text-rose-600 dark:text-red-300 rounded-full">
                            New
                        </span>
                    </a>
                </li>

                <!-- Icons Menu Item -->
                <li class="px-3">
                    <a
                        href="{{ route('admin.icons.index') }}"
                        class="flex items-center gap-3 p-3 transition-all duration-300 rounded-xl text-slate-700 dark:text-gray-300 hover:text-rose-600 dark:hover:text-red-400 hover:bg-rose-50/50 dark:hover:bg-red-900/20 focus:bg-rose-50/50 {{ request()->routeIs('admin.icons.index') ? 'bg-rose-100/50 dark:bg-red-900/20 text-rose-600 dark:text-red-400' : '' }}"
                    >
                        <div class="flex items-center self-center">
                            <i class="ri-remixicon-line text-2xl"></i>
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm font-medium truncate">
                            Icons
                        </div>
                    </a>
                </li>

                <!-- Examples Menu Item -->
                <li class="px-3">
                    <a
                        href="{{ route('admin.examples.index') }}"
                        class="flex items-center gap-3 p-3 transition-all duration-300 rounded-xl text-slate-700 dark:text-gray-300 hover:text-rose-600 dark:hover:text-red-400 hover:bg-rose-50/50 dark:hover:bg-red-900/20 focus:bg-rose-50/50 {{ request()->routeIs('admin.examples.index') ? 'bg-rose-100/50 dark:bg-red-900/20 text-rose-600 dark:text-red-400' : '' }}"
                    >
                        <div class="flex items-center self-center">
                            <i class="ri-layout-line text-2xl"></i>
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm font-medium truncate">
                            Examples
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Footer with Logout -->
    <footer class="p-3 border-t border-slate-200/50 dark:border-[#ffffff10]">
        <form method="post" action="{{ route('admin.logout') }}">
            @csrf
            <button
                type="submit"
                class="flex items-center gap-3 w-full p-3 transition-all duration-300 rounded-xl text-slate-900 dark:text-gray-300 hover:text-rose-600 dark:hover:text-red-400 hover:bg-rose-50/50 dark:hover:bg-red-900/20"
            >
                <div class="flex items-center self-center">
                    <i class="ri-logout-box-line text-xl"></i>
                </div>
                <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm font-medium truncate">
                    Logout
                </div>
            </button>
        </form>
    </footer>
</aside>
