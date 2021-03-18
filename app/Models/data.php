<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    use HasFactory;
    protected $fillable = ['device_id','tanggal','value1','value2'];

    public function device(){
        return $this-> belongsTo(device::class);
    }
}
