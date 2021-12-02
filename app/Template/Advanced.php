<?php

namespace App\Template;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Advanced extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['locations' => 'array'];

    /**
     * Explicitly set table name
     * 
     * @var array
     */
    protected $table = 'advanced';

    /**
     * Guarded columns from mass assignment
     * 
     * @var array
     */
    protected $guarded = ['id'];
    
    public function store($request)
    {
        // Move File
        $pdfUrl = $request->file->store( '/public/uploads' );
        // Create object
        $this->name = $request->name;
        $this->pdf_path = $pdfUrl;
        $this->description = $request->description;
        $this->image_path = asset( '/storage/uploads/test.png' );
        $this->save();

        return $this->fresh();
    }

    /**
     * Generate pdf into image and save to image location
     * 
     * @param  string $path
     * @return bool
     */
    protected function generateImage(string $path)
    {
        $baseUrl =  $_SERVER['DOCUMENT_ROOT'].'/storage/uploads/'.basename( $path, '.pdf' );

        $imagick = new \Imagick();
        $imagick->readImage( $baseUrl.'.pdf' );
        $imagick->writeImages( $baseUrl.'.jpg', true );

        return Storage::url( $baseUrl.'.jpg' );
    }
}
