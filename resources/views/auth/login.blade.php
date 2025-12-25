<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-10 text-center relative">
        <div class="inline-block bg-blue-500/10 text-blue-600 px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-[0.3em] mb-4 border border-blue-100">
            System Authentication
        </div>
        <h2 class="text-3xl font-black text-slate-900 tracking-tighter uppercase">
            Access <span class="text-blue-600">Terminal</span>
        </h2>
        <div class="flex justify-center items-center gap-2 mt-2">
            <span class="w-2 h-[2px] bg-slate-200"></span>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Verify identity to initialize session</p>
            <span class="w-2 h-[2px] bg-slate-200"></span>
        </div>
    </div>

    <form method="POST" action="{{ route('login') }}" class="relative">
        @csrf

        <div class="group relative">
            <label for="email" class="flex justify-between items-center mb-2 px-1">
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-focus-within:text-blue-600 transition-colors">Identification ID</span>
                <span class="text-[9px] font-bold text-slate-300 tracking-widest uppercase">Required</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                    class="block w-full bg-slate-50 border-slate-100 text-slate-900 font-bold text-sm py-4 pl-12 pr-4 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all duration-300 placeholder:text-slate-300 placeholder:font-medium"
                    placeholder="node@techmart.system" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] font-bold uppercase tracking-tight" />
        </div>

        <div class="mt-6 group relative">
            <label for="password" class="flex justify-between items-center mb-2 px-1">
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-400 group-focus-within:text-blue-600 transition-colors">Security Token</span>
                <span class="text-[9px] font-bold text-slate-300 tracking-widest uppercase italic font-mono">Encrypted</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="password" type="password" name="password" required
                    class="block w-full bg-slate-50 border-slate-100 text-slate-900 font-bold text-sm py-4 pl-12 pr-4 rounded-2xl focus:bg-white focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all duration-300 placeholder:text-slate-300"
                    placeholder="••••••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] font-bold uppercase tracking-tight" />
        </div>

        <div class="flex items-center justify-between mt-6 px-1">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <div class="relative flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" 
                        class="w-4 h-4 rounded border-slate-200 text-blue-600 focus:ring-blue-500/20 transition-all">
                </div>
                <span class="ms-2 text-[10px] font-black uppercase tracking-widest text-slate-400 group-hover:text-slate-600 transition-colors">{{ __('Keep Session Active') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-[10px] font-black uppercase tracking-widest text-blue-600 hover:text-slate-900 transition-all" href="{{ route('password.request') }}">
                    {{ __('Lost Token?') }}
                </a>
            @endif
        </div>

        <div class="mt-10 space-y-4">
            <button type="submit" class="group relative w-full flex items-center justify-center py-4 bg-slate-900 text-white rounded-2xl overflow-hidden transition-all duration-500 hover:bg-blue-600 hover:shadow-[0_0_20px_rgba(37,99,235,0.4)]">
                <div class="absolute inset-0 w-1/4 h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -skew-x-12 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
                <span class="relative text-[10px] font-black uppercase tracking-[0.3em] flex items-center">
                    Initialize Login
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>
            </button>

            <div class="relative flex py-4 items-center">
                <div class="flex-grow border-t border-slate-100"></div>
                <span class="flex-shrink mx-4 text-[9px] font-black text-slate-300 uppercase tracking-[0.4em]">New Connection</span>
                <div class="flex-grow border-t border-slate-100"></div>
            </div>

            <a href="{{ route('register') }}" class="w-full inline-flex justify-center items-center py-4 border-2 border-slate-100 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] text-slate-700 hover:bg-slate-50 hover:border-slate-200 transition-all duration-300 group">
                Create Account
                <div class="ml-2 w-1.5 h-1.5 rounded-full bg-slate-200 group-hover:bg-blue-500 transition-colors"></div>
            </a>
        </div>
    </form>
</x-guest-layout>

<style>
    @keyframes shimmer {
        100% { transform: translateX(400%); }
    }
</style>