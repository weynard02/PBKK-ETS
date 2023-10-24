<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah dipersilakan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4">
            
            <form action="/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-6 mx-32">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">* harus diisi</p>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama *</label>
                    <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6 mx-32">
                    <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis *</label>
                    <select id="jenis" name="jenis_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-</option>
                        @foreach($jenis as $j)
                            <option value="{{$j->id}}">{{$j->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6 mx-32">
                    <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kondisi *</label>
                    <select id="kondisi" name="kondisi_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>-</option>
                        @foreach($kondisis as $k)
                            <option value="{{$k->id}}">{{$k->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6 mx-32">
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan: *</label>
                    <textarea id="keterangan" name="keterangan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Max 255 char"></textarea>
                </div>
                <div class="mb-6 mx-32">
                    <label for="kecacatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecacatan:</label>
                    <textarea id="kecacatan" name="kecacatan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Max 255 char"></textarea>
                </div>
                <div class="mb-6 mx-32">
                    <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah *</label>
                    <input type="number" name="jumlah" id="jumlah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6 mx-32">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Image *</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" name="image" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG</p>
                </div>
                <div class="mb-6 mx-32">
                    <a href="./" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">&lt; Back</a>
                    <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                </div>
                @error('nama')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">{{ $message }}</div>
                @enderror
                @error('jenis_id')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">{{ $message }}</div>
                @enderror
                @error('kondisi_id')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">{{ $message }}</div>
                @enderror
                @error('keterangan')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">{{ $message }}</div>
                @enderror
                @error('kecacatan')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">{{ $message }}</div>
                @enderror
                @error('jumlah')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">{{ $message }}</div>
                @enderror
                @error('image')
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">{{ $message }}</div>
                @enderror
            </form>
        </div>
    </div>
</x-app-layout>
