<?php


namespace App\Casts;


use App\Models\Po;

class PoHelper
{
    public static function no_po()
    {
        $counter = (Po::count()+1);
        return "PO"."-".date("y")."-".str_pad($counter,4,0,STR_PAD_LEFT);
    }
}
