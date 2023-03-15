<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Marketing;
use App\Models\Grafik;

class GrafikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Content::all();
        $marketing = Marketing::all();
        $grafik = Grafik::with('nama_content','level_content')->get();
        return view('program.grafik', compact('content','marketing','grafik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Grafik::create ([
            'nama_content'   => $request->nama_content,
            'level_content'  => $request->level_content,
            'like'  => $request->like,
            'view'  => $request->view,
            'comment'  => $request->comment,
            'tanggal'  => $request->tanggal,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
            
        ]);
        return redirect('/grafik')
        ->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grafik = Grafik::find($id);
        $grafik->nama_content    = $request->nama_content;
        $grafik->level_content   = $request->level_content;
        $grafik->like            = $request->like;
        $grafik->view            = $request->view;
        $grafik->comment         = $request->comment;
        $grafik->tanggal         = $request->tanggal;
        $grafik->updated_at      = date('Y-m-d H:i:s');
        $grafik->save();

        return redirect('/grafik')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grafik = Grafik::find($id);
        $grafik->delete();

        return redirect('/grafik')->with('success', 'Data Berhasil Dihapus');
    }
}
