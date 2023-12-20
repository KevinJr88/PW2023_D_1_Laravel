<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customer = User::all();
        if ($request->wantsJson()) {
            $response = [
                'success' => true,
                'message' => 'Data Berhasil Diambil!',
                'data' => $customer
            ];
            return response()->json($response, 200);
        }
        return view('admin/customerManagement', [
            'member' => $customer
        ]);
        return view('admin/customerManagement', [
            'member' => User::all()
        ]);
    }
    public function edit(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'active' => 'required'
            ]);
            $member = User::find($id);
            $member->name = $request->name;
            $member->email = $request->email;
            $member->address = $request->address;
            $member->phone = $request->phone;
            $member->active = $request->active;
            $member->save();
            $response = [
                'success' => true,
                'message' => 'Data Berhasil Diubah!',
                'data' => $member
            ];
            if ($request->wantsJson()) {
                return response()->json($response, 200);
            }
            return redirect()->route('customer.index');
        } catch (\Throwable $th) {
            return redirect()->route('customer.index');
        }
    }
    public function destroy($id)
    {
        try {
            $member = User::find($id);
            $member->delete();
            $response = [
                'success' => true,
                'message' => 'Data Berhasil Dihapus!',
                'data' => $member
            ];
            return redirect()->route('customer.index');
        } catch (\Throwable $th) {
            return redirect()->route('customer.index');
        }
    }
}
