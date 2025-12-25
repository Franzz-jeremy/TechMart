<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-black text-3xl text-slate-900 leading-tight tracking-tighter">
                    {{ __('Admin Control Panel') }}
                </h2>
                <p class="text-slate-500 text-sm font-medium">Sistem pemantauan metrik real-time TechMart.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                </span>
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">System Live</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Revenue</p>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tighter">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
                        <div class="mt-4 flex items-center text-emerald-600 gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            <span class="text-[10px] font-bold uppercase">Net Earnings</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Awaiting Process</p>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tighter">{{ $pendingOrders }} <span class="text-sm text-slate-400">Orders</span></h3>
                        <div class="mt-4 flex items-center text-amber-600 gap-1">
                            <svg class="w-4 h-4 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-[10px] font-bold uppercase tracking-tighter">Needs Attention</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Inventory</p>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tighter">{{ $totalProducts }} <span class="text-sm text-slate-400">SKU</span></h3>
                        <div class="mt-4 flex items-center text-blue-600 gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            <span class="text-[10px] font-bold uppercase tracking-tighter">Live Products</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden group">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-purple-50 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Client Base</p>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tighter">{{ $totalCustomers }} <span class="text-sm text-slate-400">Nodes</span></h3>
                        <div class="mt-4 flex items-center text-purple-600 gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span class="text-[10px] font-bold uppercase tracking-tighter">Verified Users</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-black text-slate-900 tracking-tighter italic">Latest Transactions</h3>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">Aktivitas 5 pesanan terakhir</p>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="bg-slate-50 text-slate-900 px-6 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all">
                        View Database
                    </a>
                </div>
                
                <div class="overflow-x-auto p-4">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">
                                <th class="px-6 pb-4">Order ID</th>
                                <th class="px-6 pb-4">Client</th>
                                <th class="px-6 pb-4">Deployment Status</th>
                                <th class="px-6 pb-4 text-right">Credit Amount</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($recentOrders as $order)
                            <tr class="group hover:bg-slate-50/50 transition-colors">
                                <td class="px-6 py-6">
                                    <span class="font-mono text-sm font-black text-blue-600 bg-blue-50 px-3 py-1.5 rounded-lg border border-blue-100">#{{ $order->order_number }}</span>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex flex-col">
                                        <span class="text-slate-900 font-bold text-sm">{{ $order->user->name }}</span>
                                        <span class="text-[10px] text-slate-400 font-medium">{{ $order->user->email }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <span class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest border
                                        {{ $order->status == 'pending' ? 'bg-amber-50 text-amber-600 border-amber-100' : 'bg-emerald-50 text-emerald-600 border-emerald-100' }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-6 text-right font-black text-slate-900 tracking-tighter">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>