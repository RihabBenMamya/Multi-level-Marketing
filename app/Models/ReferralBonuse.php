<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralBonuse extends Model
{
    use HasFactory;
    protected $fillable = [
        'advisor_id',
        'order_id',
        'amount',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('advisor_id', 'like', '%'.$query.'%')
            ->orWhere('id', 'like', '%' . $query . '%')
                ->orWhere('order_id', 'like', '%'.$query.'%')
                ->orWhere('amount', 'like', '%'.$query.'%');
    }
}
