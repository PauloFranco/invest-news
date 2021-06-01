<?php

namespace App\Presenters\Models\Articles;

use App\Presenters\Presenter;

class Category extends Presenter
{
    public function label()
    {
        return $this->instance->name;
    }

    
    public function asOption( $inputName, $default = null )
    {
        return static::formatOption( $inputName, $this->instance->id, $this->instance->name, $default );
    }
}
