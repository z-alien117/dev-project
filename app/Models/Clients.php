<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function invoices(){
        return $this->hasMany(Invoices::class, 'ClientId', 'id');
    }
}
