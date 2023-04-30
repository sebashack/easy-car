<?php

namespace App\Util;

use App\Interfaces\SalesReportGenerator;
use App\Models\Item;
use Illuminate\Http\Request;

class SalesReportCsv implements SalesReportGenerator
{
    public function download(Request $request)
    {
        $csvName = 'sales-report.csv';
        $items = Item::all()->sortBy('created_at');
        $columns = ['brand', 'model', 'color', 'price', 'sale_date'];

        $callback = function () use ($items, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($items as $item) {
                $car = $item->getCar();
                $carModel = $car->getCarModel();

                $row['brand'] = $carModel->getBrand();
                $row['model'] = $carModel->getModel();
                $row['color'] = $car->getColor();
                $row['price'] = $car->getPrice();
                $row['sale_date'] = $item->getCreatedAt().'UTC';

                fputcsv($file, [$row['brand'], $row['model'], $row['color'], $row['price'], $row['sale_date']]);
            }

            fclose($file);
        };

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$csvName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream($callback, 200, $headers);
    }
}
