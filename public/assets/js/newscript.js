jQuery(function () {
  $(document).on('loaded.bs.select changed.bs.select', '#selectOptSupp', function (e) {
    const id = $('#selectOptSupp option:selected').data('nama');
    const alamat = $('#selectOptSupp option:selected').data('alamat');
    const noTelp = $('#selectOptSupp option:selected').data('notelp');

    $('[name=namaSupp]').val(id);
    $('[name=alamatSupp]').val(alamat);
    $('[name=noTelp]').val(noTelp);

    //AJAX CALLs
    $.ajax({
      type: "post",
      async: true,
      url: "/BarangMasuk/post",
      dataType: "JSON",
      data: { id: id },
      cache: false,
      success:
        (function (data) {
          let i;
          let html = '';
          additionalData();
          $('#addRow').on("click",
            function () {
              k = 0;
              k++;
              let form = '<div class="form-row" id="form' + k + '"><div class="form-group col-sm-4"><select class="form-control form-control-sm selectpicker" name="selBarang[' + k + ']" data-live-search="true" id="selBarang"></select></div><div class="form-group col-sm-2"><input name="inputHarga[' + k + ']" type="text" class="form-control form-control-sm" id="inputHarga" readonly placeholder=""></div><div class="form-group col-sm-1 mr-0"><input name="inputJumlahBrg[' + k + ']" type="text" class="form-control form-control-sm" id="inputJumlahBrg"></div><div class="form-group col-sm-1"><input name="inputUnit[' + k + ']" type="text" class="form-control form-control-sm" id="inputUnit" readonly></div><div class="form-group col-sm-2"><input name="inputMerk[' + k + ']" type="text" class="form-control form-control-sm" id="inputMerk" readonly></div><div class="form-group col-sm-2 "><input name="SubTotal[' + k + ']" type="text" class="form-control form-control-sm" id="SubTotal[' + k + ']" readonly></div></div>';
              //APPEND
              $("#contentRow").append(form);
              // additionalData();
            });
          function additionalData() {
            let f;
            let selBarang = $('select#selBarang');
            for (i = 0; i < data.length; i++) {
              html += '<option value="' + data[i].namaBarang + '" data-tokens="' + data[i].namaBarang + '">' + data[i].namaBarang + '</option>';
            }
            for (f = 0; f < selBarang.length; f++) {
              //REFRESH
              $('select[name="selBarang[' + f + ']"]').html(html).selectpicker('refresh');
              //SET ATRIBUT
              $("#inputHarga").attr("name", "inputHarga[" + f + "]");
              $("#inputUnit").attr("name", "inputUnit[" + f + "]");
              $("#inputMerk").attr("name", "inputMerk[" + f + "]");
              $("#inputJumlahBrg").attr("name", "inputJumlahBrg[" + f + "]");
              $("#SubTotal").attr("name", "SubTotal[" + f + "]");
              //SET DATA ATRIBUT
              $("[name='inputHarga[" + f + "]']").val(data[f].harga);
              $("[name='inputMerk[" + f + "]']").val(data[f].merk);
              $("[name='inputUnit[" + f + "]']").val(data[f].unit);
              $("[name='inputJumlahBrg[" + f + "]']").val(1);
              $("[name='SubTotal[" + f + "]']").val(data[f].harga);
              $('select[name="selBarang[' + f + ']"]').selectpicker('refresh');
            }//------CLOSE LOOPS (for) OPTION SELECT BARANG
          }
          //ON CHANGE
          function changeSelBarang() {

            $(document).on('changed.bs.select', 'select[name="selBarang[' + f + ']"]', function (e, clickedIndex, isSelected, previousValue) {
              //SET ATRIBUT
              $("#inputHarga").attr("name", "inputHarga[" + clickedIndex + "]");
              $("#inputUnit").attr("name", "inputUnit[" + clickedIndex + "]");
              $("#inputMerk").attr("name", "inputMerk[" + clickedIndex + "]");
              $("#inputJumlahBrg").attr("name", "inputJumlahBrg[" + clickedIndex + "]");
              $("#SubTotal").attr("name", "SubTotal[" + clickedIndex + "]");
              //SET DATA ATRIBUT
              $("[name='inputHarga[" + clickedIndex + "]']").val(data[clickedIndex].harga);
              $("[name='inputMerk[" + clickedIndex + "]']").val(data[clickedIndex].merk);
              $("[name='inputUnit[" + clickedIndex + "]']").val(data[clickedIndex].unit);
              $("[name='inputJumlahBrg[" + clickedIndex + "]']").val(1);
              $("[name='SubTotal[" + clickedIndex + "]']").val(data[clickedIndex].harga);
            });//-----CLOSE REFRESHED EVENT
            $('select[name="selBarang[' + f + ']"]').selectpicker('refresh');
          }
        })//--------CLOSE FUNCTION1 AJAX SUCCESS
    });//--------CLOSE AJAX MAIN
  });//----------CLOSE SELECT OPT SUPPLIER ON(load, change)
});//------------DOM READY