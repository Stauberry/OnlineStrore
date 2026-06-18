<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Permission;
class Role extends Model
{
    protected $fillable = ['name'];

    // связь: одна роль → много пользователей
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // связь: роль → много permissions через pivot таблицу
    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'role_permission',
            'role_id',
            'permission_id'
        );
    }
}
