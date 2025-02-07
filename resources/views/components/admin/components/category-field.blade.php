<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="category_id">
        Category
        <span class="text-red-500">*</span>
    </label>
    <div class="relative">
        <select name="category_id" id="category_id" required class="w-full pl-3 pr-10 py-3 bg-white/50 outline-none dark:bg-[#2d2d30]/50 rounded-lg border border-gray-300/50 dark:border-[#ffffff15] focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none transition-all">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400">
            <i class="ri-arrow-down-s-line"></i>
        </div>
    </div>
</div>
