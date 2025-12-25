<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="bg-slate-900 p-2.5 rounded-2xl shadow-lg">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-black text-2xl text-slate-900 leading-tight tracking-tight">
                    User <span class="text-blue-600">Database</span>
                </h2>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.1em]">Otoritas dan Manajemen Akses Node Pelanggan</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-slate-100">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
                        <div>
                            <h3 class="text-lg font-black text-slate-900 italic tracking-tighter">Registered Personnel</h3>
                            <p class="text-sm text-slate-400 font-medium">Total Terenkripsi: <span class="text-blue-600 font-black">{{ $users->count() }}</span> User</p>
                        </div>
                        <div class="flex gap-2">
                            <div class="flex items-center bg-blue-50 px-4 py-2 rounded-xl border border-blue-100">
                                <span class="relative flex h-2 w-2 mr-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                                </span>
                                <span class="text-[10px] font-black text-blue-700 uppercase tracking-widest">Active Community</span>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-separate border-spacing-y-3">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Identity Node</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 text-center">Security Role</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Deployment Date</th>
                                    <th class="px-6 py-4 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 text-right">Total Contribution</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="group hover:bg-slate-50 transition-all duration-300">
                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-5 rounded-l-2xl border-y border-l border-slate-50 group-hover:border-blue-100 transition-colors">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-xl bg-slate-900 flex items-center justify-center text-blue-500 font-black text-lg shadow-inner">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-black text-slate-900 tracking-tight">{{ $user->name }}</span>
                                                <span class="text-xs text-slate-400 font-medium">{{ $user->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-5 border-y border-slate-50 group-hover:border-blue-100 text-center transition-colors">
                                        <span class="px-4 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-[0.15em] 
                                            {{ $user->role == 'admin' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-100' : 'bg-slate-100 text-slate-600' }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-5 border-y border-slate-50 group-hover:border-blue-100 transition-colors">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-slate-700">{{ $user->created_at->format('d M, Y') }}</span>
                                            <span class="text-[10px] text-slate-400 uppercase font-black tracking-tighter">Registration Date</span>
                                        </div>
                                    </td>
                                    <td class="bg-white group-hover:bg-slate-50 px-6 py-5 rounded-r-2xl border-y border-r border-slate-50 group-hover:border-blue-100 text-right transition-colors">
                                        @php
                                            $totalSpent = \App\Models\Order::where('user_id', $user->id)
                                                ->whereIn('status', ['success', 'completed', 'Selesai'])
                                                ->sum('total_price');
                                        @endphp
                                        <span class="text-sm font-black text-slate-900 tracking-tighter">
                                            Rp {{ number_format($totalSpent, 0, ',', '.') }}
                                        </span>
                                        <div class="text-[9px] font-bold text-emerald-500 uppercase tracking-widest mt-1">Paid Credits</div>
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