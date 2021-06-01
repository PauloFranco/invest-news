<?php

namespace App\Presenters\Models\Articles;

use App\Presenters\Presenter;

/**
 * Class Article
 *
 * @property \App\Models\Articles\Article $instance
 *
 * @package App\Presenters\Models\Articles
 */
class Article extends Presenter
{
    public function id()
    {
        return '#' . $this->instance->id;
    }

    public function label( $html = true )
    {
        $tokens = [];

        $tokens[] = "<strong>{$this->id()}</strong>";
        $tokens[] = $this->instance->name;

        return $this->returnAsHTML( join( ' ', $tokens ), $html );
    }

    public function created_at( $html = true )
    {
        $tokens   = [];
        $tokens[] = 'criado em';
        $tokens[] = $this->instance->created_at->format( self::LOCALIZED_DATE_FORMAT );

        return $this->returnAsHTML( join( ' ', $tokens ), $html );
    }

    public function comment_preview($html = true)
    {
        $tokens   = [];
        $tokens[] = substr($this->instance->comment, 0, 255);
        $tokens[] = '<p>[...]</p>';
        return $this->returnAsHTML( join( ' ', $tokens ), $html );

    }

    
    public function category()
    {
        return $this->instance->subject->category->present()->name;
    }

    public function subject()
    {
        return $this->instance->subject->present()->name;
    }


    public function updated_at()
    {
        if (is_null( $this->instance->updated_at )) {
            return null;
        }

        if ($this->instance->updated_at->eq( $this->instance->created_at )) {
            return null;
        }

        return parent::updated_at();
    }
}
