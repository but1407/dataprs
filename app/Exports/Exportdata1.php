<?php

namespace App\Exports;

use App\Models\datable1;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Exportdata1 implements ShouldAutoSize,FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;
    use Exportable;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function array(): array
    {
        return $this->data;
    }
    public function title() : string{
        return "Exportable";
    }
    // public function view() : View
    // {
    //     return view('welcome',[
    //         'data'=>$this->data
    //     ]);
    // }
}