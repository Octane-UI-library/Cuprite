<nav class="h-7 bg-gray-950">
    <div class="h-full max-w-screen-xl mx-auto flex justify-between items-center text-white">
        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>
        <a href="{{ route('admin.components.create') }}">
            Create Component
        </a>
        <a href="{{ route('admin.categories.create') }}">
            Create Category
        </a>
        <a href="{{ route('admin.icons.create') }}">
            Create Icon
        </a>
        <a href="{{ route('admin.logout') }}">
            Logout
        </a>
    </div>
</nav>
