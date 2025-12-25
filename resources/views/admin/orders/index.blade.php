<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="bg-slate-900 p-2.5 rounded-2xl shadow-lg shadow-slate-200">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-black text-2xl text-slate-900 leading-tight tracking-tight">
                    Order <span class="text-blue-600">Logistics</span>
                </h2>
                <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">Incoming Transmission Monitor</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-slate-100 p-8">
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">
                                <th class="px-6 pb-2">Protocol ID</th>
                                <th class="px-6 pb-2">Client Node</th>
                                <th class="px-6 pb-2">Credits</th>
                                <th class="px-6 pb-2">Status</th>
                                <th class="px-6 pb-2 text-center">System Override</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="group hover:bg-slate-50 transition-all duration-300">
                                <td class="bg-white group-hover:bg-slate-50 px-6 py-5 rounded-l-2xl border-y border-l border-slate-50 group-hover:border-blue-100 transition-colors">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="font-mono text-xs font-black text-blue-600 bg-blue-50 px-3 py-1.5 rounded-lg border border-blue-100 hover:bg-blue-600 hover:text-white transition-all">
                                        #{{ $order->order_number }}
                                    </a>
                                </td>

                                <td class="bg-white group-hover:bg-slate-50 px-6 py-5 border-y border-slate-50 group-hover:border-blue-100 transition-colors text-sm font-bold text-slate-700">
                                    {{ $order->user->name }}
                                </td>

                                <td class="bg-white group-hover:bg-slate-50 px-6 py-5 border-y border-slate-50 group-hover:border-blue-100 transition-colors font-black text-slate-900">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>

                                <td class="bg-white group-hover:bg-slate-50 px-6 py-5 border-y border-slate-50 group-hover:border-blue-100 transition-colors">
                                    <span class="px-4 py-1.5 rounded-xl text-[9px] font-black uppercase tracking-widest border
                                        {{ $order->status == 'pending' ? 'bg-amber-50 text-amber-600 border-amber-100' : '' }}
                                        {{ $order->status == 'processing' ? 'bg-blue-50 text-blue-600 border-blue-100' : '' }}
                                        {{ $order->status == 'completed' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : '' }}
                                        {{ $order->status == 'cancelled' ? 'bg-red-50 text-red-600 border-red-100' : '' }}">
                                        ● {{ $order->status }}
                                    </span>
                                </td>

                                <td class="bg-white group-hover:bg-slate-50 px-6 py-5 rounded-r-2xl border-y border-r border-slate-50 group-hover:border-blue-100 transition-colors">
                                    <div class="flex items-center justify-center gap-3">
                                        <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="flex gap-2">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="text-[10px] font-black uppercase tracking-widest rounded-xl border-slate-200 bg-slate-50 py-1.5 pl-3 pr-8 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Process</option>
                                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Success</option>
                                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Aborted</option>
                                            </select>
                                            <button type="submit" class="bg-slate-900 text-white p-2 rounded-xl hover:bg-blue-600 transition-all shadow-md shadow-slate-200" title="Commit Changes">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </button>
                                        </form>

                                        <div class="w-[1px] h-6 bg-slate-100 mx-1"></div>

                                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Erase transaction data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-slate-300 hover:text-red-500 transition-colors p-2 rounded-xl hover:bg-red-50">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
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