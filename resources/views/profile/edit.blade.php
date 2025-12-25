<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="bg-blue-600 p-2.5 rounded-2xl shadow-lg shadow-blue-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-black text-2xl text-slate-900 leading-tight tracking-tight">
                    User <span class="text-blue-600">Settings</span>
                </h2>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.1em]">Konfigurasi identitas & keamanan akun</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="p-6 sm:p-10 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] relative overflow-hidden group hover:shadow-md transition-all duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-110"></div>
                
                <div class="relative z-10 max-w-xl">
                    <div class="mb-8">
                        <span class="text-[10px] font-black uppercase tracking-widest text-blue-600 bg-blue-50 px-3 py-1 rounded-lg">Identity Node</span>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] relative overflow-hidden group hover:shadow-md transition-all duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-110"></div>
                
                <div class="relative z-10 max-w-xl">
                    <div class="mb-8">
                        <span class="text-[10px] font-black uppercase tracking-widest text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg">Security Protocol</span>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white border border-red-50 shadow-sm rounded-[2.5rem] relative overflow-hidden group hover:shadow-xl hover:shadow-red-50 transition-all duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-red-50 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-110"></div>
                
                <div class="relative z-10 max-w-xl">
                    <div class="mb-8">
                        <span class="text-[10px] font-black uppercase tracking-widest text-red-600 bg-red-50 px-3 py-1 rounded-lg">Termination Zone</span>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>