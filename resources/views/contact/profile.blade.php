@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Profil Contact</h1>
    <div class="card">
        <div class="card-body">
            <h3>{{ $contact->name }}</h3>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p><strong>Address:</strong> {{ $contact->address }}</p>
        </div>
    </div>
</div>
@endsection