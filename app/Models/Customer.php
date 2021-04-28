<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    public function scopeSearch($query, $params = [])
    {
        if (isset($params['name']) && $params['name']) {
            $query->where('name', 'LIKE', '%' . $params['name'] . '%');
        }

        if (isset($params['email']) && $params['email']) {
            $query->where('email', 'LIKE', $params['email']. '%');
        }

        if (isset($params['phone']) && $params['phone']) {
            $query->where('phone', 'LIKE', '%' . $params['phone']. '%');
        }
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
