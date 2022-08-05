<?php

namespace App\Http\Controllers;

use App\Models\ReportProduct;
use App\Models\Store;
use App\Models\StoreArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index() {
        $area = StoreArea::all();
        $are = DB::table('store_area')
        ->join('store', 'store_area.area_id', 'store.area_id')
        ->join('report_product', 'store.store_id', 'report_product.store_id')
        ->select('area_name', \DB::raw('sum(compliance) as jumlah'))->groupBy('area_name')->get();

        $allDataReport = ReportProduct::all()->count();

        $name = [];
        $jumlah = [];

        foreach ($are as $areax => $values) {
            $name[$areax] = $values->area_name;
            $jumlah[$areax] = number_format($values->jumlah/$allDataReport * 100 , 2) ;
        };

        return view('welcome', [
            'area' => $area,
            'ara' => $are,
            'name' => $name,
            'jumlah' => $jumlah
        ]);

    }
}
