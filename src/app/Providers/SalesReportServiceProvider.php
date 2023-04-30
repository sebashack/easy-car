<?php

namespace App\Providers;

use App\Interfaces\SalesReportGenerator;
use App\Util\SalesReportCsv;
use App\Util\SalesReportPdf;
use Illuminate\Support\ServiceProvider;

class SalesReportServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SalesReportGenerator::class, function ($app, $params) {
            $reportType = $params['report_type'];
            if ($reportType == 'pdf') {
                return new SalesReportPdf();
            } elseif ($reportType == 'csv') {
                return new SalesReportCsv();
            }
        });
    }
}
