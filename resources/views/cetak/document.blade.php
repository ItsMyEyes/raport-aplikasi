<style>
    body{font-size:11px !important;}
    .strong { font-weight: bold; }
    </style>
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="842">
    <tbody><tr>
    <td width="842">
        <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
        <tbody><tr>
        <td width="20%" valign="top">Nama Peserta Didik</td>
        <td width="1%" valign="top">:</td>
        <td width="30%" valign="top">{{$a->nama}}</td>
        <td width="16%" valign="top">Bidang Keahlian</td>
        <td width="2%" valign="top">:</td>
        <td width="29%" valign="top">Multimedia</td>
        </tr>
        <tr>
        <td width="20%" valign="top">Nomor Induk/NISN </td>
        <td width="1%" valign="top">:</td>
        <td width="30%" valign="top">{{$a->nis}} / {{$a->nisn}}</td>
        <td width="16%" valign="top">Program Keahlian</td>
        <td width="2%" valign="top">:</td>
        <td width="29%" valign="top">Multimedia</td>
        </tr>
        <tr>
        <td width="20%" valign="top">Kelas/Semester</td>
        <td width="1%" valign="top">:</td>
        <td width="30%" valign="top">{{$a->kelas->kelas->kelas->tingkat}} {{$a->kelas->kelas->kelas->kelas}} / {{$r}}</td>
        <td width="16%" valign="top">Kompetensi Keahlian</td>
        <td width="2%" valign="top">:</td>
        <td width="29%" valign="top">Multimedia</td>
        </tr>
        <tr>
        <td width="20%" valign="top">Tahun Pelajaran</td>
        <td width="1%" valign="top">:</td>
        <td width="30%" valign="top">{{$tahun_pelajaran}}</td>
        <td width="16%" valign="top">&nbsp;</td>
        <td width="2%" valign="top">&nbsp;</td>
        <td width="29%" valign="top">&nbsp;</td>
        </tr>
    </tbody></table><br/>
    <div class="strong" align="center">DAFTAR NILAI<br />UJIAN SEMESTER {{$r}}</div>
    <p>&nbsp;</p>
    <table style="border: 1px solid #000 !important"  class="table">
        <thead>
      <tr>
        <th style="vertical-align:middle;width: 2px;" align="center" rowspan="2">No</th>
        <th style="vertical-align:middle;width: 300px;" rowspan="2" align="center" class="text-center">Mata Pelajaran</th>
        <th colspan="3" align="center" class="text-center">Nilai Pengetahuan</th> 
        <th colspan="3" align="center" class="text-center">Nilai Keterampilan</th>
      </tr>
      <tr>
        <th align="center" style="width:60px;" class="text-center">Angka</th>
        <th align="center" style="width:60px;" class="text-center">Predikat</th>
        <th align="center" style="width:60px;" class="text-center">&nbsp;</th>
        <th align="center" style="width:60px;" class="text-center">Angka</th>
        <th align="center" style="width:60px;" class="text-center">Predikat</th>
        <th align="center" style="width:60px;" class="text-center">&nbsp;</th>
      </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="8" class="strong">A. Muatan Nasional</td>
            </tr>
            @foreach($nilai as $b)
            <?php
              $nketrampilan     = round((($b->k1)+($b->k2)+($b->k3))/3);
              $npengetahuan     = round((($b->p1)+($b->p2)+($b->p3))/3);

              if($npengetahuan>80){$predikat_pengetahuan="A"; $nilpengetahuan=$npengetahuan; $desc_pengetahuan="Mainnya Heba";}
                elseif($npengetahuan>70) {$predikat_pengetahuan="B"; $nilpengetahuan=$npengetahuan; $desc_pengetahuan="kurang Lineup";}
                elseif($npengetahuan>60){$predikat_pengetahuan="C"; $nilpengetahuan=$npengetahuan; $desc_pengetahuan="sangat hebat";}
                else {$predikat_pengetahuan="D"; $nilpengetahuan=$npengetahuan; $desc_pengetahuan="Kurang mampu";};
				
                // penyesuaian KB Pengetahuan
                        if($npengetahuan>=$b->matpels->kb_peng){$des_kbp="dan <u>tuntas</u>";}
                          else {$des_kbp="dan <u>belum tuntas</u>";};
                          
                        if($nketrampilan>80){$predikat_ketrampilan="A"; $nilketrampilan=$nketrampilan; $desc_ketrampilan="Mainnya Heba";}
                          elseif($nketrampilan>70) {$predikat_ketrampilan="B"; $nilketrampilan=$nketrampilan; $desc_ketrampilan="Mainnya Heba";}
                          elseif($nketrampilan>60){$predikat_ketrampilan="C"; $nilketrampilan=$nketrampilan;$desc_ketrampilan="Mainnya Heba";}
                          else {$predikat_ketrampilan="D"; $nilketrampilan=$nketrampilan; $desc_ketrampilan="secara umum siswa masih kurang terampil dalam hal pengerjaan proyek, kinerja dan portofolio,";};

                // penyesuaian KB Ketrampilan
                        if($nketrampilan>=$b->matpels->kb_ket){$des_kbk="Siswa <u>tuntas</u> dan";}
                          else {$des_kbk="Siswa <u>belum tuntas</u> dan";};
                  
                        if(min($b->k1,$b->k2,$b->k3)==$b->k1)
                          {$desc2="ini";}
                          else if(min($b->k1,$b->k2,$b->k3)==$b->k2)
                          {$desc2="itu";}
                              else {$desc2="atau ini";}
                              $nilaiA = 0;
                              $nilaiB = 0;
                              $nilaiC1 = 0;
                              $nilaiC2= 0;
                              $nilaiC3= 0;
                              $nilaiM= 0;

                              $nilaiA2 = 0;
                              $nilaiB2 = 0;
                              $nilaiC12 = 0;
                              $nilaiC22= 0;
                              $nilaiC32= 0;
                              $nilaiM2= 0;

                              $nilaiA += $npengetahuan;                              
                              $nilaiA2 += $nketrampilan;
            ?>
                @if($b->matpels->matpel->kelompok == 'a')
                    <tr>
                    <td align="center">1</td>
                    <td>{{$b->matpels->matpel->nama}}</td>
                    <td align="center">{{$npengetahuan}}</td>
                    <td align="center" colspan="2">{{$predikat_pengetahuan}}</td>
                    <td align="center">{{$nketrampilan}}</td>
                    <td align="center" colspan="2">{{$predikat_ketrampilan}}</td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td colspan="8" class="strong">B. Muatan Kewilayahan</td>
            </tr>
            @foreach($nilai as $b)
                @if($b->matpels->matpel->kelompok == 'b')
                    <tr>
                    <td>1</td>
                    <td>{{$b->matpels->matpel->nama}}</td>
                    <td align="center">{{$npengetahuan}}</td>
                    <td align="center" colspan="2">{{$predikat_pengetahuan}}</td>
                    <td align="center">{{$nketrampilan}}</td>
                    <td align="center" colspan="2">{{$predikat_ketrampilan}}</td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td colspan="8" class="strong">C1. Dasar Bidang Keahlian</td>
            </tr>
            @foreach($nilai as $b)
                @if($b->matpels->matpel->kelompok == 'c1')
                    <tr>
                    <td>1</td>
                    <td>{{$b->matpels->matpel->nama}}</td>
                    <td align="center">{{$npengetahuan}}</td>
                    <td align="center" colspan="2">{{$predikat_pengetahuan}}</td>
                    <td align="center">{{$nketrampilan}}</td>
                    <td align="center" colspan="2">{{$predikat_ketrampilan}}</td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td colspan="8" class="strong">C2. Dasar Program Keahlian</td>
            </tr>
            @foreach($nilai as $b)
                @if($b->matpels->matpel->kelompok == 'c2')
                    <tr>
                    <td>1</td>
                    <td>{{$b->matpels->matpel->nama}}</td>
                    <td align="center">{{$npengetahuan}}</td>
                    <td align="center" colspan="2">{{$predikat_pengetahuan}}</td>
                    <td align="center">{{$nketrampilan}}</td>
                    <td align="center" colspan="2">{{$predikat_ketrampilan}}</td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td colspan="8" class="strong">C3. Kompetensi Keahlian</td>
            </tr>
            @foreach($nilai as $b)
                @if($b->matpels->matpel->kelompok == 'c3')
                    <tr>
                    <td>1</td>
                    <td>{{$b->matpels->matpel->nama}}</td>
                    <td align="center">{{$npengetahuan}}</td>
                    <td align="center" colspan="2">{{$predikat_pengetahuan}}</td>
                    <td align="center">{{$nketrampilan}}</td>
                    <td align="center" colspan="2">{{$predikat_ketrampilan}}</td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td colspan="8" class="strong">D. Muatan Lokal</td>
            </tr>
            @foreach($nilai as $b)
                @if($b->matpels->matpel->kelompok == 'c1')
                    <tr>
                    <td>1</td>
                    <td>{{$b->matpels->matpel->nama}}</td>
                    <td align="center">{{$npengetahuan}}</td>
                    <td align="center" colspan="2">{{$predikat_pengetahuan}}</td>
                    <td align="center">{{$nketrampilan}}</td>
                    <td align="center" colspan="2">{{$predikat_ketrampilan}}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <br><br>
    @if($prakerin->count() > 0)
    <b>Prakerin</b>
        <table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' height='56'>
        <tr>
          <td width='4%' align='center' bgcolor='#CCCCCC' height='28'><b>No</b></td>
          <td width='30%' align='center' bgcolor='#CCCCCC' height='28'><b>Mitra DU/DI</b></td>
          <td width='20%' align='center' bgcolor='#CCCCCC' height='28'><b>Lokasi</b></td>
          <td width='5%' align='center' bgcolor='#CCCCCC' height='28'><b>Lamanya (bulan)</b></td>
          <td width='36%' align='center' bgcolor='#CCCCCC' height='28'><b>Keterangan</b></td>
        </tr>
        @php $i = 1 @endphp
        @foreach($prakerin as $b)
        <tr>
          <td width='4%' align='center' height='19'>{{$i}}</td>
          <td width='30%' height='19'>{{$b->nama_tempat}}</td>
          <td width='20%' align='center' height='19'>{{$b->lokasi}}</td>
          <td width='5%' align='center' height='19'>{{$b->lama}}</td>
          <td width='36%' height='19'><b>{{$b->keterangan}}</b></td> 
        </tr>
        @endforeach
        </table><br />
    @endif
    <br>
		<br>
    <b>KETIDAKHADIRAN</b><br>
        <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="400" height="106">
          <tbody><tr>
            <td width="29" align="center" bgcolor="#CCCCCC" height="30" style="border-style: solid; border-width: 1">
            <b>No</b></td>
            <td colspan="3" width="360" bgcolor="#CCCCCC" align="center" height="30" style="border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
            <b>Ketidakhadiran</b></td>
          </tr>
          <tr>
            <td width="29" align="center" valign="top" height="19" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1">
            1.</td>
            <td width="146" height="19">Sakit</td>
            <td width="20" height="19">:</td>
            <td width="184" height="19" style="border-right-style: solid; border-right-width: 1">
            <b></b>{{isset($cas) && !is_null($cas) ? $cas->sakit : 0}} hari</td>
          </tr>
          <tr>
            <td width="29" align="center" valign="top" height="19" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1">
            2.</td>
            <td width="146" height="19">Izin</td>
            <td width="20" height="19">:</td>
            <td width="184" height="19" style="border-right-style: solid; border-right-width: 1">
            <b></b>{{isset($cas) && !is_null($cas) ? $cas->ijin : 0}} hari</td>
          </tr>
          <tr>
            <td width="29" align="center" valign="top" height="19" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: solid; border-bottom-width: 1">
            3.</td>
            <td width="146" height="19" style="border-bottom-style: solid; border-bottom-width: 1">
            Tanpa Keterangan</td>
            <td width="20" height="19" style="border-bottom-style: solid; border-bottom-width: 1">
            :</td>
            <td width="184" height="19" style="border-right-style: solid; border-right-width: 1; border-bottom-style: solid; border-bottom-width: 1">
            <b></b>{{isset($cas) && !is_null($cas) ? $cas->alpa : 0}} hari</td>
          </tr>
        </tbody></table><br><br>
    <div class="strong">CATATAN WALI KELAS (untuk perhatian Orang Tua/Wali)</div>
    <table width="100%" style="border: 1px solid #000 !important;background-color: #ccc;">
      <tr>
        <td style="padding:10px 10px 60px 10px;">{{ isset($cas) && !is_null($cas) ? $cas->catatan : "-"}}</td>
      </tr>
    </table>
    <br>
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
      <tbody><tr>
        <td width="69%" valign="top">Mengetahui :<br>
        Orang Tua/Wali,<p>&nbsp;</p>
        <br><br><br><br><br><br><br>
        <p>{{$a->nama_ayah}}</p></td>
        <td width="31%" valign="top">
        Jakarta,  {{date('d F Y',strtotime("now"))}}<br>
        Wali Kelas,<p>&nbsp;</p> 
        <br><br><br><br><br><br><br>
        <p><u>{{ $wali_kelas }}</u><br>
        NIP. -
      </p></td>
      </tr>
      <tr>
        <td width="100%" colspan="2"><center>
        Mengetahui,<br>
        Kepala 123
        <br><br><br><br><br><br><br>
        <u>Kepala</u><br>
        NIP. 123
        </center></td>
      </tr>
    </tbody></table>
    <p><br>
    
    </p></td>
    </tr>
    </tbody></table><br>