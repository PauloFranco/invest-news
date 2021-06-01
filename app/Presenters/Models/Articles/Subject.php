<?php

namespace App\Presenters\Models\Articles;

use App\Presenters\Presenter;

class Subject extends Presenter
{
    public function label()
    {
        $tokens = [];

        $tokens[] = $this->instance->category->present()->name;
        $tokens[] = "<small>{$this->instance->name}</small>";

        return $this->returnAsHTML( join( ' ', $tokens ) );
    }

    public function asOption( $inputName, $default = null )
    {
        return static::formatOption( $inputName, $this->instance->id, $this->instance->name, $default );
    }
}
