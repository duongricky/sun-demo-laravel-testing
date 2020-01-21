<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'category_id',
    ];

    protected $hidden = [
        'category_id',
    ];

    protected $dateFormat = 'd-m-Y H:i:s';

    /**
     * Get the category that owns the post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
