<x-app-layout>
    {{-- Mendefinisikan Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Menentukan apakah form ini digunakan untuk edit novel atau tambah novel --}}
            {{ isset($novel) ? 'Edit Novel' : 'Tambah Novel' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Membuat form dengan method POST untuk mengirim data --}}
                    {{-- Pada action akan dicek apakah form ini digunakan untuk menambah data baru atau mengupdate data yang sudah ada --}}
                    {{-- Enctype berfungsi untuk menerima data berupa file --}}
                    <form method="post" action="{{ isset($novel) ? route('novel.update', $novel->id) : route('novel.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        {{-- Token security --}}
                        @csrf
                        {{-- Melakukan overiding terhadap method POST menjadi method PUT apabila form ini digunakan untuk edit --}}
                        @isset($novel)
                            @method('put')
                        @endisset
                        
                        {{-- Menampilkan form judul --}}
                        <div>
                            {{-- Label Judul --}}
                            <x-input-label for="judul" value="Judul" />
                            {{-- Text input judul --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="judul" name="judul" type="text" class="mt-1 block w-full" :value="$novel->judul ?? old('judul')" required autofocus />
                            {{-- Input error guna menampilkan error pada field judul --}}
                            <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                        </div>

                        {{-- Menampilkan form penulis --}}
                        <div>
                            {{-- Label Penulis --}}
                            <x-input-label for="penulis" value="Penulis" />
                            {{-- Text input penulis --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="penulis" name="penulis" type="text" class="mt-1 block w-full" :value="$novel->penulis ?? old('penulis')" required autofocus />
                            {{-- Input error guna menampilkan error pada field penulis --}}
                            <x-input-error class="mt-2" :messages="$errors->get('penulis')" />
                        </div>
                        
                        {{-- Menampilkan form sinopsis --}}
                        <div>
                            {{-- Label Sinopsis --}}
                            <x-input-label for="sinopsis" value="Sinopsis" />
                            {{-- Text area input judul --}}
                            {{-- Berisi {{ $novel->sinopsis ?? old('sinopsis') }} guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-textarea-input id="sinopsis" name="sinopsis" class="mt-1 block w-full" required autofocus>{{ $novel->sinopsis ?? old('sinopsis') }}</x-textarea-input>
                            {{-- Input error guna menampilkan error pada field sinopsis --}}
                            <x-input-error class="mt-2" :messages="$errors->get('sinopsis')" />
                        </div>

                        {{-- Menampilkan form gambar --}}
                        <div>
                            {{-- Label Gambar --}}
                            <x-input-label for="gambar" value="Gambar" />
                            {{-- Button untuk memilih gambar --}}
                            <label class="block mt-2">
                                <span class="sr-only">Pilih Gambar</span>
                                <input type="file" id="gambar" name="gambar" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            {{-- Menampilkan gambar preview dengan source dari gambar yang dipilih oleh user tadi atau menggunakan gambar dari storage --}}
                            <div class="shrink-0 my-2">
                                <img id="gambar_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($novel) ? Storage::url($novel->gambar) : '' }}" alt="Gambar preview" />
                            </div>
                            {{-- Input error guna menampilkan error pada field gambar --}}
                            <x-input-error class="mt-2" :messages="$errors->get('gambar')" />
                        </div>
                
                        {{-- Menampilkan button simpan --}}
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Script ini berguna untuk menampilkan perubahan gambar yang terjadi --}}
    <script>
        // Membuat event onchange listener untuk menangkap perubahan gambar
        document.getElementById('gambar').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // Apabila terdapat gambar, maka akan secara otomatis menampilkan gambar
                document.getElementById('gambar_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>