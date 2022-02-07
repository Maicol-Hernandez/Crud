<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $password
 * @property $identificacion
 * @property $photo
 * @property $rol_id
 * @property $created_at
 * @property $updated_at
 *
 * @property RolUsuario $rolUsuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{

  static $rules = [
    'name' => 'required',
    'email' => 'required',
    'identificacion' => 'required',
    'password' => 'required',
    'rol_id' => 'required',
    'photo' => 'required|max:4000|mimes:jpg'

  ];

  static $message = [
    'required' => 'El :attribute es requerido',
    'name.required' => 'El nombre es requerido',
    'photo.required' => 'La foto es requerida'

  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'email', 'identificacion', 'photo', 'rol_id', 'password'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function rolUsuario()
  {
    return $this->hasOne('App\Models\RolUsuario', 'id', 'rol_id');
  }
}
