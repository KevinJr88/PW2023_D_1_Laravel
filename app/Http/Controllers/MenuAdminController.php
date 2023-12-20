<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuAdminController extends Controller
{
    public function index(Request $request)
    {
        $menu = Menu::all();
        if($request->wantsJson()){
            $response = [
                'success' => true,
                'message' => 'Data Berhasil Diambil!',
                'data' => $menu
            ];
            return response()->json($response, 200);
        }
        return view('admin/menuManagement', [
            'menu' => $menu
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'desc' => 'required',
            'category' => 'required',
            'stock' => 'required'
        ]);
        $menuData = $request->except('image');
        $image = $request->file('image')->store('public/menu');
        $menuData['image'] = $image;
        Menu::create($menuData);
        $response = [
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
                'data' => $menuData
            ];

        if ($request->wantsJson()) {
            return response()->json($response, 201);
        }
        return 
        redirect()->route('menu.index')->with([
            'success' => 'Data Berhasil Disimpan!',
            'data' => $menuData
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
            $menu = Menu::find($id);
            $menu->update($request->except('image'));
            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('public/menu');
                Storage::delete($menu->image);
                $menu->image = $image;
            }
            $menu->save();
            $response = [
                'success' => true,
                'message' => 'Data Berhasil Diubah!',
                'request' => $request->all(),
                'data' => $menu
            ];
            if ($request->wantsJson()) {
                return response()->json($response, 200);
            }
            return redirect()->route('menu.index')->with([
                'success' => 'Data Berhasil Diubah!',
                'data' => $menu]);

    }
    public function destroy($id, Request $request)
    {
        $menu = Menu::find($id);
        $delete = $menu;
        Storage::delete($menu->image);
        $menu->delete();
        // dd($delete);
        $response = [
            'success' => true,
            'message' => 'Data Berhasil Dihapus!',
            'data' => $delete
        ];

        if ($request->wantsJson()) {
            return response()->json($response, 201);
        }
        return
        redirect()->route('menu.index');
    }
}
