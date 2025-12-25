<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="bg-blue-600 p-2.5 rounded-2xl shadow-lg shadow-blue-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-black text-2xl text-slate-900 leading-tight tracking-tight">
                    Shopping <span class="text-blue-600">Cart</span>
                </h2>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.1em]">Siap untuk mengamankan perangkat impian Anda?</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <div class="lg:col-span-2 space-y-4">
                    @if($cartItems->isEmpty())
                        <div class="bg-white p-12 rounded-[2.5rem] border border-slate-100 shadow-sm text-center">
                            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900">Keranjang Anda Kosong</h3>
                            <p class="text-slate-500 mb-8 text-sm">Unit teknologi pilihan Anda belum ditambahkan ke terminal.</p>
                            <a href="{{ route('user.menu') }}" class="inline-flex items-center gap-2 text-blue-600 font-black text-xs uppercase tracking-widest hover:text-slate-900 transition-colors">
                                Jelajahi Katalog Produk
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    @else
                        @php $total = 0 @endphp
                        @foreach($cartItems as $item)
                            @php 
                                $subtotal = $item->product->price * $item->quantity; 
                                $total += $subtotal; 
                            @endphp
                            <div class="bg-white p-5 rounded-[2rem] border border-slate-100 shadow-sm flex items-center gap-6 group hover:shadow-md transition-all">
                                <div class="w-24 h-24 rounded-2xl overflow-hidden bg-slate-100 border border-slate-50 flex-shrink-0">
                                    <img src="{{ asset('storage/'.$item->product->image) }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($item->product->name) }}&color=7F9CF5&background=EBF4FF'">
                                </div>

                                <div class="flex-grow">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-blue-600 mb-1 block">{{ $item->product->category->name ?? 'Gear' }}</span>
                                    <h3 class="font-bold text-slate-900 text-lg leading-tight mb-1">{{ $item->product->name }}</h3>
                                    <p class="text-slate-500 text-sm font-medium">Rp {{ number_format($item->product->price, 0, ',', '.') }} x {{ $item->quantity }}</p>
                                </div>

                                <div class="text-right pr-4">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Subtotal</p>
                                    <p class="text-lg font-black text-slate-900 tracking-tighter">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                @if(!$cartItems->isEmpty())
                <div class="lg:col-span-1">
                    <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm sticky top-24">
                        <h3 class="text-sm font-black uppercase tracking-[0.2em] text-slate-900 mb-6">Order Summary</h3>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between text-slate-500 text-sm font-medium">
                                <span>Total Item</span>
                                <span class="text-slate-900 font-bold">{{ $cartItems->sum('quantity') }} Unit</span>
                            </div>
                            <div class="flex justify-between text-slate-500 text-sm font-medium">
                                <span>Estimasi Pajak</span>
                                <span class="text-slate-900 font-bold italic">Included</span>
                            </div>
                            <div class="h-px bg-slate-100 my-4"></div>
                            <div class="flex justify-between items-end">
                                <div>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-blue-600">Total Pembayaran</p>
                                    <p class="text-2xl font-black text-slate-900 tracking-tighter">Rp {{ number_format($total, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-slate-900 text-white py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:bg-blue-600 hover:shadow-lg hover:shadow-blue-200 transition-all flex items-center justify-center gap-3 group">
                                Process to Checkout
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </button>
                        </form>
                        
                        <p class="mt-6 text-[10px] text-center text-slate-400 font-medium">
                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Secure encrypted transaction
                        </p>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>