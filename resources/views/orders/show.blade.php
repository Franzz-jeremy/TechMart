<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-600 bg-blue-50 px-2 py-0.5 rounded">Transaction Record</span>
                </div>
                <h2 class="font-black text-3xl text-slate-900 leading-tight tracking-tighter">
                    Detail Pesanan <span class="text-blue-600 font-mono">#{{ $order->order_number }}</span>
                </h2>
            </div>
            
            <div class="flex items-center">
                <span class="px-6 py-2.5 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] shadow-sm border
                    {{ $order->status == 'pending' ? 'bg-amber-50 text-amber-600 border-amber-100 animate-pulse' : '' }}
                    {{ $order->status == 'processing' ? 'bg-blue-50 text-blue-600 border-blue-100' : '' }}
                    {{ $order->status == 'completed' ? 'bg-green-50 text-green-600 border-green-100' : '' }}
                    {{ $order->status == 'cancelled' ? 'bg-red-50 text-red-600 border-red-100' : '' }}">
                    Status: {{ $order->status }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl shadow-slate-200/50 border border-slate-100 rounded-[3rem] p-8 md:p-14 overflow-hidden relative">
                
                <div class="absolute top-0 right-0 p-12 opacity-[0.03] pointer-events-none">
                    <svg class="w-48 h-48 text-slate-900" fill="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12 pb-10 border-b border-dashed border-slate-200 relative z-10">
                    <div>
                        <h4 class="text-[10px] uppercase text-slate-400 font-black tracking-[0.2em] mb-3">Client Information</h4>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-slate-900 rounded-full flex items-center justify-center text-white font-black text-xs">
                                {{ substr($order->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-slate-900 font-black text-lg leading-none">{{ $order->user->name }}</p>
                                <p class="text-slate-500 text-sm mt-1">{{ $order->user->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="md:text-right flex flex-col md:items-end">
                        <h4 class="text-[10px] uppercase text-slate-400 font-black tracking-[0.2em] mb-3">Timestamp</h4>
                        <p class="text-slate-900 font-black text-lg leading-none">{{ $order->created_at->format('d F, Y') }}</p>
                        <p class="text-blue-600 font-mono text-xs mt-1">{{ $order->created_at->format('H:i:s') }} (GMT+7)</p>
                    </div>
                </div>

                <div class="overflow-x-auto mb-12">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-slate-400 text-[10px] font-black uppercase tracking-widest border-b border-slate-100">
                                <th class="pb-6">Hardware Setup / Item</th>
                                <th class="pb-6 text-center">Qty</th>
                                <th class="pb-6 text-right">Unit Price</th>
                                <th class="pb-6 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($order->items as $item)
                            <tr class="group">
                                <td class="py-8 flex items-center gap-5">
                                    <div class="w-16 h-16 rounded-2xl overflow-hidden bg-slate-50 border border-slate-100 shadow-sm flex-shrink-0">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                             onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($item->product->name) }}&color=7F9CF5&background=EBF4FF'">
                                    </div>
                                    <div>
                                        <p class="font-black text-slate-800 text-base leading-tight">{{ $item->product->name }}</p>
                                        <p class="text-[10px] text-slate-400 font-bold uppercase mt-1">ID: PRD-{{ $item->product_id }}</p>
                                    </div>
                                </td>
                                <td class="py-8 text-center">
                                    <span class="bg-slate-50 text-slate-700 px-3 py-1 rounded-lg font-mono font-bold">{{ $item->quantity }}</span>
                                </td>
                                <td class="py-8 text-right text-slate-600 font-bold font-mono text-sm">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="py-8 text-right font-black text-slate-900 font-mono">
                                    Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="bg-slate-50 rounded-[2rem] p-8 flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="text-center md:text-left">
                        <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Payment Method</p>
                        <p class="text-slate-900 font-bold flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            Tech Wallet / Digital Transfer
                        </p>
                    </div>
                    <div class="w-full md:w-auto min-w-[200px] space-y-3">
                        <div class="flex justify-between items-center text-slate-500 font-bold text-xs uppercase tracking-tighter">
                            <span>Sum of Items</span>
                            <span class="text-slate-900">{{ $order->items->sum('quantity') }}</span>
                        </div>
                        <div class="h-px bg-slate-200"></div>
                        <div class="flex justify-between items-center">
                            <span class="text-[10px] font-black uppercase tracking-widest text-blue-600">Total Credits</span>
                            <span class="text-2xl font-black text-slate-900 tracking-tighter">Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-14 flex flex-col sm:flex-row items-center justify-between gap-6">
                    @if(Auth::user()->role == 'admin') 
    <a href="{{ route('admin.orders.index') }}" class="group flex items-center gap-3 text-sm font-black text-slate-400 hover:text-blue-600 transition-all">
        <div class="w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center group-hover:border-blue-200 group-hover:bg-blue-50">
            <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </div>
        Return to Control Panel
    </a>
@else
    <a href="{{ route('orders.index') }}" class="group flex items-center gap-3 text-sm font-black text-slate-400 hover:text-blue-600 transition-all">
        <div class="w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center group-hover:border-blue-200 group-hover:bg-blue-50">
            <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
        </div>
        Back to My Orders
    </a>
@endif

                    <button onclick="window.print()" class="bg-slate-900 text-white px-8 py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 transition-all shadow-xl shadow-slate-200 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Print Statement
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>