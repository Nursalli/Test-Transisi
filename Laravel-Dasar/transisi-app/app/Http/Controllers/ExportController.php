<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\employees;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index($id){
        $data = employees::GetCompanyById($id);

        if($data->isEmpty()){
            return redirect('/companies')->with('danger', 'Company dont have employees!');
        }

        $pdf = PDF::loadView('cetak.employees-pdf', ['data' => $data]);
        return $pdf->download('employees-'.$data[0]->company->nama.'.pdf');
    }
}
