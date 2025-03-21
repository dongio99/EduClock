<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolClass extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'school_classes';
    protected $fillable = [
        'name',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
