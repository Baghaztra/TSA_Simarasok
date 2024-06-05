@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar User</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="/admin/user/create" class="btn btn-primary mb-3">Entri Data User</a>
        </div>
        <div class="col-md-6">
            <form action="/admin/user" method="GET" class="input-group mb-3">
                <input type="text" class="form-control" name="query" value=""
                    placeholder="cari sesuatu" aria-label="cari sesuatu">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>

    @if (session('success') || session('warning') || session('danger'))
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @else
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
    @endif

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alias</th>
            <th>Roles</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @if ($users->isEmpty())
            <tr>
                <td style="text-align: center; background: rgb(187, 187, 187); color: rgb(41, 41, 41); font-weight: 600"
                    colspan="7">Data
                    not found.
                </td>
            </tr>
        @endif
        @foreach ($users as $item)
            <tr>
                <td>{{ $users->firstItem() + $loop->index }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->alias }}</td>
                <td>{{ $item->roles }}</td>
                <td>
                    <a href="/updateStatus/{{$item->id}}" onclick="return confirm('Apakah anda ingin ganti status user?')">
                        <span class="badge {{ $item->status == 'active' ? 'text-bg-success' : 'text-bg-secondary' }}" id="status">
                            {{ $item->status  == 'active' ? 'Aktif' : 'Disable' }}
                        </span>
                    </a>
                </td>
                <td>
                    <form class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                        action="{{ route('user.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $users->links() }}
@endsection
