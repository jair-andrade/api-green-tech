<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address_name',
        'address_number',
        'address_zip_code'
    ];

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
