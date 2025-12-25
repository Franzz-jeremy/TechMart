<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('products.index') }}" class="p-2 bg-white rounded-xl shadow-sm border border-slate-100 hover:bg-slate-50 transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h2 class="font-black text-2xl text-slate-900 leading-tight tracking-tight">
                    Update <span class="text-blue-600">Configuration</span>
                </h2>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.1em]">Modifikasi Parameter: {{ $product->name }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-slate-100">
                <div class="p-10">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                            <div class="lg:col-span-1 space-y-4">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Current Unit Visual</label>
                                <div class="relative group">
                                    <div class="aspect-square rounded-[2rem] overflow-hidden border-4 border-slate-50 shadow-inner bg-slate-100">
                                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        <div class="absolute inset-0 bg-blue-600/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                    <div class="absolute -bottom-2 -right-2 bg-white p-2 rounded-lg shadow-sm border border-slate-100 text-[8px] font-black text-blue-600 uppercase tracking-tighter">
                                        Active Asset
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <label for="image" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 italic">Replace Visual Source</label>
                                    <input type="file" name="image" id="image" class="text-[10px] text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition-all">
                                </div>
                            </div>

                            <div class="lg:col-span-2 space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label for="category_id" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Classification</label>
                                        <select name="category_id" id="category_id" class="w-full bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl transition-all font-bold text-slate-700">
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="name" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Designation</label>
                                        <input type="text" name="name" id="name" value="{{ $product->name }}" 
                                            class="w-full bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl transition-all font-bold text-slate-700">
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label for="description" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Data Specifications</label>
                                    <textarea name="description" id="description" rows="4" 
                                        class="w-full bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl transition-all font-medium text-slate-700">{{ $product->description }}</textarea>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label for="price" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Value (Credits)</label>
                                        <div class="relative">
                                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold text-sm">Rp</span>
                                            <input type="number" name="price" id="price" value="{{ $product->price }}" 
                                                class="w-full bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl transition-all font-black text-slate-700 pl-12">
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <label for="stock" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Availability</label>
                                        <input type="number" name="stock" id="stock" value="{{ $product->stock }}" 
                                            class="w-full bg-slate-50 border-slate-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl transition-all font-black text-slate-700">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-6 pt-10 border-t border-slate-50">
                            <a href="{{ route('products.index') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-slate-600 transition-colors">
                                Abort Changes
                            </a>
                            <button type="submit" class="bg-blue-600 text-white px-10 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] hover:bg-slate-900 shadow-xl shadow-blue-100 hover:shadow-slate-200 transition-all duration-300">
                                Commit Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>