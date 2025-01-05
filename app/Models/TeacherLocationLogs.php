<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\DynamicConnectionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TeacherLocationLogs extends Authenticatable
{
    use HasFactory, Notifiable, DynamicConnectionTrait;
    protected $table = 'teacher_location_logs';
    protected $fillable = ['teacher_cnic', 'lat', 'long', 'ip_address', 'login_at', 'submit_at', 'status', 'imei_number'];

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
