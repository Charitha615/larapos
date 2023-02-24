<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\LocationTableDetails;
use App\Http\Resources\LocationTableDetailsResource;
use App\Http\Requests\LocationTableDetailsStoreRequest;
use App\Http\Requests\LocationTableDetailsUpdateRequest;

use Illuminate\Http\Request;

class LocationTableDetailsController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $location_table_details_list = new LocationTableDetails();
        if ($request->search) {
            $location_table_details_list = $location_table_details_list->where('area', 'LIKE', "%{$request->search}%");
        }
        // $location_table_details_list = $location_table_details_list->latest()->paginate(10);
        $location_table_details_list = $location_table_details_list->orderBy('location_id')->orderBy('start_number')->paginate(10);
        $location_list = Location::select('location_id', 'location_name', 'number_of_tables')->orderBy('location_name')->get();
        if (request()->wantsJson()) {
            return LocationTableDetailsResource::collection($location_table_details_list);
        }
        return view('location_table_details.index')
            ->with('location_table_details_list', $location_table_details_list)
            ->with(compact('location_list'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $location_list = Location::select('location_id', 'location_name', 'number_of_tables')->orderBy('location_name')->get();
        $location_table_details = LocationTableDetails::select('location_table_detail_id', 'location_id', 'start_number', 'end_number', 'area')->orderBy('start_number')->get();
        return view('location_table_details.create')
            ->with(compact('location_list'))
            ->with(compact('location_table_details'));
    }

    // Store a newly created resource in storage.
    public function store(LocationTableDetailsStoreRequest $request)
    {
        $location_table_details = LocationTableDetails::create([
            'location_id' => $request->location_id,
            'area' => $request->area,
            'start_number' => $request->start_number,
            'end_number' => $request->end_number,
        ]);

        if (!$location_table_details) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while adding location table details.');
        }

        if ($request->from_route == 'location') {
            // REMEMBER: The below line returns ALL locations (a COLLECTION) in the table.
            $location = new Location();
            // echo $location->count();
            // echo "<br><br>";
            // REMEMBER: The below line returns the FIRST element in the matching result set (a Location object).
            // If first() has not been used then another COLLECTION containing matching results (even there is only one record or none) would have been returned.
            $location = $location->where('location_id', '=', $request->location_id)->first();
            // echo $location->count();
            // echo "<br><br>";
            // echo $location->location_name;
            // echo "<br><br>";
            // $location = Location::select('location_id', 'location_name', 'number_of_tables')->where('location_id', $request->location_id)->get();
            $location_list = Location::select('location_id', 'location_name', 'number_of_tables')->orderBy('location_name')->get();
            $location_table_details = LocationTableDetails::select('location_table_detail_id', 'location_id', 'start_number', 'end_number', 'area')->orderBy('start_number')->get();
            return redirect()->route('location.show', $request->location_id)
                ->with('success', 'Success, location table details has been added.')
                ->with(compact('location_list'))
                ->with(compact('location_table_details'));
        }

        return redirect()->route('location_table_details.index')->with('success', 'Success, location table details has been added.');
    }

    // Display the specified resource.
    public function show(LocationTableDetails $location_table_details)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(int $location_table_detail_id)
    {
        $location_list = Location::select('location_id', 'location_name', 'number_of_tables')->orderBy('location_name')->get();
        $location_table_details = LocationTableDetails::find($location_table_detail_id);
        $location_table_details_list = LocationTableDetails::select('location_table_detail_id', 'location_id', 'start_number', 'end_number', 'area')->orderBy('start_number')->get();
        return view('location_table_details.edit')
            ->with('location_table_detail_id', $location_table_detail_id)
            ->with('location_id', $location_table_details->location_id)
            ->with(compact('location_list'))
            ->with(compact('location_table_details'))
            ->with(compact('location_table_details_list'));
    }

    // Update the specified resource in storage.
    public function update(LocationTableDetailsUpdateRequest $request, int $location_table_detail_id)
    {
        $location_table_details = LocationTableDetails::find($location_table_detail_id);
        $location_table_details->location_id = $request->location_id;
        $location_table_details->area = $request->area;
        $location_table_details->start_number = $request->start_number;
        $location_table_details->end_number = $request->end_number;

        if (!$location_table_details->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the location table details.');
        }
        $location = Location::find($request->location_id);
        $location_list = Location::select('location_id', 'location_name', 'number_of_tables')->orderBy('location_name')->get();
        $location_table_details = LocationTableDetails::select('location_table_detail_id', 'location_id', 'start_number', 'end_number', 'area')->orderBy('start_number')->get();
        return view('location.show')
            ->with('success', 'Success, location table details has been updated.')
            ->with('location', $location)
            ->with(compact('location_list'))
            ->with(compact('location_table_details'));
    }

    // Remove the specified resource from storage.
    public function destroy(int $location_table_detail_id)
    {
        // $location_table_details->delete();
        LocationTableDetails::destroy($location_table_detail_id);
        return response()->json([
            'success' => true
        ]);
    }
}
