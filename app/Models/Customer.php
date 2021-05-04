<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    public function notes()
    {
        return $this->hasMany(Note::class, 'customer_id','id');
    }

    public function scopeSearch($query, $params = [])
    {
        if (isset($params['name']) && $params['name']) {
            $query->where('name', 'LIKE', '%' . $params['name'] . '%');
        }

        if (isset($params['email']) && $params['email']) {
            $query->where('email', 'LIKE', $params['email'] . '%');
        }

        if (isset($params['phone']) && $params['phone']) {
            $query->where('phone', 'LIKE', '%' . $params['phone'] . '%');
        }

        if (isset($params['sort_by']) && $params['sort_by']) {
            $query->orderBy($params['sort_by'], $params['sorting_direction']);
        }

        if (!isset($params['sort_by'])) {
            $query->orderBy('name', 'asc');
        }

    }

    public function scopeFreshRegister($query)
    {
        $date = Carbon::now()->subWeek()->format('Y-m-d');
        $query->where('created_at', '>', $date);
    }

    public function lastUpdatedAt()
    {
        return $this->updated_at->format('Y-m-d');
    }

    public function setAttributes($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        if (isset($data['password']) && $data['password']) {
            $this->password = \Hash::make($data['password']);
        }
        if (isset($data['phone']) && $data['phone']) {
            $this->phone = $data['phone'];
        }

    }
}
