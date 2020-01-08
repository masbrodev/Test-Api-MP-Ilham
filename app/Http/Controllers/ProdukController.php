<?php

namespace App\Http\Controllers;

use App\Http\Resources\KategoriProdukCollection;
use App\Http\Resources\ProdukCollection;
use App\Http\Resources\ProdukOptionCollection;
use App\Kategori_Produk;
use App\Katergori_Produk;
use App\Produk;
use App\Produk_Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class ProdukController extends Controller
{
    public function index()
    {
        return new ProdukCollection(Produk::with(['kategori', 'option', 'sub_kategori'])->get());
    }

    public function produkId($id)
    {
        return new ProdukCollection(Produk::with(['kategori', 'option'])->where('id_produk', $id)->get());
    }

    public function option()
    {
        return new ProdukOptionCollection(Produk_Option::with(['value', 'produk'])->get());
        // return Produk_Option::with('value')->get();
    }

    public function prdk()
    {
        $produk = DB::table('produk')->leftJoin('produk_option', 'produk_option.produk_id', '=', 'produk_option.produk_id')->leftJoin('produk_option_value', 'produk_option.id_produk_option', '=', 'produk_option_value.produk_option_id')->get();
        return $produk;
    }

    public function kategori()
    {
        return new KategoriProdukCollection(Kategori_Produk::with('sub_kategori_produk')->get());
    }

    public function add()
    {
        $data['produk'] = Produk::with('kategori')->where('id_pelapak', 1)->get();
        return view('pelapak/produk/data', $data);
    }

    public function form_tambah()
    {
        $data['kategori'] = Kategori_Produk::all();
        return view('pelapak/produk/tambah', $data);
    }

    public function store_produk(Request $request)
    {
        $foto = $request->file('foto');
        $nama_foto = $foto->getClientOriginalName();
        $foto->move('foto_produk', $nama_foto);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'id_kategori_produk' => $request->kategori,
            'satuan' => $request->satuan,
            'berat' => $request->berat,
            // 'ket' => $request->ket,
            'keterangan' => $request->deskripsi,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'diskon' => $request->diskon,
            'stok' => $request->stok,
            'foto' => $nama_foto,
            'id_pelapak' => '1'
        ]);

        return redirect('administrator/produk');
    }

    public function edit($id)
    {
        $data['produk'] = Produk::find($id);
        $data['kategori'] = Kategori_Produk::all();

        return view ('pelapak/produk/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori_produk = $request->kategori;
        $produk->satuan = $request->satuan;
        $produk->berat = $request->berat;
        $produk->keterangan = $request->deskripsi;
        $produk->harga_modal = $request->harga_modal;
        $produk->harga_jual = $request->harga_jual;
        $produk->diskon = $request->diskon;
        $produk->stok = $request->stok;
        $produk->id_pelapak = 1;

        $foto = $request->file('foto');

        if (!empty($foto)) {
            File::delete('foto_produk/'.$produk->foto);
            $nama_foto = $foto->getClientOriginalName();
            $foto->move('foto_produk', $nama_foto);
            $produk->foto = $nama_foto;
        }

        $produk->save();

        return redirect('administrator/produk');
    }

    public function hapus($id)
    {
        $produk = Produk::find($id);
        File::delete('foto_produk/'.$produk->foto);
        $hapus = Produk::where('id_produk', $id)->delete();

        if ($hapus) {
            return redirect('administrator/produk');
        }
    }
}
