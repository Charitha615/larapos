<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeyboardItem;
use Illuminate\Support\Facades\File;

class KeyboardItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->keyboard_sub_depatment_id) {
            $name = "";
            if($request->hasFile('key_image')){ 
                $name = $request->file('key_image')->getClientOriginalName();
                $request->file('key_image')->move(public_path().'/keyboard_item_images/', $name);
            }

            KeyboardItem::create([
                'keyboard_sub_depatment_id' => $request->keyboard_sub_depatment_id,
                'item_id' => $request->item_id,
                'position' => $request->position,
                'caption' => ($request->caption == "") ? $request->item_text : $request->caption,
                'color' => ($request->color == "") ? "" : substr($request->color, 1),
                'key_image' => $name,
                'modify_option' => $request->modify_option
            ]);

            $url = '/admin/get_sub_departments/'.$request->keyboard_id.'/'.$request->keyboard_department_id.'/'.$request->keyboard_sub_depatment_id;

            return redirect($url)->with('success','Item Added !');
        }else {
            return redirect()->back()->with('error','Please Create Sub-Department!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keyboard_item = KeyboardItem::find($id);

        return response()->json([
            'keyboard_item' => $keyboard_item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('key_image')){ 
            //remove previous image
            $image_path = public_path().'/keyboard_item_images/'.$request->old_img;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            //add new image
            $name = $request->file('key_image')->getClientOriginalName();
            $request->file('key_image')->move(public_path().'/keyboard_item_images/', $name);

            $data = [
                'keyboard_sub_depatment_id' => $request->keyboard_sub_depatment_id,
                'item_id' => $request->item_id,
                'position' => $request->position,
                'caption' => ($request->caption == "") ? $request->item_text : $request->caption,
                'color' => ($request->color == "") ? "" : substr($request->color, 1),
                'key_image' => $name,
                'modify_option' => $request->modify_option
            ];
        } else {
            $data = [
                'keyboard_sub_depatment_id' => $request->keyboard_sub_depatment_id,
                'item_id' => $request->item_id,
                'position' => $request->position,
                'caption' => ($request->caption == "") ? $request->item_text : $request->caption,
                'color' => ($request->color == "") ? "" : substr($request->color, 1),
                'modify_option' => $request->modify_option
            ];
        }

        KeyboardItem::where('keyboard_item_id', $id)
            ->update($data);

        $url = '/admin/get_sub_departments/'.$request->keyboard_id.'/'.$request->keyboard_department_id.'/'.$request->keyboard_sub_depatment_id;

        return redirect($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        KeyboardItem::destroy($id);

        $url = '/admin/get_sub_departments/'.$request->keyboard_id.'/'.$request->keyboard_department_id.'/'.$request->keyboard_sub_depatment_id;

        return redirect($url)->with('success','1 Item Deleted !');
    }
}
