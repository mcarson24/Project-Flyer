<?php

if (!function_exists('flash'))
{
    function flash($title = null, $message = null)
    {
        $flash = app('App\Http\Flash');

        if (func_num_args() == 0)
        {
            return $flash;
        }

        return $flash->info($title, $message);
    }
}

/**
 * Function to clean up the add photo path.
 * 
 * @param string $flyer 
 */
function add_photo_path($flyer)
{
    return route('store_photo_path', [$flyer->zip, $flyer->slug]);
}

/**
 * Returns active class if a given path is the current active path.
 * 
 * @param  string  $route 
 * @return string         
 */
function isActiveRoute($route)
{
    if (Route::currentRouteName() == $route)
    {
        return 'active';
    }
}

/**
 * Return the path of a give flyer.
 * 
 * @return string 
 */
function flyer_path(App\Flyer $flyer)
{
    return $flyer->zip . '/' . $flyer->slug;
}