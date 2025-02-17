<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone'
    ];

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
