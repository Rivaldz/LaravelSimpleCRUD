<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>No Induk</th>
        <th>Nama</th>
        <th>Alama</th>
        <th>Tanggal Lahir</th>
        <th>Tanggal Bergabung</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($karyawans as $karyawan)
    <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $karyawan->no_induk }}</td>
        <td>{{ $karyawan->nama }}</td>
        <td>{{ $karyawan->alamat }}</td>
        <td>{{ $karyawan->tanggal_lahir}}</td>
        <td>{{ $karyawan->tanggal_bergabung}}</td>
        <td>
            <form action="{{ route('projects.destroy', $karyawan->id) }}" method="POST">

                <a href="{{ route('projects.show', $karyawan->id) }}" title="show">
                    <i class="fas fa-eye text-success  fa-lg"></i>
                </a>

                <a href="{{ route('projects.edit', $karyawan->id) }}">
                    <i class="fas fa-edit  fa-lg"></i>

                </a>

                @csrf
                @method('DELETE')

                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                    <i class="fas fa-trash fa-lg text-danger"></i>

                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>