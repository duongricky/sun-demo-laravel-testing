<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $table = 'categories';

    protected $hidden = [
        'name',
    ];

    protected $dateFormat = 'd-m-Y H:i:s';
    /**
     * Get the posts for the category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
