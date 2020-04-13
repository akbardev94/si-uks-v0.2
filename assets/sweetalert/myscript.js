const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire({
		title: '',
		text: flashData,
		type: 'success',
		// timer: 1000,
		showConfirmButton: true

	});
}

// confirm on delete
$('.confirm-delete').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah Anda Yakin?',
		text: "Anda tidak dapat mengembalikan data ini!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus ini!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
