<template>
  <div>
    <!-- <button v-on:click="fetchData">Lấy Dữ Liệu</button> -->
    <!-- <button @click="exportToExcel">Xuất Excel</button> -->
    <!-- <form  method="get"> -->

      <button :loading="listLoading" style="margin:0 0 20px 20px;" type="primary"  @click="exportToExcel">
            export Excel
      </button>
    <!-- </form> -->
        <table>
          <thead>
            <tr>
              <th>oid</th>
              <th>
                --------
              </th>
              <th>|||||||||||||</th>
              <th>created_at</th>
              <th>updated_at</th>

              <!-- Thêm các cột khác tùy theo dữ liệu của bạn -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in list">
              <th> {{ item._id }} </th>
              <td ><span @click="important = !important">data</span>
                <ul  :class ="{ myclass: important }" >
                  <li><b>POId:</b> {{ item.data.POId }}</li>
                  <li><b>MaDonVi:</b> {{ item.data.MaDonVi }}</li>
                  <li><b>SoChungTu:</b> {{ item.data.SoChungTu }}</li>
                  <li><b>LoaiGiaoDich:</b> {{ item.data.LoaiGiaoDich }}</li>
                  <li><b>MaKhoXuat:</b>{{ item.data.MaKhoXuat }}></li>
                  <li><b>MaKhoNhap:</b> {{ item.data.MaKhoNhap }}</li>
                  <li><b>MaDoiTacKD:</b> {{ item.data.MaDoiTacKD }}</li>
                  <li><b>NgayChuyenHang:</b>{{ item.data.NgayChuyenHang }}</li>
                  <li><b>NgayCapNhat:</b> {{ item.data.NgayCapNhat }}</li>
                  <li><b>TrangThaiCT:</b>{{ item.data.TrangThaiCT }}</li>
                  <li @click="important1 = !important1" ><p><b>product.line</b></p>
                    <ul :class ="{ myclass: important1 }"> 
                      <li><b>MaSPNCC:</b> {{ (item.data.Products.Line)[0] }}</li>
                      <li><b>SanPham:</b>{{ item.data.Products.Line.SanPham }}</li>
                      <li><b>SoLuong:</b> {{ item.data.Products.Line.SoLuong }}</li>
                      <li><b>DVT:</b> {{ item.data.Products.Line.DVT }}</li>
                      <li><b>SLTheoDVTCoBan:</b> {{ item.data.Products.Line.SLTheoDVTCoBan }}</li>
                      <li><b>DVTCoBan:</b> {{ item.data.Products.Line.DVTCoBan }}</li>
                      <li><b>Ke:</b> {{ item.data.Products.Line.Ke }}</li>
                      <li><b>DongiaChuaVAT:</b> {{ item.data.Products.Line.DongiaChuaVAT }}</li>
                      <li><b>ThanhTienChuaVAT:</b> {{ item.data.Products.Line.ThanhTienChuaVAT }}</li>
                      <li><b>DonGiaCoVAT:</b> {{ item.data.Products.Line.DonGiaCoVAT }}</li>
                      <li><b>ThanhTienCoVAT:</b> {{ item.data.Products.Line.ThanhTienCoVAT }}</li>
                      <li><b>ThueVAT:</b> {{ item.data.Products.Line.ThueVAT }}</li>
                    </ul></li>
                    
                  </ul>
              
                <!-- <i class="fa-solid fa-list"></i> -->
                  
                </td>

                <td ><span @click="important2 = !important2">infor</span>
                <ul :class ="{ classmy: important2 }" >
                  <li><b>is_object:</b>{{ item.info.is_object }}</li>
                  <li><b>file_id:</b>{{ item.info.file_id }}</li>
                  <li><b>folder:</b>{{ item.info.folder }}</li>
                  <li><b>action:</b>{{ item.info.action }}</li>
                  <li><b>supplier:</b>{{ item.info.supplier }}</li>
                  <li><b>hash_key:</b>{{ item.info.hash_key }}</li>
                  <li><b>filename:</b>{{ item.info.filename }}</li>
                  <li><b>path:</b>{{ item.info.path }}</li>
                  <li><b>date_time_file:</b>{{ item.info.date_time_file }}</li>
                  <li><b>province_code:</b>{{ item.info.province_code }}</li>
                  <li><b>district_code:</b>{{ item.info.district_code }}</li>
                  <li><b>ward_code:</b>{{ item.info.ward_code }}</li>
                  <li><b>poscode:</b>{{ item.info.poscode }}</li>

                </ul>
                </td>
              <td>{{ item.created_at }}</td>
              <td>{{ item.updated_at }}</td>
              <!-- Hiển thị các cột khác tùy theo dữ liệu của bạn -->
            </tr>
          </tbody>
        </table>

        <ul class="pagination">
        <li class="page-item" :class="{ 'disabled': pagination.current_page === 1 }">
          <a class="page-link" @click="paginate(pagination.current_page - 1)">Previous</a>
        </li>
        <li  v-for="page in pagination.last_page" :key="page" class="page-item" :class="{ 'active': page === pagination.current_page }">
          <a  class="page-link" @click="paginate(page)">{{ page }}</a>
        </li>
        <li class="page-item" :class="{ 'disabled': pagination.current_page === pagination.last_page }">
          <a class="page-link" @click="paginate(pagination.current_page + 1)">Next</a>
        </li>
      </ul>
        <!-- <pagination
          :total="total"
          :page.sync="listQuery.page"
          :limit.sync="listQuery.limit"
          @pagination="fetchData" /> -->
      </div>
   

</template>
<script>
import { fetchList } from '../api/article';
import { parseTime } from '../utils';
// options components
// import FilenameOption from './components/FilenameOption';
// import AutoWidthOption from './components/AutoWidthOption';
// import BookTypeOption from './components/BookTypeOption';
// import Pagination from '../components/Pagination'
import { saveAs } from 'file-saver';
export default {
  name: 'ExportExcel',
  // components: { FilenameOption, AutoWidthOption, BookTypeOption },
    // components: { Pagination },
    data() {
      return {
        listLoading: true,
        downloadLoading: false,
        filename: '',
        autoWidth: true,
        bookType: 'xlsx',
        table1: [], 
        data: [],
        list: [], // Dữ liệu sẽ lấy từ API
        pagination: {}, // Thông tin phân trang sẽ lấy từ API
        // total: 0,
        // listQuery: {
        //     page: 1,
        //     limit: 20
        // },
        important: true,
        important1: true,
        important2: true,
              // databaseData: [],
      };
  },
  mounted() {
    this.fetchData();
  },
  //   created: function () {
  //   this.fetchData();
  // },

  methods: {
  //  downloadExcel() {
  //     window.location = '/export-excel';
  //   },
    fetchData() {
        this.listLoading = true;
        this.axios.get('/get-paginated-data?page=${page}')
          .then(response => {
              
            this.list = response.data.data;
            this.pagination = response.data;
            // this.list
            this.listLoading = false;
          })
          .catch(error => {
              console.error(error);
          });
        //   axios.get('/export-excel')
        //   .then(response => {
        //     // this.data = response.data.data;
        //     // console.log(this.list);
        // })
        // .catch(error => {
        //   console.error(error);
        // });
      },
    paginate(page) {
        // console.log(page);
        this.fetchData(page);
    },
    exportToExcel() {
      // axios.get('/api/export-to-excel').then(response => {
      //   // this.handleFileDownload(response.data);

      // })
      //   .catch(error => {
      //     console.error(error);
      //   });
      // console.log(this.list);
      window.location = '/api/export-to-excel';
    },
    handleFileDownload(data) {
      // Tạo một đối tượng Blob từ dữ liệu tải về
        const blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
      saveAs(blob, 'exported-data.xlsx');
        // Tạo một URL tạm thời cho tệp Excel
        const url = window.URL.createObjectURL(blob);
        // Tạo một liên kết để tải tệp Excel
        const a = document.createElement('a');
        a.href = url;
        a.download = 'exported-data.xlsx';
        document.body.appendChild(a);

        // Kích hoạt sự kiện nhấp chuột trên liên kết để tải tệp
        a.click();

        // Xóa liên kết và giải phóng tài nguyên
        window.URL.revokeObjectURL(url);
    },
  
    handleDownload() {
      this.downloadLoading = true;
      import('../vendor/Export2Excel').then(excel => {

        // const multiHeader = ['Id', 'data', '', '', '', '', '', '', '', '', '', 'Date'];
        const tHeader = ['_id', 'MaDonVi', 'SoChungTu', 'LoaiGiaoDich', 'MaKhoXuat', 'MaKhoNhap',
          'MaDoiTacKD', 'NgayChuyenHang', 'NgayCapNhat', 'TrangThaiCT', 'is_object', 'file_id', 'folder', 'action',
          'supplier', 'hash_key', 'filename', 'path', 'date_time_file', 'province_code', 'district_code',
          'ward_code', 'poscode', 'created_at','updated_at'];

        const filterVal = ['_id', 'MaDonVi', 'SoChungTu', 'LoaiGiaoDich', 'MaKhoXuat', 'MaKhoNhap', 'MaDoiTacKD', 'NgayChuyenHang',
          'NgayCapNhat', 'TrangThaiCT', 'is_object', 'file_id', 'folder', 'action',
          'supplier', 'hash_key', 'filename', 'path', 'date_time_file', 'province_code', 'district_code',
          'ward_code', 'poscode', 'created_at', 'updated_at'];
          
        const list = this.list; 
        // const lis = 'list';
        const data = this.formatJson(filterVal, list);  
        // console.log(data);
        excel.export_json_to_excel({
          // multiHeader, 
          header: tHeader,
          data,
         
        });
        this.downloadLoading = false;
      });
    },
    formatJson(filterVal, jsonData) {
    return jsonData.map(v => filterVal.map(j => {
      if (j === 'timestamp') {
        return parseTime(v[j]);
      } else {
        // filterVal.forEach(element => {
        // });
        const newData = Object.assign({}, v.data, v.info);
        newData.Products = newData.Products.Line;
        newData.created_at = v.created_at; 
        const newDatas = Object.assign({}, newData, newData.Products );
        var objj = v.data.Products.Line;
        // newData.MaSPNCC = objj.map(v => {
        //   return v.MaSPNCC;
        // });
        // console.log(newData.Products.Line);
        // console.log(objj);
        // newData
        newData._id = v._id;
        newData._id = v._id;
        newData.updated_at = v.updated_at;
        console.log(newDatas);   
        return newData[j];
      }
    }));
    },
  },
};
</script>
<style>
  .myclass{
    display: none;
  }
  .classmy{
    display: none;
  }
  table{
    right: 0;
    left: 0;
    top: 0;
    margin: auto;
}
  table tr th{
  background: rgba(0,145,234,1);
  padding: 10px;
  color: #fff;
}
  table tr td{
  padding: 10px;
  border-right:1px solid rgba(0,0,0,0.1);
  font-size: 15px;
}
 

.radio-label {
  font-size: 14px;
  color: #606266;
  line-height: 40px;
  padding: 0 12px 0 30px;
}

.pagination{
  display: flex;
   flex-wrap: wrap;
}
</style>
