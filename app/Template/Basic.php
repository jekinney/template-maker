<?php

namespace App\Template;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    /**
     * Guarded columns from mass assignment
     * 
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * We need to json_decode html column
     */
    public function getHtmlAttribute($html)
    {
        return json_decode( $html );
    }

    /**
     * Before insert we need to json encode html column
     */
    public function setHtmlAttribute($html)
    {
        return $this->attributes['html'] = json_encode( $html );
    }

    /**
     * We need to json_decode locations column
     */
    public function getLocationsAttribute($locations)
    {
        return json_decode( $locations );
    }

    /**
     * Before insert we need to json encode Locations column
     */
    public function setLocationsAttribute($locations)
    {
        return $this->attributes['locations'] = json_encode( $locations );
    }

    /**
     * Format the html column with default data
     * 
     * @return string
     */
    public function defaultVariables()
    {
       $html = $this->html;
       $variables = Variable::get();

       foreach ( $variables as $variable ) {
           $html = str_replace( $variable->variable, $variable->test_data, $html );
       }

       return $html;
    }
}
