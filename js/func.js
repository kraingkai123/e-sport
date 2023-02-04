function linkmenu(url) {
    window.location.href = url;
}

function deldata(url,id) {
    
    Swal.fire({
        title: 'คุณต้องการลบข้อมูลใช่หรือไม่ ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก'
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = url+'&'+id;
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })
    
}