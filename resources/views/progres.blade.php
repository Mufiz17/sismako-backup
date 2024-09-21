@extends('layouts.app')

@section('content')
    <!-- Button to Open Modal -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-2">
                <a href="/" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#dateNisnModal">Cek progres
                    kemajuan siswa
                </a>
            </div>
        </div>
    </div>

    <!-- Modal HTML -->
    <div class="modal fade" id="dateNisnModal" tabindex="-1" aria-labelledby="dateNisnModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dateNisnModalLabel">Masukkan Detail Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="progresSiswaForm">
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" required>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk Mengarahkan Pengguna -->
    <script>
        document.getElementById('progresSiswaForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah submit default

            var nisn = document.getElementById('nisn').value;
            var start_date = document.getElementById('start_date').value;
            var end_date = document.getElementById('end_date').value;

            if (nisn && start_date && end_date) {
                // Membuat URL dengan parameter yang sesuai
                var url = "{{ url('/progres-siswa') }}/" + nisn + "?start_date=" + start_date +
                    "&end_date=" + end_date;
                window.location.href = url; // Mengarahkan ke URL baru
            } else {
                alert("Semua field harus diisi!");
            }
        });
    </script>
@endsection
