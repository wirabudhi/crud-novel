<x-app-layout>
    {{-- Membuat header --}}
    <x-slot name="header">
        <div class="flex justify-center">
            {{-- Menampilkan Text Data Novel --}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ 'Data Novel' }}
            </h2>
            {{-- Menambahkan button tambah yang mengarah ke halaman add novel menggunakan route novel.create --}}
            <a href="{{ route('novel.create') }}" class="bg-blue-500 text-white px-4 py-1 rounded-md">Tambah</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-800">
                    {{-- Menampilkan table untuk data novel --}}
                    <table class="border-collapse table-auto w-full text-sm">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Title</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Created At</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Updated At</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Action</th>
                            </tr>
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            {{-- Melakukan perulangan data novel --}}
                            @foreach ($novel as $n)
                                <tr>
                                    {{-- Menampilkan judul --}}
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-black dark:text-black">{{ $n->judul }}</td>
                                    {{-- Menampilkan created at --}}
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-black dark:text-black">{{ $n->created_at }}</td>
                                    {{-- Menampilkan updated at --}}
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-black dark:text-black">{{ $n->updated_at }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-black dark:text-black">
                                        {{-- Button untuk menampilkan detail novel --}}
                                        <a href="{{ route('novel.show', $n->id) }}" class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">Detail</a>
                                        {{-- Button untuk menampilkan edit novel --}}
                                        <a href="{{ route('novel.edit', $n->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">Edit</a>
                                        {{-- Form khusus untuk melakukan hapus data novel --}}
                                        <form method="post" action="{{ route('novel.destroy', $n->id) }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>