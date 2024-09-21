@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Akses Lab</h1>
    <form action="{{ route('lab.store') }}" method="POST">
        @csrf
        <!-- Tambahkan input fields sesuai dengan kolom tabel -->
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="guru_id">Guru</label>
            <select class="form-control" id="guru_id" name="guru_id" required>
                <!-- Isikan dengan opsi dari tabel guru -->
            </select>
        </div>
        <div class="form-group">
            <label for="kelas_id">Kelas</label>
            <select class="form-control" id="kelas_id" name="kelas_id" required>
<<<<<<< Tabnine <<<<<<<
    /**undefined+
     * Display a form to create a new lab.undefined+
     *undefined+
     * @return \Illuminate\View\Viewundefined+
     */undefined+
    public function create()undefined+
    {undefined+
        // Fetch all lab data with related 'siswa' and 'guru' modelsundefined+
        $labs = Lab::with('siswa', 'guru')->get();undefined+
undefined+
        // Return the view for creating a new lab with fetched dataundefined+
        return view('keasramaan.akses-lab.create', compact('labs'));undefined+
    }undefined+
>>>>>>> Tabnine >>>>>>>undefined {"conversationId":"b88dcc06-c291-4846-895e-542d07ed7e01","source":"instruct"}
                <!-- Isikan dengan opsi dari tabel kelas -->
            </select>
        </div>
        <div class="form-group">
            <label for="siswa_id">Siswa</label>
            <select class="form-control" id="siswa_id" name="siswa_id" required>
                <!-- Isikan dengan opsi dari tabel siswa -->
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>
        <div class="form-group">
            <label for="start">Jam Mulai</label>
            <input type="time" class="form-control" id="start" name="start" required>
        </div>
        <div class="form-group">
            <label for="end">Jam Selesai</label>
            <input type="time" class="form-control" id="end" name="end" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script>
            document.addEventListener('DOMContentLoaded', function() {

    const data = @json($labs);
    console.log(data);
            })
</script>
@endsection
