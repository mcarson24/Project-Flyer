<?php

namespace App\Http\Controllers\Traits;

use Auth;
use App\Flyer;

trait AuthorizesUsersToUploadPhotos {

    /**
     * Handle unauthorized user's attempts to upload photos.   
     *              
     * @return void
     */
    protected function userIsUnauthorized(Request $request)
    {
        if ($request->ajax())
        {
            return response('Get out of here!', 403);
        }

        flash()->error('Get out of here!', 'We can\'t let you do that.');

        return redirect('/');
    }

    protected function userCreatedFlyer($zip, $street)
    {
        
        return Flyer::where([
            'zip' => $zip,
            'street' => str_replace('-', ' ', $street),
            'user_id' => Auth::user()->id
        ])->exists();
    }

}