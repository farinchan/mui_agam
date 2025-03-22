<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\MuiKecamatan;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class MuiKecamatanController extends Controller
{
    public function index()
   {
        $data = [
            'title' => 'List MUI Kecamatan',
            'menu' => 'Menu',
            'sub_menu' => 'MUI Kecamatan',
            'list_personalia' => MuiKecamatan::all()
        ];

        return view('back.pages.mui-kecamatan.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        MuiKecamatan::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        Alert::success('Success', 'Data berhasil ditambahkan');
        return redirect()->route('admin.personalia.index');


    }

    public function edit($id)
    {
        $data = [
            'title' => 'Personalia Edit',
            'menu' => 'Menu',
            'sub_menu' => 'MUI Kecamatan',
            'personalia' => MuiKecamatan::find($id)
        ];

        return view('back.pages.mui-kecamatan.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
        ],[
            'name.required' => 'Nama harus diisi',
            'content.required' => 'Konten harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        MuiKecamatan::find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
        ]);

        Alert::success('Success', 'Data berhasil diubah');
        return redirect()->route('admin.personalia.index');
    }

    public function destroy($id)
    {
        MuiKecamatan::find($id)->delete();
        Alert::success('Success', 'Menu berhasil dihapus');
        return redirect()->back();
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ],[
            'upload.required' => 'File harus diisi',
            'upload.image' => 'File harus berupa gambar',
            'upload.mimes' => 'File harus berupa gambar jpeg, png, jpg, gif, svg',
            'upload.max' => 'File maksimal 20MB',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'uploaded' => false,
                'error' => $validator->errors()->first()
            ]);
        }

        $file = $request->file('upload');
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->StoreAs('mui-kecamatan', $fileName, 'public');

        $url = Storage::url($filePath);

        return response()->json([
            'uploaded' => true,
            'url' => $url
        ]);
    }
}
