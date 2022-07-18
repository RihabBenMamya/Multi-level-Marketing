<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigReferralBonuse extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_rank_id',
        'child_rank_id',
        'bonus_percentage',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('parent_rank_id', 'like', '%'.$query.'%')
            ->orWhere('id', 'like', '%' . $query . '%')
                ->orWhere('child_rank_id', 'like', '%'.$query.'%')
                ->orWhere('bonus_percentage', 'like', '%'.$query.'%');
    }
}
