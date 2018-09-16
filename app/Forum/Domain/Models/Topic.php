<?php

namespace App\Forum\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function($topic) {
            $topic->update([
                'slug' => str_slug($topic->title . ' ' . $topic->id)
            ]);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
