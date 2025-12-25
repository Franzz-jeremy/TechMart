<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div class="flex items-center gap-4">
                <div class="bg-blue-600 p-2.5 rounded-2xl shadow-lg shadow-blue-200 text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-black text-2xl text-slate-900 leading-tight tracking-tight">
                        Product <span class="text-blue-600">Inventory</span>
                    </h2>
                    <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.1em]">Manajemen Unit & Kendali Logistik Hardware</p>
                </div>
            </div>
            
            <a href="{{ route('products.create') }}" class="group bg-slate-900 hover:bg-blue-600 text-white px-6 py-3 rounded-2xl flex items-center gap-3 transition-all duration-300 shadow-lg shadow-slate-200">
                <span class="text-[10px] font-black uppercase tracking-widest">Deploy New Product</span>
                <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-slate-100">
                <div class="p-8">
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-separate border-spacing-y-3">
                            <thead>
                                <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">
                                    <th class="px-6 pb-4">Unit Visual</th>
                                    <th class="px-6 pb-4">Specifications</th>
                                    <th class="px-6 pb-4">Category</th>
                                    <th class="px-6 pb-4 text-center">Stock Level</th>
                                    <th class="px-6 pb-4 text-right">Unit Price</th>
                                    <th class="px-6 pb-4 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="group hover:bg-slate-50 transition-all duration-300">
                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-4 rounded-l-2xl border-y border-l border-slate-50 group-hover:border-blue-100 transition-colors">
                                        <div class="w-16 h-16 rounded-xl overflow-hidden bg-slate-100 border border-slate-200">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="product" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </div>
                                    </td>

                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-4 border-y border-slate-50 group-hover:border-blue-100 transition-colors">
                                        <span class="font-black text-slate-900 tracking-tight block uppercase text-sm">{{ $product->name }}</span>
                                        <span class="text-[9px] text-slate-400 font-bold tracking-widest uppercase">ID: PROD-{{ $product->id }}</span>
                                    </td>

                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-4 border-y border-slate-50 group-hover:border-blue-100 transition-colors">
                                        <span class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-[10px] font-black uppercase tracking-widest">
                                            {{ $product->category->name }}
                                        </span>
                                    </td>

                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-4 border-y border-slate-50 group-hover:border-blue-100 text-center transition-colors">
                                        <div class="inline-flex flex-col items-center">
                                            <span class="text-sm font-black {{ $product->stock <= 5 ? 'text-red-500' : 'text-slate-900' }}">
                                                {{ $product->stock }} <span class="text-[10px] text-slate-400">PCS</span>
                                            </span>
                                            @if($product->stock <= 5)
                                                <span class="text-[8px] font-black text-red-400 uppercase tracking-tighter animate-pulse text-nowrap">Critical Stock</span>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-4 border-y border-slate-50 group-hover:border-blue-100 text-right transition-colors">
                                        <span class="font-black text-slate-900 tracking-tighter">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-4 rounded-r-2xl border-y border-r border-slate-50 group-hover:border-blue-100 text-center transition-colors">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('products.edit', $product->id) }}" class="p-2 hover:bg-amber-50 text-amber-500 rounded-lg transition-colors" title="Edit Unit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="p-2 hover:bg-red-50 text-red-500 rounded-lg transition-colors" onclick="return confirm('Hapus Unit dari sistem?')">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
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
    </div>
</x-app-layout>