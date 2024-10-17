@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg p-4">
                    <h3 class="text-center mb-4">Edit Contact</h3>
                    <form action="{{ route('contacts.contacts.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PATCH') {{--untuk mengubah inputan--}}
                        
                        @if (Session::get('failed'))
                            <div class="alert alert-danger">{{Session::get('failed')}}</div>
                        @endif
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama: </label>
                            <input type="text" name="name" id="name" value="{{$contact['name']}}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email: </label>
                            <input type="email" name="email" id="email" value="{{$contact['email']}}" class="form-control">
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone: </label>
                            <input type="number" name="phone" id="phone" value="{{$contact['phone']}}" class="form-control">
                            @error('phone')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Address :</label>
                            <input type="text" name="address" id="address" value="{{$contact['address']}}" class="form-control">
                            @error('address')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary w-10" href="{{ route('contacts.index')}}"><i class="fa-solid fa-paper-plane" style="color: #ffffff;"></i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
