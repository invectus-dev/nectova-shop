<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manager Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="h-full font-sans" x-data="dashboard()">
   
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out" 
         :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 px-4 ">
            <h1 class="text-xl font-bold text-black">ProductHub</h1>
        </div>
        
        <!-- Navigation -->
        <nav class="mt-8">
            <template x-for="item in menuItems" :key="item.name">
                <a href="#" 
                   @click="activeMenu = item.name"
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-colors duration-200"
                   :class="activeMenu === item.name ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : ''">
                    <span x-html="item.icon" class="w-5 h-5 mr-3"></span>
                    <span x-text="item.name"></span>
                </a>
            </template>
        </nav>
        
        <!-- User Profile -->
        <div class="absolute bottom-0 w-full p-4 border-t">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-medium">AM</span>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Admin Manager</p>
                    <p class="text-xs text-gray-500">admin@productub.com</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = !sidebarOpen" 
                                class="lg:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="ml-4 text-2xl font-semibold text-gray-900" x-text="activeMenu + ' Management'"></h2>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" placeholder="Cari produk..." 
                                   class="w-80 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM10.01 21H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v7"></path>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <template x-for="stat in stats" :key="stat.title">
                    <div class="bg-white p-6 rounded-xl shadow-sm border hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600" x-text="stat.title"></p>
                                <p class="text-3xl font-bold text-gray-900" x-text="stat.value"></p>
                                <p class="text-sm text-green-600 flex items-center mt-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    <span x-text="stat.change"></span>
                                </p>
                            </div>
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center"
                                 :class="stat.bgColor">
                                <span x-html="stat.icon" :class="stat.iconColor"></span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Content Area -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Products Table -->
                <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Produk Terbaru</h3>
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                <a href="{{ 'admin/create' }}">Tambah Produk</a>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <template x-for="product in products" :key="product.id">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3"></div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900" x-text="product.name"></div>
                                                    <div class="text-sm text-gray-500" x-text="'SKU: ' + product.sku"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="product.category"></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900" x-text="'Rp ' + product.price.toLocaleString('id-ID')"></td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                                                  :class="product.status === 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'"
                                                  x-text="product.status">
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Hapus</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Activity Feed -->
                <div class="bg-white rounded-xl shadow-sm border">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <template x-for="activity in activities" :key="activity.id">
                                <div class="flex items-start space-x-3">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center"
                                         :class="activity.type === 'create' ? 'bg-green-100' : activity.type === 'update' ? 'bg-blue-100' : 'bg-red-100'">
                                        <svg class="w-4 h-4" :class="activity.type === 'create' ? 'text-green-600' : activity.type === 'update' ? 'text-blue-600' : 'text-red-600'" 
                                             fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-900" x-text="activity.description"></p>
                                        <p class="text-xs text-gray-500" x-text="activity.time"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
    </div>

    <script>
        function dashboard() {
            return {
                sidebarOpen: false,
                activeMenu: 'Dashboard',
                menuItems: [
                    {
                        name: 'Dashboard',
                        icon: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path></svg>'
                    },
                    {
                        name: 'Produk',
                        icon: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V7l-7-5z" clip-rule="evenodd"></path></svg>'
                    },
                    {
                        name: 'Kategori',
                        icon: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>'
                    },
                    {
                        name: 'Pesanan',
                        icon: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>'
                    },
                    {
                        name: 'Laporan',
                        icon: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path></svg>'
                    },
                    {
                        name: 'Pengaturan',
                        icon: '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>'
                    }
                ],
                stats: [
                    {
                        title: 'Total Produk',
                        value: '2,847',
                        change: '+12%',
                        icon: '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path></svg>',
                        bgColor: 'bg-blue-100',
                        iconColor: 'text-blue-600'
                    },
                    {
                        title: 'Penjualan Hari Ini',
                        value: 'Rp 45.2M',
                        change: '+18%',
                        icon: '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path></svg>',
                        bgColor: 'bg-green-100',
                        iconColor: 'text-green-600'
                    },
                    {
                        title: 'Pesanan Baru',
                        value: '156',
                        change: '+23%',
                        icon: '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>',
                        bgColor: 'bg-yellow-100',
                        iconColor: 'text-yellow-600'
                    },
                    {
                        title: 'Customer Aktif',
                        value: '1,247',
                        change: '+8%',
                        icon: '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                        bgColor: 'bg-purple-100',
                        iconColor: 'text-purple-600'
                    }
                ],
                products: [
                    {
                        id: 1,
                        name: 'iPhone 15 Pro Max',
                        sku: 'IP15PM256',
                        category: 'Smartphone',
                        price: 20500000,
                        status: 'Aktif'
                    },
                    {
                        id: 2,
                        name: 'Samsung Galaxy S24 Ultra',
                        sku: 'SGS24U512',
                        category: 'Smartphone',
                        price: 18900000,
                        status: 'Aktif'
                    },
                    {
                        id: 3,
                        name: 'MacBook Pro M3',
                        sku: 'MBP14M3',
                        category: 'Laptop',
                        price: 35000000,
                        status: 'Tidak Aktif'
                    },
                    {
                        id: 4,
                        name: 'AirPods Pro 2',
                        sku: 'APP2GEN',
                        category: 'Audio',
                        price: 3500000,
                        status: 'Aktif'
                    },
                    {
                        id: 5,
                        name: 'iPad Air M2',
                        sku: 'IPADAIRM2',
                        category: 'Tablet',
                        price: 9500000,
                        status: 'Aktif'
                    }
                ],
                activities: [
                    {
                        id: 1,
                        type: 'create',
                        description: 'Produk baru "iPhone 15 Pro Max" ditambahkan',
                        time: '2 menit yang lalu'
                    },
                    {
                        id: 2,
                        type: 'update',
                        description: 'Harga "Samsung Galaxy S24" diperbarui',
                        time: '15 menit yang lalu'
                    },
                    {
                        id: 3,
                        type: 'delete',
                        description: 'Pesanan #12345 dibatalkan',
                        time: '1 jam yang lalu'
                    },
                    {
                        id: 4,
                        type: 'create',
                        description: '5 pesanan baru diterima',
                        time: '2 jam yang lalu'
                    },
                    {
                        id: 5,
                        type: 'update',
                        description: 'Stok "MacBook Pro M3" diperbarui',
                        time: '3 jam yang lalu'
                    }
                ]
            }
        }
    </script>

    
</body>
</html>