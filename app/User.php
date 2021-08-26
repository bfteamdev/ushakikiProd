<?php

namespace App;

use App\Models\Order;
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
    // private $is_admin=0;
    protected $guarded = [];
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        if($this->admin){
            return true;
        }
        return false;
    }
  /**
   * Get all of the orders fer
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function orders()
  {
      return $this->hasMany(Order::class);
  }
   

}
