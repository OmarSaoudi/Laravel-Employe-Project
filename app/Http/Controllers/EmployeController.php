<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Gender;
use App\Models\Nationalitie;
use App\Models\Blood;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::all();
        return view('pages.employes.index',compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        $data['specializations'] = Specialization::all();
        return view('pages.employes.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $employes = new Employe();
            $employes->name = ['en' => $request->name_en, 'ar' => $request->name];
            $employes->email = $request->email;
            $employes->password = Hash::make($request->password);
            $employes->address = $request->address;
            $employes->joining_date = $request->joining_date;
            $employes->date_birth = $request->date_birth;
            $employes->status = $request->status;
            $employes->gender_id = $request->gender_id;
            $employes->nationalitie_id = $request->nationalitie_id;
            $employes->blood_id = $request->blood_id;
            $employes->specialization_id = $request->specialization_id;
            $employes->save();

            DB::commit(); // insert data
            return redirect()->route('employes.index');

        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employes = Employe::findorfail($id);
        return view('pages.employes.show',compact('employes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        $data['specializations'] = Specialization::all();
        $employes =  Employe::findOrFail($id);
        return view('pages.employes.edit',$data,compact('employes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $employes = Employe::findorfail($request->id);
            $employes->name = ['en' => $request->name_en, 'ar' => $request->name];
            $employes->email = $request->email;
            $employes->password = Hash::make($request->password);
            $employes->address = $request->address;
            $employes->joining_date = $request->joining_date;
            $employes->date_birth = $request->date_birth;
            $employes->status = $request->status;
            $employes->gender_id = $request->gender_id;
            $employes->nationalitie_id = $request->nationalitie_id;
            $employes->blood_id = $request->blood_id;
            $employes->specialization_id = $request->specialization_id;
            $employes->save();
            return redirect()->route('employes.index');
        }

        catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        Employe::destroy($request->id);
        return redirect()->route('employes.index');
    }

    public function delete_all_e($request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        Employe::whereIn('id', $delete_all_id)->delete();
        return redirect()->route('employes.index');
    }
}
