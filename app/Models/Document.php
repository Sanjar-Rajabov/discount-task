<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['url'];

    public function getUrlAttribute(): string|null
    {
        if ($this->getAttribute('path')) {
            return Storage::url($this->getAttribute('path'));
        }
        return null;
    }
}
