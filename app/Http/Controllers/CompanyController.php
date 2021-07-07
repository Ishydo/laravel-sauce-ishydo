<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Image;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    
    /**
     * Public company index page.
     * 
     * @return View
     */
    public function index()
    {
        $companies = Company::active()->get();
        return view('discover', ['companies' => $companies]);
    }

    /**
     * The create company page.
     * 
     * @return View
     */
    public function create()
    {
        return view('companies.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'fullname' => 'required|max:155',
            'email' => 'required|confirmed',
            'password' => 'required|confirmed|min:8',
            'company_name' => 'required',
            'company_email' => 'required',
            'slogan' => 'required',
            'content' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $logoImageName = time().'.'.$request->logo->extension(); 
        $request->logo->move(public_path('images'), $logoImageName);
        $logo = Image::create(
            [
                'name' => $logoImageName,
                'path' => '/images/' . $logoImageName
            ]
        );

        $featuredImageName = time().'.'.$request->featured_image->extension(); 
        $request->featured_image->move(public_path('images'), $featuredImageName);
        $featured = Image::create(
            [
                'name' => $featuredImageName,
                'path' => '/images/' . $featuredImageName
            ]
        );
        
        // Creating new user
        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Creating the company
        Company::create(
            [
                'name' => $request->company_name,
                'slogan' => $request->slogan,
                'email' => $request->company_email,
                'content' => $request->description,
                'manager_id' => $user->id,
                'data' => '[]',
                'logo_image' => $logo->id,
                'featured_image' => $featured->id
            ]
        );

        event(new Registered($user));

        Auth::login($user);

        return redirect('dashboard');

    }

    /**
     * The edit company page.
     * 
     * @return View
     */
    public function edit()
    {
        return view('admin.companies.edit');
    }

    /**
     * Show the profile for a given user.
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('companies.detail', ['company' => Company::findOrFail($id)]);
    }
}
