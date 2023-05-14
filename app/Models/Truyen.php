<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'ten_truyen','mota_truyen','hienthi_truyen','hinhanh_truyen','truyen_danhmuc_id'
    ];
    protected $primaryKey = 'truyen_id';
    protected $table = 'truyen';

    public function Danhmuc()
    {
      return $this->belongsTo('App\Models\DanhMuc','truyen_danhmuc_id','danhmuc_id');
      
    }
}
