function showPasswordLama() {
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}

function showPassword1() {
	var x = document.getElementById("password1");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}

function showPassword2() {
	var x = document.getElementById("password2");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}

// SWEETALERT CONFIRM DELETE
function del($url) {
	swal({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.value) {
			location.href = '/' + $url;
			swal("Deleted!", "Your Data has been deleted.", "success");
		}
	})
}
// SWEETALERT CONFIRM EDIT
function edit() {
	swal("Edited!", "Your Data has been edited.", "success");
}
// SWEETALERT CONFIRM ADD
function add() {
	swal("Added!", "Your Data has been added.", "success");
}



// ------------------jquery-------------------------
$(document).ready(function () {

	var current_fs, next_fs, previous_fs; //fieldsets
	var opacity;
	var current = 1;
	var steps = $("fieldset").length;

	setProgressBar(current);

	$(".next").click(function () {

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		//Add Class Active
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({
			opacity: 0
		}, {
			step: function (now) {
				// for making fielset appear animation
				opacity = 1 - now;

				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				next_fs.css({
					'opacity': opacity
				});
			},
			duration: 500
		});
		setProgressBar(++current);
	});

	$(".previous").click(function () {

		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		//Remove class active
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		//show the previous fieldset
		previous_fs.show();

		//hide the current fieldset with style
		current_fs.animate({
			opacity: 0
		}, {
			step: function (now) {
				// for making fielset appear animation
				opacity = 1 - now;

				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				previous_fs.css({
					'opacity': opacity
				});
			},
			duration: 500
		});
		setProgressBar(--current);
	});

	function setProgressBar(curStep) {
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width", percent + "%")
	}

	$(".submit").click(function () {
		return false;
	})

	$('#tbMedcheck').DataTable({
		columnDefs: [{
			targets: [0, 1, 2],
			className: 'mdl-data-table__cell--non-numeric'
		}]
	});
	$('#tbAkun').DataTable({
		columnDefs: [{
			targets: [0, 1, 2],
			className: 'mdl-data-table__cell--non-numeric'
		}]
	});


	// $.getJSON('infoKesehatan.json', function (data) {
	// 	let berita = data.berita;
	// 	$.each(berita, function (i, data) {
	// 		console.log(berita);
	// 		// $('#daftar-berita').append('<div class="col-md-6"><div class="card"><div class="card-header"><img src="' + data.gambar + '" class="d-block w-100"></div><div class="card-body"><h5 class="card-title">' + data.judul + '</h5><p class="card-text">' + data.kategori + '</p><a href="' + data.link + '" class="btn btn-primary" target="_blank">Go somewhere</a></div></div></div>')

	// 	});
	// });

	// $('.nav-infosehat').on('click', function () {
	// 	$('.nav-infosehat').removeClass('active');
	// 	$(this).addClass('active');

	// 	let kategori = $(this).html();
	// 	$('.judul-infosehat').html(kategori);

	// 	console.log(kategori);
	// $.getJSON('infoKesehatan.json', function (data) {
	// 	let berita = data.berita;
	// 	let content = '';

	// 	console.log(berita);
	// $.each(menu, function (i, data) {
	// 	if (data.kategori == kategori.toLowerCase()) {
	// 		content += '<div class="col-md-6 mb-3"><div class="card" style="height: 30rem"><img src="' + data.gambar + '" class="card-img-top img-thumbnail" style="height: 20rem"><div class="card-body"><h5 class="card-title">' + data.judul + '</h5><a href="' + data.link + '" class="btn btn-primary" target="_blank">Lihat Berita</a><p class="card-text text-right text-capitalize text-muted">' + data.kategori + '</p></div></div></div>'
	// 	}
	// });
	// $('#daftar-berita').html(content);
	// });
	// });
});
