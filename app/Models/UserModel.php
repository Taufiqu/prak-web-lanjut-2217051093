<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'userrr';

    protected $guarded = ['id'];

    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto',
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    
    public function getUser($id = null){
    $query = $this->join('kelas', 'kelas.id', '=', 'userrr.kelas_id')
                  ->select('userrr.*', 'kelas.nama_kelas as nama_kelas');
    
    if ($id != null) {
        // Jika $id diberikan, ambil pengguna dengan ID tertentu
        return $query->where('userrr.id', $id)->first();
    } else {
        // Jika $id tidak diberikan, ambil semua pengguna
        return $query->get();
    }
}


    public function saveUser($data)
{
    return $this->create($data);
}
}
