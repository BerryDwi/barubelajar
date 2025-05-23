@extends('template')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Form Layout</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Layout</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Form Grid</h4>

                </div><!-- end card header -->

                <div class="card-body">

                    <div class="live-preview">
                        <form action="{{ route('mahasiswa.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">First Name</label>
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Masukkan Nama" id="firstNameinput" required>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nim" class="form-label">Nim</label>
                                        <input type="text" name="nim" class="form-control"
                                            placeholder="masukkan nim anda" id="lastNameinput" required>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="kelast" class="form-label">Kelas</label>
                                        <input type="text" name="kelas" class="form-control"
                                            placeholder="masukkan kelas anda" required>
                                    </div>
                                </div>
                                <!--end col-->

                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('tabelmahasiswa') }}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
