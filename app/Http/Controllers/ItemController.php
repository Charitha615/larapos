<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Item;
use App\Models\ItemModifiersCategory;
use App\Models\ItemPriceLevelLocation;
use App\Models\ItemPrinter;
use App\Models\Location;
use App\Models\ModifiersCategory;
use App\Models\PriceLevel;
use App\Models\PriceLevelLocation;
use App\Models\Printer;
use App\Models\PrinterGroup;
use App\Models\Supplier;
use App\Models\Tax;
use App\Models\Unit;

class ItemController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $items = new Item();
        if ($request->search) {
            $items = $items->where('last_modified_date', 'LIKE', "%{$request->search}%")->orderBy('last_modified_date', 'desc');
        }
        $items = $items->sortable()->orderBy('last_modified_date', 'desc')->paginate(20);
        if (request()->wantsJson()) {
            return ItemResource::collection($items);
        }

        $departments = Department::select('department_id', 'parent_department_id', 'department_name')->orderBy('department_name')->get();
        $suppliers = Supplier::select('supplier_id', 'name')->orderBy('name')->get();
        $itemPriceLevelLocations = ItemPriceLevelLocation::select('item_id','inc_tax')->get();
        return view('item.index')
            ->with('items', $items)
            ->with(compact('departments'))
            ->with(compact('suppliers','itemPriceLevelLocations'));
    }

    // Search result.
    public function search(Request $request)
    {
        $items = new Item();
        if ($request->filled('search')) {
            $items = $items->where('description', 'LIKE', "%{$request->search}%")->orderBy('last_modified_date', 'desc')->paginate(20);
        } else {
            $items = $items->sortable()->orderBy('last_modified_date', 'desc')->paginate(20);
        }

        $departments = Department::select('department_id', 'parent_department_id', 'department_name')->orderBy('department_name')->get();
        $suppliers = Supplier::select('supplier_id', 'name')->orderBy('name')->get();
        $itemPriceLevelLocations = ItemPriceLevelLocation::select('item_id','inc_tax')->get();
        return view('item.index')
            ->with('items', $items)
            ->with('search', $request->search)
            ->with(compact('departments'))
            ->with(compact('suppliers','itemPriceLevelLocations'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $departments = Department::select('department_id', 'parent_department_id', 'department_name')->orderBy('department_name')->get();
        $suppliers = Supplier::select('supplier_id', 'name')->orderBy('name')->get();
        $units = Unit::select('unit_id', 'description')->orderBy('description')->get();
        $taxes = Tax::select('tax_id', 'description', 'rate')->orderBy('description')->get();
        $price_levels = PriceLevel::select('price_level_id', 'description')->orderBy('description')->get();
        $printer_groups = PrinterGroup::select('printer_group_id', 'description', 'client_print_order', 'type')->orderBy('client_print_order')->get();
        $printers = Printer::select('printer_id', 'printer_group_id', 'description', 'path')->orderBy('description')->get();
        $modifiers_categories = ModifiersCategory::select('modifiers_category_id', 'description')->orderBy('description')->get();

        //get last item from database
        $last_item = Item::select('department_id', 'unit_id', 'tax_id', 'supplier_id', 'plu_no')->orderBy('item_id', 'desc')->first();
        return view('item.create')
            ->with(compact('departments'))
            ->with(compact('suppliers'))
            ->with(compact('units'))
            ->with(compact('taxes'))
            ->with(compact('price_levels'))
            ->with(compact('printer_groups'))
            ->with(compact('printers'))
            ->with(compact('modifiers_categories'))
            ->with(compact('last_item'));
    }

    // Store a newly created resource in storage.
    public function store(ItemStoreRequest $request)
    {
        $item = Item::create([
            'description' => $request->description,
            'plu_no' => $request->plu_no,
            'department_id' => $request->department_id,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'number_of_units' => $request->number_of_units,
            'tax_id' => $request->tax_id,
            'carton_cost' => $request->carton_cost,
            'open_price' => $request->open_price,
            'open_description' => $request->open_description,
            'modifier_popup' => $request->modifier_popup,
            'inc_price_in_kp' => $request->inc_price_in_kp,
            'no_of_dockets' => $request->no_of_dockets,
            'kp_description' => $request->kp_description ?? $request->description,
        ]);

        if (!$item) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Item.');
        } else {
            // Add price level information
            $priceLevelIds = $request->input('price_level_id');
            $itemPriceLevels = $request->input('item_price_level');
            // Iterate through each price level
            if (!empty($priceLevelIds) && !empty($itemPriceLevels)) {
                foreach ($priceLevelIds as $plId) {
                    $locations = PriceLevelLocation::select('price_level_location_id', 'price_level_id', 'location_id')
                        ->where('price_level_id', $plId)
                        ->orderBy('price_level_id')
                        ->orderBy('location_id')
                        ->get();
                    // Iterate through each location
                    // foreach ($locations as $loc) {
                    $item_location_price_level['item_id'] = $item->item_id;
                    $item_location_price_level['price_level_id'] = $plId;
                    // $item_location_price_level['location_id'] = $loc->location_id;
                    // $item_location_price_level['x_tax'] = $itemPriceLevels['x_tax'][$plId];
                    $item_location_price_level['inc_tax'] = $itemPriceLevels['inc_tax'][$plId];
                    ItemPriceLevelLocation::create($item_location_price_level);
                    // }
                }
            }

            // Add printer information
            $printerIds = $request->input('printer_id');
            // Iterate through printers
            if (!empty($printerIds)) {
                foreach ($printerIds as $prId) {
                    $item_printer['item_id'] = $item->item_id;
                    $item_printer['printer_id'] = $prId;
                    ItemPrinter::create($item_printer);
                }
            }

            // Add modifier category information
            $modifiersCategoryerIds = $request->input('modifiers_category_id');
            // Iterate through printers
            if (!empty($modifiersCategoryerIds)) {
                foreach ($modifiersCategoryerIds as $mcId) {
                    $item_modifier_category['item_id'] = $item->item_id;
                    $item_modifier_category['modifiers_category_id'] = $mcId;
                    ItemModifiersCategory::create($item_modifier_category);
                }
            }
        }

        return redirect()->route('item.index')
            ->with('success', 'Success, Item has been created.');
    }

    // Show the form for editing the specified resource.
    public function edit(int $item_id)
    {
        $item = Item::find($item_id);
        $departments = Department::select('department_id', 'parent_department_id', 'department_name')->orderBy('department_name')->get();
        $suppliers = Supplier::select('supplier_id', 'name')->orderBy('name')->get();
        $units = Unit::select('unit_id', 'description')->orderBy('description')->get();
        $taxes = Tax::select('tax_id', 'description', 'rate')->orderBy('description')->get();
        $price_levels = PriceLevel::select('price_level_id', 'description')->orderBy('description')->get();
        $printer_groups = PrinterGroup::select('printer_group_id', 'description', 'client_print_order', 'type')->orderBy('client_print_order')->get();
        $printers = Printer::select('printer_id', 'printer_group_id', 'description', 'path')->orderBy('description')->get();
        $modifiers_categories = ModifiersCategory::select('modifiers_category_id', 'description')->orderBy('description')->get();
        $item_price_level_locations = ItemPriceLevelLocation::select('item_price_level_location_id', 'item_id', 'location_id', 'price_level_id', 'x_tax', 'inc_tax', 'gp')
            ->where('item_id', $item_id)
            ->orderBy('price_level_id')
            ->get();
        $item_printers = ItemPrinter::select('item_printer_id', 'item_id', 'printer_id')
            ->where('item_id', $item_id)
            ->orderBy('printer_id')
            ->get();
        $item_modifiers_categories = ItemModifiersCategory::select('item_modifiers_category_id', 'modifiers_category_id', 'item_id')
            ->where('item_id', $item_id)
            ->orderBy('modifiers_category_id')
            ->get();

        return view('item.edit')
            ->with(compact('item'))
            ->with(compact('departments'))
            ->with(compact('suppliers'))
            ->with(compact('units'))
            ->with(compact('taxes'))
            ->with(compact('price_levels'))
            ->with(compact('printer_groups'))
            ->with(compact('printers'))
            ->with(compact('modifiers_categories'))
            ->with(compact('item_price_level_locations'))
            ->with(compact('item_printers'))
            ->with(compact('item_modifiers_categories'));
    }

    // Update the specified resource in storage.
    public function update(ItemUpdateRequest $request, int $item_id)
    {
        $item = Item::find($item_id);
        $item->description = $request->description;
        $item->plu_no = $request->plu_no;
        $item->department_id = $request->department_id;
        $item->supplier_id = $request->supplier_id;
        $item->unit_id = $request->unit_id;
        $item->number_of_units = $request->number_of_units;
        $item->tax_id = $request->tax_id;
        $item->carton_cost = $request->carton_cost;
        $item->open_price = $request->open_price;
        $item->open_description = $request->open_description;
        $item->modifier_popup = $request->modifier_popup;
        $item->inc_price_in_kp = $request->inc_price_in_kp;
        $item->no_of_dockets = $request->no_of_dockets;
        $item->kp_description = $request->kp_description;

        if (!$item->save()) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while updating the Item.');
        } else {
            // Process Item-Price Level information
            $item_price_level_locations = ItemPriceLevelLocation::select('item_price_level_location_id', 'item_id', 'location_id', 'price_level_id', 'x_tax', 'inc_tax', 'gp')
            ->where('item_id', $item_id)
            ->orderBy('price_level_id')
            ->get();
            foreach($item_price_level_locations as $ipl){
                ItemPriceLevelLocation::destroy($ipl->item_price_level_location_id);
            }
            // Add price level information
            $priceLevelIds = $request->input('price_level_id');
            $itemPriceLevels = $request->input('item_price_level');
            // Iterate through each price level
            if (!empty($priceLevelIds) && !empty($itemPriceLevels)) {
                foreach ($priceLevelIds as $plId) {
                    $locations = PriceLevelLocation::select('price_level_location_id', 'price_level_id', 'location_id')
                        ->where('price_level_id', $plId)
                        ->orderBy('price_level_id')
                        ->orderBy('location_id')
                        ->get();
                    // Iterate through each location
                    // foreach ($locations as $loc) {
                    $item_location_price_level['item_id'] = $item->item_id;
                    $item_location_price_level['price_level_id'] = $plId;
                    // $item_location_price_level['location_id'] = $loc->location_id;
                    // $item_location_price_level['x_tax'] = $itemPriceLevels['x_tax'][$plId];
                    $item_location_price_level['inc_tax'] = $itemPriceLevels['inc_tax'][$plId];
                    ItemPriceLevelLocation::create($item_location_price_level);
                    // }
                }
            }

            // Process Item-Printer information
            $item_printers = ItemPrinter::select('item_printer_id', 'item_id', 'printer_id')
                ->where('item_id', $item_id)
                ->orderBy('printer_id')
                ->get();
            // Delete item modifier categories first
            foreach ($item_printers as $ip) {
                ItemPrinter::destroy($ip->item_printer_id);
            }

            // Add printer information
            $printerIds = $request->input('printer_id');
            // Iterate through printers
            if (!empty($printerIds)) {
                foreach ($printerIds as $prId) {
                    $item_printer['item_id'] = $item->item_id;
                    $item_printer['printer_id'] = $prId;
                    ItemPrinter::create($item_printer);
                }
            }

            // Process Item-Modifier Category information
            $item_modifiers_categories = ItemModifiersCategory::select('item_modifiers_category_id', 'modifiers_category_id', 'item_id')
                ->where('item_id', $item_id)
                ->orderBy('item_modifiers_category_id')
                ->get();
            // Delete item modifier categories first
            foreach ($item_modifiers_categories as $im) {
                ItemModifiersCategory::destroy($im->item_modifiers_category_id);
            }

            // Add modifier category information
            $modifiersCategoryerIds = $request->input('modifiers_category_id');
            // Iterate through printers
            if (!empty($modifiersCategoryerIds)) {
                foreach ($modifiersCategoryerIds as $mcId) {
                    $item_modifier_category['item_id'] = $item->item_id;
                    $item_modifier_category['modifiers_category_id'] = $mcId;
                    ItemModifiersCategory::create($item_modifier_category);
                }
            }
        }

        return redirect()->route('item.index')->with('success', 'Success, the Item information has been updated.');
    }

    // Remove the specified resource from storage.
    public function destroy(int $terminal_id)
    {
        //$terminal->delete();
        Item::destroy($terminal_id);
        return response()->json([
            'success' => true
        ]);
    }


    //For Api /////////////////////////////////////////////////////////////////////
    public function getModifireCategories()
    {
        $item_modifire_categories = DB::table('item_modifiers_category')
            ->select('item_modifiers_category.*', 'modifiers_category.*')
            ->join('modifiers_category', 'modifiers_category.modifiers_category_id', '=', 'item_modifiers_category.modifiers_category_id')
            // ->where('item_modifiers_category.item_id', $request->item_id)
            ->get();

        $modifires = DB::table('item_modifiers_category')
            ->select('item_modifiers_category.*', 'modifiers_category.*', 'modifier.*')
            ->join('modifiers_category', 'modifiers_category.modifiers_category_id', '=', 'item_modifiers_category.modifiers_category_id')
            ->join('modifier', 'modifier.modifiers_category_id', '=', 'modifiers_category.modifiers_category_id')
            // ->where('item_modifiers_category.item_id', $request->item_id)
            ->get();

        if ($item_modifire_categories) {

            $result = array(
                "item_modifire_categories" => $item_modifire_categories,
                "modifires" => $modifires
            );

            return response()->json([
                'error' => false,
                'data' => $result
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
    }

    public function getItems()
    {
        $items = DB::table('keyboard_item')
        ->select('keyboard_item.*', 'item.*', 'item_price_level_location.inc_tax', 'item_printer.printer_id',
            'printer.description as p_des')
        ->join('item', 'item.item_id', '=', 'keyboard_item.item_id')
        ->join('item_price_level_location', 'item_price_level_location.item_id', '=', 'item.item_id')
        ->join('item_printer', 'item_printer.item_id', '=', 'item.item_id')
        ->join('printer', 'printer.printer_id', '=', 'item_printer.printer_id')
        ->get();

        if ($items) {
            return response()->json([
                'error' => false,
                'data' => $items
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
    }
}
