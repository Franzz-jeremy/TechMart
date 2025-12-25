<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="font-black text-3xl text-slate-900 leading-tight tracking-tighter">
                    Tech<span class="text-blue-600">Center</span>
                </h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">System Online: {{ Auth::user()->name }}</p>
                </div>
            </div>
            
            <div class="flex items-center gap-4 bg-white px-5 py-3 rounded-2xl border border-slate-100 shadow-sm">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 p-2 rounded-xl shadow-lg shadow-blue-100">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-[0.2em] font-black text-blue-600 leading-none mb-1">Membership</p>
                    <p class="text-sm font-black text-slate-800 tracking-tight">Elite Member</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-slate-900 rounded-[3rem] p-8 md:p-14 mb-12 relative overflow-hidden shadow-2xl shadow-blue-900/20">
                <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-blue-600 rounded-full mix-blend-screen filter blur-[100px] opacity-20"></div>
                <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-72 h-72 bg-indigo-600 rounded-full mix-blend-screen filter blur-[80px] opacity-20"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
                    <div class="text-center md:text-left">
                        <div class="inline-flex items-center gap-2 bg-blue-500/10 border border-blue-500/20 px-4 py-2 rounded-full mb-6">
                            <span class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></span>
                            <span class="text-blue-400 text-[10px] font-black uppercase tracking-[0.2em]">New Arrival: Mechanical Series</span>
                        </div>
                        <h3 class="text-4xl md:text-6xl font-black text-white mb-6 leading-[1.1] tracking-tighter">
                            Upgrade Your <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-300">Digital Realm.</span>
                        </h3>
                        <p class="text-slate-400 text-lg mb-10 max-w-md leading-relaxed">
                            Dapatkan akses eksklusif ke koleksi aksesoris teknologi terbaru dengan diskon member hingga 20%.
                        </p>
                        
                        <a href="{{ route('user.menu') }}" class="inline-flex items-center gap-4 bg-blue-600 text-white px-10 py-5 rounded-2xl font-black hover:bg-white hover:text-slate-900 transition-all duration-300 shadow-xl shadow-blue-900/40 group">
                            Explore Catalog
                            <svg class="w-5 h-5 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                    
                    <div class="hidden lg:block relative">
                        <div class="relative z-20 bg-white/5 backdrop-blur-2xl p-10 rounded-[2.5rem] border border-white/10 shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                             <svg class="w-40 h-40 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="absolute inset-0 bg-blue-600/20 rounded-[2.5rem] blur-xl translate-x-4 translate-y-4"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="group bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:border-blue-200 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <h4 class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] mb-2">Total Order</h4>
                    <p class="text-4xl font-black text-slate-900 tracking-tighter">{{ Auth::user()->orders->count() }} <span class="text-sm text-slate-300 font-medium tracking-normal ml-1">Items</span></p>
                </div>

                <div class="group bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                    </div>
                    <h4 class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] mb-2">Shipping Base</h4>
                    <p class="text-lg font-bold text-slate-800 truncate" title="{{ Auth::user()->address }}">
                        {{ Auth::user()->address ?? 'Configure Address' }}
                    </p>
                </div>

                <div class="group bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:border-cyan-200 hover:shadow-xl hover:shadow-cyan-500/5 transition-all duration-300">
                    <div class="w-14 h-14 bg-cyan-50 text-cyan-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] mb-2">Tech Wallet</h4>
                    @php
                        $totalSpent = \App\Models\Order::where('user_id', Auth::id())->where('status', 'success')->sum('total_price');
                    @endphp
                    <p class="text-3xl font-black text-slate-900 tracking-tighter">
                        <span class="text-sm font-bold text-cyan-600 mr-1 italic">Rp</span>{{ number_format($totalSpent, 0, ',', '.') }}
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-8 md:p-10 border-b border-slate-50 flex items-center justify-between bg-white">
                    <div>
                        <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight">Activity Log</h3>
                        <p class="text-slate-400 text-xs font-medium">Monitoring data transaksi terakhir Anda</p>
                    </div>
                    <a href="#" class="bg-slate-50 hover:bg-slate-100 text-slate-600 px-5 py-2.5 rounded-xl text-xs font-black transition-colors">
                        View History
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="py-5 px-10 text-[10px] font-black uppercase text-slate-400 tracking-[0.1em]">Serial ID</th>
                                <th class="py-5 px-10 text-[10px] font-black uppercase text-slate-400 tracking-[0.1em]">Total Credits</th>
                                <th class="py-5 px-10 text-[10px] font-black uppercase text-slate-400 tracking-[0.1em]">Network Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse(Auth::user()->orders()->latest()->take(5)->get() as $order)
                            <tr class="group hover:bg-blue-50/30 transition-all">
                                <td class="py-6 px-10">
                                    <span class="font-mono text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-lg">#{{ $order->order_number }}</span>
                                </td>
                                <td class="py-6 px-10">
                                    <p class="font-black text-slate-900">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                </td>
                                <td class="py-6 px-10">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full {{ $order->status == 'success' ? 'bg-green-500' : 'bg-amber-500' }}"></span>
                                        <span class="text-[10px] font-black uppercase tracking-widest {{ $order->status == 'success' ? 'text-green-600' : 'text-amber-600' }}">
                                            {{ $order->status }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-slate-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                        <p class="text-slate-400 text-sm font-medium italic">No recent activity detected.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>