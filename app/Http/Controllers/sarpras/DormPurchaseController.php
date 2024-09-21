<?php

namespace App\Http\Controllers\sarpras;

use ZipArchive;
use Barryvdh\DomPDF\Facade\Pdf;
use Termwind\Components\Dd;
use App\Http\Controllers\Controller;
use App\Http\Requests\sarpras\DormPurchaseRequest;
use App\Models\sarpras\DormPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DormPurchaseController extends Controller
{
    public function index(Request $request)
    {
        $query = DormPurchase::query();

        if ($request->filled('tahun_pembelian')) {
            $query->whereYear('tanggal_pembelian', $request->tahun_pembelian);
        }

        if ($request->filled('bulan_pembelian')) {
            $query->whereMonth('tanggal_pembelian', $request->bulan_pembelian);
        }

        $dormPurchases = $query->paginate(10); // Menggunakan paginate alih-alih get

        return view('sarpras.asrama.index', compact('dormPurchases'));
    }
    public function goodItems()
    {
        $dormPurchases = DormPurchase::all();
        return view("sarpras.asrama.goodItems", compact("dormPurchases"));
    }
    public function damagedItems()
    {
        $dormPurchases = DormPurchase::all();
        return view("sarpras.asrama.damagedItems", compact("dormPurchases"));
    }
    public function store(DormPurchaseRequest $request)
    {
        // dd($request->all());/
        $request->validated();

        $data = $request->except('gambar');

        $dormPurchase = DormPurchase::create($data);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $path = $file->storeAs('dorm_purchases', $file->getClientOriginalName(), 'public');
                $dormPurchase->images()->create(['path' => $path]);
            }
        }

        return redirect("/sarpras/dorm-purchase")->with("success", "Berhasil menambahkan data Pembelian Asrama.");
    }

    public function edited($id)
    {
        $dormPurchase = DormPurchase::findOrFail($id);
        return view("admin.asrama.edit", compact("dormPurchase"));
    }

    public function update(DormPurchaseRequest $request, $id)
    {
        $request->validated();

        $dormPurchase = DormPurchase::findOrFail($id);
        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari database dan storage
            $oldImages = $dormPurchase->images;
            foreach ($oldImages as $image) {
                Storage::disk('public')->delete('dorm_purchases/' . $image->path);
                $image->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('gambar') as $file) {
                $path = $file->storeAs('dorm_purchases', $file->getClientOriginalName(), 'public');
                $dormPurchase->images()->create(['path' => $path]);
            }
        }

        $dormPurchase->update($data);

        return redirect("/sarpras/dorm-purchase")->with("success", "Berhasil memperbarui data Pembelian Asrama.");
    }
    public function getDamaged($id)
    {
        $dormPurchase = DormPurchase::findOrFail($id);
        return view("sarpras.asrama.damagedItems", compact("dormPurchase"));
    }
    public function showForm()
    {
        $dormPurchases = DormPurchase::all();
        return view('sarpras.asrama.damagedItems', compact('dormPurchases'));
    }
    public function edit($id)
    {
        $dormPurchase = DormPurchase::findOrFail($id);
        return view("sarpras.asrama.edit", compact("dormPurchase"));
    }
    public function damaged(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'jumlah_rusak' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255',
        ]);

        // Temukan data pembelian sekolah
        $dormPurchase = DormPurchase::findOrFail($id);

        // Pastikan jumlah rusak yang dimasukkan tidak melebihi jumlah baik yang tersedia
        if ($request->jumlah_rusak > $dormPurchase->jumlah_baik) {
            return redirect()->back()->withErrors(['jumlah_rusak' => 'Jumlah rusak tidak boleh melebihi jumlah baik yang tersedia.']);
        }

        // Kurangi jumlah baik dengan jumlah rusak yang dimasukkan
        $dormPurchase->jumlah_baik -= $request->jumlah_rusak;
        $dormPurchase->jumlah_rusak += $request->jumlah_rusak;
        $dormPurchase->keterangan = $request->keterangan;
        $dormPurchase->save();

        return redirect('/damaged-items-dorm')->with('success', 'Data barang rusak berhasil diperbarui.');
    }
    public function destroy($id)
    {
        DormPurchase::findOrFail($id)->delete();
        return redirect("/sarpras/dorm-purchase")->with("success", "Berhasil menghapus data Pembelian Asrama.");
    }
    public function print()
    {
        $dormPurchases = DormPurchase::all();
        $pdf = Pdf::loadView('sarpras.asrama.print', compact('dormPurchases'));
        return $pdf->stream('Sarpras Asrama.pdf');
    }
    public function pdf()
    {
        $dormPurchases = DormPurchase::get();
        return view("sarpras.asrama.print", compact("dormPurchases"));
    }

    public function download($id)
    {
        $dormPurchase = DormPurchase::findOrFail($id);
        $images = $dormPurchase->images;

        if ($images->count() == 1) {
            $image = $images->first();
            $path = storage_path('app/public/' . $image->path);

            if (!file_exists($path)) {
                abort(404, 'Image not found.');
            }

            return response()->download($path);
        } else {
            $zip = new ZipArchive;
            $fileName = 'download.zip';
            $zipPath = storage_path('app/public/' . $fileName);

            // Hapus file ZIP lama jika ada
            if (file_exists($zipPath)) {
                unlink($zipPath);
            }

            // Coba buka file ZIP baru
            if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
                foreach ($images as $image) {
                    $imagePath = storage_path('app/public/' . $image->path);

                    if (file_exists($imagePath)) {
                        $zip->addFile($imagePath, basename($image->path));
                    } else {
                        Log::warning('Image not found: ' . $imagePath);
                    }
                }
                $zip->close();

                // Periksa apakah file ZIP berhasil dibuat dan ukurannya lebih dari 0
                if (file_exists($zipPath) && filesize($zipPath) > 0) {
                    return response()->download($zipPath)->deleteFileAfterSend(true);
                } else {
                    abort(500, 'Failed to create ZIP file or ZIP file is empty.');
                }
            } else {
                abort(500, 'Could not open ZIP file.');
            }
        }
    }
}
