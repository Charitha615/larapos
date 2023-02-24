<?php

namespace App\Http\Controllers;

use App\Http\Resources\TerminalOptionDetailResource;
use App\Models\TerminalOptionDetail;
use App\Models\Keyboard;
use App\Models\PriceLevel;
use App\Models\Terminal;
use App\Models\TerminalOption;
use Illuminate\Http\Request;
use App\Http\Requests\TerminalOptionDetailStoreRequest;
use App\Http\Requests\TerminalOptionDetailUpdateRequest;
use Illuminate\Support\Facades\DB;

class TerminalOptionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyboards = Keyboard::select('keyboard_id', 'description')->get();
        $price_levels = PriceLevel::select('price_level_id', 'description')->get();
        $terminals = Terminal::select('terminal_id', 'description')->get();
        // $terminal_option_detail_list = new TerminalOptionDetail();
        // $unterminal_option_detail_listits = $terminal_option_detail_list->latest()->paginate(10);
        // $terminal_option_detail_list = $terminal_option_detail_list->orderBy('type')->orderBy('purpose')->orderBy('description')->paginate();
        $terminal_option_detail_list = TerminalOptionDetail::all();
        if (request()->wantsJson()) {
            return TerminalOptionDetailResource::collection($terminal_option_detail_list);
        }
        return view('terminal_option_detail.index')
            ->with('terminal_option_detail_list', $terminal_option_detail_list)
            ->with('keyboards', $keyboards)
            ->with('price_levels', $price_levels)
            ->with('terminals', $terminals);
    }

    /**
     * Search result.
     */
    public function search(Request $request)
    {
        $terminal_option_detail_list = new TerminalOptionDetail();
        if ($request->filled('search')) {
            $terminal_option_detail_list = $terminal_option_detail_list->where('description', 'LIKE', "%{$request->search}%")->orderBy('description')->paginate(10);
            // return redirect()->route('terminal_option_detail.index')->with('terminal_option_detail_list', $terminal_option_detail_list);
        }
        return view('terminal_option_detail.index')
            ->with('terminal_option_detail_list', $terminal_option_detail_list)
            ->with('search', $request->search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terminal_option_detail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TerminalOptionDetailStoreRequest $request)
    {
        $terminal_option_detail = TerminalOptionDetail::create([            
            'description' => $request->description,
            'type' => $request->type,
            'purpose' => $request->purpose
        ]);

        if (!$terminal_option_detail) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Terminal Option Detail.');
        }
        return redirect()->route('terminal_option_detail.index')->with('success', 'Success, your Terminal Option Detail has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TerminalOptionDetail  $terminal_option_detail
     * @return \Illuminate\Http\Response
     */
    public function show(TerminalOptionDetail $terminal_option_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TerminalOptionDetail  $terminal_option_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(TerminalOptionDetail $terminal_option_detail)
    {
        return view('terminal_option_detail.edit')
            ->with('terminal_option_detail', $terminal_option_detail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TerminalOptionDetail  $terminal_option_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        echo $request;
        // $terminal_option_detail->description = $request->description;
        // $terminal_option_detail->type = $request->type;

        // if (!$terminal_option_detail->save()) {
        //     return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the Terminal Option Detail.');
        // }
        // return redirect()->route('terminal_option_detail.index')->with('success', 'Success, your Terminal Option Detail has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TerminalOptionDetail  $terminal_option_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TerminalOptionDetail $terminal_option_detail)
    {
        $terminal_option_detail->delete();
        return response()->json([
            'success' => true
        ]);
        // return redirect()->route('terminal_option_detail.index')->with('success', 'Success, your TerminalOptionDetail has been deleted.');
        // return back();
        // return redirect()->back()->with('success', 'Success, your TerminalOptionDetail has been deleted.');
        // return view('terminal_option_detail.index')->with('success', 'Success, your TerminalOptionDetail has been deleted.');
    }

    public function updatetype(Request $request)
    {
        $count = 0;

        foreach ($request->terminal_option_id as $toi) {
            TerminalOption::where('terminal_option_id', $toi)
                ->update([
                    'terminal_value' => $request->terminal_value[$count]
                ]);

            $count++;
        }

        return redirect()->route('terminal_option_detail.index')->with('success', 'Success, your Terminal Option Detail has been updated.');
    }

    public function newTerminal(Request $request)
    {
        $keyboards = Keyboard::select('keyboard_id', 'description')->get();
        $price_levels = PriceLevel::select('price_level_id', 'description')->get();

        $terminal_details = DB::table('terminal_option')
            ->select('terminal_option.terminal_option_id', 
                'terminal_option.terminal_id', 
                'terminal_option.terminal_option_detail_id', 
                'terminal_option.terminal_value',
                'terminal_option_detail.terminal_purpose', 
                'terminal_option_detail.description', 
                'terminal_option_detail.type'
                )
            ->join('terminal_option_detail', 'terminal_option_detail.terminal_option_detail_id', '=', 'terminal_option.terminal_option_detail_id')
            ->where('terminal_option.terminal_id', '=', $request->terminal_id)
            ->get();

        return response()->json([
            'terminal_details' => $terminal_details,
            'keyboards' => $keyboards,
            'price_levels' => $price_levels
        ]);
    }
}
