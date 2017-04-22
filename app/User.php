<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Cartalyst\Sentinel\Users\EloquentUser;
use App\Models\User\Profile;
use App\Models\User\ArtistProfile;
use App\Models\User\RoleRequest;

class User extends EloquentUser
{
    use Notifiable;

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function artist_profile()
    {
        return $this->hasOne(ArtistProfile::class);
    }

    public function role_request()
    {
        return $this->hasOne(RoleRequest::class);
    }
}
