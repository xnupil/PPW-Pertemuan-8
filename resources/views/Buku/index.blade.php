@extends('layout.master')

@section('title', 'Halaman Utama')

@section('content')
<main class="p-8">
    <h1 class="w-full text-center text-5xl font-semibold">Daftar Buku</h1>
    <div class="flex w-full justify-end my-5">
        <a class="text-center bg-blue-500 p-3 rounded-lg text-white text-decoration-none" href="{{ route('buku.create')}}">Tambah Buku</a>
    </div>

    <table class="min-w-full divide-y divide-gray-200 border">
        <thead class="">
            <tr class="">
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">id</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Judul Buku</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Tgl. Terbit</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $buku)
                <tr class="border">
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ ++$no}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ $buku->judul}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ $buku->penulis}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ "Rp ".number_format($buku->harga, 2, ',', '.')}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('Y-m-d')}}</td>
                    <td class="px-6 py-3 text-center text-sm font-medium tracking-wider">
                        <form class="" action="{{ route('buku.destroy', $buku->id) }}" method="post">
                            @csrf
                            <button class="w-full mb-2 text-center bg-red-500 p-3 rounded-lg text-white" onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                        </form>

                        <form method="" action="{{ route('buku.edit', $buku->id) }}">
                            @csrf
                            <button class="w-full mb-2 text-center bg-yellow-500 p-3 rounded-lg text-white">Edit</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    @include('pagination', ['paginator' => $data_buku])
    <div class="w-full flex flex-col items-center my-3">
        <div class="flex flex-col">{{$data_buku->links()}}</div>
    </div>

    <b>Jumlah buku adalah {{ count($data_buku) }}</b>
    <br>
    <b>Total harga semua buku adalah {{ "Rp ".number_format($totalharga, 2, ',', '.') }}</b>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Periksa apakah ada pesan sesi
    var pesan = "{{ Session::get('pesan') }}";
    
    if (pesan) {
        // Tampilkan pesan
        $(".pesan-sesi").text(pesan).fadeIn(500);
        
        // Sembunyikan pesan setelah 5 detik
        setTimeout(function() {
            $(".pesan-sesi").fadeOut(500);
        }, 3000);
    }
});
</script>
@if(Session::has('pesan'))
    <div class="sticky bottom-0 bg-green-500 px-10 py-5 pesan-sesi text-white" style="display: none;">{{Session::get('pesan')}}</div>
@endif
@endsection