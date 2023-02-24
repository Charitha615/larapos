<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Terminal;
use App\Models\TerminalOption;
use App\Models\TerminalOptionDetail;
use App\Http\Requests\TerminalOptionUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TerminalOptionController extends Controller
{
    // Store a newly created resource in storage.
    public function update(TerminalOptionUpdateRequest $request, int $terminal_id)
    {
        $ids = $request->input('terminal_option_id');
        $options = $request->input('terminal_option');
        foreach ($ids as $id) {
            $terminal_option = TerminalOption::find($id);
            $terminal_option->terminal_value = $options['terminal_value'][$id];
            $terminal_option->terminal_purpose = $options['terminal_purpose'][$id];
            if (!$terminal_option->save()) {
                return redirect()->back()->with('error', 'Sorry, there\'s a problem while saving the terminal detail.');
            }
        }

        $terminal = Terminal::find($terminal_id);
        $location = Location::find($terminal->location_id);
        $terminals = Terminal::select('terminal_id', 'description', 'location_id')
            ->orderBy('description')
            ->get();
        $terminal_options = TerminalOption::select('terminal_option_id', 'terminal_id', 'terminal_option_detail_id', 'terminal_value', 'terminal_purpose')
            ->where('terminal_id', $terminal_id)
            ->orderBy('terminal_option_detail_id')
            ->get();
        $terminal_option_details = TerminalOptionDetail::select('terminal_option_detail_id', 'description', 'type', 'purpose')
            ->orderBy('description')
            ->get();

        return view('terminal.show')
            ->with('success', 'Success, Terminal detail has been saved.')
            ->with('terminal', $terminal)
            ->with('location', $location)
            ->with(compact('terminals'))
            ->with(compact('terminal_options'))
            ->with(compact('terminal_option_details'));
    }



    //For api///////////////////////////////////////////////////

    public function getTerminalOption(Request $request) {
        $validated = $request->validate([
            'terminal_id' => 'required',
        ]);


        $terminal_option = DB::table('terminal_option')
                    ->rightJoin('terminal_option_detail', 'terminal_option.terminal_option_detail_id', '=', 'terminal_option_detail.terminal_option_detail_id')
                    ->where('terminal_option.terminal_id', '=', $request->terminal_id)
                    ->get();

        if ($terminal_option) {
            return response()->json([
                'error' => false,
                'data' => $terminal_option
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
        
    }
}
