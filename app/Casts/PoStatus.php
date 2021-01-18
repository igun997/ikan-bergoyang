<?php


namespace App\Casts;


class PoStatus
{
    const  MENUNGGU_VERIFIKASI_OWNER = 0;
    const  MENUNGGU_KONFIRMASI_GUDANG = 1;
    const  SEDANG_DIPROSES = 2;
    const  BARANG_SEDANG_DITERIMA = 3;
    const  BARANG_SELESAI_DITERIMA = 4;
    const  DITOLAK_OWNER = 5;
    const  DIBATALKAN_GUDANG = 6;


    public static function lang($level)
    {
        if ($level == self::MENUNGGU_VERIFIKASI_OWNER){
            return "Menuggu Verifikasi Pemilik";
        }elseif ($level == self::MENUNGGU_KONFIRMASI_GUDANG){
            return "Menunggu Konfirmasi Gudang";
        }elseif ($level == self::SEDANG_DIPROSES){
            return "Sedang Di Proses";
        }elseif ($level == self::BARANG_SEDANG_DITERIMA){
            return "Barang Sedang Diterima";
        }elseif ($level == self::BARANG_SELESAI_DITERIMA){
            return "Barang Selesai Diterima";
        }elseif ($level == self::DITOLAK_OWNER){
            return "PO Ditolak Pemilik";
        }elseif ($level == self::DIBATALKAN_GUDANG){
            return "PO Dibatalkan Gudang";
        }
    }

    public static function select($level)
    {
        $select = [];
        for ($i = 0; $i <= 6; $i++){
            $select[] = [
                "id"=>$i,
                "text"=>self::lang($i),
                "selected"=>($level == $i)
            ];
        }
        return $select;
    }
}
