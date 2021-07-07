<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Code;
use App\Models\Gift;
use App\Models\Image;

class CodeController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        $company = $user->company;
        $codes = $company->codes;

        return view('dashboard.codes.index', [
            "codes" => $codes
        ]);
    }

    public function create(Request $request)
    {
        $company = $request->user()->company;
        $code_uuid = strtoupper(uniqid ("SNAP"));
        return view('dashboard.codes.create', [
            "uuid" => $code_uuid,
            "company" => $company
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'gift_name' => 'required',
            'gift_description' => 'required'
        ]);

        $data = $request->all();
        $data['active'] = $request->active ? 1 : 0; 
        $data['company_id'] = $request->user()->company->id;

        $code = Code::create($data);

        $giftImageName = time().'.'.$request->gift_image->extension(); 
        $request->gift_image->move(public_path('images'), $giftImageName);
        $giftImage = Image::create(
            [
                'name' => $giftImageName,
                'path' => '/images/' . $giftImageName
            ]
        );

        Gift::create(
            [
                "name" => $data['gift_name'],
                "description" => $data['gift_description'],
                "price" => 0,
                "stock" => $data['gift_stock'],
                "win_probability" => $data['gift_win_probability'],
                "max_win_per_day" => $data['gift_max_win_per_day'],
                "generate_coupon" => 1,
                "code_id" => $code->id,
                "company_id" => $data["company_id"],
                "image_id" => $giftImage->id
            ]
        );

        return redirect()->route('dashboard')
            ->with('success', 'QRCode created successfully.');
    }

    public function edit(Request $request, Code $code)
    {
        $company = $request->user()->company;
        return view('dashboard.codes.edit', [
            "company" => $company,
            "code" => $code
        ]);
    }

    public function update(Request $request, Code $code)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'gift_name' => 'required',
            'gift_description' => 'required'
        ]);

        $data = $request->all();
        $data['active'] = $request->active ? 1 : 0; 
        $data['company_id'] = $request->user()->company->id;

        $code->update($data);
        $gift = $code->choose_gift();
        $gift->update(
            [
                "name" => $data['gift_name'],
                "description" => $data['gift_description'],
                "price" => 0,
                "stock" => $data['gift_stock'],
                "win_probability" => $data['gift_win_probability'],
                "max_win_per_day" => $data['gift_max_win_per_day'],
                "generate_coupon" => 1,
                "code_id" => $code->id,
                "company_id" => $data["company_id"]
            ]
        );
        $gift->save();
        $code->save();

        return redirect()->route('codes.index');
    }


}
