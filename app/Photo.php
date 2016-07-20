<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['path'];

    protected $baseDir = 'flyers/photos';

    /**
     * A photo belongs to a single flyer.
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
      return $this->belongsTo(Flyer::class);  
    }

    /**
     * Create a new photo from an uploaded file.
     * 
     * @param  UploadedFile $file 
     * @return Photo             
     */
    public static function fromForm(UploadedFile $file)
    {
        $photo = new static;

        $name = time() . '-' . $file->getClientOriginalName();

        $photo->path = $photo->baseDir . '/' . $name;

        $file->move($photo->baseDir, $name);

        return $photo;
    }
}
