<?php

namespace App\Http\Controllers;

use App\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning editCompany">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger deleteCompany">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::where('id', $request->company_id)->first();
        
        // Hapus logo lama, jika ada
        if ($company) {
            $filepath = public_path().'/img/' . $company->logo;

            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus / tidak ada
            }
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $name = time().'-'.$file->getClientOriginalName();

            $image['filePath'] = $name;
            $file->move(public_path().'/img/', $name);
        } else {
            $name = "";
        }
        
        Company::updateOrCreate(['id' => $request->company_id],
            ['name' => $request->name, 'email' => $request->email, 'logo' => $name, 'website' => $request->website]);

        return response()->json(['success' => 'Successfully added company!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request)
    {
        $company = Company::where('id', $request->company_id)->first();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $name = time().'-'.$file->getClientOriginalName();

            $image['filePath'] = $name;
            $file->move(public_path().'/img/', $name);
            
            // Hapus logo lama, jika ada
            if ($company) {
                $filepath = public_path().'/img/' . $company->logo;

                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus / tidak ada
                }
            }
        }
        
        Company::update(['id' => $request->company_id],
            ['name' => $request->name, 'email' => $request->email, 'logo' => $name, 'website' => $request->website]);

        return response()->json(['success' => 'Successfully updated company!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::where('id', $id)->first();
    
        // Hapus logo lama, jika ada
        if ($company) {
            $filepath = public_path().'/img/' . $company->logo;
            //dd($filepath);
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus / tidak ada
            }
        }

        Company::find($id)->delete();

        return response()->json(['success' => 'Successfully deleted company!']);
    }
}
