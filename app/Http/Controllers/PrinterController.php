<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use App\Http\Requests\PrinterStoreRequest;
use App\Http\Requests\PrinterUpdateRequest;
use App\Models\PrinterGroup;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PrinterController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        //
    }

    // Show the form for creating a new resource.
    public function create()
    {
        //
    }

    // Store a newly created resource in storage.
    public function store(PrinterStoreRequest $request)
    {
        $result = Printer::create([
            'printer_group_id' => $request->printer_group_id,
            'description' => $request->description,
            'path' => $request->path
        ]);

        if (!$result) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while adding the printer.');
        }

        // $printer = new Printer();
        // $printer = $printer->where('printer_group_id', '=', $request->printer_group_id)->first();
        $printer_group_list = PrinterGroup::select('printer_group_id', 'description')->orderBy('description')->get();
        $printers = Printer::select('printer_id', 'printer_group_id', 'description', 'path')
            ->where('printer_group_id', '=', $request->printer_group_id)
            ->orderBy('description')->get();
        return redirect()->route('printer_group.show', $request->printer_group_id)
            ->with('success', 'Success, printer information has been added.')
            ->with(compact('printer_group_list'))
            ->with(compact('printers'));
    }

    // Display the specified resource.
    public function show(Printer $printer)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(int $printer_id)
    {
        $printer_group_list = PrinterGroup::select('printer_group_id', 'description', 'client_print_order')->orderBy('description')->get();
        $printer = Printer::find($printer_id);
        $printer_list = Printer::select('printer_id', 'printer_group_id', 'description', 'path')->orderBy('description')->get();
        return view('printer.edit')
            ->with('printer_id', $printer_id)
            ->with('printer_group_id', $printer->printer_group_id)
            ->with(compact('printer_group_list'))
            ->with(compact('printer'))
            ->with(compact('printer_list'));
    }

    // Update the specified resource in storage.
    public function update(PrinterUpdateRequest $request, int $printer_id)
    {
        $printer = Printer::find($printer_id);
        $printer->printer_group_id = $request->printer_group_id;
        $printer->description = $request->description;
        $printer->path = $request->path;

        if (!$printer->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the printer information.');
        }
        $printer_group = PrinterGroup::find($request->printer_group_id);
        $printer_group_list = PrinterGroup::select('printer_group_id', 'description', 'client_print_order')->orderBy('client_print_order')->get();
        $printers = Printer::select('printer_id', 'printer_group_id', 'description', 'path')
            ->where('printer_group_id', '=', $request->printer_group_id)
            ->orderBy('description')->get();
        return view('printer_group.show')
            ->with('printer_group', $printer_group)
            ->with(compact('printer_group_list'))
            ->with(compact('printers'));
    }

    // Remove the specified resource from storage.
    public function destroy(int $printer_id)
    {
        Printer::destroy($printer_id);
        return response()->json([
            'success' => true
        ]);
    }

    //For Api//////////////////////////////////////////////
    public function getPrinters()
    {
        $data = DB::table('printer')
            ->select('printer.*', 'printer_group.description')
            ->join('printer_group', 'printer_group.printer_group_id', '=', 'printer.printer_group_id')
            ->get();

        if ($data) {
            return response()->json([
                'error' => false,
                'data' => $data
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
    }
}
