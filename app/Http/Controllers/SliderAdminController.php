<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequestAdd;
use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderAdminController extends Controller
{
    private $slider;
    use StorageImageTrait;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(SliderRequestAdd $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];
    
            $dataImageSlider = $this->storageTraitUpLoad($request, 'slider_image_path', 'slider');
    
            if(!empty($dataImageSlider)){
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
    
            $this->slider->create($dataInsert);
    
            return redirect()->route('sliders.index')->withInput()->with('success', 'Thêm mới slider thành công!');
        } catch (\Exception $exception) {
            Log::error('error:' . $exception->getMessage() . '---Line:'. $exception->getLine());
        }
       
    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];
    
            $dataImageSlider = $this->storageTraitUpLoad($request, 'slider_image_path', 'slider');
    
            if(!empty($dataImageSlider)){
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
            }
    
            $this->slider->find($id)->update($dataUpdate);
    
            return redirect()->route('sliders.index')->withInput()->with('success', 'Sửa slider thành công!');
        } catch (\Exception $exception) {
            Log::error('error:' . $exception->getMessage() . '---Line:'. $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success',
                'slider_id' => $id
            ], 200);
        } catch (\Exception $exception) {
            Log::error('error:' . $exception->getMessage() . '---Line:'. $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Delete fail'
            ], 500);
        }
    }
}
