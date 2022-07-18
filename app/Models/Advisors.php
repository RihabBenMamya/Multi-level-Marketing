<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisors extends Model
{
    use HasFactory;
    protected $fillable = [
        'rank_id',
        'parent_id',
        'login',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('rank_id', 'like', '%' . $query . '%')
            ->orWhere('id', 'like', '%' . $query . '%')
            ->orWhere('parent_id', 'like', '%' . $query . '%')
            ->orWhere('login', 'like', '%' . $query . '%')
            ->orWhere('created_at', 'like', '%' . $query . '%');

    }
}
