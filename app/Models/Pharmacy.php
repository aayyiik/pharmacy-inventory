<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;
    protected $table = 'pharmacy';
    protected $primaryKey = 'id';
    protected $fillable = ['id','kode','name','category_id','merk','stok'];

    public function category()
    {
        return $this->belongsTo(Category::class,'id');
    }
}
