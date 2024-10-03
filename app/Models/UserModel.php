<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'userrr';
    protected $guarded = ['id'];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    
    public function getUser(){
        return $this->join('kelas','kelas.id','=','userrr.kelas_id')->select('userrr.*','kelas.nama_kelas as nama_kelas')->get();
    }

    public function saveUser($data)
{
    return $this->create($data);
}
}
