<?php

namespace App\Http\Controllers;

use App\Http\Resources\VoucherTypeResource;
use App\Models\VoucherType;
use Illuminate\Http\Request;
use App\Http\Requests\VoucherTypeStoreRequest;
use App\Http\Requests\VoucherTypeUpdateRequest;

class VoucherTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $voucher_types = new VoucherType();
        // $voucher_types = $voucher_types->latest()->paginate(10);
        $voucher_types = $voucher_types->orderBy('description')->paginate(10);
        if (request()->wantsJson()) {
            return VoucherTypeResource::collection($voucher_types);
        }
        return view('voucher_type.index')
            ->with('voucher_types', $voucher_types);
    }

    /**
     * Search result.
     */
    public function search(Request $request)
    {
        $voucher_types = new VoucherType();
        if ($request->filled('search')) {
            $voucher_types = $voucher_types->where('description', 'LIKE', "%{$request->search}%")->orderBy('description')->paginate(10);
            // return redirect()->route('voucher_type.index')->with('voucher_types', $voucher_types);
        }
        return view('voucher_type.index')
            ->with('voucher_types', $voucher_types)
            ->with('search', $request->search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voucher_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoucherTypeStoreRequest $request)
    {
        $voucher_type = VoucherType::create([
            'description' => $request->description,
        ]);

        if (!$voucher_type) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Voucher Type.');
        }
        return redirect()->route('voucher_type.index')->with('success', 'Success, your Voucher Type has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VoucherType  $voucher_type
     * @return \Illuminate\Http\Response
     */
    public function show(VoucherType $voucher_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoucherType  $voucher_type
     * @return \Illuminate\Http\Response
     */
    public function edit(VoucherType $voucher_type)
    {
        return view('voucher_type.edit')
            ->with('voucher_type', $voucher_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoucherType  $voucher_type
     * @return \Illuminate\Http\Response
     */
    public function update(VoucherTypeUpdateRequest $request, VoucherType $voucher_type)
    {
        $voucher_type->description = $request->description;

        if (!$voucher_type->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating the Voucher Type.');
        }
        return redirect()->route('voucher_type.index')->with('success', 'Success, your Voucher Type has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoucherType  $VoucherType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoucherType $VoucherType)
    {
        $VoucherType->delete();
        return response()->json([
            'success' => true
        ]);
        // return redirect()->route('VoucherType.index')->with('success', 'Success, your VoucherType has been deleted.');
        // return back();
        // return redirect()->back()->with('success', 'Success, your VoucherType has been deleted.');
        // return view('VoucherType.index')->with('success', 'Success, your VoucherType has been deleted.');
    }
}
