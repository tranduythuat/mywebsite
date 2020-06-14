<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menu;
    private $menuRecusive;
    public function __construct(Menu $menu, MenuRecusive $menuRecusive)
    {
        $this->menu = $menu;
        $this->menuRecusive = $menuRecusive;
    }

    public function index()
    {
        $menus = $this->menu->latest()->paginate(5);
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menu.add', compact('optionSelect'));
    }
    
    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);

        return redirect()->route('menus.index')->with('success', 'Tạo mới menu thành công!');
    }

    public function edit($id)
    {
        $menuById = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuById->parent_id);
        return view('admin.menu.edit', compact('optionSelect', 'menuById'));
    }

    public function update($id, Request $request) 
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::of($request->name)->slug('-')
        ]);

        return redirect()->route('menus.index')->with('success', 'Sửa menu thành công!');
    }

    public function delete($id)
    {
        $this->menu->find($id)->delete();

        return redirect()->route('menus.index')->with('success', 'Xóa menu thành công!');
    }
}
 