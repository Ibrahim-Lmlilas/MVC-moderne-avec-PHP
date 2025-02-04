<?php

namespace App\Models;

use App\Core\Model;

class User extends Model {
    protected $fillable = ['name', 'email', 'password', 'role'];

    // Hide password when converting to array/json
    protected $hidden = ['password'];

    // Example of model relationships
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
