<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="bg-indigo-600 p-2.5 rounded-2xl shadow-lg shadow-indigo-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-black text-2xl text-slate-900 leading-tight tracking-tight">
                    Order <span class="text-indigo-600">Archive</span>
                </h2>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.1em]">Database riwayat transaksi perangkat Anda</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                
                @if($orders->isEmpty())
                    <div class="text-center py-20">
                        <div class="bg-slate-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Belum Ada Riwayat</h3>
                        <p class="text-slate-500 mb-8 max-w-xs mx-auto text-sm">Sistem tidak mendeteksi adanya transaksi keluar dalam basis data Anda.</p>
                        <a href="{{ route('user.menu') }}" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-slate-900 transition-all shadow-lg shadow-indigo-100">
                            Mulai Belanja
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                @else
                    <div class="p-8 md:p-10 border-b border-slate-50 bg-white">
                        <h3 class="text-sm font-black text-slate-900 uppercase tracking-[0.2em]">Transaction Logs</h3>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/50">
                                    <th class="py-5 px-8 text-[10px] font-black uppercase text-slate-400 tracking-widest">Serial Number</th>
                                    <th class="py-5 px-8 text-[10px] font-black uppercase text-slate-400 tracking-widest">Timestamp</th>
                                    <th class="py-5 px-8 text-[10px] font-black uppercase text-slate-400 tracking-widest">Total Credits</th>
                                    <th class="py-5 px-8 text-[10px] font-black uppercase text-slate-400 tracking-widest">Status</th>
                                    <th class="py-5 px-8 text-right"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach($orders as $order)
                                <tr class="group hover:bg-indigo-50/30 transition-all">
                                    <td class="py-6 px-8 whitespace-nowrap">
                                        <span class="font-mono text-xs font-bold text-indigo-600 bg-indigo-50 px-3 py-1.5 rounded-lg border border-indigo-100">
                                            #{{ $order->order_number }}
                                        </span>
                                    </td>
                                    <td class="py-6 px-8 whitespace-nowrap">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-slate-700">{{ $order->created_at->format('d M Y') }}</span>
                                            <span class="text-[10px] text-slate-400 font-medium">{{ $order->created_at->format('H:i') }} WIB</span>
                                        </div>
                                    </td>
                                    <td class="py-6 px-8 whitespace-nowrap">
                                        <p class="font-black text-slate-900 text-sm">
                                            <span class="text-[10px] text-indigo-400 mr-0.5 italic">Rp</span>{{ number_format($order->total_price, 0, ',', '.') }}
                                        </p>
                                    </td>
                                    <td class="py-6 px-8 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full {{ $order->status == 'pending' ? 'bg-amber-400 animate-pulse' : 'bg-green-500' }}"></span>
                                            <span class="text-[10px] font-black uppercase tracking-widest {{ $order->status == 'pending' ? 'text-amber-600' : 'text-green-600' }}">
                                                {{ $order->status }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-6 px-8 text-right whitespace-nowrap">
                                        <a href="{{ route('orders.show', $order->id) }}" class="inline-flex items-center gap-2 bg-slate-900 text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-tighter hover:bg-indigo-600 transition-all group-hover:shadow-lg group-hover:shadow-indigo-200">
                                            Details
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>