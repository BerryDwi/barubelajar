@extends('template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div>
                        <a href="{{ route('createtabelmahasiswa') }}"><button id="addRow" class="btn btn-primary">
                                + Data Mahasiswa </button></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="alternative-pagination"
                        class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Kelas</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>
                                        <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin hapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                        <a href="{{ route('mahasiswa.edit', $item->id) }}"><button type="submit"
                                                class="btn btn-primary">edit</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <div class="d-flex mb-3">
                            <a href="{{ route('mahasiswa.export') }}" class="btn btn-success me-2">Export Excel</a>

                            <form action="{{ route('mahasiswa.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control d-inline-block" style="width:auto;"
                                    required>
                                <button class="btn btn-primary">Import Excel</button>
                            </form>
                        </div>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection
