@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-50 to-rose-100 dark:from-[#0a0a0a] dark:to-[#1a1a1a] p-8">
    <div class="max-w-7xl mx-auto space-y-8">
        <!-- Заголовок -->
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">
                Project Dashboard
                <span class="block text-xl font-normal mt-2 text-gray-700 dark:text-gray-300">
                    Welcome back, {{ $user->name }}
                </span>
            </h1>
            <div class="text-gray-500 dark:text-gray-400">
                Last update: {{ now()->format('M d, Y H:i') }}
            </div>
        </div>

        <!-- Карточки статистики -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 mb-2">
                            Total Components
                        </p>
                        <p class="text-3xl font-bold dark:text-white">
                            {{ $activeComponents }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-red-100/50 dark:bg-red-900/20 rounded-xl flex items-center justify-center">
                        <i class="ri-puzzle-2-line text-2xl text-red-600 dark:text-red-400"></i>
                    </div>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-200/30 dark:border-[#ffffff10]">
                    <span class="text-green-500 text-sm">
                        <i class="ri-arrow-up-line"></i>
                        12% from last month
                    </span>
                </div>
            </div>

            <div class="p-6 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 mb-2">
                            Active Categories
                        </p>
                        <p class="text-3xl font-bold dark:text-white">
                            {{ $activeCategories }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-red-100/50 dark:bg-red-900/20 rounded-xl flex items-center justify-center">
                        <i class="ri-folders-line text-2xl text-red-600 dark:text-red-400"></i>
                    </div>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-200/30 dark:border-[#ffffff10]">
                    <span class="text-red-500 text-sm">
                        <i class="ri-arrow-down-line"></i>
                        3% from last month
                    </span>
                </div>
            </div>

            <div class="p-6 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 mb-2">
                            Total Users
                        </p>
                        <p class="text-3xl font-bold dark:text-white">
                            {{ $allUsage }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-red-100/50 dark:bg-red-900/20 rounded-xl flex items-center justify-center">
                        <i class="ri-user-3-line text-2xl text-red-600 dark:text-red-400"></i>
                    </div>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-200/30 dark:border-[#ffffff10]">
                    <span class="text-green-500 text-sm">
                        <i class="ri-arrow-up-line"></i>
                        24% from last month
                    </span>
                </div>
            </div>

            <div class="p-6 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 mb-2">
                            Avg. Up page time
                        </p>
                        <p class="text-3xl font-bold dark:text-white">
                            {{ substr($avrUpTime, 0 , 6) }} s.
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-red-100/50 dark:bg-red-900/20 rounded-xl flex items-center justify-center">
                        <i class="ri-star-smile-line text-2xl text-red-600 dark:text-red-400"></i>
                    </div>
                </div>
                <div class="mt-4 pt-2 border-t border-gray-200/30 dark:border-[#ffffff10]">
                    @if($avrUpTime > 2)
                        <span class="text-red-500">Needs improvement</span>
                    @else
                        <span class="text-green-500">All good</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Графики -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- График активности -->
            <div class="p-6 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
                <h3 class="text-xl font-semibold mb-4 dark:text-white flex items-center">
                    <i class="ri-line-chart-line mr-2 text-red-500"></i>
                    User Activity
                </h3>
                <div class="h-64">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>

            <!-- Распределение по категориям -->
            <div class="p-6 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
                <h3 class="text-xl font-semibold mb-4 dark:text-white flex items-center">
                    <i class="ri-pie-chart-2-line mr-2 text-red-500"></i>
                    Category Distribution
                </h3>
                <div class="h-64">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Последние компоненты -->
        <div class="p-6 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
            <h3 class="text-xl font-semibold mb-4 dark:text-white flex items-center">
                <i class="ri-history-line mr-2 text-red-500"></i>
                Recently Added Components
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="text-left border-b border-gray-200/30 dark:border-[#ffffff10]">
                        <tr>
                            <th class="pb-3 text-gray-500 dark:text-gray-400">Component</th>
                            <th class="pb-3 text-gray-500 dark:text-gray-400">Category</th>
                            <th class="pb-3 text-gray-500 dark:text-gray-400">Added</th>
                            <th class="pb-3 text-gray-500 dark:text-gray-400">Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < 5; $i++)
                        <tr class="border-b border-gray-200/30 dark:border-[#ffffff10] hover:bg-gray-50/30 dark:hover:bg-[#19191a]">
                            <td class="py-3 dark:text-white">Component {{ $i+1 }}</td>
                            <td class="py-3">
                                <span class="px-2 py-1 bg-red-100/50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-full text-sm">
                                    Category {{ $i+1 }}
                                </span>
                            </td>
                            <td class="py-3 text-gray-500 dark:text-gray-400">2 hours ago</td>
                            <td class="py-3">
                                <div class="flex items-center space-x-1 text-yellow-400">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Популярные категории -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="p-6 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
                <h3 class="text-xl font-semibold mb-4 dark:text-white flex items-center">
                    <i class="ri-fire-line mr-2 text-red-500"></i>
                    Trending Categories
                </h3>
                <div class="space-y-4">
                    @foreach([1,2,3,4,5] as $item)
                    <div class="flex items-center justify-between p-3 bg-gray-50/30 dark:bg-[#19191a] rounded-lg">
                        <div class="flex items-center space-x-3">
                            <i class="ri-folder-2-line text-red-500"></i>
                            <span class="dark:text-white">Category {{ $item }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-24 h-2 bg-gray-200/50 dark:bg-[#2d2d30] rounded-full">
                                <div class="h-full bg-red-500 rounded-full" style="width: {{ 70 - $item*10 }}%"></div>
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ 70 - $item*10 }}%</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Системная статистика -->
            <div class="p-6 bg-white/80 dark:bg-[#212124]/80 rounded-2xl shadow-xl border border-white/20 dark:border-[#ffffff10]">
                <h3 class="text-xl font-semibold mb-4 dark:text-white flex items-center">
                    <i class="ri-server-line mr-2 text-red-500"></i>
                    System Health
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="dark:text-white">Storage Usage</span>
                        <span class="text-red-500">65%</span>
                    </div>
                    <div class="w-full bg-gray-200/50 dark:bg-[#2d2d30] rounded-full h-2">
                        <div class="bg-red-500 h-2 rounded-full" style="width: 65%"></div>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <span class="dark:text-white">Memory Usage</span>
                        <span class="text-red-500">42%</span>
                    </div>
                    <div class="w-full bg-gray-200/50 dark:bg-[#2d2d30] rounded-full h-2">
                        <div class="bg-red-500 h-2 rounded-full" style="width: 42%"></div>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <span class="dark:text-white">Uptime</span>
                        <span class="text-green-500">99.98%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="module">

        console.log(@json($activityData));
        console.log(@json($categoryData));
        console.log(document.getElementById('activityChart'));
        console.log(document.getElementById('categoryChart'));

        document.addEventListener('DOMContentLoaded', function () {
            let activityData = @json($activityData);
            let categoryData = @json($categoryData);

            new Chart(document.getElementById('activityChart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Component Activity',
                        data: activityData,
                        borderColor: '#ef4444',
                        tension: 0.3,
                        fill: true,
                        backgroundColor: 'rgba(239, 68, 68, 0.1)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    }
                }
            });

            new Chart(document.getElementById('categoryChart'), {
                type: 'doughnut',
                data: {
                    labels: ['UI', 'Forms', 'Navigation', 'Data', 'Other'],
                    datasets: [{
                        data: categoryData,
                        backgroundColor: [
                            '#ef4444',
                            '#f87171',
                            '#fca5a5',
                            '#fecaca',
                            '#fee2e2'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'right' }
                    }
                }
            });
        });
    </script>
@endpush

@endsection
