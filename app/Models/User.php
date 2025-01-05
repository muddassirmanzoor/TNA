<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\DynamicConnectionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, DynamicConnectionTrait;
    protected $table = 'teachers_info';
    protected $primaryKey = 'id'; // Set your primary key here
    public $timestamps = false;

    public function __construct()
    {
        // You can apply the below variable dynamically and model
        // will use that new connection
        $this->connection = $this->determineConnection();

    }
    public function answer()
    {
        return $this->hasOne(PaperAnswer::class, 'cnic', 'st_cnic');
    }
    public function interview()
    {
        return $this->hasMany(InterviewResult::class, 'teacher_cnic', 'st_cnic');
    }
}
