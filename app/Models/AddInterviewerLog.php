<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\DynamicConnectionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AddInterviewerLog extends Authenticatable
{
    use HasFactory, Notifiable, DynamicConnectionTrait;
    protected $table = 'add_interviewer_log';
    protected $guarded = [];

    public function __construct()
    {
        // You can apply the below variable dynamically and model
        // will use that new connection
        $this->connection = $this->determineConnection();

    }
    public function teacher()
    {
        return $this->hasOne(User::class, 'st_cnic', 'teacher_cnic');
    }

}
