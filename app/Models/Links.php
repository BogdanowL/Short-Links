<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'old_link', 'new_link'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }





}
