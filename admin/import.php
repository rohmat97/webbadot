<?php
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
include 'koneksi.php';
 
//memanggil file excel_reader
require "excel_reader2.php";
 
//jika tombol import ditekan
if(isset($_POST['submit'])){
 
    $target = basename($_FILES['filepegawaiall']['name']) ;
    move_uploaded_file($_FILES['filepegawaiall']['tmp_name'], $target);
 
// tambahkan baris berikut untuk mencegah error is not readable
    chmod($_FILES['filepegawaiall']['name'],0777);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
    if($drop == 1){
//             kosongkan tabel pegawai
             $truncate ="TRUNCATE TABLE tbl_riwayat";
             mysql_query($truncate);
    };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=3; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $id_riwayat	 = $data->val($i, 1);
      $id_pengguna	 = $data->val($i, 2);
      $id_tagihan	 = $data->val($i, 3);
      $jlh_debit	 = $data->val($i, 4);
      $jlh_tagihan	 = $data->val($i, 5);
      $tanggal  = $data->val($i, 6);

 
//      setelah data dibaca, masukkan ke tabel pegawai sql
      $query = "INSERT into tbl_riwayat (id_riwayat,id_pengguna,id_tagihan,jlh_debit,jlh_tagihan,tanggal
      )values('$id_riwayat','$id_pengguna','$id_tagihan','$jlh_debit','$jlh_tagihan','$tanggal')";
      $hasil = mysqli_query($con,$query);
    }
    
    if(!$hasil){
//          jika import gagal
          die(mysql_error());
      }else{
//          jika impor berhasil
          echo "Data berhasil diimpor.";
    }
    
//    hapus file xls yang udah dibaca
    unlink($_FILES['filepegawaiall']['nim']);   
}
 
?>
 
<form name="myForm" id="myForm" onSubmit="return validateForm()" action="import.php" method="post" enctype="multipart/form-data">
    <input type="file" id="filepegawaiall" name="filepegawaiall" />
    <input type="submit" name="submit" value="Import" /><br/>
    <label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
</form>
 
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filepegawaiall', ['.xls'], ['.xlsx'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>