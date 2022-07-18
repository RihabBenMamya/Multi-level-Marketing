<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'advisor_id',
        'advisor_rank_id',
        'parent_id',
        'parent_rank_id',
        'total_value',
        'paid',
        'paid_at',
        'fo',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('advisor_id', 'like', '%'.$query.'%')
            ->orWhere('id', 'like', '%' . $query . '%')
                ->orWhere('advisor_rank_id', 'like', '%'.$query.'%')
                ->orWhere('parent_id', 'like', '%'.$query.'%')
                ->orWhere('parent_rank_id', 'like', '%'.$query.'%')
                ->orWhere('total_value', 'like', '%'.$query.'%')
                ->orWhere('paid', 'like', '%'.$query.'%')
                ->orWhere('paid_at', 'like', '%'.$query.'%')
                ->orWhere('fo', 'like', '%'.$query.'%');
    }
}
