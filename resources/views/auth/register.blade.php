<x-guest-layout>
    <div class="mb-10 text-center relative">
        <div class="inline-block bg-blue-500/10 text-blue-600 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-[0.3em] mb-4 border border-blue-100">
            Protocol: New Connection
        </div>
        <h2 class="text-3xl font-black text-slate-900 tracking-tighter uppercase">
            Create <span class="text-blue-600">Account</span>
        </h2>
        <div class="flex justify-center items-center gap-2 mt-2">
            <span class="w-2 h-[2px] bg-slate-200"></span>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Registering new identity to terminal</p>
            <span class="w-2 h-[2px] bg-slate-200"></span>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}" class="relative">
        @csrf

        <div class="group relative">
            <label for="name" class="flex justify-between items-center mb-2 px-1">
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-focus-within:text-blue-600 transition-colors">Personnel Name</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus
                    class="block w-full bg-slate-50 border-slate-100 text-slate-900 font-bold text-sm py-4 pl-12 pr-4 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all duration-300 placeholder:text-slate-300 placeholder:font-medium"
                    placeholder="Full identity name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-[10px] font-bold uppercase tracking-tight text-red-500" />
        </div>

        <div class="mt-5 group relative">
            <label for="address" class="flex justify-between items-center mb-2 px-1">
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-focus-within:text-blue-600 transition-colors">Deployment Location</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <input id="address" type="text" name="address" :value="old('address')" required
                    class="block w-full bg-slate-50 border-slate-100 text-slate-900 font-bold text-sm py-4 pl-12 pr-4 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all duration-300 placeholder:text-slate-300 placeholder:font-medium"
                    placeholder="Full shipping address..." />
            </div>
            <x-input-error :messages="$errors->get('address')" class="mt-2 text-[10px] font-bold uppercase tracking-tight text-red-500" />
        </div>

        <div class="mt-5 group relative">
            <label for="email" class="flex justify-between items-center mb-2 px-1">
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-focus-within:text-blue-600 transition-colors">Digital Connection</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <input id="email" type="email" name="email" :value="old('email')" required
                    class="block w-full bg-slate-50 border-slate-100 text-slate-900 font-bold text-sm py-4 pl-12 pr-4 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all duration-300 placeholder:text-slate-300"
                    placeholder="name@company.system" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] font-bold uppercase tracking-tight text-red-500" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
            <div class="group relative">
                <label for="password" class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block px-1 group-focus-within:text-blue-600 transition-colors">Access Key</label>
                <input id="password" type="password" name="password" required
                    class="block w-full bg-slate-50 border-slate-100 text-slate-900 font-bold text-sm py-4 px-6 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all duration-300 placeholder:text-slate-300"
                    placeholder="••••••••" />
            </div>
            <div class="group relative">
                <label for="password_confirmation" class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2 block px-1 group-focus-within:text-blue-600 transition-colors">Confirm Key</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="block w-full bg-slate-50 border-slate-100 text-slate-900 font-bold text-sm py-4 px-6 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all duration-300 placeholder:text-slate-300"
                    placeholder="••••••••" />
            </div>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] font-bold uppercase tracking-tight text-red-500 px-1" />

        <div class="mt-10 space-y-4">
            <button type="submit" class="group relative w-full flex items-center justify-center py-4 bg-blue-600 text-white rounded-2xl overflow-hidden transition-all duration-500 hover:bg-slate-900 hover:shadow-[0_0_20px_rgba(37,99,235,0.2)]">
                <div class="absolute inset-0 w-1/4 h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -skew-x-12 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
                <span class="relative text-[10px] font-black uppercase tracking-[0.3em] flex items-center">
                    Sync & Register
                    <svg class="w-4 h-4 ml-2 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </span>
            </button>

            <div class="text-center pt-2">
                <a class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-blue-600 transition-all duration-300 flex items-center justify-center gap-2 group" href="{{ route('login') }}">
                    <span class="w-4 h-[1px] bg-slate-200 group-hover:w-8 group-hover:bg-blue-600 transition-all"></span>
                    Already have an account? Sign In
                    <span class="w-4 h-[1px] bg-slate-200 group-hover:w-8 group-hover:bg-blue-600 transition-all"></span>
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>

<style>
    @keyframes shimmer {
        100% { transform: translateX(400%); }
    }
</style>