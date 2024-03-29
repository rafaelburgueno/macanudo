<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $fillable = ['favoritable_id', 'favoritable_type', 'user_id'];

    public function favoritable()
    {
        return $this->morphTo();
    }


}
