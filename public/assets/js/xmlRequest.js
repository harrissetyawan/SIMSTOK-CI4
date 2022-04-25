function addMerk() {
  let merkValue = $('#addMerkInput').val();
  // ------------------alert(merkValue);
  $.ajax({
    type: "post",
    async: true,
    url: "/Home/saveMerk",
    dataType: "JSON",
    data: { merkValue: merkValue },
    success: function (data) {
      //-------------INSERT SUCCESS DO THINGs HERE
      $('#selectOptMerk').on('hidden.bs.select').selectpicker('refresh');
    }
  });
}

jQuery(function () {

  $('#selectOptMerk').selectpicker({
    noneResultsText: 'Nothing Found Here! <input type="hidden" value={0} id="addMerkInput"></input><button class="btn btn-sm btn-primary" type="button" onclick="addMerk()">Add</button>'
  });
  //-------CALC JUMLAH PESAN

  $("#selectOptSupp").on('loaded.bs.select changed.bs.select', function () {

    const id = $('#selectOptSupp option:selected').data('nama');
    const alamat = $('#selectOptSupp option:selected').data('alamat');
    const noTelp = $('#selectOptSupp option:selected').data('notelp');


    $('[name=namaSupp]').val(id);
    $('[name=alamatSupp]').val(alamat);
    $('[name=noTelp]').val(noTelp);
    $.ajax({
      type: "post",
      async: true,
      url: "/BarangMasuk/post",
      dataType: "JSON",
      data: { id: id },
      cache: false,
      success: function (data) {
        var html = '';
        var i;
        for (i = 0; i < data.length; i++) {
          html += '<option data-nama[' + i + ']="' + data[i].namaBarang + '" data-harga[' + i + ']="' + data[i].harga + '" data-unit[' + i + ']="' + data[i].unit + '" data-merk[' + i + ']="' + data[i].merk + '" data-subtotal="" value="' + data[i].namaBarang + '" data-tokens="' + data[i].namaBarang + '">' + data[i].namaBarang + '</option>';
          //ON REFRESH
        }
        //ADD ROWs
        let f = 0;
        $('#addRow').on("click", function () {
          f++;
          let opt = '';
          let k;
          let form = '<div class="form-row" id="form' + f + '"><div class="form-group col-sm-4"><select class="form-control form-control-sm selectpicker" name="selBarang[' + f + ']" data-live-search="true" id="selBarang"></select></div><div class="form-group col-sm-2"><input name="inputHarga[' + f + ']" type="text" class="form-control form-control-sm" id="inputHarga" readonly placeholder=""></div><div class="form-group col-sm-1 mr-0"><input name="inputJumlahBrg[' + f + ']" type="text" class="form-control form-control-sm" id="inputJumlahBrg"></div><div class="form-group col-sm-1"><input name="inputUnit[' + f + ']" type="text" class="form-control form-control-sm" id="inputUnit" readonly></div><div class="form-group col-sm-2"><input name="inputMerk[' + f + ']" type="text" class="form-control form-control-sm" id="inputMerk" readonly></div><div class="form-group col-sm-2 "><input name="SubTotal[' + f + ']" type="text" class="form-control form-control-sm" id="SubTotal[' + f + ']" readonly></div></div>';
          for (k = 0; k < data.length; k++) {
            opt += '<option data-nama[' + k + ']="' + data[k].namaBarang + '" data-harga[' + k + ']="' + data[k].harga + '" data-unit[' + k + ']="' + data[k].unit + '" data-merk[' + k + ']="' + data[k].merk + '" value="' + data[k].namaBarang + '" data-tokens="' + data[k].namaBarang + '">' + data[k].namaBarang + '</option>';
          }

          $('#contentRow').append(form);
          $("select[name='selBarang[" + f + "]']").html(opt).selectpicker('refresh');
        });
        let selectCount = $('#selBarang');
        for (let o = 0; o < selectCount.length; o++) {
          $('[name="selBarang[' + o + ']"]').html(html).selectpicker('refresh');
          $('[name="selBarang[' + o + ']"]').on('refreshed.bs.select changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {

            if (e.type !== 'changed.bs.select') {

              $('[name="selBarang[0]"]').selectpicker('val', '' + data[0].namaBarang + '');
            }
            //-------ADD ATTR(s)
            $("#inputHarga0").attr("name", "inputHarga[" + clickedIndex + "]");
            $("#inputUnit0").attr("name", "inputUnit[" + clickedIndex + "]");
            $("#inputMerk0").attr("name", "inputMerk[" + clickedIndex + "]");
            //-------SHOW SELECTED DATA
            const harga = $('#selBarang0 option:selected').data('harga[' + clickedIndex + ']');
            const unit = $('#selBarang0 option:selected').data('unit[' + clickedIndex + ']');
            const merk = $('#selBarang0 option:selected').data('merk[' + clickedIndex + ']');


            $("[name='inputHarga[" + clickedIndex + "]']").val(harga);
            $("[name='inputMerk[" + clickedIndex + "]']").val(merk);
            $("[name='inputUnit[" + clickedIndex + "]']").val(unit);
            $("#inputJumlahBrg0").val(1);
            $('[name=SubTotal0]').val(harga);

            $('#inputJumlahBrg0').on("input", function () {
              let jumlah = $(this).val();
              const hargaBarang = $('#inputHarga0').val();

              subTotal = jumlah * hargaBarang;
              $('[name=SubTotal0]').val(subTotal);
            });
          }).selectpicker('refresh');
        } //--------CLOSURE FOR

        // //ON CHANGED SELECT BARANG DINAMIS
        // $('[name="selBarang[]"]').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
        //   //ADD ATTR NAME(s)
        //   $("#inputHarga0").attr("name", "inputHarga["+clickedIndex+"]");
        //   $("#inputUnit0").attr("name", "inputUnit["+clickedIndex+"]");
        //   $("#inputMerk0").attr("name", "inputMerk["+clickedIndex+"]");

        //   //SHOW SELECTED DATA
        //   const harga = $('#selBarang0 option:selected').data('harga['+clickedIndex+']');
        //   const unit = $('#selBarang0 option:selected').data('unit['+clickedIndex+']');
        //   const merk = $('#selBarang0 option:selected').data('merk['+clickedIndex+']');

        //   $("[name='inputHarga["+clickedIndex+"]']").val(harga);
        //   $("[name='inputMerk["+clickedIndex+"]']").val(merk);
        //   $("[name='inputUnit["+clickedIndex+"]']").val(unit);
        //   $('[name=SubTotal0]').val(harga);
        // });
        return;
      } //SCOPE SUCCESS
    });
  });//SCOPE LOADED SUPP

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