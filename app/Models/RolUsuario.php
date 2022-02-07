<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolUsuario
 *
 * @property $id
 * @property $rol_nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Usuario[] $usuarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RolUsuario extends Model
{
    
    static $rules = [
		'rol_nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rol_nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Models\Usuario', 'rol_id', 'id');
    }
    

}
