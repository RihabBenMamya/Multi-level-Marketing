<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisorsTree extends Model
{
    use HasFactory;
    protected $table = 'advisors_tree';
    protected $fillable = [
        'advisor_id',
        'child_id',
        'direct',
    ];
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('child_id', 'like', '%'.$query.'%')
            ->orWhere('id', 'like', '%' . $query . '%')
                ->orWhere('advisor_id', 'like', '%'.$query.'%')
                ->orWhere('direct', 'like', '%'.$query.'%');
    }
}
