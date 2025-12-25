<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="bg-slate-900 p-2.5 rounded-2xl shadow-lg shadow-slate-200">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-black text-2xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Edit Kategori') }}
                </h2>
                <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">Update Classification Parameters</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-slate-100 p-10">
                
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-10">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-3 ml-1">
                            Nama Kategori
                        </label>
                        <div class="relative group">
                            <input type="text" name="name" value="{{ $category->name }}" 
                                   class="w-full bg-slate-50 border-slate-100 rounded-2xl py-4 px-6 text-slate-900 font-bold focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all duration-300 shadow-sm"
                                   placeholder="Contoh: Graphics Card">
                            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none opacity-20 group-focus-within:opacity-100 transition-opacity">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                        </div>
                        @error('name')
                            <p class="text-red-500 text-[10px] font-black uppercase tracking-widest mt-3 ml-2 flex items-center">
                                <span class="w-1 h-1 bg-red-500 rounded-full mr-2"></span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                        <a href="{{ route('categories.index') }}" 
                           class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-slate-600 transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Batal
                        </a>
                        
                        <button type="submit" 
                                class="bg-slate-900 hover:bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] px-8 py-4 rounded-2xl transition-all duration-300 shadow-xl shadow-slate-200 flex items-center group">
                            Update Kategori
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>

            </div>

            <div class="mt-8 text-center">
                <p class="text-slate-400 text-[9px] font-black uppercase tracking-[0.3em]">
                    System ID: <span class="text-slate-900">{{ $category->id }}</span> — TechMart Core
                </p>
            </div>
        </div>
    </div>
</x-app-layout>