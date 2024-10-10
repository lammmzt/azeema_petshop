<?php 
namespace App\Controllers;

use App\Models\layananModel;

class Layanan extends BaseController
{
    protected $layananModel;
    public function __construct()
    {
        $this->layananModel = new layananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Layanan',
            'main_menu' => 'Layanan',
            'menu_aktif' => 'Layanan',
            'validation' => \Config\Services::validation(),
            'layanan' => $this->layananModel->getLayanan()
        ];

        return view('Admin/Layanan/index', $data);
    }

    public function Simpan()
    {
        if (!$this->validate([
            'nama_layanan' => [
                'rules' => 'required|is_unique[layanan.nama_layanan]',
                'errors' => [
                    'required' => '{field} layanan harus diisi.',
                    'is_unique' => '{field} layanan sudah terdaftar.'
                ]
                ],
            'harga_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} layanan harus diisi.'
                ]
                ],
            'deskripsi_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} layanan harus diisi.'
                ]
                ],
            'promo_layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} layanan harus diisi.'
                ]
                ],
            'foto_layanan' => [
                'rules' => 'uploaded[foto_layanan]|max_size[foto_layanan,1024]|is_image[foto_layanan]|mime_in[foto_layanan,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih {field} layanan terlebih dahulu.',
                    'max_size' => 'Ukuran {field} layanan terlalu besar.',
                    'is_image' => 'File yang dipilih bukan {field} layanan.',
                    'mime_in' => 'File yang dipilih bukan {field} layanan.'
                ]
                ]
        ])) {
            return redirect()->to('/Layanan')->withInput();
        }

        $fileFoto = $this->request->getFile('foto_layanan');
        $namaFoto = $fileFoto->getRandomName();
        $fileFoto->move('assets/img/Layanan', $namaFoto);

        $this->layananModel->save([
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'harga_layanan' => $this->request->getVar('harga_layanan'),
            'deskripsi_layanan' => $this->request->getVar('deskripsi_layanan'),
            'promo_layanan' => $this->request->getVar('promo_layanan'),
            'foto_layanan' => $namaFoto
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/Layanan');

    }


    public function update()
    {
        $id_layanan = $this->request->getVar('id_layanan');
        $fotoLama = $this->request->getVar('foto_layanan_lama');
        $fileFoto = $this->request->getFile('foto_layanan');

        if ($fileFoto->getError() == 4) {
            $namaFoto = $fotoLama;
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('assets/img/Layanan', $namaFoto);
            if ($fotoLama != 'default.jpg') {
                unlink('assets/img/Layanan/' . $fotoLama);
            }
        }

        $this->layananModel->save([
            'id_layanan' => $id_layanan,
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'harga_layanan' => $this->request->getVar('harga_layanan'),
            'deskripsi_layanan' => $this->request->getVar('deskripsi_layanan'),
            'promo_layanan' => $this->request->getVar('promo_layanan'),
            'foto_layanan' => $namaFoto
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/Layanan');
    }

    public function Hapus()
    {
        $id_layanan = $this->request->getVar('id');
        $fotoLayanan = $this->layananModel->find($id_layanan);
        if ($fotoLayanan['foto_layanan'] != 'default.jpg') {
            unlink('assets/img/Layanan/' . $fotoLayanan['foto_layanan']);
        }
        $this->layananModel->delete($id_layanan);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/Layanan');
    }
}


?>