<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">{{ session('success') }}</div>
            @endif
            <div class="grid-cols-2 sm:grid md:grid-cols-4 ">
                @foreach ($barangs as $i)
                <div
                  class="mx-3 mt-6 flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                <img src="{{ asset('storage/images/' . $i->image_path) }}" class="rounded-t-lg" alt="No Image" width="450">
                  <div class="p-6">
                        <h5
                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                        {{ $i->nama }}
                        </h5>
                        <h6 class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            <b>Jenis:</b>  {{ $i->jenis->nama }}<br>
                            <b>Kondisi:</b> {{ $i->kondisi->nama }}
                        </h6>
                        <h6 class="mb-4 text-base text-neutral-600 dark:text-neutral-200">Keterangan: </h6>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">{{ $i->keterangan }}</p>
                        @if($i->kecacatan)
                        <h6 class="mb-4 text-base text-neutral-600 dark:text-neutral-200">Kecacatan: </h6>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">{{ $i->kecacatan }}</p>
                        @endif
                        <form action="/delete/{{$i->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <a href="/edit/{{$i->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" role="button" value="Delete">
                        </form>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
