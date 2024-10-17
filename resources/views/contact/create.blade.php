@extends('layouts.layout')

@section('content')
    <form action="{{ route('contacts.store')}}" method="POST" class="card p-5 sha w-50 mx-auto shadow mb-5 rounded bg-white">
        {{-- 
            1. tag <form> attr action & method
                method : 
                - GET : form tujuan mencari data (search)
                - POST : form tujuan menambahkan/menghapus/mengubah
                action : route memproses data
                - arahkan route yg akan menangani proses data ke db nya
                - jika GET : arahkan ke route yg sama dengan route yg menampilkan blade ini
                - jika POST : arahkan ke route baru dengan httpmethod sesuai tujuan POST (tambah), PATCH (ubah), DELETE (hapus) 
            2. jika form method POST : @csrf
            3. input attr name (isi disamakan dengan column di migration)
            4. button/input type submit
        --}}
        @csrf
        <h1 class="text-center">Input Contact</h1>
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3 row">
            <div class="col-sm-6 mx-auto">
                <label for="name" class="col-form-label">Nama: </label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="col-sm-6 mx-auto">
                <label for="phone" class="col-form-label">Phone: </label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-sm-6 mx-auto">
                <label for="email" class="col-form-label">Email: </label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="col-sm-6 mx-auto">
                <label for="address" class="col-form-label">Address: </label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3 w-100 mx-auto shadow">Send</button>
        
    </form>
@endsection
