@extends('layouts.master')

@section('title', 'Halaman Utama')

@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col w-full px-24 py-5">
        <h4 class="text-center text-3xl font-semibold my-7">Edit Buku</h4>
        <form class="flex bg-white flex-col w-full border p-5 space-y-2" method="post" action="{{ route('buku.update', $buku->id) }}">
            @csrf
            <div class="flex flex-col w-full">
                <p>Judul</p>
                <input class="w-full bg-gray-100 p-2 rounded-md" type="text" name="judul" value="{{$buku->judul}}"></div>
            <div class="flex flex-col w-full">
                <p>Penulis</p>
                <input class="w-full bg-gray-100 p-2 rounded-md" type="text" name="penulis" value="{{$buku->penulis}}"></div>
            <div class="flex flex-col w-full">
                <p>Harga</p>
                <input class="w-full bg-gray-100 p-2 rounded-md" type="text" name="harga" value="{{ $buku->harga}}"></div>
            <div class="flex flex-col w-full">
                <p>Tgl.Terbit</p>
                <input class="w-full bg-gray-100 p-2 rounded-md" type="text" name="tgl_terbit" value="{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('Y-m-d')}}"></div>
            <div class="flex w-full items-center justify-center space-x-2">
                <button class="p-3 bg-green-500 w-24 text-white text-center rounded-lg" type="submit">Update</button>
                <a class="p-3 bg-red-500 w-24 text-white text-center rounded-lg" href="/buku">Batal</a>
            </div>
        </form>
    </div>
@endsection