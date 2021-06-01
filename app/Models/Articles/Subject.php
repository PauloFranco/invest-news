<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\Presentable;


class Subject extends Model
{
    use SoftDeletes, Presentable;

    protected $table      = 'subjects';

    protected $casts = [
        'id'          => 'integer',
        'category_id' => 'integer',
        'deleted_at'  => 'datetime'
    ];

    protected $fillable = [
        'name',
    ];

    public function articles()
    {
        return $this->hasMany( Article::class, 'subject_id', 'id' );
    }

    /** @return \Illuminate\Database\Eloquent\Relations\BelongsTo */
    public function category()
    {
        return $this->belongsTo( Category::class, 'category_id', 'id' )->withTrashed();
    }

    public function scopeOrdered( Builder $builder )
    {
        $builder->orderBy( 'name' );

        return $builder;
    }
}
