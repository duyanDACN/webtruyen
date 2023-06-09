<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'tendanhmuc','motadanhmuc','hienthi'
    ];
    protected $primaryKey = 'danhmuc_id';
    protected $table = 'danhmuc';
}
