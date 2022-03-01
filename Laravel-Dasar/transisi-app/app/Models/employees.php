<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $guarded = ['id'];

    public function company(){
        return $this->belongsTo(companies::class, 'company_id');
    }

    public function scopeGetEmployees($query){
        return $query->paginate(5);
    }

    public function scopeAddEmployee($query, $data){
        return $query->create($data);
    }

    public function scopeUpdateEmployee($query, $data, $id){
        return $query->where('id', $id)
        ->update($data);
    }

    public function scopeDeleteEmployee($query, $id){
        return $query->where('id', $id)->delete();
    }

    public function scopeGetCompanyById($query, $id){
        return $query->where('company_id', $id)->get();
    }
}
