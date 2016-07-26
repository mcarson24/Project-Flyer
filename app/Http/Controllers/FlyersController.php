<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Photo;
use App\Flyer;
use App\Http\Requests;
use App\Http\Utilities\Country;
use App\Http\Requests\FlyerFormRequest;
use App\Http\Requests\ChangeFlyerRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
        $request->request->add(['user_id' => Auth::id()]);

        $flyer = Flyer::create($request->all());

        // Flash message
        flash()->success('Awesome', 'Your flyer was successfully created!');
        
        return redirect($flyer->path());
    }

    /**
     * Add a photo to the flyer.
     * 
     * @param string  $zip     
     * @param string  $street  
     * @param ChangeFlyerRequest $request 
     */
    public function addPhoto($zip, $street, ChangeFlyerRequest $request)
    {
        $photo = $this->handlePhoto($request->file('photo'));  

        Flyer::locatedAt($zip, $street)->addPhoto($photo);
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

    /**
     * Handle creation and storage of photos.
     * 
     * @param  UploadedFile $photo $photo
     * @return Photo
     */
    protected function handlePhoto(UploadedFile $photo)
    {
        return Photo::named($photo->getClientOriginalName())->store($photo);

    }
}
