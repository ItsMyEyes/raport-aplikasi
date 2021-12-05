<center><h3>Lagger Pelajaran {{ $pelajaran }} / {{ $kelas }}</h3></center>
<table border="1">
    <tr>
        <td width="80" rowspan="3" height="81" align="center" bgcolor="#CCCCCC"><b>No</b></td>
        <td width="170"  rowspan="3" height="81" align="center" bgcolor="#CCCCCC"><b>
        NO INDUK</b></td>
        <td width="300" rowspan="3" height="81" align="center" bgcolor="#CCCCCC"><b>
        NAMA SISWA</b></td>
        <td width="80" colspan="2" height="19" align="center" bgcolor="#CCCCCC">
        Pengetahuan<br>
        </td>
        <td width="80" colspan="2" height="19" align="center" bgcolor="#CCCCCC">
        Ketrampilan <br>
        </td>
    </tr>
    <tr>
        <td height="33" align="center" bgcolor="#CCCCCC">Angka</td>
        <td height="33" align="center" bgcolor="#CCCCCC">Predikat</td>
        <td height="33" align="center" bgcolor="#CCCCCC">Angka</td>
        <td height="33" align="center" bgcolor="#CCCCCC">Predikat</td>
    </tr>
    <tr>
        <td height="19" align="center" bgcolor="#CCCCCC"><b>1-100</b></td>
        <td height="19" align="center" bgcolor="#CCCCCC"><b>A-D</b></td>
        <td height="19" align="center" bgcolor="#CCCCCC"><b>1-100</b></td>
        <td height="19" align="center" bgcolor="#CCCCCC"><b>A-D</b></td>
    </tr>
    @php $i = 1 @endphp
    @foreach($a as $b)
    <?php
        $nketrampilan     = round((($b->k1)+($b->k2)+($b->k3))/3);
        $npengetahuan     = round((($b->p1)+($b->p2)+($b->p3))/3);
        if ($b->k1 == 0) $nketrampilan = round((($b->k1)+($b->k2)+($b->k3))/1);
        if ($b->p1 == 0) $npengetahuan = round((($b->p1)+($b->p2)+($b->p3))/1);
        if ($b->k2 == 0) $nketrampilan = round((($b->k1)+($b->k2)+($b->k3))/2);
        if ($b->p2 == 0) $npengetahuan = round((($b->p1)+($b->p2)+($b->p3))/2);
        
        ?>
        @foreach($c as $g)
            @if($g->id_siswa == $b->induk)
                <tr>
                    <td align="center" height="19">{{$i++}}</td>
                    <td align="center" height="19">{{$b->siswa->nis}}</td>
                    <td height="19">{{$b->siswa->nama}}</td>
                    <td align="center" height="19">{{$npengetahuan}}</td>
                    <td align="center" height="19">@if($npengetahuan>85) A  @elseif($npengetahuan>70) B @elseif($npengetahuan>55) C @else D @endif</td>
                    <td align="center" height="19">{{$nketrampilan}}</td>
                    <td align="center" height="19">@if($nketrampilan>85) A  @elseif($nketrampilan>70) B @elseif($nketrampilan>55) C @else D @endif</td>
                </tr>
            @endif
        @endforeach
    @endforeach
</table>