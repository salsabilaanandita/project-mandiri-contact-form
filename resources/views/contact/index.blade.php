@extends('layouts.layout')

@section('content')
    <div class="container">
        @if (Session::get('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{Session::get('failed')}}</div>
        @endif

        <!-- Pencarian -->
        <div class="d-flex justify-content-end my-3">
            {{-- <form method="GET" action="{{ route('contacts.index') }}">
                <div class="d-flex">
                    <input type="text" name="search_contact" class="form-control" placeholder="Cari nama...">
                    <button type="submit" class="btn btn-success ms-2 shadow">
                        <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                    </button>
                </div>
            </form> --}}
        </div>

        <!-- Tabel Kontak -->
        <div class="d-flex justify-content-end">
            <form method="GET" action="{{ route('contacts.index') }}">
                <div class="d-flex">
                    <input type="text" name="search_contact" class="form-control" placeholder="Cari nama...">
                    <button type="submit" class="btn btn-success ms-2 shadow">
                        <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                    </button>
                </div>
            </form>
            {{-- <input type="text" name="search_medicine" class="form-control" placeholder="."> --}}
            <a href="{{route('contacts.create')}}" type="submit" class="btn btn-primary ms-2"><i class="fa-solid fa-user-plus" style="color: #ffffff;"></i></a>
        </div>
        <div class="table-wrapper">
            <table class="table table-bordered table-stripped shadow table mt-4">
                <thead>
                    <tr>
                        <th class="text-secondary">NO</th>
                        <th class="text-secondary">Nama</th>
                        <th class="text-secondary">Email</th>
                        <th class="text-secondary">Phone</th>
                        <th class="text-secondary">Address</th>
                        <th class="text-secondary">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($contacts) < 1)
                        <tr>
                            <td colspan="6" class="text-center">Data Obat Kosong</td>
                        </tr>
                    @else
                        @foreach ($contacts as $index => $item)
                            <tr>
                                <td>{{ ($contacts->currentPage()-1) * $contacts->perPage() + ($index+1) }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['phone'] }}</td>
                                <td>{{ $item['address'] }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('contacts.edit', $item['id']) }}" class="btn btn-warning me-2">
                                        <i class="fa-solid fa-user-pen"></i>
                                    </a>
                                    <button class="btn btn-danger" href="{{route('contacts.index')}}" onclick="showModalDelete('{{ $item['id'] }}', '{{ $item['name'] }}')">
                                        <i class="fa-solid fa-user-minus"></i>
                                    </button>
                                </td>
                                {{-- <td class="">
                                    <a href="{{ route('contacts.profile', $item['id']) }}" class="btn btn-info me-2">
                                        <i class="fa-solid fa-user"></i> Profil
                                    </a>
                                    
                                </td> --}}
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-end">
            {{ $contacts->links() }}
        </div>

        <!-- Modal Delete -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Contact</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin mengapus contact <span id="name_contact"></span>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function showModalDelete(id, name) {
        $('#name_contact').text(name);
        $('#exampleModal').modal('show');
        let url = "{{route ('contacts.delete', ':id')}}";
        //mengisi id dengan parameter  id 
        url = url.replace(':id', id);
        $('form').attr('action', url);
    }
</script>
@endpush

