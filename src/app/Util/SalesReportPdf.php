<?php

namespace App\Util;

use App\Interfaces\SalesReportGenerator;
use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SalesReportPdf implements SalesReportGenerator
{
    public function download(Request $request)
    {
        $pdfName = 'sales-report.pdf';
        $items = Item::all()->sortBy('created_at');
        $total = 0;

        foreach ($items as $item) {
            $total = $total + $item->getCar()->getPrice();
        }

        $report = ['items' => $items, 'total' => $total];
        $pdf = Pdf::loadView('layouts.salesReportPdf', compact('report'));

        return $pdf->download($pdfName);
    }
}
