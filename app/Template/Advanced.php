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


    /**
     * Set the base url for pdf location
     * 
     * @var string
     */
    protected $pdfUrl = 'storage/public/upload/pdf/';

    /**
     * Set the base url for image location
     * 
     * @var string
     */
    protected $imageUrl = 'storage/public/upload/images/';
    
    /**
     * Convert pdf to image, save to same location, 
     * and remove the origianal PDF
     * 
     * @return string
     */
    public function convertToJpg()
    {
        // generate new image url
        $url =  asset( $this->imageUrl. str_slug($this->name).'.jpg' );
        // Check if the path and url are the same, if they are, we don't need to do anything
        if ( $this->path !== $url ) {
            // Check if the path is a pdf, if so we need to convert to image, otherwise change file name
            if ( strpos($this->path, $this->pdfUrl) || strpos($this->path, '.pdf') ) {
                $this->generateImage( $this->path, $url );
                Storage::delete( $this->path );
            } else {
                rename( $this->path, $url );
            }
        }

        return $url;
    }

    /**
     * Generate pdf into image and save to image location
     * 
     * @param  string $path
     * @param  string $url
     * @return bool
     */
    protected function generateImage(string $path, string $url)
    {
        $imagick = new \Imagick();
        $imagick->readImage( $path );
        $imagick->writeImages( $url, false );

        return true;
    }
}
