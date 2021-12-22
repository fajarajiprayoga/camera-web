<?php

namespace App\Exports;

use App\Models\Subscriber;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subscriber::all();
    }
}
