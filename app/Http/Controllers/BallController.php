<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Ball};
use Validator,Redirect;
class BallController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ball = Ball::paginate(10);
        return view('ball.index')
            ->with('ball', $ball);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ball.create');
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
        $ball = Ball::create($input);
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $ball = Ball::find($id);
        if (empty($ball)) {
            return redirect(route('ball.index'));
        }
        return view('ball.show')->with('fAQ', $ball);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['data'] = Ball::find($id);
        return view('ball.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $ball = Ball::find($id);
        if (empty($ball)) {
            return redirect(route('home'));
        }
        $ball->fill($request->all());
        $ball->save();

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ball = Ball::find($id);

        if (empty($ball)) {

            return redirect(route('ball.index'));
        }
        BucketBall::delete($id);

        return redirect(route('ball.index'));
    }
}
