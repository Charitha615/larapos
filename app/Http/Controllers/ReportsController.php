<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Location;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Tax;
use App\Models\Terminal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{

    public function index()
    {
        $data = [
            [
                'name' => 'PLU Sales Report',
                'route' => 'plu'
            ],
            [
                'name' => 'Cashier Totals Report',
                'route' => 'cashier'
            ],
            [
                'name' => 'Department Sales Report',
                'route' => 'department'
            ],
            [
                'name' => 'Sub Department Sales Report',
                'route' => 'sub'
            ],
            [
                'name' => 'Financial Summery Report',
                'route' => 'financial'
            ],
            [
                'name' => 'Hourly Activity Report',
                'route' => 'hourly'
            ],
            [
                'name' => 'Daily Total Report',
                'route' => 'daily'
            ],
            [
                'name' => 'Monthly Department Total Report',
                'route' => 'department'
            ],
            [
                'name' => 'Product List Report',
                'route' => 'product'
            ],
        ];
        return view('reports.index', compact('data'));
    }

    public function action($slug)
    {
        switch ($slug) {
            case 'cashier':
                $html = 'reports.cashier';
                break;
            case 'department':
                $html = 'reports.monthly-department';
                break;
            case 'sub':
                $html = 'reports.sub-department';
                break;
            case 'daily':
                $html = 'reports.daily';
                break;
            case 'product':
                $html = 'reports.product';
                break;
            default:
                $html = 'reports.action';
        }

        $location = Location::all();
        $terminal = Terminal::all();

        return view("{$html}", compact('location', 'terminal', 'slug'));
    }

    public function generateReport(Request $request, $slug)
    {
        $pdf = "";
        $data = $request->all();
        $from = Carbon::parse($request->from_date);
        $to = Carbon::parse($request->to_date);
        if ($slug == 'daily') {
            $daily_report = OrderItem::selectRaw('SUM(price) as sum,created_at')
                ->groupBy('order_id', 'created_at')
                ->orderBy('created_at', 'asc')
                ->get();
            $pdf = PDF::loadView('reports.pdf.salres-report', compact('daily_report', 'data'));
        }

        if ($slug == 'product') {
            $items = Item::all();
            $items->load('department', 'department.parent');
            $pdf = PDF::loadView('reports.pdf.product', compact('items', 'data'));
        }

        if ($slug == 'hourly') {

        }
        if ($slug == 'sub') {
            $items = DB::table('transaction_detail')
                ->join('item', 'transaction_detail.item_id', '=', 'item.item_id')
                ->select(
                    DB::raw('SUM(transaction_detail.item_price) as total'),
                    DB::raw('SUM(transaction_detail.item_id) as quantity'),
                    DB::raw('item.description as des')
                )->groupBy('transaction_detail.item_price', 'item.description','transaction_detail.item_id')
                ->whereBetween('transaction_detail.created_date', [$from, $to])
                ->get();
            $pdf = PDF::loadView('reports.pdf.sub', compact('items', 'data'));
        }
//       $data =  \DB::table('order_items')
//           ->join('orders', 'order_items.order_id', '=', 'orders.id')
//
//           ->select(
//               DB::raw('SUM(order_items.price) as total'),
//               DB::raw('SUM(orders.customer_id) as customer'),
//               DB::raw('SUM(order_items.created_at) as create')
//           )
//           ->groupBy( 'order_items.created_at','orders.customer_id','order_items.price')
//           ->get();
//       dd($data);
//        $pdf = PDF::loadView('reports.pdf.monthly');
        $pdf->set_paper("A4", "portrait");
        return $pdf->stream();
    }
}
