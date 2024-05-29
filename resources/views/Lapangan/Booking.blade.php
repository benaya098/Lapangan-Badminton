@extends('layouts.main')
@section('konten')
@if(session()->has('gagalPesan'))
<script>
    swal("Gagal Pesan", "{{session('gagalPesan')}}", "error");
</script>
@endif
    <div class="konten-layout py-3 px-2">
        <div class="text-center">
            <h2 class="font-semibold text-lg lg:text-2xl">Pesan Lapangan</h2>
        </div>
        <div class="mt-[60px] lg:ml-10">
            <form action="/pesan-lapangan/create" method="post">
                @csrf
            <div class="">
                <div class="mt-3 ">
                    <label class="block lg:text-[22px]" for="">Nama Pemesan <span class="text-red-500">*</span></label>
                    <input class="block input-form lg:w-[200px] focus:outline-none focus:border-blue-400 lg:text-[20px]" name="name" type="text" value="{{auth()->user()->name}}">
                </div>
                <div class="mt-3">
                    <label class="block lg:text-[22px]">Tanggal <span class="text-red-500">*</span></label>
                    <input class="block input-form focus:outline-none lg:w-[200px] focus:border-blue-400 lg:text-[20px]" name="tanggal" type="date"data-date-inline-picker="true">
                </div>
                <div class="mt-3">
                    <label class="w-full block lg:text-[22px]" id="labelWaktu" for="">Mulai Jam (6-23) <span class="text-red-500">*</span></label>
                    <div class="flex">
                    <input class="mt-2 input-form w-[80px] focus:outline-none focus:border-blue-400 lg:text-[20px]" name="mulai" type="number" name="waktu" id="waktu" min="7" max="23"><p class="ml-2 my-auto lg:text-center lg:font-semibold lg:text-lg"><p class="ml-2 my-auto lg:text-center lg:font-semibold lg:text-[20px]">: 00 WIB</p>
                    </div>
                </div>
                <div class="max-w-[200px] max-h-[100px] mt-3">
                    <label class="block lg:text-[22px]">Durasi Main <span class="text-red-500">*</span></label>
                    <div class="flex">
                        <input id="durasi" class="input-form w-[80px] h-[35px] lg:h-[50px] focus:outline-none focus:border-blue-400 lg:text-[20px]" name="durasi" type="number" min="1" max="5"><p class="ml-2 my-auto lg:text-center lg:font-semibold lg:text-[20px]">Jam</p>
                    </div>
                </div>
                <div class="mt-3">
                    <div>
                        <label class="block lg:text-[22px]">Pilih Lapangan <span class="text-red-500">*</span></label>
                        <select class="form-select appearance-none
                        block
                        w-[200px]
                        px-3
                        py-1.5
                        text-base
                        lg:text-[20px]
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded-lg
                        transition
                        ease-in-out
                        m-0
                        shadow-lg
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="lapangan">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="block lg:text-[22px]">Total Harga Rp. </label>
                    <input id="harga" class="input-form text-teal-500 lg:w-[200px] disabled:font-medium lg:text-[20px]" name="harga" type="text" readonly>
                </div>
                <div class="mt-3 lg:text-[22px]">
                    <button class="bg-teal-500 w-[100px] rounded-lg border-2 border-slate-500 py-2 px-1 shadow-lg hover:bg-teal-400 mt-2 text-white lg:py-2 lg:px-2" type="submit">Cek</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script src="/Javascript/pesan.js"></script>
@endsection