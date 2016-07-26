<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Photo;
use App\Flyer;
use App\Http\Requests;
use App\Http\Utilities\Country;
use App\Http\Requests\FlyerFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FlyersController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth', ['except' => ['show',]]);
    }

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
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FlyerFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerFormRequest $request)
    {   
        $flyer = new Flyer($request->all());

        Auth::user()->createsFlyer($flyer);

        // Flash message
        flash()->success('Awesome', 'Your flyer was successfully created!');
        
        return redirect(flyer_path($flyer));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
