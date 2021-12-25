<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ public_path('css/cetak.css') }}" rel="stylesheet">
<div class="text-center" id="cover_utama">
<br>
<br>
<br>
	<img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fsmksahidjakarta.sch.id%2Fwp-content%2Fuploads%2F2020%2F10%2FLOGO_SAHID_OKK.png&f=1&nofb=1" border="0" width="200" />
<br>
<br>
<br>
<br>
<br>
<br>
<h3>RAPOR UJIAN {{  ($tengah_semester) ? "Tengah " : "" }}SEMESTER {{$semester}}</h3>
<h3>SMK Sahid</h3>
<h3>TAHUN PELAJARAN {{$ta}}</h3><br>
<br>
<br>
<br>
<br>
<br>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:47%; float:left; padding:7px;">Nama Peserta Didik:</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="border:#000000 1px solid; width:47%; float:left; padding:7px;">{{$nama}}</div>
<div style="width:25%; float:left;">&nbsp;</div>
<br>
<br>
<br>
<br>
<br>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:47%; float:left; padding:7px;">NISN:</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="width:25%; float:left;">&nbsp;</div>
<div style="border:#000000 1px solid; width:47%; float:left; padding:7px;">{{$nis}}</div>
<div style="width:25%; float:left;">&nbsp;</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h3>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>REPUBLIK INDONESIA</h3>
</div>
</div>