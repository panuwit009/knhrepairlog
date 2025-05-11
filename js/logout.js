function confirmLogout() {
    console.log('Calling confirmLogout');
    Swal.fire({
      title: 'คุณต้องการออกระบบหรือไม่?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ยืนยัน',
      cancelButtonText: 'ยกเลิก'
    }).then((result) => {
      if (result.isConfirmed) {
        console.log('Redirecting to logout.php');
        window.location.href = 'logout.php';
      }
    });
  }
  