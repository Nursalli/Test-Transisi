<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = employees::GetEmployees();
        return view('employees.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = companies::GetCompanies();
        return view('employees.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|unique:employees',
            'company_id' => 'required',
        ];

        $validateData = $request->validate($rules);

        employees::AddEmployee($validateData);

		return redirect('/employees'
        )->with('success', 'Data Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees, $id)
    {
        return view('employees.show', ['data' => $employees->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(employees $employees, $id)
    {
        $companies = companies::all();
        return view('employees.edit', ['data' => $employees->find($id), 'companies' => $companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employees $employees, $id)
    {
        $old = $employees->find($id);

        $rules = [];

        if($request->nama != $old->nama){
            $rules['nama'] = 'required';
        }

        if($request->email != $old->email){
            $rules['email'] = 'required|unique:employees';
        }

        if($request->company_id != $old->company_id){
            $rules['company_id'] = 'required';
        }

        $validateData = $request->validate($rules);

        employees::UpdateEmployee($validateData, $id);

		return redirect('/employees'
        )->with('success', 'Data Changed Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(employees $employees, $id)
    {
        employees::DeleteEmployee($id);

        return redirect('/employees')->with('success', 'Data Deleted Successfully!');
    }
}
