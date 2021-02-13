<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
  use HasRoles;
  use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [];
    protected $guarded = [];
    // protected $fillable = [
      // 'username',
      // 'email',
      // 'password',
      // 'status',
      // 'cedula',
      // 'nombres',
      // 'apellidos',
      // 'avatar',
      // 'cargo',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
    Validacion de datos unicos
    **/

    public static function validatedRequestData($action,$column,$columnValue,$authValue){
      if($action == 'register'){
        if($columnValue == $authValue){
          $res = DB::table('users')->Where("{$column}",'=',$columnValue)->get();
          return $res->isNotEmpty() ? true : false;
        }else {
          $res = DB::table('users')->Where("{$column}",'=',$columnValue)->get();
          return $res->isEmpty() ? true : false;
        }
      }
    }
    /** url amigable - rutas por slug **/
    public function getRouteKeyName()
    {
        return "slug";
    }

    /****
      RELACIONES
    ****/
    public function emprendedores(){
      return $this->hasMany(Emprendedor::class);
    }

}
