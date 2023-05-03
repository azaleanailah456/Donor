<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Darah;

class Response extends Model
{
    use HasFactory;
    protected $fillable = [
        'darah_id',
        'status',
        'jadwal',
    ];

    public function darah()
    {
        return $this->hasOne
        (Response::class);
    }
}
