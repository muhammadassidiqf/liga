@extends('layouts.app')
@section('styles')
    @parent
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <style>
        .select2 {
            width: 100% !important;
        }

        .dropify-wrapper .dropify-message span.file-icon:before {
            font-size: 5rem !important;
        }
    </style>
@endsection
@section('content-navbar')
    <h1 class="welcome-text"><span class="text-black fw-bold">Dashboard</span></h1>
    <h3 class="welcome-sub-text">Halaman Pertandingan & Klasemen</h3>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-column">
                        <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start">
                                                <div>
                                                    <h4 class="card-title card-title-dash">Klasemen Liga</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end">
                                                <button class="btn btn-primary btn-md text-white m-2" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#add_club"><i
                                                        class="mdi mdi-account-plus"></i>&nbsp;Tambah
                                                    Klub</button>
                                                <button class="btn btn-primary btn-md text-white m-2" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#add_match"><i
                                                        class="mdi mdi-play-circle"></i>&nbsp;Tambah
                                                    Pertandingan</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="example2">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th width="20%">Klub</th>
                                                        <th>Ma</th>
                                                        <th>Me</th>
                                                        <th>S</th>
                                                        <th>K</th>
                                                        <th>GM</th>
                                                        <th>GK</th>
                                                        <th width=10%">
                                                            Point
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($klasemen as $no => $k)
                                                        <tr>
                                                            <td>{{ $no + 1 }}</td>
                                                            <td>{{ $k->nama_klub }}</td>
                                                            <td>{{ $k->ma }}</td>
                                                            <td>{{ $k->me ? $k->me : 0 }}</td>
                                                            <td>{{ $k->s ? $k->s : 0 }}</td>
                                                            <td>{{ $k->k ? $k->k : 0 }}</td>
                                                            <td>{{ $k->gm_total ? $k->gm_total : 0 }}</td>
                                                            <td>{{ $k->gk_total ? $k->gk_total : 0 }}</td>
                                                            <td>{{ $k->poin_total ? $k->poin_total : 0 }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 d-flex flex-column">
                        <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start">
                                                <div>
                                                    <h4 class="card-title card-title-dash">Data Klub</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="example">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Klub</th>
                                                        <th>Kota Klub</th>
                                                        <th width=20%">
                                                            Aksi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($klub as $no => $k)
                                                        <tr>
                                                            <td>{{ $no + 1 }}</td>
                                                            <td>{{ $k->nama_klub }}</td>
                                                            <td>{{ $k->kota_klub }}</td>
                                                            <td>
                                                                <a href=""
                                                                    class="btn btn-success btn-rounded btn-md btn-icon"
                                                                    data-bs-toggle="modal" data-bs-target="#edit_club"
                                                                    data-remote="{{ route('klub.edit', $k->id) }}"><i
                                                                        class="mdi mdi-lead-pencil"></i> Edit</a>
                                                                <a href=""
                                                                    class="btn btn-danger btn-rounded btn-md btn-icon btn-delete"
                                                                    data-url="{{ route('klub.delete', $k->id) }}"
                                                                    data-delmsg="{{ $k->nama_klub }}"><i
                                                                        class="mdi mdi-delete"></i>
                                                                    Hapus</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 d-flex flex-column">
                        <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start">
                                                <div>
                                                    <h4 class="card-title card-title-dash">Hasil Pertandingan</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped" border="0">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th width=45%">Klub 1</th>
                                                        <th width=10%"></th>
                                                        <th width=45%">Klub 2</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($match as $no => $m)
                                                        <tr>
                                                            <td>
                                                                <p>{{ $m['klub1'] }}</p>
                                                                <p>{{ $m['skor1'] }}</p>
                                                            </td>
                                                            <td>-</td>
                                                            <td>
                                                                <p>{{ $m['klub2'] }}</p>
                                                                <p>{{ $m['skor2'] }}</p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="d-grid gap-2">
                                                <a class="btn btn-primary" href="{{ route('pertandingan.index') }}">Semua
                                                    Hasil
                                                    Pertandingan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <div class="modal fade" id="add_club" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Klub</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('klub.store') }}" method="POST" id="form_klub" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <label>Nama Klub&nbsp;<span style="color: red;">(*)</span></label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Nama Klub" aria-label="Nama Klub" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label>Kota Klub&nbsp;<span style="color: red;">(*)</span></label>
                                        <input type="text" class="form-control" name="kota" id="kota"
                                            placeholder="Kota Klub" aria-label="Kota Klub" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_club" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Klub</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_match" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Klub</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pertandingan.store') }}" method="POST" id="form_add"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row" id="form-add-klub">
                            <input type="hidden" name="kode[]" value="{{ bin2hex(random_bytes(10)) }}">
                            <div class="col-sm-6 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="form-group">
                                            <label>Klub 1&nbsp;<span style="color: red;">(*)</span></label>
                                            <select name="klub1[]" class="form-control select2" required
                                                placeholder="Pilih Klub">
                                                <option value="" selected disabled>Pilih Klub</option>
                                                @foreach ($klub as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama_klub }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" class="form-control my-2" name="skor1[]"
                                                id="skor1" placeholder="Skor" aria-label="Skor" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="form-group">
                                            <label>Klub 2&nbsp;<span style="color: red;">(*)</span></label>
                                            <select name="klub2[]" class="form-control select2" required
                                                placeholder="Pilih Klub">
                                                <option value="" selected disabled>Pilih Klub</option>
                                                @foreach ($klub as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama_klub }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" class="form-control my-2" name="skor2[]"
                                                id="skor2" placeholder="Skor" aria-label="Skor" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="button" id="add-match">Tambah Pertandingan</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btn-upload">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="text" value="1" />
@endsection
@section('scripts')
    @parent
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
    <script>
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            // "pageLength": 50
        });
        $("#example2").css('width', '100%');
        $('#example').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            // "pageLength": 50
        });
        $("#example").css('width', '100%');
        $('.select2').select2({
            dropdownParent: $('#add_match')
        });
        var a = 1;
        $("#add-match").click(function() {
            var textBox = document.getElementById("text");
            textBox.value = a;
            a++;
            var fieldHTML =
                '<div class="row"><input type="hidden" name="kode[]" value="{{ bin2hex(random_bytes(10)) }}"><div class="col-sm-6 d-flex flex-column"><div class="row flex-grow"><div class="col-12 grid-margin stretch-card"><div class="form-group"><label>Klub 1&nbsp;<span style="color: red;">(*)</span></label><select name="klub1[]" class="form-control select2" required placeholder="Pilih Klub"><option value="" selected disabled>Pilih Klub</option>@foreach ($klub as $k)<option value="{{ $k->id }}">{{ $k->nama_klub }}</option>@endforeach</select> <input type="text" class="form-control my-2" name="skor1[]" id="skor1" placeholder="Skor" aria-label="Skor" required></div></div></div></div><div class="col-sm-6 d-flex flex-column"><div class="row flex-grow"><div class="col-12 grid-margin stretch-card"><div class="form-group"><label>Klub 2&nbsp;<span style="color: red;">(*)</span></label><select name="klub2[]" class="form-control select2" required placeholder="Pilih Klub"><option value="" selected disabled>Pilih Klub</option>@foreach ($klub as $k)<option value="{{ $k->id }}">{{ $k->nama_klub }}</option>@endforeach</select><input type="text" class="form-control my-2" name="skor2[]" id="skor2" placeholder="Skor" aria-label="Skor" required></div></div></div></div></div>';
            $('body').find('#form-add-klub:last').after(fieldHTML);
            $('.select2').select2({
                dropdownParent: $('#add_match')
            });
        });
        $('#edit_club').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
        });
        $(document).on('change', '.select2', function(e) {
            var tralse = true;
            var selectRound_arr = []; // for contestant name
            $('.select2').each(function(k, v) {
                var getVal = $(v).val();
                if (getVal && $.trim(selectRound_arr.indexOf(getVal)) != -1) {
                    tralse = false;
                    //it should be if value 1 = value 1 then alert, and not those if -select- = -select-. how to avoid those -select-
                    alert('Klub Tidak Boleh Sama');
                    $(v).val("");
                    document.getElementById('btn-upload').style.pointerEvents = 'none';
                    document.getElementById('btn-upload').style.display = 'none';
                    return false;
                } else {
                    selectRound_arr.push($(v).val());
                    document.getElementById('btn-upload').style.pointerEvents = 'auto';
                    document.getElementById('btn-upload').style.display = 'block';
                }

            });
            if (!tralse) {
                return false;
            }
        });
        $("table").on("click", ".btn-delete", function(e) {
            e.preventDefault();
            let msg = $(this).data("delmsg");
            let action = $(this).data("url");
            var token = '{{ csrf_token() }}'
            Swal.fire({
                title: "Apakah Yakin?",
                text: `Apakah Anda yakin ingin menghapus data ${msg}?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: action,
                        type: "POST",
                        data: {
                            "_token": token
                        },
                        dataType: "json",
                        success: function(d) {
                            if (d.status) {
                                Swal.fire({
                                    icon: 'success',
                                    type: 'success',
                                    title: `Data ${msg} berhasil terhapus.`,
                                    showConfirmButton: true
                                }).then((result) => {
                                    location.reload()
                                })
                            } else if (d.error) {
                                Swal.fire({
                                    icon: 'warning',
                                    type: 'warning',
                                    title: `Data ${msg} gagal terhapus.`,
                                    showConfirmButton: true
                                }).then((result) => {
                                    location.reload()
                                })
                            } else {
                                Swal.fire(
                                    'Mohon Maaf!',
                                    'Data gagal diperbarui',
                                    'error'
                                )
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire({
                                icon: "error",
                                type: "error",
                                title: "Error saat delete data",
                                showConfirmButton: true,
                            });
                        },
                    });
                }
            });
        });
    </script>
@endsection
