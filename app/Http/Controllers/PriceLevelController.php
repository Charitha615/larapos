<?php

namespace App\Http\Controllers;

use App\Http\Resources\PriceLevelResource;
use App\Models\PriceLevel;
use App\Models\Location;
use App\Models\PriceLevelLocation;

use Illuminate\Http\Request;
use App\Http\Requests\PriceLevelStoreRequest;
use App\Http\Requests\PriceLevelUpdateRequest;

class PriceLevelController extends Controller
{
     // Display a listing of the resource.
    public function index(Request $request)
    {
        $price_levels = new PriceLevel();
        if ($request->search) {
            $price_levels = $price_levels->where('description', 'LIKE', "%{$request->search}%");
        }
        $price_levels = $price_levels->orderBy('description')->paginate(10);
        if (request()->wantsJson()) {
            return PriceLevelResource::collection($price_levels);
        }
        return view('price_level.index')
            ->with('price_levels', $price_levels);
    }

     // Search result.
    public function search(Request $request)
    {
        $price_levels = new PriceLevel();
        if ($request->filled('search')) {
            $price_levels = $price_levels->where('description', 'LIKE', "%{$request->search}%")->orderBy('description')->paginate(10);
        }
        return view('price_level.index')
            ->with('price_levels', $price_levels)
            ->with('search', $request->search);
    }

     // Show the form for creating a new resource.
    public function create()
    {
        $locations = Location::select('location_id', 'location_name')->orderBy('location_name')->get();

        return view('price_level.create')
        ->with(compact('locations'));
    }

     // Store a newly created resource in storage.
    public function store(PriceLevelStoreRequest $request)
    {
        $price_level = PriceLevel::create([
            'description' => $request->description,
        ]);

        if (!$price_level) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Price Level.');
        } else {
            // Add locations
            foreach ($request->input('location_id') as $loc_id) {
                $price_level_location['price_level_id'] = $price_level->price_level_id;
                $price_level_location['location_id'] = $loc_id;
                PriceLevelLocation::create($price_level_location);
            }
        }

        return redirect()->route('price_level.index')
        ->with('success', 'Success, your Price Level has been created.');
    }

     // Display the specified resource.
    public function show(PriceLevel $price_level)
    {
        //
    }

     // Show the form for editing the specified resource.
    public function edit(int $price_level_id)
    {
        $price_level = PriceLevel::find($price_level_id);
        $locations = Location::select('location_id', 'location_name')->orderBy('location_name')->get();
        $price_level_locations = PriceLevelLocation::select('price_level_location_id', 'price_level_id', 'location_id')->get();
        
        return view('price_level.edit')
            ->with(compact('price_level'))
            ->with(compact('locations'))
            ->with(compact('price_level_locations'));
        }

     // Update the specified resource in storage.
    public function update(PriceLevelUpdateRequest $request, int $price_level_id)
    {
        $price_level = PriceLevel::find($price_level_id);
        $price_level->description = $request->description;

        if (!$price_level->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the Price Level.');
        } else {
            $price_level_locations = PriceLevelLocation::select('price_level_location_id', 'price_level_id', 'location_id')
            ->where('price_level_id', $price_level->price_level_id)
            ->get();
            // Delete locations first
            foreach ($price_level_locations as $pll) {
                PriceLevelLocation::destroy($pll->price_level_location_id);
            }

            // Add locations
            foreach ($request->input('location_id') as $loc_id) {
                $price_level_location['price_level_id'] = $price_level->price_level_id;
                $price_level_location['location_id'] = $loc_id;
                PriceLevelLocation::create($price_level_location);
            }
        }

        $price_levels = new PriceLevel();
        $price_levels = $price_levels->orderBy('description')->paginate(10);

        return redirect()->route('price_level.index')
        ->with('success', 'Success, your Price Level has been updated.')
        ->with('price_levels', $price_levels);
    }

     // Remove the specified resource from storage.
    public function destroy(int $price_level_id)
    {
        PriceLevel::destroy($price_level_id);
        return response()->json([
            'success' => true
        ]);
    }
}
