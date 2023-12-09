<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index',[
            'banners' => $banners
        ]);
    }

    public function add()
    {
        return view('admin.banner.add');
    }

    public function store(BannerRequest $bannerRequest)
    {
        if ($bannerRequest->validated()) {
            $banner = Banner::create([
                'title' => $bannerRequest->title,
                'sub_title' => $bannerRequest->sub_title,
            ]);

            if ($bannerRequest->hasFile('image')) {
                $banner->addMediaFromRequest('image')->toMediaCollection('banner');
            }

            return to_route('dashboard.admin.banner')->with('message','Banner Berhasil Ditambahkan');
        }
    }

    public function edit(Request $request)
    {
        $banner = Banner::find($request->id);
        return view('admin.banner.edit',[
            'banner' => $banner
        ]);
    }

    public function update(BannerRequest $bannerRequest)
    {
        if ($bannerRequest->validated()) {
            $banner = Banner::find($bannerRequest->id);
            $banner->update([
                'title' => $bannerRequest->title,
                'sub_title' => $bannerRequest->sub_title,
            ]);

            if ($bannerRequest->hasFile('image')) {
                $banner->clearMediaCollection('banner');
                $banner->addMediaFromRequest('image')->toMediaCollection('banner');
            }

            return to_route('dashboard.admin.banner')->with('message','Banner Berhasil Diupdate');
        }
    }

    public function delete()
    {
        $banner = Banner::find(request('id'));
        $banner->delete();
        $banner->clearMediaCollection('banner');
        return to_route('dashboard.admin.banner')->with('message','Banner Berhasil Dihapus');
    }
}
