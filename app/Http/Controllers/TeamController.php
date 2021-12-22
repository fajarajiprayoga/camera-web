<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::simplePaginate(5);
        return view('pages.teams.index')->with([
            'teams' => $teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'image',
            'nim' => 'required',
            'tugas' => 'required'
        ]);

        $team = new Team;
        $team->nama = $request->nama;
        if($request->file('foto')){
            $file = $request->file('foto');

            $nama_file = time().str_replace(" ", "", $file->getClientOriginalName());

            $file->move('foto_tim', $nama_file);
            $team->foto = $nama_file;
        }
        $team->nim = $request->nim;
        $team->tugas = $request->tugas;
        $team->save();

        return redirect()->route('teams.index');
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
        $team = Team::findOrFail($id);

        return view('pages.teams.edit')->with([
            'team' => $team
        ]);
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
        $team = Team::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'foto' => 'image',
            'nim' => 'required',
            'tugas' => 'required'
        ]);

        $team->nama = $request->nama;

        $old_file = $team->foto;

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $nama_file = $old_file;

            $file->move('foto_tim', $nama_file);
            $team->foto = $nama_file;
        }

        $team->nim = $request->nim;
        $team->tugas = $request->tugas;
        $team->save();

        return redirect()->route('teams.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $file = public_path('foto_tim/' . $team->foto);

        if (file_exists($file)) {
            @unlink($file);
        }

        $team->delete();

        return redirect()->route('teams.index');
    }
}
