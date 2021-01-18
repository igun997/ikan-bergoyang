<?php


namespace App\Casts;


class PoDetailStatus
{
    const  MENUNGGU_PROSES_SUPLIER = 0;
    const  BARANG_SEDANG_TERIMA = 1;
    const  BARANG_SELESAI_DI_TERIMA = 2;


    public static function lang($level)
    {
        if ($level == self::MENUNGGU_PROSES_SUPLIER){
            return "Menunggu Proses Dari Suplier";
        }elseif ($level == self::BARANG_SEDANG_TERIMA){
            return "Barang Sedang Diterima";
        }elseif ($level == self::BARANG_SELESAI_DI_TERIMA){
            return "Barang Selesai Diterima";
        }
    }

    public static function select($level)
    {
        $select = [];
        for ($i = 0; $i <= 2; $i++){
            $select[] = [
                "id"=>$i,
                "text"=>self::lang($i),
                "selected"=>($level == $i)
            ];
        }
        return $select;
    }
}
