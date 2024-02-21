<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dân chơi phố cổ đánh đổi để yêu em</title>
    <style>
        .myclass {
            display: none;
        }

        .classmy {
            display: none;
        }

        table {
            right: 0;
            left: 0;
            top: 0;
            margin: auto;
        }

        table tr th {
            background: rgba(0, 145, 234, 1);
            padding: 10px;
            color: #fff;
        }

        table tr td {
            padding: 10px;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            font-size: 15px;
        }


        .radio-label {
            font-size: 14px;
            color: #606266;
            line-height: 40px;
            padding: 0 12px 0 30px;
        }

        .pagination {
            display: flex;
            flex-wrap: wrap;
        }

        .paginate {
            /* width: 1000px; */
            text-decoration: none;
            margin: 5px;
            margin-left: auto;
            margin-right: auto;

            /* text-align: center; */
        }

        .pagination {
            /* text-decoration: none; */
            list-style: none;

        }

        .page-item {
            margin: 10px
        }

        form {
            text-align: center
        }
    </style>

</head>

<body>
    <form action="{{ route('getUpdateAt') }}" class="form-inline">
        <div class="form-group">
            MaSPNCC: <input name="key" placeholder="input">
            DATE: <input type="date" name="date" id="Date" min="2000-01-01" />
        </div>
        <button type="submit">TIM KIEM </button>
    </form>
    <form action="{{ route('getsupplier') }}" class="form-inline">
        <div class="form-group">
            Supplier: <input name="supplier" placeholder="input">
            DATE: <input type="date" name="date" id="Date" min="2000-01-01" />
        </div>
        <button type="submit">TIM KIEM </button>
    </form>
    <table>
        <col>
        <colgroup span="2"></colgroup>
        <colgroup span="2"></colgroup>
        <thead>
            <tr>
                <th>_id</th>
                <th colspan="142" scope="colgroup">data</th>
                <th colspan="13" scope="colgroup">info</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
            <tr>
                <td></td>
                <th scope="col">POId</th>
                <th scope="col">MaDonVi</th>
                <th scope="col">SoChungTu</th>
                <th scope="col">LoaiGiaoDich</th>
                <th scope="col">MaKhoXuat</th>
                <th scope="col">MaKhoNhap</th>
                <th scope="col">MaDoiTacKD</th>
                <th scope="col">NgayChuyenHang</th>
                <th scope="col">NgayCapNhat</th>
                <th scope="col">TrangThaiCT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">MaSPNCC</th>
                <th scope="col">SanPham</th>
                <th scope="col">SoLuong</th>
                <th scope="col">DVT</th>
                <th scope="col">SLTheoDVTCoBan</th>
                <th scope="col">DVTCoBan</th>
                <th scope="col">Ke</th>
                <th scope="col">DongiaChuaVAT</th>
                <th scope="col">ThanhTienChuaVAT</th>
                <th scope="col">DonGiaCoVAT</th>
                <th scope="col">ThanhTienCoVAT</th>
                <th scope="col">is_object</th>
                <th scope="col">file_id</th>
                <th scope="col">folder</th>
                <th scope="col">action</th>
                <th scope="col">supplier</th>
                <th scope="col">hash_key</th>
                <th scope="col">hash_key</th>
                <th scope="col">path</th>
                <th scope="col">date_time_file</th>
                <th scope="col">province_code</th>
                <th scope="col">district_code</th>
                <th scope="col">ward_code</th>
                <th scope="col">poscode</th>
                {{-- <th></th>
                <th></th> --}}

                {{-- <th></th> --}}

                <!-- Thêm các cột khác tùy theo dữ liệu của bạn -->
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $item->_id }}</td>
                    {{-- @foreach ($item as $k => $val) --}}
                    <td>
                        @if (is_array($item->data['POId']))
                            {{ 'null' }}
                        @else
                            {{ $item->data['POId'] }}
                        @endif
                    </td>
                    {{-- @endforeach --}}
                    <td>{{ $item->data['MaDonVi'] }}</td>
                    <td>{{ $item->data['SoChungTu'] }}</td>
                    <td>{{ $item->data['LoaiGiaoDich'] }}</td>
                    <td>
                        @if (is_array($item->data['MaKhoXuat']))
                            {{ 'null' }}
                        @else
                            {{ $item->data['MaKhoXuat'] }}
                        @endif
                    </td>
                    </td>
                    <td>{{ $item->data['MaKhoNhap'] }}</td>
                    <td>{{ $item->data['MaDoiTacKD'] }}</td>
                    <td>{{ $item->data['NgayChuyenHang'] }}</td>
                    <td>{{ $item->data['NgayCapNhat'] }}</td>
                    <td>{{ $item->data['TrangThaiCT'] }}</td>
                    @if (is_array($item->data['Products']))
                        @if (is_array($item->data['Products']['Line']))
                            @foreach ($item->data['Products']['Line'] as $key => $value)
                                {{-- @dd($value) --}}
                                @if (is_array($value))
                                    @if (isset($value['MaSPNCC']))
                                        {{-- @dd($item->data['Products']['Line']) --}}
                                        {{-- @dd($key, $value); --}}

                                        <td>{{ $value['MaSPNCC'] }}</td>
                                        {{-- <td>{{ $value }}</td> --}}
                                        <td>{{ $value['SanPham'] }}</td>
                                        <td>{{ $value['SoLuong'] }}</td>
                                        <td>{{ $value['DVT'] }}</td>
                                        <td>{{ $value['SLTheoDVTCoBan'] }}</td>
                                        <td>{{ $value['DVTCoBan'] }}</td>
                                        <td>{{ $value['Ke'] }}</td>
                                        <td>{{ $value['DongiaChuaVAT'] }}</td>
                                        <td>{{ $value['ThanhTienChuaVAT'] }}</td>
                                        <td>{{ $value['DonGiaCoVAT'] }}</td>
                                        <td>{{ $value['ThanhTienCoVAT'] }}</td>
                                    @else
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                        <td>{{ 'null' }}</td>
                                    @endif
                                @elseif (is_string($value))
                                    {{-- @dd(explode("\n", $value)); --}}
                                    <td>{{ $item->data['Products']['Line']['MaSPNCC'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['SanPham'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['SoLuong'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['DVT'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['SLTheoDVTCoBan'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['DVTCoBan'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['Ke'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['DongiaChuaVAT'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['ThanhTienChuaVAT'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['DonGiaCoVAT'] }}</td>
                                    <td>{{ $item->data['Products']['Line']['ThanhTienCoVAT'] }}</td>
                                    {{-- <td>{{ $item->data['Products']['Line']['ThueVAT'] }}</td> --}}

                                    {{-- @dd($key) --}}
                                @else
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                    <td>{{ 'false' }}</td>
                                @endif
                            @endforeach
                        @else
                            <td>{{ $value['MaSPNCC'] }}</td>
                            {{-- <td>{{ $value }}</td> --}}
                            <td>{{ $value['SanPham'] }}</td>
                            <td>{{ $value['SoLuong'] }}</td>
                            <td>{{ $value['DVT'] }}</td>
                            <td>{{ $value['SLTheoDVTCoBan'] }}</td>
                            <td>{{ $value['DVTCoBan'] }}</td>
                            <td>{{ $value['Ke'] }}</td>
                            <td>{{ $value['DongiaChuaVAT'] }}</td>
                            <td>{{ $value['ThanhTienChuaVAT'] }}</td>
                            <td>{{ $value['DonGiaCoVAT'] }}</td>
                            <td>{{ $value['ThanhTienCoVAT'] }}</td>
                        @endif
                    @else
                        <td>{{ 'null' }}</td>
                        <td>{{ 'null' }}</td>
                        <td>{{ 'null' }}</td>
                        <td>{{ 'null' }}</td>
                        <td>{{ 'null' }}</td>
                        <td>{{ 'null' }}</td>
                    @endif

                    <td>{{ $item->info['is_object'] }}</td>
                    <td>{{ $item->info['file_id'] }}</td>
                    <td>{{ $item->info['folder'] }}</td>
                    <td>{{ $item->info['action'] }}</td>
                    <td>{{ $item->info['supplier'] }}</td>
                    <td>{{ $item->info['hash_key'] }}</td>
                    <td>{{ $item->info['filename'] }}</td>
                    <td>{{ $item->info['path'] }}</td>
                    <td>{{ $item->info['date_time_file'] }}</td>
                    <td>{{ $item->info['province_code'] }}</td>
                    <td>{{ $item->info['district_code'] }}</td>
                    <td>{{ $item->info['ward_code'] }}</td>
                    <td>{{ $item->info['ward_code'] }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                    <!-- Hiển thị các cột khác tùy theo dữ liệu của bạn -->
                </tr>

                {{-- <tr>

                    <td scope="">dddddddddd</td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope="row"><b>SUM:</b> </td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope=""></td>
                    <td scope="">w</td>
                </tr> --}}
            @endforeach
        </tbody>

        <body>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            {{-- <td></td> --}}
            <td></td>
            <td></td>
            <td></td>
            @if (isset($totalSLTheoDVTCoBan) &&
                    isset($totalDongiaChuaVAT) &&
                    isset($totalThanhTienChuaVAT) &&
                    isset($totalDonGiaCoVAT))
                <td></td>
                <td>Total: <b>{{ $totalSLTheoDVTCoBan }}</b></td>
                <td></td>
                <td></td>
                <td>Total: <b>{{ number_format($totalDongiaChuaVAT) }}</td>
                <td>Total: <b>{{ number_format($totalThanhTienChuaVAT) }}</b></td>
                <td>Total: <b>{{ number_format($totalDonGiaCoVAT) }}</b></td>
                <td><b>SUM:{{ number_format($totalThanhTienCoVAT) }} </b></td>
            @else
                <td>{{ 'null' }}</td>
                <td>{{ 'null' }}</td>
                <td>{{ 'null' }}</td>
                <td>{{ 'null' }}</td>
                <td>{{ 'null' }}</td>
                <td>{{ 'null' }}</td>
                <td>{{ 'null' }}</td>
                <td>{{ 'null' }}</td>
            @endif
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b></b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </body>
    </table>
    <div class="paginate">
        {{ $data->appends(request()->all())->links() }}
    </div>

</body>

</html>
{{-- @stop --}}
