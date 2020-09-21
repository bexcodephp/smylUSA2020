<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Table_resources;
use DB;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Table_resources::all();
        return view("admin.resource.list",['resources'=>$resources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate(
            [
            'title' => 'required',
            'description' => 'required',
            'uploadedfile' => 'required|mimes:flv,mp4,avi,wmv,3gp,mov,mkv,vob'
            ],
            [
                'title.required' => 'Please enter video title.',
                'uploadedfile.required' => 'Please select video to upload.',
                'description.required' => 'Please enter description.',
                'uploadedfile.mimes' => 'Video format not supported.'
            ]
        );   

        $data = new Table_resources();
        $data->title = $request->title;
        $data->description = $request->description;

        if($file = $request->hasFile('uploadedfile')) {
                    
            $file = $request->file('uploadedfile') ;              
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/storage/resource' ;
            $file->move($destinationPath,$fileName);
            $data->url = $fileName;
        }

        if($data->save()){
            return redirect()->back()->with('message', 'Resource successfully added.');
        } else {
            return redirect()->back()->withErrors(['Operation failed.Please try again.']);
        }

    }

    public function getResource(Request $request){
        $resource = Table_resources::all()->where("id","=",$request->id)->first();
        return view("admin.resource.edit",["resource" => $resource]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function updateResource(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
            'title' => 'required',
            'description' => 'required',
            'uploadedfile' => 'mimes:flv,mp4,avi,wmv,3gp,mov,mkv,vob'
            ],
            [
                'title.required' => 'Please enter video title.',
                'description.required' => 'Please enter description.',
                'uploadedfile.mimes' => 'Video format not supported.'
            ]
        );

        if($file = $request->hasFile('uploadedfile')) {
                    
            $file = $request->file('uploadedfile') ;              
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/storage/resource' ;
            $file->move($destinationPath,$fileName);
            $resourceUpdate = DB::table('table_resources')->where([
                ['id','=',$id],
                ])->update(array(
                'title' => $request->title,
                'description' => $request->description,
                'url' => $fileName
            ));
            if($resourceUpdate) {
                return redirect()->back()->with('message', 'Resource successfully updated.');
            } else {
                return redirect()->back()->withErrors(['Nothing changed. Please try again.']);
            }
        
        } else {
            $resourceUpdate = DB::table('table_resources')->where([
                ['id','=',$id],
                ])->update(array(
                'title' => $request->title,
                'description' => $request->description 
            ));
            if($resourceUpdate) {
                return redirect()->back()->with('message', 'Resource successfully updated.');
            } else {
                return redirect()->back()->withErrors(['Nothing changed. Please try again.']);
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyResource($id)
    {
        $res=Table_resources::where('id',$id)->delete();
        if($res) {
            return redirect()->back()->with('message', 'Resource successfully Deleted.');
        } else {
            return redirect()->back()->withErrors(['Something went wrong. Please try again.']);
        }
    }
}
