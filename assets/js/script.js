const baseUrl = 'http://localhost/si-uks-v0.2/';

//----------------------------------------- DATA SECTION ---------------------------------------------//

//-------------------------------------// SEKOLAH EDIT//---------------------------------------//
function sekolahEdit(id) {
	$('.sekolah-title').html('Edit sekolah')
	$('.sekolah-footer button[type=submit]').html('Edit')
	$('.sekolah-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.sekolah-form').attr('action', baseUrl + 'data/dataSekolah')

	console.dir(id);
	// run ajax
	$.ajax({
		url: baseUrl + 'data/getSekolahEdit',
		method: 'post',
		data: {
			id: id
		},
		dataType: 'json',

		success: function (data) {
			console.log(data)
			$('.sekolah-input').val(data.id)
			// $('.logo').val(data.logo)
			$('.sekolah').val(data.sekolah)
			$('.yayasan').val(data.yayasan)
			$('.alamat').val(data.alamat)
			$('.katamutiara').val(data.katamutiara)
			$('.kepalasekolah').val(data.kepalasekolah)
		}
	})
}

//-------------------------------------//END SEKOLAH EDIT//---------------------------------------//

//--------------------------------// GURU & KARYAWAN SECTION //---------------------------------//
// GUKAR TAMBAH
function gukarEdit() {
	$('.gukar-title').html('Tambah Guru & Karyawan')
	$('.gukar-footer button[type=submit]').html('Add')
	$('.gukar-footer button[type=submit]').attr('class', 'btn btn-primary')
	$('.gukar-form').attr('action', baseUrl + 'data/dataGukar')

	$('.hidden').val('')
	$('.id').val('')
	$('.niy').val('')
	$('.nama').val('')
	$('.ttl').val('')
	$('.kelamin').val('')
	$('.jabatan').val('')
	$('.alamat').val('')
	$('.notelp').val('')
	$('.foto').val('')
}

function gukarEdit(id) {
	$('.gukar-title').html('Edit Guru & Karyawan')
	$('.gukar-footer button[type=submit]').html('Edit')
	$('.gukar-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.gukar-form').attr('action', baseUrl + 'data/editGukar')

	console.dir(id);
	// run ajax
	$.ajax({
		url: baseUrl + 'data/getGukarEdit',
		method: 'post',
		data: {
			id: id
		},
		dataType: 'json',

		success: function (data) {
			console.log(data)
			$('.gukar-input').val(data.id)
			$('.niys').val(data.niy)
			$('.namas').val(data.nama)
			$('.ttls').val(data.ttl)
			$('.kelamins').val(data.kelamin)
			$('.jabatans').val(data.jabatan)
			$('.alamats').val(data.alamat)
			$('.notelps').val(data.notelp)
			$('.fotos').val(data.foto)
		}
	})
}

//-------------------------------------// GURU & KARYAWAN SECTION //---------------------------------------//

//-------------------------------------// SISWA SECTION //---------------------------------------//
// SISWA TAMBAH

function siswaAdd() {
	$('.siswa-title').html('Tambah Siswa')
	$('.siswa-footer button[type=submit]').html('Simpan')
	$('.siswa-footer button[type=submit]').attr('class', 'btn btn-primary')
	$('.siswa-form').attr('action', baseUrl + 'data/dataSiswa')

	$('.hidden').val('')
	$('.id').val('')
	$('.noinduk').val('')
	$('.nisn').val('')
	$('.nama').val('')
	$('.klspos').val('')
	$('.kelamin').val('')
	$('.tmplahir').val('')
	$('.tgllahir').val('')
	$('.umur').val('')
	$('.alamatortu').val('')
	$('.namaayah').val('')
	$('.namaibu').val('')
	$('.hape').val('')
	$('.foto').val('')
}

// SISWA EDIT
function siswaEdit(id) {
	$('.siswa-title').html('Edit Siswa')
	$('.siswa-footer button[type=submit]').html('Edit')
	$('.siswa-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.siswa-form').attr('action', baseUrl + 'data/editSiswa')

	console.dir(id);
	// run ajax
	$.ajax({
		url: baseUrl + 'data/getSiswaEdit',
		method: 'post',
		data: {
			id: id
		},
		dataType: 'json',

		success: function (data) {
			console.log(data)
			$('.siswa-input').val(data.id)
			$('.noinduks').val(data.noinduk)
			$('.nisns').val(data.nisn)
			$('.namas').val(data.nama)
			$('.klsposs').val(data.klspos)
			$('.kelamins').val(data.kelamin)
			$('.tmplahirs').val(data.tmplahir)
			$('.tgllahirs').val(data.tgllahir)
			$('.umurs').val(data.umur)
			$('.alamatortus').val(data.alamatortu)
			$('.namaayahs').val(data.namaayah)
			$('.namaibus').val(data.namaibu)
			$('.hapes').val(data.hape)
			$('.fotos').val(data.foto)
		}
	})
}
//-------------------------------------// SISWA SECTION //---------------------------------------//

//-------------------------------------// OBAT SECTION //---------------------------------------//
// OBAT TAMBAH
function obatAdd() {
	$('.obat-title').html('Tambah Obat Baru')
	$('.obat-footer button[type=submit]').html('Simpan')
	$('.obat-footer button[type=submit]').attr('class', 'btn btn-primary')
	$('.obat-form').attr('action', baseUrl + 'data/manageObat')

	$('.hidden').val('')
	$('.id').val('')
	$('.kode_obat').val('')
	$('.merkobat').val('')
	$('.katobat').val('')
	$('.jmlobat').val('')
	$('.tglsimpan').val('')
	$('.tglkedaluwarsa').val('')
	$('.kondisi').val('')
	$('.manfaat').val('')
	$('.bentuk').val('')
	$('.konsumen').val('')
}

// OBAT EDIT
function obatEdit(id) {
	$('.obat-title').html('Edit Obat')
	$('.obat-footer button[type=submit]').html('Edit')
	$('.obat-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.obat-form').attr('action', baseUrl + 'data/editObat')

	console.dir(id);
	// run ajax
	$.ajax({
		url: baseUrl + 'data/getObatEdit',
		method: 'post',
		data: {
			id: id
		},
		dataType: 'json',

		success: function (data) {
			console.log(data);
			$('.obat-input').val(data.id)
			$('.kode_obats').val(data.kode_obat)
			$('.merkobats').val(data.merkobat)
			$('.katobats').val(data.katobat)
			$('.jmlobats').val(data.jmlobat)
			$('.tglsimpans').val(data.tglsimpan)
			$('.tglkedaluwarsas').val(data.tglkedaluwarsa)
			$('.kondisis').val(data.kondisi)
			$('.manfaats').val(data.manfaat)
			$('.bentuks').val(data.bentuk)
			$('.konsumens').val(data.konsumen)
		}
	})
}
//-------------------------------------// OBAT SECTION //---------------------------------------//


//-------------------------------------// SARANA SECTION //---------------------------------------//
// SARANA TAMBAH
function saranaAdd() {
	$('.sarana-title').html('Tambah Sarana')
	$('.sarana-footer button[type=submit]').html('Add')
	$('.sarana-footer button[type=submit]').attr('class', 'btn btn-primary')
	$('.sarana-form').attr('action', baseUrl + 'data/dataSarana')

	$('.hidden').val('')
	$('.id').val('')
	$('.kode_sarana').val('')
	$('.namasarana').val('')
	$('.merksarana').val('')
	$('.jmlsarana').val('')
	$('.katsarana').val('')
	$('.konsarana').val('')
	$('.tglbeli').val('')
}

// SARANA EDIT
function saranaEdit(id) {
	$('.sarana-title').html('Edit Sarana')
	$('.sarana-footer button[type=submit]').html('Edit')
	$('.sarana-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.sarana-form').attr('action', baseUrl + 'data/editSarana')

	console.dir(id);
	// run ajax
	$.ajax({
		url: baseUrl + 'data/getSaranaEdit',
		method: 'post',
		data: {
			id: id
		},
		dataType: 'json',

		success: function (data) {
			console.log(data)
			$('.sarana-input').val(data.id)
			$('.kode_saranas').val(data.kode_sarana)
			$('.namasaranas').val(data.namasarana)
			$('.merksaranas').val(data.merksarana)
			$('.jmlsaranas').val(data.jmlsarana)
			$('.katsaranas').val(data.katsarana)
			$('.konsaranas').val(data.konsarana)
			$('.tglbelis').val(data.tglbeli)
		}
	})
}
//-------------------------------------// SARANA SECTION //---------------------------------------//
//--------------------------------------// END DATA SECTION //----------------------------------//


//------------------------------------ ADMIN SECTION ---------------------------------------------//
//---------------------------------------- PERIKSA ----------------------------------------------//
// SARANA EDIT
function periksaEdit(id) {
	$('.periksa-title').html('Edit Periksa')
	$('.periksa-footer button[type=submit]').html('Edit')
	$('.periksa-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.periksa-form').attr('action', baseUrl + 'admin/editPeriksa')

	console.dir(id);
	// run ajax
	$.ajax({
		url: baseUrl + 'admin/getPeriksaEdit',
		method: 'post',
		data: {
			id: id
		},
		dataType: 'json',

		success: function (data) {
			console.log(data)
			$('.periksa-input').val(data.id)
			$('.noinduk').val(data.noinduk)
			$('.nama').val(data.nama)
			$('.kelamin').val(data.kelamin)
			$('.klspos').val(data.klspos)
			$('.gdsiswa').val(data.gdsiswa)
			$('.tbsiswa').val(data.tbsiswa)
			$('.bbsiswa').val(data.bbsiswa)
			$('.statusgizi').val(data.statusgizi)
			$('.keluhansiswa').val(data.keluhansiswa)
			$('.periksasiswa').val(data.periksasiswa)
			$('.tindakan').val(data.tindakan)
			$('.keterangan').val(data.keterangan)
			$('.catatan').val(data.catatan)
			$('.namadokter').val(data.namadokter)
			$('.tglupdate').val(data.tglupdate)
		}
	})
}

//----------------------------------------------- END PERIKSA ---------------------------------//
//------------------------------------------------- REKAM -------------------------------------//
function rekamEdit(id) {
	$('.rekam-title').html('Edit Rekam')
	$('.rekam-footer button[type=submit]').html('Edit')
	$('.rekam-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.rekam-form').attr('action', baseUrl + 'admin/editRekam')

	console.dir(id)

	// run ajax
	$.ajax({
		url: baseUrl + 'admin/getRekamEdit',
		method: 'post',
		data: {
			id: id
		},
		dataType: 'json',

		success: function (data) {
			console.log(data)
			$('.rekam-input').val(data.id)
			$('.noinduk').val(data.noinduk)
			$('.nama').val(data.nama)
			$('.kelamin').val(data.kelamin)
			$('.klspos').val(data.klspos)
			$('.tbsiswa').val(data.tbsiswa)
			$('.bbsiswa').val(data.bbsiswa)
			$('.imt').val(data.imt)
			$('.imun').val(data.imun)
			$('.disabilitas').val(data.disabilitas)
			$('.tekdarah').val(data.tekdarah)
			$('.tbu').val(data.tbu)
			$('.resikoanemia').val(data.resikoanemia)
			$('.rambut').val(data.rambut)
			$('.kulit').val(data.kulit)
			$('.kuku').val(data.kuku)
			$('.ronggamulut').val(data.ronggamulut)
			$('.gigigusi').val(data.gigigusi)
			$('.mata').val(data.mata)
			$('.telinga').val(data.telinga)
			$('.gayahidup').val(data.gayahidup)
			$('.emosi').val(data.emosi)
			$('.modalitasbelajar').val(data.modalitasbelajar)
			$('.dominasiotak').val(data.dominasiotak)
			$('.alatbantu').val(data.alatbantu)
			$('.jasmani').val(data.jasmani)
			$('.tglupdate').val(data.tglupdate)
		}
	})
}

//------------------------------------------------- END REKAM ---------------------------------//

//-------------------------------------// KUNJUNG SECTION //---------------------------------------//
// PRESENSI TAMBAH
function kunjungAdd() {
	$('.kunjung-title').html('Tambah Kunjungan')
	$('.kunjung-footer button[type=submit]').html('Tambah')
	$('.kunjung-footer button[type=submit]').attr('class', 'btn btn-primary')
	$('.kunjung-form').attr('action', baseUrl + 'admin/kunjung')

	var ikiData = {
		noinduk: $('#noinduk').val(),
		cek: $('#cek').val(),
		sakit: $('#sakit').val(),
		obat_id: $('#obat_id').val(),
		jmlobat: $('#jmlobat').val(),
		tgl: $('#tgl').val(),
		keterangan: $('#keterangan').val()
	}

	console.log(ikiData);

	$.ajax({
		url: baseUrl + 'admin/getKunjungAdd',
		method: 'post',
		data: ikiData,
		dataType: 'json',

		success: function (data) {
			console.log(data)
			$('#hidden').val(data.id)
			$('#noinduk').val(data.noinduk)
			$('#cek').val('')
			$('#sakit').val('')
			$('#obat_id').val('')
			$('#jmlobat').val('')
			$('#tgl').val('')
		}
	})
}


// KUNJUNG EDIT
function kunjungEdit(noinduk) {
	$('.kunjung-title').html('Edit Kunjung')
	$('.kunjung-footer button[type=submit]').html('Edit')
	$('.kunjung-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.kunjung-form').attr('action', baseUrl + 'admin/editKunjung')

	console.dir(noinduk);

	// run ajax
	$.ajax({
		url: baseUrl + 'admin/getKunjungEdit',
		method: 'post',
		data: {
			noinduk: noinduk
		},
		dataType: 'json',

		success: function (data) {
			console.log(data)
			$('.kunjung-input').val(data.id)
			$('.noinduks').val(data.noinduk)
			$('.namas').val(data.nama)
			$('.ceks').val(data.cek)
			$('.sakits').val(data.sakit)
			$('.obat_ids').val(data.obat_id)
			$('.jmlobats').val(data.jmlobat)
			$('.tgls').val(data.tgl)
			$('.keterangans').val(data.keterangan)
		}
	})
}
//-------------------------------------// END KUNJUNG SECTION //---------------------------------------//

//--------------------------------------------------------- END ADMIN SECTION ---------------------------------------------//

//-------------------------------------// SETTING USER SECTION //---------------------------------------//
// USER EDIT
function userAdd() {
	$('.user-title').html('Edit User')
	$('.user-footer button[type=submit]').html('Edit')
	$('.user-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.user-form').attr('action', baseUrl + 'menu/User')

	$('.hidden').val('')
	$('.username').val('')
	$('.email').val('')
	$('.password').val('')
	$('.role_id').val('')
	$('.is_active').val('')

}

// USER EDIT
function userEdit(id) {
	$('.user-title').html('Edit User')
	$('.user-footer button[type=submit]').html('Edit')
	$('.user-footer button[type=submit]').attr('class', 'btn btn-success')
	$('.user-form').attr('action', baseUrl + 'menu/editUser')

	console.dir(id)
	// run ajax
	$.ajax({
		url: baseUrl + 'menu/getUserEdit',
		method: 'post',
		data: {
			id: id
		},
		dataType: 'json',

		success: function (data) {
			console.log(data)
			$('.user-input').val(data.id)
			$('.usernames').val(data.username)
			$('.emails').val(data.email)
			$('.passwords').val(data.password)
			$('.role_ids').val(data.role_id)
			$('.is-actives').val(data.is_active)
		}
	})
}
//-------------------------------------// END SETTING USER SECTION //---------------------------------------//



//-------------------------------------// MENU SECTION //---------------------------------------//
$(document).ready(function () {
	// MENU TAMBAH
	$('.menu-add').on('click', function () {
		$('.menu-title').html('Add New Menu')
		$('.menu-footer button[type=submit]').html('Add')
		$('.menu-footer button[type=submit]').attr('class', 'btn btn-primary')
		$('.menu-form').attr('action', baseUrl + 'menu/index')

		$('.hidden').val('')
		$('.menu-input').val('')
	})

	// MENU UBAH
	$('.menu-edit').on('click', function () {
		$('.menu-title').html('Edit Menu')
		$('.menu-footer button[type=submit]').html('Edit')
		$('.menu-footer button[type=submit]').attr('class', 'btn btn-success')
		$('.menu-form').attr('action', baseUrl + 'menu/editMenu')

		const id = $(this).data('id')

		// run ajax
		$.ajax({
			url: baseUrl + 'menu/getMenuEdit',
			method: 'post',
			data: {
				id: id
			},
			dataType: 'json',

			success: function (data) {
				console.log(data)
				$('.menu-input').val(data.id)
				$('.menus').val(data.menu)
			}
		})
	})
	//-------------------------------------// END MENU SECTION //--------------------------------------//

	//-------------------------------------// SUBMENU SECTION //---------------------------------------//
	// SUBMENU TAMBAH
	$('.submenu-add').on('click', function () {
		$('.submenu-title').html('Add Submenu')
		$('.submenu-footer button[type=submit]').html('Add')
		$('.submenu-footer button[type=submit]').attr('class', 'btn btn-primary')
		$('.submenu-form').attr('action', baseUrl + 'menu/subMenu')

		$('.id').val('')
		$('.title').val('')
		$('.menu').val('')
		$('.url').val('')
		$('.icon').val('')
		$('.is-active').val('')
	})

	// SUBMENU EDIT
	$('.submenu-edit').on('click', function () {
		$('.submenu-title').html('Edit Submenu')
		$('.submenu-footer button[type=submit]').html('Edit')
		$('.submenu-footer button[type=submit]').attr('class', 'btn btn-success')
		$('.submenu-form').attr('action', baseUrl + 'menu/editSubMenu')

		const id = $(this).data('id')
		// run ajax
		$.ajax({
			url: baseUrl + 'menu/getSubmenuEdit',
			method: 'post',
			data: {
				id: id
			},
			dataType: 'json',

			success: function (data) {
				console.log(data)
				$('.submenu-input').val(data.id)
				$('.titles').val(data.title)
				$('.menus').val(data.menu_id)
				$('.urls').val(data.url)
				$('.icons').val(data.icon)
				$('.is_actives').val(data.is_active)
			}
		})
	})

	//-------------------------------------// END SUBMENU SECTION //---------------------------------------//

	//-------------------------------------// ROLE SECTION //---------------------------------------//
	// ROLE TAMBAH
	$('.role-add').on('click', function () {
		$('.role-title').html('Add New role')
		$('.role-footer button[type=submit]').html('Add')
		$('.role-footer button[type=submit]').attr('class', 'btn btn-primary')
		$('.role-form').attr('action', baseUrl + 'menu/role')

		$('.hidden').val('')
		$('.role').val('')
	})

	// ROLE UBAH
	$('.role-edit').on('click', function () {
		$('.role-title').html('Edit role')
		$('.role-footer button[type=submit]').html('Edit')
		$('.role-footer button[type=submit]').attr('class', 'btn btn-success')
		$('.role-form').attr('action', baseUrl + 'menu/edit')

		const id = $(this).data('id')

		// run ajax
		$.ajax({
			url: baseUrl + 'menu/getRoleEdit',
			method: 'post',
			data: {
				id: id
			},
			dataType: 'json',

			success: function (data) {
				console.log(data)
				$('.role-input').val(data.id)
				$('.roles').val(data.role)
			}
		})
	})

	// CHECK ACCESS SECTION
	$('.check-access').on('click', function () {
		const roleId = $(this).data('role');
		const menuId = $(this).data('menu');

		// run ajax
		$.ajax({
			data: {
				role_id: roleId,
				menu_id: menuId
			},
			url: baseUrl + 'menu/changeaccess',
			method: 'post',
			success: function () {
				document.location.href = baseUrl + 'menu/roleaccess/' + roleId
			}
		})
	})

	//-------------------------------------// END ROLE SECTION //---------------------------------------//

	//-------------------------------------// EDIT PROFILE / IMAGE SECTION //---------------------------------------//

	// EDIT PROFILE / IMAGE
	$('.custom-file-input').on('change', function () {
		let filename = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(filename)
	})
	//-------------------------------------// END EDIT PROFILE / IMAGE SECTION //---------------------------------------//

	//------------------------------------------- END MENU SECTION ---------------------------------------------//

})
