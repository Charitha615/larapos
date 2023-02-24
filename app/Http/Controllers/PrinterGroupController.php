<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrinterGroupResource;
use App\Models\PrinterGroup;
use App\Models\Printer;
use Illuminate\Http\Request;
use App\Http\Requests\PrinterGroupStoreRequest;
use App\Http\Requests\PrinterGroupUpdateRequest;

class PrinterGroupController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $printer_groups = new PrinterGroup();
        if ($request->search) {
            $printer_groups = $printer_groups->where('description', 'LIKE', "%{$request->search}%");
        }
        // $printer_groups = $printer_groups->latest()->paginate(10);
        $printer_groups = $printer_groups->sortable()->orderBy('client_print_order')->paginate(10);
        if (request()->wantsJson()) {
            return PrinterGroupResource::collection($printer_groups);
        }
        return view('printer_group.index')
            ->with('printer_groups', $printer_groups);
    }

    // Search result.
    public function search(Request $request)
    {
        $printer_groups = new PrinterGroup();
        if ($request->filled('search')) {
            $printer_groups = $printer_groups->where('description', 'LIKE', "%{$request->search}%")->orderBy('description')->paginate(10);
        }
        return view('printer_group.index')
            ->with('printer_groups', $printer_groups)
            ->with('search', $request->search);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('printer_group.create');
    }

    // Store a newly created resource in storage.
    public function store(PrinterGroupStoreRequest $request)
    {
        $printer_group = PrinterGroup::create([
            'type' => $request->type,
            'description' => $request->description,
            'client_print_order' => $request->client_print_order
        ]);

        if (!$printer_group) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Printer Group.');
        }
        return redirect()->route('printer_group.index')->with('success', 'Success, your Printer Group has been created.');
    }

    // Display the specified resource.
    public function show(int $printer_group_id)
    {
        $printer_group = PrinterGroup::find($printer_group_id);
        $printer_group_list = PrinterGroup::select('printer_group_id', 'description', 'client_print_order')->orderBy('client_print_order')->get();
        $printers = Printer::select('printer_id', 'printer_group_id', 'description', 'path')
            ->where('printer_group_id', '=', $printer_group_id)
            ->orderBy('description')->get();
        return view('printer_group.show')
            ->with('printer_group', $printer_group)
            ->with(compact('printer_group_list'))
            ->with(compact('printers'));
    }

    // Handle Ajax request.
    public function newPrinterGroup(Request $request)
    {
        $printer_group = PrinterGroup::find($request->printer_group_id);
        $printer_group_list = PrinterGroup::select('printer_group_id', 'description', 'client_print_order')->orderBy('client_print_order')->get();
        $printers = Printer::select('printer_id', 'printer_group_id', 'description', 'path')
            ->where('printer_group_id', '=', $request->printer_group_id)
            ->orderBy('description')->get();
        $printer_group = $printer_group->toArray();
        $printer_group_list = $printer_group_list->toArray();
        $printers = $printers->toArray();
        // echo $printers;

        // return Response::json([
        return response()->json([
            'printer_group' => $printer_group,
            // 'printer_group_list' => $printer_group_list,
            'printers' => $printers
        ]);
    }

    // Show the form for editing the specified resource.
    public function edit(PrinterGroup $printer_group)
    {
        return view('printer_group.edit')
            ->with('printer_group', $printer_group);
    }

    // Update the specified resource in storage.
    public function update(PrinterGroupUpdateRequest $request, PrinterGroup $printer_group)
    {
        $printer_group->description = $request->description;

        if (!$printer_group->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the Printer Group.');
        }
        return redirect()->route('printer_group.index')->with('success', 'Success, your Printer Group has been updated.');
    }

    // Remove the specified resource from storage.
    public function destroy(PrinterGroup $printer_group)
    {
        $printer_group->delete();
        return response()->json([
            'success' => true
        ]);
        // return redirect()->route('printer_group.index')->with('success', 'Success, your Printer Group has been deleted.');
        // return back();
        // return redirect()->back()->with('success', 'Success, your Printer Group has been deleted.');
        // return view('printer_group.index')->with('success', 'Success, your Printer Group has been deleted.');
    }
}
