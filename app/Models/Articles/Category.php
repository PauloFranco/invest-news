<?php

namespace App\Models\Articles;

use App\Models\User;
use App\Presenters\Presentable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, Presentable;

    protected $table      = 'categories';

    protected $casts = [
        'id'         => 'integer',
        'deleted_at' => 'datetime'
    ];

    protected $fillable = [
        'name',
    ];

    public function articles()
    {
        return $this->hasManyThrough( Article::class, Subject::class, 'category_id', 'subject_id' );
    }

    public function subjects()
    {
        return $this->hasMany( Subject::class, 'category_id', 'id' );
    }

    public function scopeOrdered( Builder $builder )
    {
        $builder->orderBy( 'name' );

        return $builder;
    }

    public function scopeWithSubjects( Builder $builder )
    {
        $builder->whereExists( function ( $query ) {
            $query->selectRaw( '1' )
                ->from( 'subjects' )
                ->whereRaw( 'subjects.category_id = categories.id' )
                ->whereNull( 'subjects.deleted_at' );
        } );

        return $builder;
    }
}
