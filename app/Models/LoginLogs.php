<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\DynamicConnectionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class LoginLogs extends Authenticatable
{
    use HasFactory, Notifiable, DynamicConnectionTrait;
    protected $table = 'login_logs';
    protected $fillable = ['cnic', 'login_time', 'user_type', 'ip_address'];

    public function __construct()
    {
        // You can apply the below variable dynamically and model
        // will use that new connection
        $this->connection = $this->determineConnection();

    }
    public function question()
    {
        return $this->hasOne(PaperQuestion::class, '');
    }

}
