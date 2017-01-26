<?php

namespace Lara\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*Get names from user*/
    public function getName()
    {
        if ($this->first_name && $this->last_name)
        {
            return "{$this->first_name} {$this->last_name}";
        }

        if ($this->first_name)
        {
            return $this->first_name;
        }

        return null;
    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }

    public function getFirstnameOrUsername()
    {
        return $this->first_name ?: $this->username;
    }


    /*Post status*/
    public function status()
    {
        return $this->hasMany('Lara\Models\Status', 'user_id');
    }


    /*Grab URL from gravatar for profile pictures*/
    public function getAvatar()
    {
        return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=50";
    }


    /*Friends relations*/
    public function userFriends()
    {
        return $this->belongsToMany('Lara\Models\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendsWith()
    {
        return $this->belongsToMany('Lara\Models\User', 'friends', 'friend_id', 'user_id');
    }

    public function friends()
    {
        return $this->userFriends()->wherePivot('accepted', true)->get()->merge($this->friendsWith()->wherePivot('accepted', true)->get());
    }


    /*friend requests*/
    public function friendRequest()
    {
        return $this->userFriends()->wherePivot('accepted', false)->get();
    }

    public function pendingFriendRequest()
    {
        return $this->friendsWith()->wherePivot('accepted', false)->get();
    }

    public function hasPendingFriendRequest(User $user)
    {
        return (bool) $this->pendingFriendRequest()->where('id', $user->id)->count();
    }

    public function hasRequestOfFriend(User $user)
    {
        return (bool) $this->friendRequest()->where('id', $user->id)->count();
    }

     public function addFriend(User $user)
    {
        return $this->friendsWith()->attach($user->id);
    }

     public function acceptRequest(User $user)
    {
        return $this->friendRequest()->where('id', $user->id)->first()->pivot->update([
            'accepted' => true,
        ]);
    }

    public function isFriends(User $user)
    {
        return (bool) $this->friends()->where('id', $user->id)->count();
    }
}
