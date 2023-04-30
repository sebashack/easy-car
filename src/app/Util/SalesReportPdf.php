<?php

namespace App\Util;

use App\Interfaces\SalesReportGenerator;
use Illuminate\Http\Request;

class SalesReportPdf implements SalesReportGenerator
{
    public function download(Request $request): void
    {
        dd('Pdf generator');
    }
}
