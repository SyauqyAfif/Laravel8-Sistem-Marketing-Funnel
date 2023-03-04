<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

date_default_timezone_set('Asia/Jakarta');

class ContentController extends Controller
{
    public function index()
    {
        $content = Content::all();
        return view('program.content', compact('content'));
    }

    public function store(Request $request)
    {
        Content::create ([
            'nama_content'         => $request->nama_content,
            'deskripsi_content'    => $request->deskripsi_content,
            'created_at'           => date('Y-m-d H:i:s'),
            'updated_at'           => date('Y-m-d H:i:s'),
            
        ]);
        return redirect('/content')
        ->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $content = Content::find($id);
        $content->nama_content          = $request->nama_content;
        $content->deskripsi_content     = $request->deskripsi_content;
        $content->updated_at            = date('Y-m-d H:i:s');
        $content->save();
        return redirect('/content')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();
        return redirect('/content')->with('success', 'Data Berhasil Dihapus');
    }
}
