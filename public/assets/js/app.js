import './bootstrap';

import Swal from 'sweetalert2';

window.Swal = Swal;

// document.getElementById('btn-delete').addEventListener('click', function() {
//     Swal.fire({
//       title: 'Apakah Anda yakin?',
//       text: "Anda tidak akan dapat mengembalikan tindakan ini!",
//       icon: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: 'Ya, Hapus!',
//       cancelButtonText: 'Batal'
//     }).then((result) => {
//       if (result.isConfirmed) {
//         // Tindakan yang ingin Anda lakukan saat pengguna mengklik tombol "Ya, Hapus!"
//         Swal.fire(
//           'Dihapus!',
//           'Data telah dihapus.',
//           'success'
//         );
//       }
//     });
//   });