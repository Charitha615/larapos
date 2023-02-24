<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementResource;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Terminal;
use Illuminate\Support\Facades\File;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $advertisement = new Advertisement();
        if ($request->search) {
            $advertisements = $advertisement->where('name', 'LIKE', "%{$request->search}%");
        }
        $advertisements = $advertisement->latest()->paginate(10);
        if (request()->wantsJson()) {
            return AdvertisementResource::collection($advertisements);
        }

        return view('advertisement.index')
            ->with('advertisements', $advertisements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terminals = Terminal::select('terminal_id', 'description')->get();
        return view('advertisement.create')->with('terminals', $terminals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $names = [];
        if ($request->hasFile('content')) {
            foreach ($request->content as $ct) {
                $names[] = $ct->getClientOriginalName();
                $ct->move(public_path().'/contents/', $ct->getClientOriginalName());
            }
        }

        $advertisement = Advertisement::create([
            'name' => $request->name,
            'contents' => json_encode($names),
            'terminal' => $request->terminal,
            'display_effect' => $request->display_effect,
            'duration' => $request->duration,
            'no_end_date' => ($request->no_end_date == "1") ? 1 : 0,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        if (!$advertisement) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Advertisement.');
        }
        return redirect()->route('advertisement.index')->with('success', 'Success, your Advertisement has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisement = Advertisement::find($id);
        $terminal_name = Terminal::find($advertisement->terminal)->description;
        return view('advertisement.show')
            ->with('advertisement', $advertisement)
            ->with('terminal_name', $terminal_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        $terminals = Terminal::select('terminal_id', 'description')->get();

        return view('advertisement.edit')
            ->with('advertisement', $advertisement)
            ->with('terminals', $terminals);
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
        $names = [];
        if ($request->hasFile('content')) {
            //remove previous images
            $old_contents = json_decode($request->old_content);
            if ($old_contents != null) {
                foreach ($old_contents as $old_content) {
                    $image_path = public_path().'/contents/'.$old_content;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }

            //add new images
            foreach ($request->content as $ct) {
                $names[] = $ct->getClientOriginalName();
                $ct->move(public_path().'/contents/', $ct->getClientOriginalName());
            }
        } else {
            $names = json_decode($request->old_content);
        }

        $result = Advertisement::where('advertisement_id', $id)
            ->update([
                'name' => $request->name,
                'contents' => json_encode($names),
                'terminal' => $request->terminal,
                'display_effect' => $request->display_effect,
                'duration' => $request->duration,
                'no_end_date' => ($request->no_end_date == "1") ? 1 : 0,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
            ]);

        if (!$result) {
            return redirect()->back()->with('error', 'Sorry, there was a problem while creating the Advertisement.');
        }
        return redirect()->route('advertisement.index')->with('success', 'Success, your Advertisement has been edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //remove previous images
        $old_contents = json_decode($advertisement->contents);
        if ($old_contents != null) {
            foreach ($old_contents as $old_content) {
                $image_path = public_path().'/contents/'.$old_content;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
        }

        $advertisement->delete();
        return response()->json([
            'success' => true
        ]);
    }

    //For Api///////////////////////////////////////////////////////////////////////////////////

    public function getAdvertisementImages(Request $request)
    {
        $result = Advertisement::select('contents')
            ->where('terminal', $request->terminal)
            ->get();

        if ($result) {
            $data = array();
            foreach ($result as $res) {
                $data[] = $res->contents;
            }

            return response()->json([
                'error' => false,
                'data' => $data
            ]);
        } else {
            return response()->json([
                'error' => true,
                'data' => 'No Data Found'
            ]);
        }
    }
}
