<?php

namespace App\Http\Controllers;

use App\Exports\SubExport;
use App\Models\Note;
use App\Models\Subscriber;
use App\Models\Transaction;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::simplePaginate(5);
        $jml_sub = Subscriber::cursor()->count();
        $jml_tran = Transaction::cursor()->count();
        $catatan = Note::all();

        //tanggal & jam
        $zone = 'Asia/Makassar';
        $now = new DateTime('now', new DateTimeZone($zone));
        $tanggal = $now->format('d-m-Y');
        $jam = $now->format('H:i:s');

        // dd($tanggal);
        
        return view('dashboard')->with([
            'subscribers' => $subscribers,
            'jml_sub' => $jml_sub,
            'jml_tran' => $jml_tran,
            'catatan' => $catatan,
            'tanggal' => $tanggal,
            'jam' => $jam
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.note.create');
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
            'catatan' => 'required'
        ]);

        $catatan = new Note;
        $catatan->catatan = $request->catatan;
        $catatan->save();

        return redirect()->route('dashboard.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catatan = Note::findOrFail($id);
        $catatan->delete();

        return redirect()->route('dashboard.index');
    }

    //Subscribers
    

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSubscriber(Request $request)
    {
        $request->validate([
            'email' => 'email'
        ]);

        $subscriber = new Subscriber;
        $subscriber->subscriber = $request->subscriber;
        $subscriber->save();

        return redirect()->route('home');
    }

    public function subscriberExport()
    {
        return Excel::download(new SubExport, 'subscribers.xlsx');
    }

}
