<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'loans';
    protected $fillable = [
        'user_id',
        'amount',
        'reason',
        'license',
        'photoID',
        'selfie',
        'ssn',
        'status',
 
    ];

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id','id');
    }
    
}
