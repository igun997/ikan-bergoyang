<?php

namespace App\Http\Controllers\Admin;

use App\Models\Po;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PoController extends Controller
{
    use ViewTrait;
    public function __construct()
    {
        $this->base = "admin.po";
    }

    public function index()
    {
        $title = "Data PO";
        $po = Po::all();
        return $this->loadView("index",compact("title","po"));
    }
}
