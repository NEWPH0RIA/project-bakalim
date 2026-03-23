<?php

namespace src\models;
use src\serveses\DB;

class Users 
{
    protected $nickname;
    protected $email;
    protected $is_confirmed;
    protected $role;
    protected $password_hash;
    protected $auth_token;
    protected $created_at;

    private static function getTableName(): string
    {
        return 'users';
    }

    public function getNickName(): string
    {
        return $this->nickname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function isConfirmed()
    {
        return $this->is_confirmed;
    }

    public function role()
    {
        return $this->role;
    }

    public function passwordHash(): string
    {
        return $this->password_hash;
    }

    public function authToken(): string
    {
        return $this->auth_token;
    }

    public function createdAt(): string
    {
        return $this->created_at;
    }
}