<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'screen_name',
        'first_name',
        'last_name',
        'subdomain',
        'avatar',
        'address_id',
        'account_type',
        'user_id',
    ];
}
