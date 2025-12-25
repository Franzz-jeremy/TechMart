<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="bg-slate-900 p-2.5 rounded-2xl shadow-lg shadow-slate-200">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-black text-2xl text-slate-900 leading-tight tracking-tight">
                    {{ __('Daftar Kategori') }}
                </h2>
                <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.2em]">Management Classification System</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-slate-100 p-8">

                {{-- Tombol tambah --}}
                <div class="mb-8 flex justify-between items-center">
                    <a href="{{ route('categories.create') }}"
                       class="inline-flex items-center bg-slate-900 hover:bg-blue-600 text-white text-[10px] font-black uppercase tracking-[0.2em] px-6 py-3.5 rounded-2xl transition-all shadow-xl shadow-slate-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Kategori
                    </a>
                    <div class="h-[1px] flex-1 bg-slate-100 ml-8 hidden md:block"></div>
                </div>

                {{-- Tabel --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">
                                <th class="px-8 pb-2">Nama Kategori</th>
                                <th class="px-8 pb-2">System Slug</th>
                                <th class="px-8 pb-2 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories as $category)
                                <tr class="group hover:bg-slate-50 transition-all duration-300">
                                    <td class="bg-white group-hover:bg-slate-50 px-8 py-6 rounded-l-2xl border-y border-l border-slate-50 group-hover:border-blue-100 transition-colors">
                                        <div class="flex items-center gap-3">
                                            <div class="w-2 h-2 rounded-full bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.5)]"></div>
                                            <span class="font-bold text-slate-800 tracking-tight">{{ $category->name }}</span>
                                        </div>
                                    </td>

                                    <td class="bg-white group-hover:bg-slate-50 px-8 py-6 border-y border-slate-50 group-hover:border-blue-100 transition-colors">
                                        <span class="font-mono text-xs text-slate-400 bg-slate-50 px-3 py-1 rounded-lg border border-slate-100">
                                            {{ $category->slug }}
                                        </span>
                                    </td>

                                    <td class="bg-white group-hover:bg-slate-50 px-8 py-6 rounded-r-2xl border-y border-r border-slate-50 group-hover:border-blue-100 transition-colors">
                                        <div class="flex justify-center items-center gap-4">
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                               class="text-[10px] font-black uppercase tracking-widest text-blue-600 hover:text-blue-700 bg-blue-50 hover:bg-blue-100 px-4 py-2 rounded-xl transition-all">
                                                Edit
                                            </a>

                                            <form action="{{ route('categories.destroy', $category->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Hapus kategori ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-[10px] font-black uppercase tracking-widest text-red-400 hover:text-red-600 transition-colors">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center">
                                            <p class="text-slate-400 font-bold italic text-sm">Data kategori belum tersedia</p>
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