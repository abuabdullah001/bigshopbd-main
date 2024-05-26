<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\General;
use App\Models\Slider;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $settings = General::get()->first();
        return view('backend.general.settings', compact('settings'));
    }

    public function slider()
    {
        $sliders = Slider::all();
        return view('backend.general.sliders', compact('sliders'));
    }

    public function sliderCreate()
    {
        return view('backend.general.sliderCreate');
    }

    public function sliderStore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:png,jpg',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/slider',$filename);
            $imageName = url('images/slider', $filename);
        }

        Slider::create([
            'image' => $imageName,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $this->flashMessage('success', 'new slider created successfully.');
        return redirect()->route('sliders');
    }
    
    public function sliderEdit(Slider $slider)
    {
        return view('backend.general.editSlider', compact('slider'));
    }

    public function sliderUpdate(Slider $slider, Request $request)
    {
        $this->validate($request, [
            'image' => 'sometimes|mimes:png,jpg',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            if (file_exists(public_path('iamges/slider/'.$slider->image))) {
                unlink(public_path('iamges/slider/'.$slider->image));
            }
            $fileName = time().'.'.$request->image->extension();
            $request->image->move('iamges/slider/', $fileName);
            $slider->image = url('iamges/slider',$fileName);
        }

        $slider->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $this->flashMessage('info', 'Slider Updated successfully.');
        return redirect()->back();
    }

    public function sliderDestroy(Slider $slider)
    {
        $slider->delete();

        $this->flashMessage('warning', 'Slider Deleted successfully.');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $settings= General::findOrFail($id);

        $data = [
            'site_name' => $request->site_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'site_slogan' => $request->site_slogan,
            'active_time' => $request->active_time,
        ];
        
        $imageFields = ['site_logo', 'site_logo_footer', 'site_logo_white'];
        $images = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $imageName = url('images/general/'.time().'.'.$file->extension());
                $file->move('images/general/', $imageName);
                $images[$field] = $imageName;
            }
        }
        $data = array_merge($data, $images);

        $settings->update($data);

        $this->flashMessage('info', 'Settings updated Successfully');
        return redirect()->back();
    }

    public function updateQuickLinks(Request $request, $id)
    {
        $settings= General::findOrFail($id);

        $data = [
            'links_1_name' => $request->links_1_name,
            'links_1' => $request->links_1,
            'links_2_name' => $request->links_2_name,
            'links_2' => $request->links_2,
            'links_3_name' => $request->links_3_name,
            'links_3' => $request->links_3,
            'links_4_name' => $request->links_4_name,
            'links_4' => $request->links_4
        ];

        $settings->update($data);

        $this->flashMessage('info', 'Settings updated Successfully');
        return redirect()->back();
    }

    public function updateSocialLinks(Request $request, $id)
    {
        $settings= General::findOrFail($id);

        $data = [
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
        ];

        $settings->update($data);

        $this->flashMessage('info', 'Settings updated Successfully');
        return redirect()->back();
    }
}
