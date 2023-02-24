<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\AccountStoreRequest;
use App\Http\Requests\AccountUpdateRequest;

class AccountController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $accounts = new Account();
        if ($request->search) {
            $accounts = $accounts->where('card_number', 'LIKE', "%{$request->search}%");
        }
        $accounts = $accounts->latest()->paginate(10);
        if (request()->wantsJson()) {
            return AccountResource::collection($accounts);
        }
        return view('account.index')
            ->with('accounts', $accounts);
    }


     // Search result.
    public function search(Request $request)
    {
        $accounts = new Account();
        if ($request->filled('search')) {
            $accounts = $accounts
                ->where('first_name', 'LIKE', "%{$request->search}%")
                ->orWhere('last_name', 'LIKE', "%{$request->search}%")
                ->orderBy('card_number')
                ->paginate(10);
            // return redirect()->route('account.index')->with('accounts', $accounts);
        }
        return view('account.index')
            ->with('accounts', $accounts)
            ->with('search', $request->search);
    }



     // Show the form for creating a new resource.
    public function create()
    {
        return view('account.create');
    }

     // Store a newly created resource in storage.
    public function store(AccountStoreRequest $request)
    {
        $account = Account::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'card_number' => $request->card_number,
            'store_credit' => $request->store_credit,
            'phone_no' => $request->phone_no,
            'mobile_no' => $request->mobile_no,
            'email_address' => $request->email_address,
            'discount' => $request->discount,
            'address' => $request->address,
            'suburb' => $request->suburb,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'notes' => $request->notes

        ]);

        if (!$account) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Account.');
        }
        return redirect()->route('account.index')->with('success', 'Success, your Account has been created.');
    }

     // Display the specified resource.
    public function show(Account $account)
    {
        //
    }

     // Show the form for editing the specified resource.
    public function edit(Account $account)
    {
        return view('account.edit')
            ->with('account', $account);
    }

     // Update the specified resource in storage.
    public function update(AccountUpdateRequest $request, Account $account)
    {

        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->card_number = $request->card_number;
        $account->store_credit = $request->store_credit;
        $account->phone_no = $request->phone_no;
        $account->mobile_no = $request->mobile_no;
        $account->email_address = $request->email_address;
        $account->discount = $request->discount;
        $account->address = $request->address;
        $account->suburb = $request->suburb;
        $account->state = $request->state;
        $account->post_code = $request->post_code;
        $account->notes = $request->notes;

        if (!$account->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating the Account.');
        }
        return redirect()->route('account.index')->with('success', 'Success, your Account has been updated.');
    }

     // Remove the specified resource from storage.
    public function destroy(Account $account)
    {
        $account->delete();
        return response()->json([
            'success' => true
        ]);
        // return redirect()->route('account.index')->with('success', 'Success, your account has been deleted.');
        // return back();
        // return redirect()->back()->with('success', 'Success, your account has been deleted.');
        // return view('account.index')->with('success', 'Success, your account has been deleted.');
    }
}
