<?php 
namespace App\Models;

use CodeIgniter\Model;

class transaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_transaksi', 'ket_transaksi', 'jenis_transaksi', 'tanggal_transaksi', 'total_transaksi', 'status_transaksi'];

    public function getTransaksi($id = false)
    {
        if($id === false){
            return $this
            ->orderBy('id_transaksi', 'DESC')
            ->findAll();
        } else {
            return $this
            ->where(['id_transaksi' => $id])
            ->first();
        }   
    }

    public function getTransaksiByJenis($jenis)
    {
        return $this
            ->where(['jenis_transaksi' => $jenis])
            ->orderBy('id_transaksi', 'DESC')
            ->findAll();
    }

    public function getLaporanTransaksi($tgl_awal = null, $tgl_akhir = null, $jenis_transaksi = null)
    {
        if ($jenis_transaksi == null) {
            return $this
                ->select('transaksi.*, transaksi.tanggal_transaksi as tanggal')
                ->where('tanggal_transaksi >=', $tgl_awal)
                ->where('tanggal_transaksi <=', $tgl_akhir)
                ->orderBy('id_transaksi', 'DESC')
                ->findAll();
        } else {
            return $this
                ->select('transaksi.*, transaksi.tanggal_transaksi as tanggal')
                ->where('tanggal_transaksi >=', $tgl_awal)
                ->where('tanggal_transaksi <=', $tgl_akhir)
                ->where('jenis_transaksi', $jenis_transaksi)
                ->orderBy('id_transaksi', 'DESC')
                ->findAll();
        }
    }

    public function getTransaksiKeluarByYearMonth($year, $month)
    {
        return $this
            ->select('COUNT(*) as jml_transaksi')
            ->where('YEAR(tanggal_transaksi)', $year)
            ->where('MONTH(tanggal_transaksi)', $month)
            ->where('jenis_transaksi', '1')
            ->groupBy('MONTH(tanggal_transaksi)')
            ->orderBy('MONTH(tanggal_transaksi)', 'ASC')
            ->findAll();
    }

    public function getTransaksiMasukByYearMonth($year, $month)
    {
        return $this
            ->select('COUNT(*) as jml_transaksi')
            ->where('YEAR(tanggal_transaksi)', $year)
            ->where('MONTH(tanggal_transaksi)', $month)
            ->where('jenis_transaksi', '2')
            ->groupBy('MONTH(tanggal_transaksi)')
            ->orderBy('MONTH(tanggal_transaksi)', 'ASC')
            ->findAll();
    }
}


?>