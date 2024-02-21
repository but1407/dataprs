<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Exports\Exportdata1;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Collection;
use App\Imports\Importdata1;
use App\Models\datable1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
class Datable1Controller extends Controller
{
    function isTwoDimensionalArray($array) {
    // Kiểm tra xem biến đầu vào có phải là mảng
    if (!is_array($array)) {
        return false;
    }
    // Sử dụng array_filter để kiểm tra xem tất cả các phần tử có phải là mảng
    $isTwoDimensional = array_filter($array, function($element) {
        return is_array($element);
    });

    return count($isTwoDimensional) === count($array);
}
    private $limit;
    private $sort;
    public const ITEM_PER_PAGE = 15;

    public function __construct()
    {
        $this->sort = 'dest';
        $this->limit = 30;
    }
    public function index(Request $request){
        $data = datable1::orderBy('created_at', 'desc')->paginate(static::ITEM_PER_PAGE);
        return view('getdata',compact('data'));
    }
    public function getUpdateAt(Request $request){
        $data = datable1::orderBy('created_at', 'desc')->paginate(static::ITEM_PER_PAGE);

        $totalThanhTienCoVAT = 0;
        $totalDongiaChuaVAT = 0;
        $totalThanhTienChuaVAT = 0;
        $totalDonGiaCoVAT = 0;
        $totalSLTheoDVTCoBan	= 0;
        $key = $request->key;
        $date = $request->date;

       
        if ($key && $date) {
            $startDate = Carbon::parse($date . 'T00:00:00.000+00:00');
            $endDate = Carbon::parse($date . 'T23:59:59.000+00:00');
            $data = datable1::orderBy('created_at', 'asc')->whereBetween('updated_at',[$startDate,$endDate])->where('data.Products.Line.MaSPNCC', 'LIKE', '%' . $key . '%')->paginate();
        }
        foreach ($data as $object) {
            if (isset($object->data['Products']) && isset($object->data['Products']['Line'])) {
                foreach ($object->data['Products'] as $line) {
                   if(self::isTwoDimensionalArray($line)){
                        foreach ($line as $key => $value) {
                            if (isset($value['ThanhTienCoVAT']) && isset($value['DongiaChuaVAT']) && isset($value['DonGiaCoVAT']) 
                            && isset($value['ThanhTienChuaVAT']) && isset($value['SLTheoDVTCoBan']) && $value['MaSPNCC'] === $request->key) {
                                
                                $totalDongiaChuaVAT += intval($value['DongiaChuaVAT']);
                                $totalDonGiaCoVAT += intval($value['DonGiaCoVAT']);
                                $totalThanhTienChuaVAT += intval($value['ThanhTienChuaVAT']);
                                $totalSLTheoDVTCoBan += intval($value['SLTheoDVTCoBan']);
                                $totalThanhTienCoVAT += intval($value['ThanhTienCoVAT']);
                            }
                        }
                    }else{
                        $totalDonGiaCoVAT += intval($line['DonGiaCoVAT']);
                        $totalThanhTienChuaVAT += intval($line['ThanhTienChuaVAT']);
                        $totalSLTheoDVTCoBan += intval($line['SLTheoDVTCoBan']);
                        $totalThanhTienCoVAT += intval($line['ThanhTienCoVAT']);
                    }
                }
            }
        }

        return  View::make('getdata', ['data'=>$data,
                                        'totalThanhTienCoVAT'=>$totalThanhTienCoVAT,
                                        'totalSLTheoDVTCoBan'=>$totalSLTheoDVTCoBan,
                                        'totalDongiaChuaVAT'=>$totalDongiaChuaVAT,
                                        'totalThanhTienChuaVAT'=>$totalThanhTienChuaVAT,
                                        'totalDonGiaCoVAT'=>$totalDonGiaCoVAT,]);
    }
    public function getSupplier(Request $request){
        $data = datable1::orderBy('created_at', 'desc')->paginate(static::ITEM_PER_PAGE);
        $totalThanhTienCoVAT = 0;
        $productData = [];
        $supplier = null;
        $key = $request->supplier;
        $date = $request->date;
        $code_province = (int) $request->code;
        if ($key && $date ) {
            $startDate = Carbon::parse($date . 'T00:00:00.000+00:00');
            $endDate = Carbon::parse($date . 'T23:59:59.000+00:00');
            $data = datable1::orderBy('created_at', 'asc')->whereBetween('updated_at',[$startDate,$endDate])
            ->where('info.supplier', 'LIKE', '%'.$key.'%')->get();
        }
        // $result = [];
        // foreach ($data as $object) {
        //     $supplier = $object['info']['supplier'];
        //     $province_code = $object['info']['province_code'];
        //     foreach ([$object['data']['Products']] as $item) {
        //         foreach ($item['Line'] as $item2) {
                    
        //             if (isset($result[$supplier][$province_code][$item2['MaSPNCC']])) {

        //                 $result[$supplier][$province_code][$item2['MaSPNCC']]['SoLuong'] += (int) $item2['SoLuong'];
        //             } else {
        //                 $result[$supplier][$province_code][$item2['MaSPNCC']]['SoLuong'] = 0;
        //             }
        //         }
        //     }

        // }

        // dd($result);
        foreach ($data as $object) {
            $supplier = $object['info']['supplier'];
            $province_code = $object['info']['province_code'];
            // $ids = $object['_id'];
            if (isset($object->info) && isset($object->info['supplier'])) {
                foreach ($object->data['Products'] as $line) {
                    if(self::isTwoDimensionalArray($line)){
                        foreach ($line as $key => $value) {
                            if (
                                isset($value['ThanhTienCoVAT']) && isset($value['DongiaChuaVAT']) && isset($value['DonGiaCoVAT'])
                                && isset($value['ThanhTienChuaVAT']) && isset($value['SLTheoDVTCoBan']) && $object['info']['supplier'] === $request->supplier
                            ) {
                                if ((int) $value['DongiaChuaVAT'] == 0) {
                                    
                                    if (isset($productData[$supplier][$province_code][$value['MaSPNCC'] . '(1)'])) {
                                        $productData[$supplier][$province_code][$value['MaSPNCC'] . '(1)']['SLTheoDVTCoBan'] += (int) $value['SLTheoDVTCoBan'];

                                    } else {
                                        $productData[$supplier][$province_code][$value['MaSPNCC'] . '(1)']['SanPham'] = $value['SanPham'];
                                        $productData[$supplier][$province_code][$value['MaSPNCC'] . '(1)']['SLTheoDVTCoBan'] = (int) $value['SLTheoDVTCoBan'];
                                        $productData[$supplier][$province_code][$value['MaSPNCC'] . '(1)']['DongiaChuaVAT'] = (int) $value['DongiaChuaVAT'];
                                        $productData[$supplier][$province_code][$value['MaSPNCC'] . '(1)']['ThanhTienChuaVAT'] = (int) $value['ThanhTienChuaVAT'];
                                        $productData[$supplier][$province_code][$value['MaSPNCC'] . '(1)']['ThanhTienCoVAT'] = (int) $value['ThanhTienCoVAT'];
                                    }
                                } else {
                                    if (isset($productData[$supplier][$province_code][$value['MaSPNCC']]) ) {
                                        $productData[$supplier][$province_code][$value['MaSPNCC']]['SLTheoDVTCoBan'] += (int) $value['SLTheoDVTCoBan'];
                                        // $productData[$supplier][$province_code][$value['MaSPNCC']]['DongiaChuaVAT'] = (int) $value['DongiaChuaVAT'];
                                        $productData[$supplier][$province_code][$value['MaSPNCC']]['ThanhTienChuaVAT'] += (int) $value['ThanhTienChuaVAT'];
                                        $productData[$supplier][$province_code][$value['MaSPNCC']]['ThanhTienCoVAT'] += (int) $value['ThanhTienCoVAT'];
                                    } else {
                                            $productData[$supplier][$province_code][$value['MaSPNCC']]['SanPham'] = $value['SanPham'];
                                            $productData[$supplier][$province_code][$value['MaSPNCC']]['SLTheoDVTCoBan'] = (int) $value['SLTheoDVTCoBan'];
                                            $productData[$supplier][$province_code][$value['MaSPNCC']]['DongiaChuaVAT'] = (int) $value['DongiaChuaVAT'];
                                            $productData[$supplier][$province_code][$value['MaSPNCC']]['ThanhTienChuaVAT'] = (int) $value['ThanhTienChuaVAT'];
                                            $productData[$supplier][$province_code][$value['MaSPNCC']]['ThanhTienCoVAT'] = (int) $value['ThanhTienCoVAT'];
                                    }
                                }
                            }
                        }
                    }
                    else{
                        if((int) $line['DongiaChuaVAT'] == 0){
                            if (isset($productData[$supplier][$province_code][$line['MaSPNCC'] . '(1)'])) {
                                $productData[$supplier][$province_code][$line['MaSPNCC'] . '(1)']['SLTheoDVTCoBan'] += (int) $line['SLTheoDVTCoBan'];

                            } else {
                                $productData[$supplier][$province_code][$line['MaSPNCC'] . '(1)']['SanPham'] = $line['SanPham'];
                                $productData[$supplier][$province_code][$line['MaSPNCC'] . '(1)']['SLTheoDVTCoBan'] = (int) $line['SLTheoDVTCoBan'];
                                $productData[$supplier][$province_code][$line['MaSPNCC'] . '(1)']['DongiaChuaVAT'] = (int) $line['DongiaChuaVAT'];
                                $productData[$supplier][$province_code][$line['MaSPNCC'] . '(1)']['ThanhTienChuaVAT'] = (int) $line['ThanhTienChuaVAT'];
                                $productData[$supplier][$province_code][$line['MaSPNCC'] . '(1)']['ThanhTienCoVAT'] = (int) $line['ThanhTienCoVAT'];
                            }
                        }else{
                            if(isset($productData[$supplier][$province_code][$line['MaSPNCC']]) ){
                                $productData[$supplier][$province_code][$line['MaSPNCC']]['SLTheoDVTCoBan'] += (int) $line['SLTheoDVTCoBan'];
                                $productData[$supplier][$province_code][$line['MaSPNCC']]['ThanhTienCoVAT'] += (int)$line['ThanhTienCoVAT'];
                                $productData[$supplier][$province_code][$line['MaSPNCC']]['ThanhTienChuaVAT'] += (int)$line['ThanhTienChuaVAT'];
                            }
                            else {
                                $productData[$supplier][$province_code][$line['MaSPNCC']]['SanPham'] =  $line['SanPham'];
                                $productData[$supplier][$province_code][$line['MaSPNCC']]['SLTheoDVTCoBan'] = (int)$line['SLTheoDVTCoBan'];
                                $productData[$supplier][$province_code][$line['MaSPNCC']]['DongiaChuaVAT'] = (int)$line['DongiaChuaVAT'];
                                $productData[$supplier][$province_code][$line['MaSPNCC']]['ThanhTienChuaVAT'] = (int)$line['ThanhTienChuaVAT'];
                                $productData[$supplier][$province_code][$line['MaSPNCC']]['ThanhTienCoVAT'] = (int)$line['ThanhTienCoVAT'];
                                
                                }
                            }
                        }
                    }
                }
            }
                $totalByProvince = [];
                foreach ($productData as $ncckey=>$ncc) {
                    foreach ($ncc as $key=>$maTinh) {
                        foreach ($maTinh as  $info) {
                            $thanhTien = (int) $info["ThanhTienCoVAT"];
                            if (isset($totalByProvince[$key])) {
                                $totalByProvince[$key] += $thanhTien;
                            } else {
                                $totalByProvince[$key] = $thanhTien;
                            }
                        }
                        $productData[$ncckey][$key]['total'] = $totalByProvince[$key];
                    }
                }             
                foreach ($totalByProvince as $k=>$v){
           
                    $totalThanhTienCoVAT += $v; 
                }                 
                $productData[$supplier]["tongtien"] = $totalThanhTienCoVAT; 
        return response()->json($productData);
    }
   
    public function importView(){
        // $data = datable1::all(); // Thay YourModel bằng model thích hợp
        // return response()->json($data);
        return view('welcome');
    }
 
    public function import(){
        // Excel::import(new Importdata1,
        //               $request->file('file')->store('files'));
        // return redirect()->back();
        $data = datable1::all();
        return response()->json($data);
    }
 
    public function exportUsers(){
        $datas = datable1::paginate(3);
        // dd()
        $newArr = array();
        $data = array();
        $info= array();
        // $product = ['MaSPNCC','SanPham','SoLuong','DVT','SLTheoDVTCoBan','DVTCoBan',
        // 'Ke','DongiaChuaVAT','ThanhTienChuaVAT','DonGiaCoVAT','ThanhTienCoVAT','ThueVAT'];
        $info = ['POId','MaDonVi','SoChungTu','LoaiGiaoDich','MaKhoXuat','MaKhoNhap','MaDoiTacKD','NgayChuyenHang','NgayCapNhat','TrangThaiCT','is_object','file_id','folder','action','supplier','hash_key',
        'filename','path','date_time_file','province_code','district_code','ward_code','poscode'];
        // dd(count($info));
        $newArr[] = $info;
        foreach ($datas as $key =>$row) {
            // for ($i = 0;$i < count($info);$i++){
                // dd($row->);
                // $data[]= $row->data;
                // $info[]= $row->info;
            $newArr[] = $row->data + $row->info;
            // $newArr['is_object'] = $datas[''];

            // array_push($newArr[$key], $row->info);
            // }
                // $newArr[0]= $row->info;  
        }
        // $firstItem = array_shift($newArr);
        // $newArr=array_merge($data, $info);
        foreach ($newArr as $key => $value) {
            unset($newArr[$key]['Products']);
        }
        return Excel::download(new Exportdata1($newArr), 'datable1s.xlsx');
  
    }
    public function getPaginatedData()
    {
        $data = datable1::paginate(20); 
        return response()->json($data);
    }
    public function viewPDF(){
        $table = datable1::all();

        $pdf =Pdf::loadView('welcome',array('table'=>$table))
        ->setPaper('a4','portrait');
        return $pdf->stream();

    }
    
    public  function downloadPdf(){
        $table = datable1::all();
        $pdf = PDF::loadView('welcome',array('table'=>$table))
        ->setPaper('a4','portrait');
        return $pdf->download('datable1.pdf');
    }
    public function downloadExcel()
    {
        $path = storage_path('app/public/exported-data.xlsx');
        return response()->download($path);
    }
    public function getDatable(){
        $datable = datable1::paginate(3);
        $newArr = array();
        $limit = request('limit', static::ITEM_PER_PAGE);
        $keyword = request('keyword');
        
        foreach ($datable as $key => $row) {
            $newArr[] = $row->data + $row->info;
        }
        foreach ($newArr as $key => $value) {
            unset($newArr[$key]['Products']);
        }

        $sum = 0;
        $result = array_map(function ($item) {
            return (int)$item['MaDonVi'];
        },$newArr);
        
        $sum = 0;
        foreach ($newArr as $key => $value) {
            $sum += (int)$value['MaDonVi'];
          
        }
        return $sum;


    }
    

}