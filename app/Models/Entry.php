<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'entry';
    protected $primaryKey = 'id';
    protected $fillable = ['id','pharmacy_id','supplier_id','user_id','qty','date_input'];
}
