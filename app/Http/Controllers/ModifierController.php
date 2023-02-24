<?php

namespace App\Http\Controllers;

use App\Models\Modifier;
use App\Http\Requests\ModifierStoreRequest;
use App\Http\Requests\ModifierUpdateRequest;
use App\Models\ModifiersCategory;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ModifierController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        //
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $modifierCategories = new ModifiersCategory();
        $modifierCategories = $modifierCategories->all();
        return view('modifier.create')->with('modifierCategories', $modifierCategories);
    }

    // Store a newly created resource in storage.
    public function store(ModifierStoreRequest $request)
    {
        $result = Modifier::create([
            'modifiers_category_id' => $request->modifiers_category_id,
            'description' => $request->description,
            // 'price_x_tax' => $request->price_x_tax,
            'price_inc_tax' => $request->price_inc_tax,
        ]);

        if (!$result) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while adding the modifier.');
        }
        return redirect()->back()
            ->with('success', 'Success, Modifier information has been added!');
    }

    // Display the specified resource.
    public function show(Modifier $modifier)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(int $modifier_id)
    {
        $modifiers_category_list = ModifiersCategory::select('modifiers_category_id', 'description')->orderBy('description')->get();
        $modifier = Modifier::find($modifier_id);
        $modifiers_list = Modifier::select('modifier_id', 'modifiers_category_id', 'price_x_tax', 'price_inc_tax', 'description')->orderBy('description')->get();
        return view('modifier.edit')
            ->with('modifier_id', $modifier_id)
            ->with('modifiers_category_id', $modifier->modifiers_category_id)
            ->with(compact('modifiers_category_list'))
            ->with(compact('modifier'))
            ->with(compact('modifiers_list'));
    }

    // Update the specified resource in storage.
    public function update(ModifierUpdateRequest $request, int $modifier_id)
    {
        $modifier = Modifier::find($modifier_id);
        $modifier->modifiers_category_id = $request->modifiers_category_id;
        $modifier->description = $request->description;
        $modifier->price_x_tax = $request->price_x_tax;
        $modifier->price_inc_tax = $request->price_inc_tax;

        if (!$modifier->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the modifier information.');
        }
        $modifiers_category = ModifiersCategory::find($request->modifiers_category_id);
        $modifiers_category_list = ModifiersCategory::select('modifiers_category_id', 'description')->orderBy('description')->get();
        $modifiers = Modifier::select('modifier_id', 'modifiers_category_id', 'price_x_tax', 'price_inc_tax', 'description')
            ->where('modifiers_category_id', '=', $request->modifiers_category_id)
            ->orderBy('description')->get();
        return view('modifiers_category.show')
            ->with('modifiers_category', $modifiers_category)
            ->with(compact('modifiers_category_list'))
            ->with(compact('modifiers'));
    }

    // Remove the specified resource from storage.
    public function destroy(int $modifier_id)
    {
        Modifier::destroy($modifier_id);
        return response()->json([
            'success' => true
        ]);
    }
}
