jQuery(function () {

 var purchase = $('#purchase').DataTable({
  "paging": false,
  "ordering": false,
  "info": false,
  "searching": false,
 });
 $(document).on('loaded.bs.select changed.bs.select', '#selectOptNamaBrg', function () {

  const nama = $('#selectOptNamaBrg option:selected').data('nama');
  const unit = $('#selectOptNamaBrg option:selected').data('unit');
  const stok = $('#selectOptNamaBrg option:selected').data('stok');
  const supp = $('#selectOptNamaBrg option:selected').data('supp');

  $('[name=nama]').val(nama);
  $('[name=inputSupplier]').val(supp);
  $('[name=inputStok]').val(stok);
  $('[name=inputUnit]').val(unit);

 });
 //--------------PO MAKER
 $(document).on('loaded.bs.select changed.bs.select', '#selectOptSupp', function () {
  const id = $('#selectOptSupp option:selected').data('nama');
  const alamat = $('#selectOptSupp option:selected').data('alamat');
  const noTelp = $('#selectOptSupp option:selected').data('notelp');

  $('[name=namaSupp]').val(id);
  $('[name=alamatSupp]').val(alamat);
  $('[name=noTelp]').val(noTelp);

  var nama_pemasok = $('#selectOptSupp').val();

  $.ajax({
   url: "/BarangMasuk/post",
   method: "POST",
   data: {
    id: nama_pemasok
   },
   async: false,
   dataType: 'json',
   success: function (data) {
    var html = '';
    var i;
    html += '<option selected="true" value="" disabled >Pilih Barang</option>';
    for (i = 0; i < data.length; i++) {
     html += '<option>' + data[i].namaBarang + '</option>';
    }
    $('.selBarang').html(html);
   }
  });
 });

 var count = 1;

 $('#addpurchase').on('click', function () {

  prevOptions = $('.selBarang').html();
  console.log(prevOptions);
  purchase.row.add([
   '<select required="required" style="width:100%;" class="form-control form-control-sm selBarang" id="selBarang' + count + '" name="nama_obat[]" data-stok="#stok' + count + '" data-unit="#unit' + count + '" data-harga="#harga' + count + '" data-banyak="#banyak' + count + '">' + prevOptions + '</select>',
   '<input id="stok' + count + '" name="stok[]" class="form-control form-control-sm stok" readonly>',
   '<input id="harga' + count + '" name="harga[]" class="form-control form-control-sm harga" readonly>',
   '<input id="unit' + count + '" name="unit[]" class="form-control form-control-sm unit" readonly>',
   '<input type="number" id="banyak' + count + '" name="banyak[]" class="form-control  form-control-sm banyak" required="required">',
   '<input id="subtotal' + count + '" name="subtotal[]" class="form-control form-control-sm subtotal" readonly>',
   '<button id="removeproduk" class="btn btn-danger btn-sm" type="button"><span class="fa fa-trash"></span> Hapus</button>',
  ]).draw(false);

  var myOpt = [];
  $("select").each(function () {
   myOpt.push($(this).val());
  });
  $("select").each(function () {
   $(this).find("option").prop('hidden', false);
   var sel = $(this);
   $.each(myOpt, function (key, value) {
    if ((value != "") && (value != sel.val())) {
     sel.find("option").filter('[value="' + value + '"]').prop('hidden', true);
    }
   });
  });
  // console.log(myOpt);
  count++;
 });
 $('#addpurchase').click();

 $('#purchase').on("click", "#removeproduk", function () {
  console.log($(this).parent());
  purchase.row($(this).parents('tr')).remove().draw(false);
  updatePurchase();
 });


 $('#purchase').on('change', '.selBarang', function () {
  var $select = $(this);
  var namaBarang = $select.val();
  $.ajax({
   type: "POST",
   url: "/getBarang",
   dataType: "JSON",
   data: {
    namaBarang: namaBarang
   },
   cache: false,
   success: function (data) {
    $.each(data, function (stok, unit, harga) {
     $($select.data('harga')).val(data.harga);
     $($select.data('stok')).val(data.stok);
     $($select.data('unit')).val(data.unit);
     $($select.data('banyak')).val("1");
    });
    updateSubtotalp();
   }
  });
 });

 $('#purchase').on('input', '.banyak', function () {
  updateSubtotalp();
 });

 function updateSubtotalp() {

  $(".banyak").each(function () {
   var $row = $(this).closest('tr');
   var unitStock = parseInt($row.find('.stok').val());
   var unitCount = parseInt($row.find('.banyak').val());

   if (unitCount < 0) {
    $row.find('.banyak').val(0);
    updateSubtotal();
   } else {
    var Sub = parseInt(($row.find('.harga').val()) * unitCount);
    $row.find('.subtotal').val(Sub);
    updateTotal();
   }
  });
 }

 function updatePurchase() {
  var grandtotal = 0;
  $('.subtotal').each(function () {
   grandtotal += parseInt($(this).val());
  });
  $('#grandtotal').val(grandtotal);
 }

 function updateTotal() {
  var grandtotal = 0;
  $('.subtotal').each(function () {
   grandtotal += parseInt($(this).val());
  });
  $('#grandtotal').val(grandtotal);
 }

 // $('#poContent').DataTable({
 //  buttons: [{
 //   extend: 'print',
 //  }]
 // })
 // DATEPICKER
 var date = new Date();
 var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
 $("#datepicker").datepicker({
  format: 'yyyy-mm-dd',
  autoclose: true,
  todayHighlight: true,

 });
 $('#datepicker').datepicker('setDate', today);

 //MAKE RUPIAH FORMAT
 var rupiah = document.getElementById('inputHarga');
 rupiah.addEventListener('keyup', function (e) {
  rupiah.value = formatRupiah(this.value, 'Rp. ');
 });

 function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^\d]/g, '').toString(),
   split = number_string.split(','),
   sisa = split[0].length % 3,
   rupiah = split[0].substr(0, sisa),
   ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
   separator = sisa ? ',' : '';
   rupiah += separator + ribuan.join(',');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
 }
});