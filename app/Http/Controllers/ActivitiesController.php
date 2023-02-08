<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
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
        return view('teacher.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'activity_name'  => ['required', 'string', 'max:255'],
            'activity_instruction' => ['required', 'string', 'max:255'],
            'activity_file' => ['required'],
        ]);


        if ($validator->fails()) {
            return redirect()->route('activites.create')
                ->withErrors($validator)
                ->withInput();
            }


        $fileArray = array();
        if($files = $request->file('activity_file')){
            foreach ($files as  $file) {
             $file_name = md5(rand(1000, 10000));
             $text = strtolower($file->getClientOriginalExtension());
             $file_full = $file_name.'.'.$text;
             $upload_path = 'assets/';
             $file_url = $upload_path.$file_full;
             $file->move($upload_path, $file_full);
             $fileArray[] = $file_url;
            }
        };


        $activities = Activities::create([
            'activity_name' => $request->input('activity_name'),
            'activity_instruction' => $request->input('activity_instruction'),
            'activity_details' => $request->input('activity_details'),
            'activity_file' => implode('|', $fileArray),
        ]);
        return redirect()->route('activites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function show($activities)
    {
        $activity = Activities::findOrFail($activities);
        return view('teacher.activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function edit(Activities $activities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activities $activities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activities $activities)
    {
        //
    }
}
