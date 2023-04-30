<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SalesReportGenerator
{
    public function download(Request $request);
}
