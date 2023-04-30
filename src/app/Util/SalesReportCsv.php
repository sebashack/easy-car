<?php

namespace App\Util;

use App\Interfaces\SalesReportGenerator;
use Illuminate\Http\Request;

class SalesReportCsv implements SalesReportGenerator
{
    public function download(Request $request): void
    {
        dd('Csv generator');
    }
}
