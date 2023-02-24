<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\VoucherType;
use App\Models\Terminal;
use App\Models\VoucherTerminal;
use App\Http\Resources\VoucherResource;
use App\Http\Requests\VoucherStoreRequest;
use App\Http\Requests\VoucherUpdateRequest;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $vouchers = new Voucher();
        if ($request->search) {
            $vouchers = $vouchers->where('description', 'LIKE', "%{$request->search}%");
        }
        $vouchers = $vouchers->orderBy('description')->paginate(10);
        $voucher_types = VoucherType::select('voucher_type_id', 'description')->orderBy('description')->get();
        if (request()->wantsJson()) {
            return VoucherResource::collection($vouchers);
        }
        return view('voucher.index')
            ->with('vouchers', $vouchers)
            ->with(compact('voucher_types'));
    }

    // Search result.
    public function search(Request $request)
    {
        $vouchers = new Voucher();
        if ($request->filled('search')) {
            $vouchers = $vouchers->where('description', 'LIKE', "%{$request->search}%")->orderBy('description')->paginate(10);
        }
        $voucher_types = VoucherType::select('voucher_type_id', 'description')->orderBy('description')->get();
        return view('voucher.index')
            ->with('vouchers', $vouchers)
            ->with(compact('voucher_types'))
            ->with('search', $request->search);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $voucher_types = VoucherType::select('voucher_type_id', 'description')->orderBy('description')->get();
        $vouchers = Voucher::select('voucher_id', 'voucher_type_id', 'description', 'value', 'start_date', 'end_date', 'print_receipt', 'unlimited')->orderBy('description')->get();
        $terminals = Terminal::select('terminal_id', 'location_id', 'description', 'has_updates')->orderBy('description')->get();
        return view('voucher.create')
            ->with(compact('voucher_types'))
            ->with(compact('vouchers'))
            ->with(compact('terminals'));
    }

    // Store a newly created resource in storage.
    public function store(VoucherStoreRequest $request)
    {
        $voucher = Voucher::create([
            'voucher_type_id' => $request->voucher_type_id,
            'description' =>  $request->description,
            'value' =>  $request->value,
            'start_date' =>  $request->start_date,
            'end_date' =>  $request->end_date,
            'unlimited' =>  $request->unlimited,
            'print_receipt' =>  $request->print_receipt,
        ]);

        if (!$voucher) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while adding voucher.');
        } else {
            // Add terminals
            foreach ($request->input('terminal_id') as $tid) {
                $vaucher_terminal['voucher_id'] = $voucher->voucher_id;
                $vaucher_terminal['terminal_id'] = $tid;
                VoucherTerminal::create($vaucher_terminal);
            }
        }

        return redirect()->route('voucher.index')->with('success', 'Success, voucher has been added.');
    }

    // Display the specified resource.
    public function show(int $voucher_id)
    {
        $voucher = Voucher::find($voucher_id);
        $voucher_types = VoucherType::select('voucher_type_id', 'description')->orderBy('description')->get();
        return view('voucher.show')
            ->with('voucher', $voucher)
            ->with(compact('voucher_type_list'));
    }

    // Show the form for editing the specified resource.
    public function edit(int $voucher_id)
    {
        $voucher_types = VoucherType::select('voucher_type_id', 'description')->orderBy('description')->get();
        $vouchers = Voucher::select('voucher_id', 'voucher_type_id', 'description', 'value', 'start_date', 'end_date', 'print_receipt', 'unlimited')->orderBy('description')->get();
        $voucher = Voucher::find($voucher_id);
        $terminals = Terminal::select('terminal_id', 'location_id', 'description', 'has_updates')->orderBy('description')->get();
        $voucher_terminals = VoucherTerminal::select('voucher_terminal_id', 'voucher_id', 'terminal_id')->get();
        return view('voucher.edit')
            ->with(compact('voucher_types'))
            ->with(compact('vouchers'))
            ->with(compact('voucher'))
            ->with(compact('terminals'))
            ->with(compact('voucher_terminals'));
    }

    // Update the specified resource in storage.
    public function update(VoucherUpdateRequest $request, int $voucher_id)
    {
        $voucher = Voucher::find($voucher_id);
        $voucher->voucher_type_id = $request->voucher_type_id;
        $voucher->description = $request->description;
        $voucher->value = $request->value;
        $voucher->start_date = $request->start_date;
        $voucher->end_date = $request->end_date;
        $voucher->unlimited = $request->unlimited;
        $voucher->print_receipt = $request->print_receipt;

        if (!$voucher->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the voucher.');
        } else {
            $voucher_terminals = VoucherTerminal::select('voucher_terminal_id', 'voucher_id', 'terminal_id')->where('voucher_id', $voucher_id)->get();
            // Delete terminals first
            foreach ($voucher_terminals as $vt) {
                VoucherTerminal::destroy($vt->voucher_terminal_id);
            }

            // Add terminals
            foreach ($request->input('terminal_id') as $tid) {
                $voucher_terminal['voucher_id'] = $voucher->voucher_id;
                $voucher_terminal['terminal_id'] = $tid;
                VoucherTerminal::create($voucher_terminal);
            }
        }

        $vouchers = new Voucher();
        $vouchers = $vouchers->orderBy('description')->paginate(10);
        $voucher_types = VoucherType::select('voucher_type_id', 'description')->orderBy('description')->get();

        return redirect()->route('voucher.index')
            ->with('success', 'Success, voucher information has been updated.')
            ->with('vouchers', $vouchers)
            ->with(compact('voucher_types'));
    }

    // Remove the specified resource from storage.
    public function destroy(int $voucher_id)
    {
        Voucher::destroy($voucher_id);
        return response()->json([
            'success' => true
        ]);
    }


    //For Api////////////////////////////////////////////////////////////////

    public function getVouchers(Request $request)
    {
        $vouchers = DB::table('voucher')
            ->select('voucher.*', 'voucher_terminal.terminal_id')
            ->join('voucher_terminal', 'voucher_terminal.voucher_id', '=', 'voucher.voucher_id')
            ->where('voucher_terminal.terminal_id', $request->terminal_id)
            ->get();

        if ($vouchers) {
            return response()->json([
                'error' => false,
                'data' => $vouchers
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
    }
}
