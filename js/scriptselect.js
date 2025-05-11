switch (userRole) {
    case 'admin':

        const adminscript1 = document.createElement('script');
        adminscript1.src = 'js/eqadmin.js';
        document.head.appendChild(adminscript1);

        const adminscript2 = document.createElement('script');
        adminscript2.src = 'js/search2.js';
        document.head.appendChild(adminscript2);

        // const adminscript3 = document.createElement('script');
        // adminscript3.src = '';
        // document.head.appendChild(adminscript3);

        break;

    case 'passadu':
        const passaduscript1 = document.createElement('script');
        passaduscript1.src = 'js/eqpassadu.js';
        document.head.appendChild(passaduscript1);

        const passaduscript2 = document.createElement('script');
        passaduscript2.src = 'js/search2.js';
        document.head.appendChild(passaduscript2);

        break;

    case 'doctor':
        const doctorscript1 = document.createElement('script');
        doctorscript1.src = 'js/eqdoctor.js';
        document.head.appendChild(doctorscript1);

        const doctorscript2 = document.createElement('script');
        doctorscript2.src = 'js/search2.js';
        document.head.appendChild(doctorscript2);

        break;

    case 'user':
        const userscript1 = document.createElement('script');
        userscript1.src = 'js/equser.js';
        document.head.appendChild(userscript1);

        const userscript2 = document.createElement('script');
        userscript2.src = 'js/search2.js';
        document.head.appendChild(userscript2);

        break;

    case 'user2':
        const user2script1 = document.createElement('script');
        user2script1.src = '';
        document.head.appendChild(user2script1);

        const user2script2 = document.createElement('script');
        user2script1.src = 'js/search2.js';
        document.head.appendChild(user2script2);

        break;

    default:
        Swal.fire({
            title: 'ไม่พบสิทธิ์การเข้าใช้งานของผู้ใช้',
            text: 'กรุณาเข้าสู่ระบบด้วยบัญชีอื่นหรือลองอีกครั้งในภายหลัง',
            icon: 'error',
            showConfirmButton: false,
            willClose: () => {
                window.location.href = 'login.php';
            }
        });
        
        break;
}