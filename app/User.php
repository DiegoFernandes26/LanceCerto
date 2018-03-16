<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /** The database table used by the model.
     * @var string
     */
    protected $table = 'users';


    /** The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'tipo',
        'status',
        'celular',
        'email',
        'password'
    ];

    //regras de validação para criação de usuários
    public $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'cpf' => 'cpf|required|unique:users',
        'password' => 'required|confirmed|min:6',
    ];

    //regras de validação para atualização de usuários
    public function rulesUpdate($id)
    {
        $user = User::find($id);
        return [
            'name' => 'required|max:255',
            'email' => "required|email|max:255|unique:users,email,{$user->id},id",
            'cpf' => "cpf|required|unique:users,cpf,{$user->id},id",
            'password' => 'confirmed|min:6',
        ];
    }

    public function edicaos()
    {
        return $this->hasMany('App\Edicao');
    }

    public function premios()
    {
        return $this->hasMany('App\Premio');
    }

    public function lance()
    {
        return $this->hasMany('App\Lances');
    }

    public function resultado()
    {
        return $this->hasMany('App\Resultado');
    }

    /** The attributes excluded from the model's JSON form.
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
