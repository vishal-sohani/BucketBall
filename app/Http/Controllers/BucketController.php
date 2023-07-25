<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Bucket};
use Validator, Redirect;
class BucketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bucket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
			'name'		=> 'required|max:150',
			'volume'		=> 'required|numeric',
		];
		$msg['name.required'] = "name is required";
		$msg['volume.required'] = "volume is required";
		
		$validator = Validator::make($request->all(), $rules, $msg);
		if ($validator->fails())
			return Redirect::back()->withErrors($validator)->withInput($request->all());
            
        $input = $request->all();
         Bucket::create($input);
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        $Bucket = Bucket::find($id);

        if (empty($Bucket)) {


            return redirect(route('bucket.index'));
        }

        return view('bucket.show')->with('fAQ', $Bucket);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['data'] = Bucket::find($id);
        return view('bucket.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $Bucket = Bucket::find($id);
        if (empty($Bucket)) {
            return redirect(route('home'));
        }
        $Bucket->fill($request->all());
        $Bucket->save();

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Bucket = Bucket::find($id);

        if (empty($Bucket)) {

            return redirect(route('home'));
        }
        Bucket::delete($id);

        return redirect(route('home'));
    }
}
