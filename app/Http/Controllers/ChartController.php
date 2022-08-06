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
        ->select('area_name', \DB::raw('sum(compliance) as jumlah'), \DB::raw('count(compliance) as total_row'))->groupBy('area_name')->get();

        $name = [];
        $jumlah = [];

        foreach ($are as $areax => $values) {
            $name[$areax] = $values->area_name;
            $jumlah[$areax] = number_format($values->jumlah/$values->total_row * 100 , 2) ;
        };

        return view('welcome', [
            'area' => $area,
            'ara' => $are,
            'name' => $name,
            'jumlah' => $jumlah
        ]);

    }

    public function filter(Request $request){
        $idArea = $request->area ;
        $dateFrom = date('Y-m-d', strtotime($request->date_from)) ;
        $dateEnd = date('Y-m-d', strtotime($request->date_end)) ;
        $area = StoreArea::all();
        $are = DB::table('store_area')
        ->join('store', 'store_area.area_id', 'store.area_id')
        ->join('report_product', 'store.store_id', 'report_product.store_id')
        ->select('area_name', \DB::raw('sum(compliance) as jumlah'), \DB::raw('count(compliance) as total_row'))->groupBy('area_name')
        ->whereBetween('report_product.tanggal',[$dateFrom, $dateEnd])
        ->where('store.area_id', $idArea)
        ->get();
        
        $name = [];
        $jumlah = [];

        foreach ($are as $areax => $values) {
            $name[$areax] = $values->area_name;
            $jumlah[$areax] = number_format($values->jumlah/$values->total_row * 100 , 2) ;
        };

        return view('welcome', [
            'area' => $area,
            'ara' => $are,
            'name' => $name,
            'jumlah' => $jumlah
        ]);

    }
}
