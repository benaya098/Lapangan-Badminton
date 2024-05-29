<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            font-size: 0.875rem;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    @include('admin.sidebar')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-4">Tambah Pengelola</h1>
                    <p>Tambah pengelola dibawah ini</p>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#locationModal">Tambah</a>
                    <br>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <table id="table_id" class="dataTable table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengelola</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengelola as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->namaPengelola }}</td>
                                    <td>{{ $user->username }}</a></td>
                                    <td>{{ $user->password }}</td>
                                    <td>{{ $user->lokasi->namaLokasi ?? 'Undefined'}}</td>
                                    <td>
                                     <a href="" class="btn btn-info btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="locationModalLabel">Tambah Pengelola</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="pengelolaForm" method="POST" action="{{ route('tambahpengelola')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama_pengelola">Nama Pengelola:</label>
                                            <input type="text" class="form-control" id="nama_pengelola" name="namaPengelola" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi:</label>
                                            <select class="form-control" id="lokasi" name="lokasi" required>
                                                @foreach($lokasi as $lok)
                                                    <option value="{{ $lok->id }}">{{ $lok->namaLokasi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('datatables/datatable.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });

        function submitForm() {
            document.getElementById('pengelolaForm').submit();
        }
    </script>
</body>
</html>
