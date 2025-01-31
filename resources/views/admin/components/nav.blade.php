<!-- Side Navigation -->
<aside
    id="nav-menu-1"
    aria-label="Side navigation"
    class="fixed top-0 bottom-0 left-0 z-40 flex flex-col transition-transform -translate-x-full bg-white border-r w-72 sm:translate-x-0 border-r-slate-200"
>
    <a aria-label="Cuprite Admin Panel" class="flex items-center gap-2 p-6 text-xl font-medium whitespace-nowrap focus:outline-none" href="javascript:void(0)">
        <img src="{{ asset('favicon.ico') }}" alt="logo" class="w-10 h-10">
        Cuprite Admin Panel
    </a>
    <nav aria-label="side navigation" class="flex-1 overflow-auto divide-y divide-slate-100">
        <div>
            <ul class="flex flex-col flex-1 gap-1 py-3">
                <li class="px-3">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-rose-500 hover:bg-rose-50 focus:bg-rose-50 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <div class="flex items-center self-center">
                            <i class="ri-home-4-line text-2xl"></i>
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate">
                            Dashboard
                        </div>
                    </a>
                </li>
                <li class="px-3">
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-rose-500 hover:bg-rose-50 focus:bg-rose-50 {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                        <div class="flex items-center self-center">
                            <i class="ri-file-copy-2-line text-2xl"></i>
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate">
                            Categories
                        </div>
                    </a>
                </li>
                <li class="px-3">
                    <a href="{{ route('admin.components.index') }}" class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-rose-500 hover:bg-rose-50 focus:bg-rose-50 {{ request()->routeIs('admin.components.index') ? 'active' : '' }}">
                        <div class="flex items-center self-center">
                            <i class="ri-attachment-line text-2xl"></i>
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate">
                            Components
                        </div>
                    </a>
                </li>
                <li class="px-3">
                    <a href="{{ route('admin.examples.index') }}" class="flex items-center gap-3 p-3 transition-colors rounded text-slate-700 hover:text-rose-500 hover:bg-rose-50 focus:bg-rose-50 {{ request()->routeIs('admin.examples.index') ? 'active' : '' }}">
                        <div class="flex items-center self-center">
                            <i class="ri-layout-line text-2xl"></i>
                        </div>
                        <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm truncate">
                            Examples
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <footer class="p-3 border-t border-slate-200">
        <form method="post" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-3 p-3 transition-colors rounded text-slate-900 hover:text-rose-500">
                <div class="flex items-center self-center">
                    <i class="ri-logout-box-line"></i>
                </div>
                <div class="flex flex-col items-start justify-center flex-1 w-full gap-0 overflow-hidden text-sm font-medium truncate">
                    Logout
                </div>
            </button>
        </form>
    </footer>
</aside>
