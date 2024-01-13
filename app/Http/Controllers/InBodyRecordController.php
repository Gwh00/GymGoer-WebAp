<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InBodyRecord;

class InBodyRecordController extends Controller
{
    public function generate()
    {
        $qrCode = QrCode::size(300)->generate('https://th.bing.com/th/id/OIP.asWMWjQ450NvTpFNgLVfUAHaJl?pid=ImgDet&rs=1');
        return response($qrCode)->header('Content-Type', 'image/png');
    }
}
