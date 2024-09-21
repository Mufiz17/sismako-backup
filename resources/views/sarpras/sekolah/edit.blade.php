@extends('layouts.app')

@section('content')
    @include('layouts.livewire.header')
    <div class="pb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mb-4">
                    <a href="/sarpras/school-purchase" class="btn btn-secondary">Back</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="form-label">Edit Pembelian</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('school-purchases.update', $schoolPurchase->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Pembelian</label>
                                        <input type="date" name="tanggal_pembelian" class="form-control"
                                            value="{{ $schoolPurchase->tanggal_pembelian }}" autofocus autocomplete="off">
                                        @error('tanggal_pembelian')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Kode Barang</label>
                                        <input type="text" name="kode" class="form-control"
                                            value="{{ $schoolPurchase->kode }}" autofocus autocomplete="off">
                                        @error('kode')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Barang</label>
                                        <input type="text" name="nama_barang" class="form-control"
                                            value="{{ $schoolPurchase->nama_barang }}" autofocus autocomplete="off">
                                        @error('nama_barang')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Harga Satuan</label>
                                        <input type="text" id="harga-update-{{ $schoolPurchase->id }}"
                                            name="harga_satuan" class="form-control"
                                            value="{{ $schoolPurchase->harga_satuan }}" autofocus autocomplete="off">
                                        @error('harga_satuan')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah</label>
                                        <input type="number" id="jumlah_baik-update-{{ $schoolPurchase->id }}"
                                            name="jumlah_baik" class="form-control"
                                            value="{{ $schoolPurchase->jumlah_baik }}" autofocus autocomplete="off">
                                        @error('jumlah_baik')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label class="form-label">Total Harga</label>
                                        <input type="text" id="total-update-{{ $schoolPurchase->id }}"
                                            name="total_harga" class="form-control"
                                            value="{{ $schoolPurchase->total_harga }}" autofocus autocomplete="off">
                                        @error('total_harga')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pembeli</label>
                                        <input type="text" name="pembeli" class="form-control"
                                            value="{{ $schoolPurchase->pembeli }}" autofocus autocomplete="off">
                                        @error('pembeli')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Toko</label>
                                        <input type="text" name="toko" class="form-control"
                                            value="{{ $schoolPurchase->toko }}" autofocus autocomplete="off">
                                        @error('toko')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <textarea rows="3" name="deskripsi" class="form-control" autofocus autocomplete="off">{{ $schoolPurchase->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="gambar">Upload Gambar</label>
                                        <input type="file" name="gambar[]" id="gambar" class="form-control"
                                            multiple>
                                        @error('gambar')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('[id^="harga-update-"]').forEach((hargaInput) => {
            const id = hargaInput.id.split('-').pop();
            const jumlahInput = document.getElementById(`jumlah_baik-update-${id}`);
            const totalInput = document.getElementById(`total-update-${id}`);

            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

            function calculateTotal() {
                const harga = parseFloat(hargaInput.value.replace(/[^,\d]/g, '')) || 0;
                const jumlah = parseFloat(jumlahInput.value) || 0;
                const total = harga * jumlah;
                totalInput.value = formatRupiah(total.toString(), 'Rp. ');
            }
            hargaInput.addEventListener('input', function(e) {
                hargaInput.value = formatRupiah(this.value, 'Rp. ');
                calculateTotal();
            });
            jumlahInput.addEventListener('input', calculateTotal);
        });
    </script>
@endsection
