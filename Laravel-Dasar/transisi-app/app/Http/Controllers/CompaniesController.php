<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\employees;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = companies::GetCompanies();
        return view('companies.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tgl = date('Ymd');
        $random = Str::random(10);

        $rules = [
            'nama' => 'required|unique:companies',
            'email' => 'required|unique:companies',
            'logo' => 'required|mimes:png|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ];

        $validateData = $request->validate($rules);

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $request->file('logo')->storeAs('company', $tgl.$random.'.'.$file->getClientOriginalExtension());
            $validateData['logo'] = $tgl.$random.'.'.$file->getClientOriginalExtension();
        }

        companies::AddCompany($validateData);

		return redirect('/companies'
        )->with('success', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(companies $companies, $id)
    {
        return view('companies.show', ['data' => $companies->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(companies $companies, $id)
    {
        return view('companies.edit', ['data' => $companies->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companies $companies, $id)
    {
        $old = $companies->find($id);

        $tgl = date('Ymd');
        $random = Str::random(10);

        $rules = [
            'website' => 'required'
        ];

        if($request->nama != $old->nama){
            $rules['nama'] = 'required|unique:companies';
        }

        if($request->email != $old->email){
            $rules['email'] = 'required|unique:companies';
        }

        if($request->logo != $old->logo && $request->logo != NULL){
            $rules['logo'] = 'required|mimes:png|max:2048|dimensions:min_width=100,min_height=100';
        }

        $validateData = $request->validate($rules);

        if($request->hasFile('logo')){
            Storage::disk('local')->delete('public/company/'.$old->logo);

            $file = $request->file('logo');
            $request->file('logo')->storeAs('company', $tgl.$random.'.'.$file->getClientOriginalExtension());
            $validateData['logo'] = $tgl.$random.'.'.$file->getClientOriginalExtension();
        }

        companies::UpdateCompany($validateData, $id);

		return redirect('/companies'
        )->with('success', 'Data Changed Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(companies $companies, $id)
    {
        $data = $companies->find($id);

        $cekEmployee = employees::GetCompanyById($data->id);

        if(!($cekEmployee->isEmpty())){
            return redirect('/companies')->with('danger', 'Data Deleted Unsuccessfully!');
        }

        if($data->logo){
            Storage::disk('local')->delete('public/company/'.$data->logo);
        }

        companies::DeleteCompany($id);

        return redirect('/companies')->with('success', 'Data Deleted Successfully!');
    }
}
