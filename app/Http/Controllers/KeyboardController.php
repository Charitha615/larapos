<?php

namespace App\Http\Controllers;

use App\Http\Resources\KeyboardResource;
use App\Models\Keyboard;
use App\Models\KeyboardItem;
use App\Models\KeyboardSubDepartment;
use App\Models\KeyboardDepartment;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\KeyboardStoreRequest;
use App\Http\Requests\KeyboardUpdateRequest;
use Illuminate\Support\Facades\DB;

class KeyboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyboards = new Keyboard();
        // $keyboards = $keyboards->latest()->paginate(10);
        $keyboards = $keyboards->orderBy('description')->paginate(10);
        if (request()->wantsJson()) {
            return KeyboardResource::collection($keyboards);
        }
        return view('keyboard.index')
            ->with('keyboards', $keyboards);
    }

    /**
     * Search result.
     */
    public function search(Request $request)
    {
        $keyboards = new Keyboard();
        if ($request->filled('search')) {
            $keyboards = $keyboards->where('description', 'LIKE', "%{$request->search}%")->orderBy('description')->paginate(10);
            // return redirect()->route('keyboard.index')->with('keyboards', $keyboards);
        }
        return view('keyboard.index')
            ->with('keyboards', $keyboards)
            ->with('search', $request->search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keyboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KeyboardStoreRequest $request)
    {
        $keyboard = Keyboard::create([
            'description' => $request->description,
        ]);

        // Inserting Deparments>
        $departments = [
            ['department_name'=>'D1','keyboard_id'=>$keyboard->keyboard_id,'position'=>1],
            ['department_name'=>'D2','keyboard_id'=>$keyboard->keyboard_id,'position'=>2],
            ['department_name'=>'D3','keyboard_id'=>$keyboard->keyboard_id,'position'=>3],
            ['department_name'=>'D4','keyboard_id'=>$keyboard->keyboard_id,'position'=>4],
            ['department_name'=>'D5','keyboard_id'=>$keyboard->keyboard_id,'position'=>5],
            ['department_name'=>'D6','keyboard_id'=>$keyboard->keyboard_id,'position'=>6],
            ['department_name'=>'D7','keyboard_id'=>$keyboard->keyboard_id,'position'=>7],
            ['department_name'=>'D8','keyboard_id'=>$keyboard->keyboard_id,'position'=>8],
        ];

        DB::table('keyboard_department')->insert($departments);

        if (!$keyboard) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Keyboard.');
        }
        return redirect()->route('keyboard.index')->with('success', 'Success, your Keyboard has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keyboard  $keyboard
     * @return \Illuminate\Http\Response
     */
    public function show(Keyboard $keyboard)
    {
        return $keyboard;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keyboard  $keyboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Keyboard $keyboard)
    {
        return view('keyboard.edit')->with('keyboard', $keyboard);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keyboard  $keyboard
     * @return \Illuminate\Http\Response
     */
    public function update(KeyboardUpdateRequest $request, Keyboard $keyboard)
    {
        $keyboard->description = $request->description;

        if (!$keyboard->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating the Keyboard.');
        }
        return redirect()->route('keyboard.index')->with('success', 'Success, your Keyboard has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keyboard  $keyboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyboard $keyboard)
    { 
        $deps = KeyboardDepartment::where('keyboard_id', $keyboard->keyboard_id)->get();
        foreach ($deps as $dep) {
            $subDeps = KeyboardSubDepartment::where('keyboard_department_id', $dep->keyboard_department_id)->get();
            if ($subDeps) {
                foreach ($subDeps as $subDep) {
                    $keyboardItems = KeyboardItem::where('keyboard_sub_depatment_id', $subDep->keyboard_sub_department_id)->get();
                    if ($keyboardItems) {
                        foreach ($keyboardItems as $keyboardItem) {
                            $keyboardItem->delete();
                        }
                    }
                    $subDep->delete();
                }
            }
            $dep->delete();
        }
        $keyboard->delete();
        return response()->json([
            'success' => true
        ]);
        // return redirect()->route('keyboard.index')->with('success', 'Success, your keyboard has been deleted.');
        // return redirect()->back()->with('success', 'Success, your Keyboard has been deleted.');
        // return view('keyboard.index')->with('success', 'Success, your Keyboard has been deleted.');
    }

    public function getSubDepartment($keyboard_id, $keyboard_department_id = null, $keyboard_sub_department_id = null) {
        if (!empty($keyboard_department_id) & empty($keyboard_sub_department_id)) {
            $keyboard_departments = DB::table('keyboard_department')
                ->where('keyboard_id', $keyboard_id)
                ->get();

            $keyboard_sub_departments = DB::table('keyboard_sub_department')
                ->where('keyboard_department_id', $keyboard_department_id)
                ->get();
            
            $keyboard_items = DB::table('keyboard_item')
                ->where('keyboard_sub_depatment_id', $keyboard_sub_departments->first()->keyboard_sub_department_id ?? '')
                ->get();
                
            //get keyboard description 
            $keyboard_description = DB::table('keyboard')
                ->select('description')
                ->where('keyboard_id', $keyboard_id)
                ->first();

            //get keyboard department name
            $keyboard_department_name = DB::table('keyboard_department')
                ->select('department_name')
                ->where('keyboard_department_id', $keyboard_department_id)
                ->first();

            //get keyboard sub department name
            $keyboard_sub_department_name = DB::table('keyboard_sub_department')
                ->select('sub_department_name')
                ->where('keyboard_sub_department_id', $keyboard_sub_departments->first()->keyboard_sub_department_id ?? '')
                ->first();
            
            //get keyboard department id
            $dep_id = $keyboard_department_id;
            //get keyboard sub department id
            $sub_dep_id = $keyboard_sub_departments->first()->keyboard_sub_department_id ?? '';

        } else if (!empty($keyboard_sub_department_id)) {
            $keyboard_departments = DB::table('keyboard_department')
                ->where('keyboard_id', $keyboard_id)
                ->get();

            $keyboard_sub_departments = DB::table('keyboard_sub_department')
                ->where('keyboard_department_id', $keyboard_department_id)
                ->get();

            $keyboard_items = DB::table('keyboard_item')
                ->where('keyboard_sub_depatment_id', $keyboard_sub_department_id)
                ->get();

            //get keyboard description 
            $keyboard_description = DB::table('keyboard')
                ->select('description')
                ->where('keyboard_id', $keyboard_id)
                ->first();

            //get keyboard department name
            $keyboard_department_name = DB::table('keyboard_department')
                ->select('department_name')
                ->where('keyboard_department_id', $keyboard_department_id)
                ->first();

            //get keyboard sub department name
            $keyboard_sub_department_name = DB::table('keyboard_sub_department')
                ->select('sub_department_name')
                ->where('keyboard_sub_department_id', $keyboard_sub_department_id)
                ->first();
            
            //get keyboard department id
            $dep_id = $keyboard_department_id;
            //get keyboard sub department id
            $sub_dep_id = $keyboard_sub_department_id;

        } else {
            $keyboard_departments = DB::table('keyboard_department')->where('keyboard_id', $keyboard_id)->get();

            $keyboard_sub_departments = DB::table('keyboard_sub_department')
                ->where('keyboard_department_id', $keyboard_departments->first()->keyboard_department_id ?? '')
                ->get();

            $keyboard_items = DB::table('keyboard_item')
                ->where('keyboard_sub_depatment_id', $keyboard_sub_departments->first()->keyboard_sub_department_id ?? '')
                ->get();

            //get keyboard description 
            $keyboard_description = DB::table('keyboard')
                ->select('description')
                ->where('keyboard_id', $keyboard_id)
                ->first();

            //get keyboard department name
            $keyboard_department_name = DB::table('keyboard_department')
                ->select('department_name')
                ->where('keyboard_department_id', $keyboard_departments->first()->keyboard_department_id)
                ->first();

            //get keyboard sub department name
            $keyboard_sub_department_name = DB::table('keyboard_sub_department')
                ->select('sub_department_name')
                ->where('keyboard_sub_department_id', $keyboard_sub_departments->first()->keyboard_sub_department_id ?? '')
                ->first();

            //get keyboard department id
            $dep_id = $keyboard_departments->first()->keyboard_department_id ?? '';
            //get keyboard sub department id
            $sub_dep_id = $keyboard_sub_departments->first()->keyboard_sub_department_id ?? '';
        }
        

        //get items for dropdown 

        $items = Item::select('item_id', 'description')->get();

        $data = [
            'keyboard_id' => $keyboard_id,
            'keyboard_department_id' => $keyboard_department_id,
            'keyboard_departments' => $keyboard_departments,
            'keyboard_sub_departments' => $keyboard_sub_departments,
            'keyboard_items' => $keyboard_items,
            'keyboard_description' => $keyboard_description->description,
            'keyboard_department_name' => $keyboard_department_name->department_name ?? '',
            'keyboard_sub_department_name' => $keyboard_sub_department_name->sub_department_name ?? '',
            'keyboard_sub_department_id' => $sub_dep_id,
            'keyboard_department_id' => $dep_id,
            'items' => $items,
        ];
        return view('keyboard.show')->with('data', $data);
    }



    //For Api///////////////////////////////////////////////////////////////////////////////////
    public function getKeyboardDepartments(Request $request)
    {
        $keyboard_departments = DB::table('keyboard_department')
                ->select('*')
                ->where('keyboard_id', $request->keyboard_id)
                ->get();

        if ($keyboard_departments) {
            return response()->json([
                'error' => false,
                'data' => $keyboard_departments
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
    }

    public function getKeyboardSubDepartments()
    {
        $keyboard_sub_departments = DB::table('keyboard_sub_department')
                ->select('*')
                // ->where('keyboard_department_id', $request->keyboard_department_id)
                ->get();

        if ($keyboard_sub_departments) {
            return response()->json([
                'error' => false,
                'data' => $keyboard_sub_departments
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
    }

    public function getKeyboardItems()
    {
        $keyboard_items = DB::table('keyboard_item')
            ->select('keyboard_item.*', 'item.*', 'item_price_level_location.inc_tax', 'item_printer.printer_id',
                'printer.description as p_des')
            ->join('item', 'item.item_id', '=', 'keyboard_item.item_id')
            ->join('item_price_level_location', 'item_price_level_location.item_id', '=', 'item.item_id')
            ->join('item_printer', 'item_printer.item_id', '=', 'item.item_id')
            ->join('printer', 'printer.printer_id', '=', 'item_printer.printer_id')
            // ->where('keyboard_item.keyboard_sub_depatment_id', $request->keyboard_sub_depatment_id)
            ->get();

        if ($keyboard_items) {
            return response()->json([
                'error' => false,
                'data' => $keyboard_items
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
    }

    // For Department Modals 
    public function getDepartment($keyboard_department_id)
    {
        $keyboard_department = DB::table('keyboard_department')->where('keyboard_department_id',$keyboard_department_id)->first();
        return response()->json([
            'success' => true,
            'data' => $keyboard_department
        ]);
    }

    public function updateDepartment(Request $request)
    {
        $keyboard_department = DB::table('keyboard_department')->where('keyboard_department_id',$request->dep_id)->update([
            "department_name" => $request->department_name
        ]);
        return redirect()->back()->with('success', 'Keyboard Department Name has been updated.');
    }

    public function deleteDepartment($keyboard_department_id)
    {
        DB::table('keyboard_department')->where('keyboard_department_id',$keyboard_department_id)->delete();
        return redirect()->back()->with('success', 'Keyboard Department has been Deleted.');
    }


    // For SubDepartment Modals 
    public function getSub($keyboard_sub_department_id)
    {
        // $departments = DB::table('keyboard_department')->get();
        $keyboard_sub_department = DB::table('keyboard_sub_department')->where('keyboard_sub_department_id',$keyboard_sub_department_id)->first();
        return response()->json([
            'success' => true,
            'data' => $keyboard_sub_department
        ]);
    }

    public function updateSubDepartment(Request $request)
    {
        DB::table('keyboard_sub_department')->where('keyboard_sub_department_id',$request->sub_dep_id)->update([
            "sub_department_name" => $request->sub_department_name
        ]);
        return redirect()->back()->with('success', 'Keyboard Sub Department Name has been updated.');
    }

    public function storeKeyboardSubDepartment(Request $request)
    {
        // return $request;
        DB::table('keyboard_sub_department')->insert([
            'sub_department_name'    => $request->sub_department_name,
            'keyboard_department_id' => $request->sub_dep_id,
            'position'               => $request->position
        ]);
        return redirect()->back()->with('success', 'Keyboard Sub Department Added');
    }    

    public function deleteKeyboardSubDepartment($keyboard_sub_department_id)
    {
        $keyboardSubDep = KeyboardSubDepartment::find($keyboard_sub_department_id);
        $keyboardItems = KeyboardItem::where('keyboard_sub_depatment_id', $keyboardSubDep->keyboard_sub_department_id)->get();
        foreach ($keyboardItems as $keyboardItem) {
            $keyboardItem->delete();
        }
        $keyboardSubDep->delete();
        return redirect()->back()->with('success', 'Keyboard Sub Department has been Deleted !');
    }



}
