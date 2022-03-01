<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $guarded = ['id'];

    public function employee(){
        return $this->HasMany(employees::class);
    }

    public function scopeGetCompanies($query){
        return $query->paginate(5);
    }

    public function scopeAddCompany($query, $data){
        return $query->create($data);
    }

    public function scopeUpdateCompany($query, $data, $id){
        return $query->where('id', $id)
        ->update($data);
    }

    public function scopeDeleteCompany($query, $id){
        return $query->where('id', $id)->delete();
    }
}
