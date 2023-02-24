<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageStoreRequest;
use App\Http\Requests\MessageUpdateRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = new Message();
        if ($request->search) {
            $messages = $messages->where('description', 'LIKE', "%{$request->search}%");
        }
        $messages = $messages->latest()->paginate(10);
        if (request()->wantsJson()) {
            return MessageResource::collection($messages);
        }
        return view('message.index')
            ->with('messages', $messages);
    }

    /**
     * Search result.
     */
    public function search(Request $request)
    {
        $messages = new Message();
        if ($request->filled('search')) {
            $messages = $messages->where('description', 'LIKE', "%{$request->search}%")->orderBy('description')->paginate(10);
            // return redirect()->route('message.index')->with('messages', $messages);
        }
        return view('message.index')
            ->with('messages', $messages)
            ->with('search', $request->search);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageStoreRequest $request)
    {
        $message = Message::create([
            'description' => $request->description,
            'type' => $request->type,
        ]);

        if (!$message) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Message.');
        }
        return redirect()->route('message.index')->with('success', 'Success, your Message has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('message.edit')
            ->with('message', $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(MessageUpdateRequest $request, Message $message)
    {
        $message->description = $request->description;
        $message->type = $request->type;

        if (!$message->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating the Message.');
        }
        return redirect()->route('message.index')->with('success', 'Success, your Message has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return response()->json([
            'success' => true
        ]);
        // return redirect()->route('message.index')->with('success', 'Success, your Message has been deleted.');
        // return back();
        // return redirect()->back()->with('success', 'Success, your Message has been deleted.');
        // return view('message.index')->with('success', 'Success, your Message has been deleted.');
    }

    //For Api ///////////////////////////////////////////////////////////////////////////////
    public function getMessages()
    {
        $result = Message::all();

        if ($result) {
            return response()->json([
                "error" => false,
                "data" => $result
            ]);
        } else {
            return response()->json([
                "error" => true,
                "data" => "No messages"
            ]);
        }
    }
}
