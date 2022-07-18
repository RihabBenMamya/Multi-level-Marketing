<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigRankLevellings extends Model
{
    use HasFactory;
    protected $fillable = [
        'rank_id',
        'amount',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('rank_id', 'like', '%'.$query.'%')
            ->orWhere('id', 'like', '%' . $query . '%')
                ->orWhere('amount', 'like', '%'.$query.'%');
    }
}
