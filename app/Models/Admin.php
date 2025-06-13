<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['username', 'email', 'password', 'role'];

    // Optionally hide password in JSON responses
    protected $hidden = ['password'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'admin_item');
    }
}
