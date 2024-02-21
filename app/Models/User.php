<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'ativo',
        'id_tipo',
        'tema'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'senha' => 'hashed',
    ];

    public function getTema()
    {
        if ($this->tema == 0) {
            $tema = 'light';
            $icone = 'bi bi-sun';
        }else{
            $tema = 'dark';
            $icone = 'bi bi-moon';
        }
        return ['tema' => $tema, 'icone' => $icone];

    }

    public function user()
    {
        return $this->belongsTo(\App\Models\Tipos_usuario::class, 'id_tipo', 'id');
    }

    public function detalhes(){
        return $this->hasOne(\App\Models\Detalhes_usuario::class, 'id_usuario', 'id');
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
