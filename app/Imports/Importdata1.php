<?php

namespace App\Imports;

use App\Models\datable1;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
class Importdata1 implements ToModel, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new datable1([
            '_id' => $row['id'],
            'oid' => $row['oid'],
            'MaDonVi' => $row['MaDonVi'],
            'SoChungTu' => $row['SoChungTu'],
            'LoaiGiaoDich' => $row['LoaiGiaoDich'],
            'MaKhoXuat' => $row['MaKhoXuat'],
            'MaKhoNhap' => $row['MaKhoNhap'],
            'MaDoiTacKD' => $row['MaDoiTacKD'],
            'NgayChuyenHang' => $row['NgayChuyenHang'],
            'NgayCapNhat' => $row['NgayCapNhat'],
            'TrangThaiCT'=> $row['TrangThaiCT'],
            'POId'=> $row['POId'],
            
            
           'updated_at' => $row['updated_at'],
           'created_at' => $row['created_at'],
           'option' => $row['option'],
        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }
}