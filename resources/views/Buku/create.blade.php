@extends('layout.master')

@section('title', 'Halaman Utama')

@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col w-full px-24 py-5">
        <h4 class="text-center text-3xl font-semibold my-7">Tambah Buku</h4>
        <form class="flex bg-white flex-col w-full border p-5 space-y-2" method="post" action="{{ route('buku.store') }}">
            @csrf

            @if(count($errors) > 0)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong>Ada kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex flex-col w-full">
                <label for="judul">Judul</label>
                <input class="w-full bg-gray-100 p-2 rounded-md" type="text" name="judul" id="judul">
            </div>
            <div class="flex flex-col w-full">
                <label for="penulis">Penulis</label>
                <input class="w-full bg-gray-100 p-2 rounded-md" type="text" name="penulis" id="penulis">
            </div>
            <div class="flex flex-col w-full">
                <label for="harga">Harga</label>
                <input class="w-full bg-gray-100 p-2 rounded-md" type="text" name="harga" id="harga">
            </div>
            <div class="flex flex-col w-full">
                <label for="tgl_terbit">Tgl.Terbit</label>
                <input id="tgl_terbit" class="w-full bg-gray-100 p-2 rounded-md" type="text" placeholder="yyyy/mm/dd" name="tgl_terbit" id="tgl_terbit">
            </div>
            <div class="flex w-full items-center justify-center space-x-2">
                <button class="p-3 bg-blue-500 w-24 text-white text-center rounded-lg" type="submit">Simpan</button>
                <a class="p-3 bg-red-500 w-24 text-white text-center rounded-lg" href="/buku">Batal</a>
            </div>
        </form>
    </div>
@endsection