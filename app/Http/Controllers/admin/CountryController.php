<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Requests\CountryRequest;
class CountryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return view('admin.country.list', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.create');
    }
    public function storeCountry(CountryRequest $request){
        $data = $request->validated();
        if(Country::create($data)){
            return redirect()->route('admin.country.list')->with('success', 'Country created successfully');
        }else{
            return redirect()->back()->with('error', 'Country creation failed');
        }
    }
    public function destroy($id){
        $country = Country::find($id);
        $country->delete();
        return redirect()->back()->with('success', 'Country deleted successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


}
