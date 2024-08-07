<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = [];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
