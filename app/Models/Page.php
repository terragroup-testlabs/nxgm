<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property string $username
 * @property string $slug
 */

class Page extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->setSlug();
        });
    }

    public function games()
    {
        return $this->hasMany(Game::class)->orderByDesc('rolled_at');
    }

    public function setSlug()
    {
        $this->slug = time().md5(rand());
    }


}
