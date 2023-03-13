<x-app-layout>
    {{-- Menambah Header --}}
    <x-slot name="header">
        {{-- Menampilkan teks detail novel --}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Detail Novel' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Menampilkan Judul --}}
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Judul' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $novel->judul }}
                        </p>
                    </div>

                    {{-- Menampilkan Penulis --}}
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Penulis' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $novel->penulis }}
                        </p>
                    </div>

                    {{-- Menampilkan Gambar --}}
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Gambar' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128" src="{{ Storage::url($novel->gambar) }}" alt="{{ $novel->judul }}" srcset="">
                        </p>
                    </div>

                    {{-- Menampilkan Sinopsis --}}
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Sinopsis' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $novel->sinopsis }}
                        </p>
                    </div>

                    {{-- Menampilkan created at --}}
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Created At' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $novel->created_at }}
                        </p>
                    </div>

                    {{-- Menampilkan updated at --}}
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Updated At' }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $novel->updated_at }}
                        </p>
                    </div>

                    {{-- Button untuk kembali menuju route novel.index --}}
                    <a href="{{ route('novel.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>