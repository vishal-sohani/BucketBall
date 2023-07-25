<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{FillBallIntoBucket,Bucket,Ball};
use DB,Validator;
class FillController extends Controller
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
        $data['buckets']= Bucket::all();
        $data['ball']= Ball::all();
        return view('fill.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
			'bucket_id'		=> 'required',
			'ball_id'		=> 'required',
		];
		$msg['bucket_id.required'] = "Please select Bucket";
		$msg['ball_id.required'] = "Please select Ball";
		
		$validator = Validator::make($request->all(), $rules, $msg);
		if ($validator->fails())
			return redirect()->back()->withErrors($validator)->withInput($request->all());

        $Bucket = Bucket::where('id',$request->bucket_id)->first();
        $Ball = Ball::where('id',$request->ball_id)->first();
        $total_ball_volume = 0.0;

        if(count($Bucket->balls) > 0)
        foreach($Bucket->balls as $key => $items ){
            $total_ball_volume += $items->ball->volume;
        }

        if((float)$Bucket->volume > (float)$total_ball_volume){
           $free_space = ($Bucket->volume - $total_ball_volume);
            if((float)$free_space >= (float)$Ball->volume){
                FillBallIntoBucket::create($request->all());
            }
            else{
                session()->flash('error', 'No enough space');
                return redirect()->back();
            }
        }else{
            session()->flash('error', 'No enough space');
            return redirect()->back();
        }
    
        session()->flash('success', 'Successfully added.');
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['ball']= Ball::all();
        $data['bucket'] = Bucket::find($id);

        return view('fill.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obj = FillBallIntoBucket::find($id);
        if (empty($obj)) {
            session()->flash('error', 'Id not define.');
            return redirect()->back();
        }
        $obj->delete($id);
        session()->flash('success', 'Successfully deleted.');
        return redirect()->back();
    }
}
