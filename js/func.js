function linkmenu(url) {
  window.location.href = url;
}

function deldata(url, id, sub_id = '', p_id = '') {
  Swal.fire({
    title: 'คุณต้องการลบข้อมูลใช่หรือไม่ ?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'ตกลง',
    cancelButtonText: 'ยกเลิก'
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      window.location.href = url + '&' + id + '&' + sub_id + '&' + p_id;
    } else if (result.isDenied) {
      Swal.fire('Changes are not saved', '', 'info')
    }
  })

}
function print_div() {
  var divToPrint = document.getElementById('div_report'); // เลือก div id ที่เราต้องการพิมพ์
  var html = '<html>' + // 
    '<head>' +
    `<style type="text/css">
    table {font-family: Helvetica, Arial, Verdana; font-size: 14pt
    }
    @media print {
        thead {display: table-header-group;}
    }
    </style>
    <style>
  .header {
    padding: 20px 0 20px 0;
    margin-bottom: 20px;
    overflow: auto;
    border-bottom: 2px solid #0095c8;
  }

  p {
    margin: 0;
  }

  .content {
    width: 100%;
    padding: 10px;
    height: 70px;
    border-bottom: 1px solid;
    text-align: center;

  }

  @media print {
    button {
      display: none;
    }

  }
</style>
    ` +
    '</head>' +
    '<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>' +
    '</html>';
  var popupWin = window.open();
  popupWin.document.open();
  popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
  popupWin.document.close();
}