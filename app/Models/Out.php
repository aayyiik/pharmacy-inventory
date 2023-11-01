<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Out extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'out';
    protected $primaryKey = 'id';
    protected $fillable = ['id','pharmacy_id','user_id','qty','date_output','description'];

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
