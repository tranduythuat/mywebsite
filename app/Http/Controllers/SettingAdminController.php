<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingAdminController extends Controller
{

    private $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(AddSettingRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ]);

        return redirect()->route('settings.index')->withInput()->with('success', 'Thêm setting thành công!');
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ]);

        return redirect()->route('settings.index')->with('success', 'Sửa thành công setting!');
    }

    public function delete($id)
    {
        try {
            $this->setting->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success',
                'setting_id' => $id
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
