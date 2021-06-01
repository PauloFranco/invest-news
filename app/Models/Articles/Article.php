<?php

namespace App\Models\Articles;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Presenters\Presentable;

class Article extends Model
{
    use SoftDeletes, Presentable;


    protected $table      = 'articles';

    protected $casts = [
        'id'               => 'integer',
        'subject_id'       => 'integer',
        'deleted_at'       => 'datetime',
    ];

    public function subject()
    {
        return $this->belongsTo( Subject::class, 'subject_id', 'id' )->withTrashed();
    }

    public function scopeOrdered( Builder $builder )
    {
        $builder
            ->orderBy( 'articles.created_at', 'desc' )
            ->latest( 'articles.updated_at' );

        return $builder;
    }

    public function scopeFiltered( Builder $builder, $filtro = '' )
    {
        if ($filtro != '') {
            return $builder->select('articles.id','articles.name','articles.created_at', 'articles.comment','articles.subject_id')->join('subjects', 'subject_id', '=', 'subjects.id')->where( 'articles.name','ilike', '%'.$filtro.'%' )->orWhere('subjects.name','ilike', '%'.$filtro.'%');
        } else {
            return $builder->whereRaw( '1 = 1' );
        }
    }
}
