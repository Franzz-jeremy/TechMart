<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <h2 class="font-bold text-2xl text-gray-900 leading-tight tracking-tight">
                Tech<span class="text-indigo-600">Mart</span> 
                <span class="text-gray-400 font-light mx-2">|</span> 
                <span class="text-sm font-medium text-gray-500 uppercase tracking-widest">Katalog Produk</span>
            </h2>
            
            <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0 w-full md:w-auto">
                <a href="{{ route('user.menu') }}" 
                   class="text-xs font-semibold px-5 py-2.5 rounded-full transition-all {{ !request('category') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'bg-white border border-gray-200 text-gray-500 hover:bg-gray-50' }}">
                    Semua
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('user.menu', ['category' => $category->slug]) }}" 
                       class="text-xs font-semibold px-5 py-2.5 rounded-full transition-all {{ request('category') == $category->slug ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'bg-white border border-gray-200 text-gray-500 hover:bg-gray-50' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div class="group bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                        
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-100 flex-shrink-0">
                            <img src="{{ asset('storage/'.$product->image) }}" 
                                 class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" 
                                 alt="{{ $product->name }}">
                            
                            @if($product->category)
                                <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-md text-[10px] font-bold uppercase tracking-wider text-indigo-700 px-3 py-1.5 rounded-lg shadow-sm">
                                    {{ $product->category->name }}
                                </span>
                            @endif
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <div class="mb-4 flex-grow">
                                <h3 class="font-bold text-gray-900 text-lg leading-snug group-hover:text-indigo-600 transition-colors line-clamp-2">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-gray-400 text-[11px] mt-2 line-clamp-3 leading-relaxed">
                                    {{ $product->description }}
                                </p>
                            </div>

                            <div class="mt-auto">
                                <div class="flex items-end justify-between mb-4">
                                    <div>
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter text-indigo-500">Harga Terbaik</p>
                                        <p class="text-indigo-600 font-black text-xl leading-none">
                                            <span class="text-xs uppercase mr-0.5 font-bold italic">Rp</span>{{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter italic">Stok: {{ $product->stock }}</p>
                                    </div>
                                </div>

                                @if($product->stock > 0)
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <div class="flex items-center gap-2">
                                            <div class="flex items-center bg-gray-100 rounded-xl border border-transparent focus-within:border-indigo-200 transition-all w-20 flex-shrink-0">
                                                <input 
                                                    type="number" 
                                                    name="quantity" 
                                                    value="1" 
                                                    min="1" 
                                                    max="{{ $product->stock }}" 
                                                    class="w-full bg-transparent border-none text-center text-sm font-bold text-gray-800 focus:ring-0 py-2.5"
                                                    required
                                                >
                                            </div>

                                            <button type="submit" class="flex-1 bg-gray-900 text-white py-3 rounded-xl text-[11px] font-bold hover:bg-indigo-600 shadow-md transition-all active:scale-95 flex items-center justify-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                                Tambah
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <button disabled class="w-full bg-gray-50 text-gray-400 py-3 rounded-xl text-xs font-bold cursor-not-allowed border border-gray-100 italic">
                                        Out of Stock
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>