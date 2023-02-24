<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModifiersCategoryResource;
use App\Models\ModifiersCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ModifiersCategoryStoreRequest;
use App\Http\Requests\ModifiersCategoryUpdateRequest;
use App\Models\Modifier;

class ModifiersCategoryController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $modifiers_categories = new ModifiersCategory();
        if ($request->search) {
            $modifiers_categories = $modifiers_categories->where('description', 'LIKE', "%{$request->search}%");
        }
        // $modifiers_categories = $modifiers_categories->latest()->paginate(10);
        $modifiers_categories = $modifiers_categories->orderBy('description')->paginate(10);
        if (request()->wantsJson()) {
            return ModifiersCategoryResource::collection($modifiers_categories);
        }
        return view('modifiers_category.index')
            ->with('modifiers_categories', $modifiers_categories);
    }

    // Search result.
    public function search(Request $request)
    {
        $modifiers_categories = new ModifiersCategory();
        if ($request->filled('search')) {
            $modifiers_categories = $modifiers_categories->where('description', 'LIKE', "%{$request->search}%")->orderBy('description')->paginate(10);
        }
        return view('modifiers_category.index')
            ->with('modifiers_categories', $modifiers_categories)
            ->with('search', $request->search);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('modifiers_category.create');
    }

    // Store a newly created resource in storage.
    public function store(ModifiersCategoryStoreRequest $request)
    {
        $modifiers_category = ModifiersCategory::create([
            'description' => $request->description,
        ]);

        if (!$modifiers_category) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Modifiers Category.');
        }
        return redirect()->route('modifiers_category.index')->with('success', 'Success, your Modifiers Category has been created.');
    }

    // Display the specified resource.
    public function show(int $modifiers_category_id)
    {
        $modifiers_category = ModifiersCategory::find($modifiers_category_id);
        $modifiers_category_list = ModifiersCategory::select('modifiers_category_id', 'description')->orderBy('description')->get();
        $modifiers = Modifier::select('modifier_id', 'modifiers_category_id', 'price_x_tax', 'price_inc_tax', 'description')
            ->where('modifiers_category_id', '=', $modifiers_category_id)
            ->orderBy('description')->get();
        return view('modifiers_category.show')
            ->with('modifiers_category', $modifiers_category)
            ->with(compact('modifiers_category_list'))
            ->with(compact('modifiers'));
    }

    // Handle Ajax request.
    public function newModifiersCategory(Request $request)
    {
        $modifiers_category = ModifiersCategory::find($request->modifiers_category_id);
        $modifiers_category_list = ModifiersCategory::select('modifiers_category_id', 'description')->orderBy('description')->get();
        $modifiers = Modifier::select('modifier_id', 'modifiers_category_id', 'price_x_tax', 'price_inc_tax', 'description')
            ->where('modifiers_category_id', '=', $request->modifiers_category_id)
            ->orderBy('description')->get();
        $modifiers_category = $modifiers_category->toArray();
        $modifiers_category_list = $modifiers_category_list->toArray();
        $modifiers = $modifiers->toArray();
        // echo $modifiers;

        // return Response::json([
        return response()->json([
            'modifiers_category' => $modifiers_category,
            // 'modifiers_category_list' => $modifiers_category_list,
            'modifiers' => $modifiers
        ]);
    }

    // Show the form for editing the specified resource.
    public function edit(ModifiersCategory $modifiers_category)
    {
        return view('modifiers_category.edit')
            ->with('modifiers_category', $modifiers_category);
    }

    // Update the specified resource in storage.
    public function update(ModifiersCategoryUpdateRequest $request, ModifiersCategory $modifiers_category)
    {
        $modifiers_category->description = $request->description;

        if (!$modifiers_category->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'s a problem while updating the Modifiers Category.');
        }
        return redirect()->route('modifiers_category.index')->with('success', 'Success, your Modifiers Category has been updated.');
    }

    // Remove the specified resource from storage.
    public function destroy(ModifiersCategory $modifiers_category)
    {
        $modifiers_category->delete();
        return response()->json([
            'success' => true
        ]);
        // return redirect()->route('modifiers_category.index')->with('success', 'Success, your modifiers_category has been deleted.');
        // return back();
        // return redirect()->back()->with('success', 'Success, your modifiers_category has been deleted.');
        // return view('modifiers_category.index')->with('success', 'Success, your modifiers_category has been deleted.');
    }

    
}
