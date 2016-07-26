<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;
use App\Flyer;
use App\Http\Requests;
use App\Http\Requests\ChangeFlyerRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotosController extends Controller
{
    /**
     * Add a photo to the flyer.
     * 
     * @param string  $zip     
     * @param string  $street  
     * @param ChangeFlyerRequest $request 
     */
    public function store($zip, $street, ChangeFlyerRequest $request)
    {
        $photo = $this->handlePhoto($request->file('photo'));  

        Flyer::locatedAt($zip, $street)->addPhoto($photo);
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
