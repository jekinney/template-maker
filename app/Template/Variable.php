<?php

namespace App\Template;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    /**
     * Guarded columns from mass assignment
     * 
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Before insert we need to json encode html column
     */
    public function setVariableAttribute($value)
    {
        return $this->attributes['variable'] = '{{ '.str_slug($value).' }}';
    }

     /**
     * Format variable for edit display
     * 
     * @return string
     */
    public function formatVariable()
    {
        $variable = preg_replace(['~{~', '~}~'], '', $this->variable);

        return trim($variable);
    }
}
