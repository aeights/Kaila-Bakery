<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',[
            'sliders' => $sliders
        ]);
    }

    public function add()
    {
        return view('admin.slider.add');
    }

    public function store(SliderRequest $sliderRequest)
    {
        if ($sliderRequest->validated()) {
            $slider = Slider::create([
                'title' => $sliderRequest->title,
                'sub_title' => $sliderRequest->sub_title,
            ]);

            if ($sliderRequest->hasFile('image')) {
                $slider->addMediaFromRequest('image')->toMediaCollection('slider');
            }

            return to_route('dashboard.admin.slider')->with('message','Slider Berhasil Ditambahkan');
        }
    }

    public function edit(Request $request)
    {
        $slider = Slider::find($request->id);
        return view('admin.slider.edit',[
            'slider' => $slider
        ]);
    }

    public function update(SliderRequest $sliderRequest)
    {
        if ($sliderRequest->validated()) {
            $slider = Slider::find($sliderRequest->id);
            $slider->update([
                'title' => $sliderRequest->title,
                'sub_title' => $sliderRequest->sub_title,
            ]);

            if ($sliderRequest->hasFile('image')) {
                $slider->clearMediaCollection('slider');
                $slider->addMediaFromRequest('image')->toMediaCollection('slider');
            }

            return to_route('dashboard.admin.slider')->with('message','Slider Berhasil Diupdate');
        }
    }

    public function delete()
    {
        $slider = Slider::find(request('id'));
        $slider->delete();
        $slider->clearMediaCollection('slider');
        return to_route('dashboard.admin.slider')->with('message','Slider Berhasil Dihapus');
    }
}
