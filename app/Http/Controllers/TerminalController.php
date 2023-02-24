<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use App\Models\Location;
use App\Http\Resources\TerminalResource;
use Illuminate\Http\Request;
use App\Http\Requests\TerminalStoreRequest;
use App\Http\Requests\TerminalUpdateRequest;
use App\Models\TerminalOption;
use App\Models\TerminalOptionDetail;
use Illuminate\Support\Facades\DB;

class TerminalController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $terminal_list = new Terminal();
        if ($request->search) {
            $terminal_list = $terminal_list->where('description', 'LIKE', "%{$request->search}%");
        }
        // $terminal_list = $terminal_list->latest()->paginate(10);
        $terminal_list = $terminal_list->orderBy('description')->paginate(10);
        $location_list = Location::select('location_id', 'location_name')->orderBy('location_name')->get();
        if (request()->wantsJson()) {
            return TerminalResource::collection($terminal_list);
        }
        return view('terminal.index')
            ->with('terminal_list', $terminal_list)
            ->with(compact('location_list'));
    }

    // Search result.
    public function search(Request $request)
    {
        $terminal_list = new Terminal();
        $location_list = Location::select('location_id', 'location_name')->orderBy('location_name')->get();
        if ($request->filled('search')) {
            $terminal_list = $terminal_list->where('description', 'LIKE', "%{$request->search}%")->orderBy('description')->paginate(10);
        }
        return view('terminal.index')
            ->with('terminal_list', $terminal_list)
            ->with(compact('location_list'))
            ->with('search', $request->search);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $location_list = Location::select('location_id', 'location_name')->orderBy('location_name')->get();
        $terminal_list = Terminal::select('terminal_id', 'description', 'location_id', 'has_updates')->orderBy('description')->get();
        return view('terminal.create')
            ->with(compact('location_list'))
            ->with(compact('terminal_list'));
    }

    // Store a newly created resource in storage.
    public function store(TerminalStoreRequest $request)
    {
        $terminal = Terminal::create([
            //'terminal_id' => $request->terminal_id,
            'location_id' => $request->location_id,
            'description' => $request->description,
            'has_updates' => $request->has_updates,
        ]);

        if (!$terminal) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while adding Terminal.');
        } else {
            // Insert blank terminal options
            $terminal_option_details = TerminalOptionDetail::select('terminal_option_detail_id', 'description', 'type', 'terminal_purpose')
                ->orderBy('terminal_option_detail_id')
                ->get();
            foreach ($terminal_option_details as $detail) {
                $terminal_option['terminal_id'] = $terminal->terminal_id;
                $terminal_option['terminal_option_detail_id'] = $detail->terminal_option_detail_id;
                $terminal_option['terminal_value'] = '';
                $terminal_option['terminal_purpose'] = '';
                TerminalOption::create($terminal_option);
            }
        }

        return redirect()->route('terminal.index')->with('success', 'Success, Terminal has been added.');
    }

    // Display the specified resource.
    public function show(int $terminal_id)
    {
        $terminal = Terminal::find($terminal_id);
        $location = Location::find($terminal->location_id);
        $terminals = Terminal::select('terminal_id', 'description', 'location_id')->orderBy('description')->get();
        $terminal_options = TerminalOption::select('terminal_option_id', 'terminal_id', 'terminal_option_detail_id', 'terminal_value', 'terminal_purpose')
            ->where('terminal_id', $terminal_id)
            ->orderBy('terminal_option_detail_id')
            ->get();
        $terminal_option_details = TerminalOptionDetail::select('terminal_option_detail_id', 'description', 'type', 'terminal_purpose')
            ->orderBy('description')
            ->get();
        return view('terminal.show')
            ->with('terminal', $terminal)
            ->with('location', $location)
            ->with(compact('terminals'))
            ->with(compact('terminal_options'))
            ->with(compact('terminal_option_details'));
    }

    // Show the form for editing the specified resource.
    public function edit(int $terminal_id)
    {
        $location_list = Location::select('location_id', 'location_name')->orderBy('location_name')->get();
        $terminal = Terminal::find($terminal_id);
        $terminal_list = Terminal::select('terminal_id', 'description', 'location_id', 'has_updates')->orderBy('description')->get();

        return view('terminal.edit')
            // ->with('terminal_id', $terminal_id)
            ->with('location_id', $terminal->location_id)
            ->with(compact('location_list'))
            ->with(compact('terminal'));
        // ->with(compact('terminal_list'));
    }

    // Update the specified resource in storage.
    public function update(TerminalUpdateRequest $request, int $terminal_id)
    {
        $terminal = Terminal::find($terminal_id);
        //$terminal->terminal_id = $request->terminal_id;
        $terminal->description = $request->description;
        $terminal->location_id = $request->location_id;
        $terminal->has_updates = $request->has_updates;

        if (!$terminal->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the Terminal.');
        }
        // $location = Location::find($request->location_id);
        $location_list = Location::select('location_id', 'location_name')->orderBy('location_name')->get();
        $terminal_list = new Terminal();
        $terminal_list = $terminal_list->orderBy('description')->paginate(10);

        return redirect()->route('terminal.index')
            ->with('success', 'Success, Terminal has been updated.')
            ->with('terminal_list', $terminal_list)
            ->with(compact('location_list'));
    }

    // Remove the specified resource from storage.
    public function destroy(int $terminal_id)
    {
        //$terminal->delete();
        Terminal::destroy($terminal_id);
        return response()->json([
            'success' => true
        ]);
    }

    //For API//////////////////////////////////////////////////////
    public function getTerminalDetails(Request $request)
    {
        $details = DB::table('terminal')
            ->select('terminal.description', 'terminal.location_id', 'location.location_name')
            ->join('location', 'location.location_id', '=', 'terminal.location_id')
            ->where('terminal.terminal_id', $request->terminal_id)
            ->first();

        if ($details) {
            return response()->json([
                'error' => false,
                'data' => $details
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
    }
}
