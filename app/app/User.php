<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number','name', 'department','email', 'password',
    ];

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

    public function post(){
        return $this->belongsToMany('App\Post','post_product');
    }

    public function scopeSearchName($query, $name)
    {
        if ($name) {          
            $spaceConversion = mb_convert_kana($name, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);          
            foreach($wordArraySearched as $value) {
                $query->where('users.name', 'like', '%'.$value.'%');
            }
        }
        return $query;
    }
    public function scopeSearchDepartment($query, $department)
    {
        if ($department) {          
            $spaceConversion = mb_convert_kana($department, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);          
            foreach($wordArraySearched as $value) {
                $query->where('users.department', 'like', '%'.$value.'%');
            }
        }
        return $query;
    }

    public function scopeSearchClient($query, $client)
    {
        if ($client) {          
            $spaceConversion = mb_convert_kana($client, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);          
            foreach($wordArraySearched as $value) {
                $query->where('posts.client', 'like', '%'.$value.'%');
            }
        }
        return $query;
    }
    public function scopeSearchNumber($query, $number)
    {
        if ($number) {          
            $query->where('number', 'like', '%'.$number.'%');
        }
        return $query;
    }
    
    /**
    * パスワードリセット通知の送信
    *
    * @param string $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    
}
