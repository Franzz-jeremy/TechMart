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
                    Deploy New <span class="text-blue-600">Unit</span>
                </h2>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.1em]">Inisialisasi hardware baru ke dalam database sistem</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-[2.5rem] border border-slate-100 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-500/5">
                <div class="p-10">
                    
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="category_id" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Hardware Classification</label>
                                <select name="category_id" id="category_id" required
                                    class="w-full bg-slate-50 border-slate-100 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 rounded-2xl transition-all font-bold text-slate-700 py-4 px-5">
                                    <option value="">-- Select Category --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-1 px-1" />
                            </div>

                            <div class="space-y-2">
                                <label for="name" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Product Designation</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    placeholder="Ex: NVIDIA RTX 4090" 
                                    class="w-full bg-slate-50 border-slate-100 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 rounded-2xl transition-all font-bold text-slate-700 py-4 px-5">
                                <x-input-error :messages="$errors->get('name')" class="mt-1 px-1" />
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="description" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Technical Specifications</label>
                            <textarea name="description" id="description" rows="4" required
                                placeholder="Detail spesifikasi teknis hardware..."
                                class="w-full bg-slate-50 border-slate-100 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 rounded-2xl transition-all font-medium text-slate-700 p-5">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-1 px-1" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="price" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Market Value (Price)</label>
                                <div class="relative">
                                    <span class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 font-black text-xs tracking-widest">IDR</span>
                                    <input type="number" name="price" id="price" value="{{ old('price') }}" required
                                        class="w-full bg-slate-50 border-slate-100 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 rounded-2xl transition-all font-black text-slate-900 py-4 pl-16 pr-5">
                                </div>
                                <x-input-error :messages="$errors->get('price')" class="mt-1 px-1" />
                            </div>
                            <div class="space-y-2">
                                <label for="stock" class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Unit Inventory (Stock)</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required
                                    class="w-full bg-slate-50 border-slate-100 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 rounded-2xl transition-all font-black text-slate-900 py-4 px-5">
                                <x-input-error :messages="$errors->get('stock')" class="mt-1 px-1" />
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-1">Visual Documentation (Image)</label>
                            
                            <div class="relative group h-64 w-full">
                                <div id="upload-box" class="absolute inset-0 border-2 border-dashed border-slate-200 rounded-[2.5rem] p-8 text-center hover:border-blue-400 hover:bg-blue-50/50 transition-all cursor-pointer bg-slate-50 flex flex-col items-center justify-center z-10">
                                    <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(this)" class="absolute inset-0 opacity-0 cursor-pointer z-30">
                                    
                                    <div class="bg-white p-4 rounded-3xl shadow-sm mb-3 group-hover:scale-110 transition-transform duration-500">
                                        <svg class="w-8 h-8 text-slate-300 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs font-black text-slate-500 group-hover:text-blue-600 transition-colors">UPLOAD SYSTEM VISUAL</p>
                                    <p class="text-[8px] font-bold text-slate-400 uppercase tracking-widest mt-1">PNG, JPG, or WEBP (Max 2MB)</p>
                                </div>

                                <div id="preview-container" class="hidden absolute inset-0 z-20 overflow-hidden rounded-[2.5rem] border-2 border-blue-500 bg-white shadow-2xl shadow-blue-500/10">
                                    <img id="image-preview" src="#" alt="Preview" class="w-full h-full object-cover">
                                    
                                    <div class="absolute inset-0 bg-slate-900/60 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                                        <button type="button" onclick="resetImage()" class="bg-white text-slate-900 px-6 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all transform translate-y-4 group-hover:translate-y-0 shadow-2xl">
                                            Remove & Replace
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('image')" class="mt-1 px-1" />
                        </div>

                        <div class="flex items-center justify-between pt-8 border-t border-slate-50">
                            <a href="{{ route('products.index') }}" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 hover:text-red-500 transition-colors">
                                Abort Deployment
                            </a>
                            
                            <button type="submit" class="group relative bg-slate-900 text-white px-10 py-4 rounded-2xl font-black text-[10px] uppercase tracking-[0.3em] hover:bg-blue-600 transition-all duration-500 shadow-xl shadow-slate-200 hover:shadow-blue-500/20 flex items-center gap-3">
                                Initialize Deployment
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            const container = document.getElementById('preview-container');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                    // Tambahkan animasi masuk jika perlu
                    container.classList.add('animate-in', 'fade-in', 'zoom-in', 'duration-300');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        function resetImage() {
            const input = document.getElementById('image');
            const container = document.getElementById('preview-container');
            
            input.value = ""; // Clear file input
            container.classList.add('hidden');
        }
    </script>
</x-app-layout>