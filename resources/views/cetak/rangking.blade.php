<center><h1>Rangking {{$kelas}}</h1></center>

<table border="1">
    <tr>
        <td width="80" rowspan="3" height="81" align="center" bgcolor="#CCCCCC"><b>No</b></td>
        <td width="170"  rowspan="3" height="81" align="center" bgcolor="#CCCCCC"><b>
        NO INDUK</b></td>
        <td width="300" rowspan="3" height="81" align="center" bgcolor="#CCCCCC"><b>
        NAMA SISWA</b></td>
        <td width="80" colspan="1" height="19" align="center" bgcolor="#CCCCCC">
        Jumlah <br>
        </td>
        <td width="80" colspan="1" height="19" align="center" bgcolor="#CCCCCC">
        Rata - Rata <br>
        </td>
    </tr>
    <tr>
        <td height="33" align="center" bgcolor="#CCCCCC">Angka</td>
        <td height="33" align="center" bgcolor="#CCCCCC">Angka</td>
    </tr>
    <tr>
        <td height="19" align="center" bgcolor="#CCCCCC"><b>1-100</b></td>
        <td height="19" align="center" bgcolor="#CCCCCC"><b>1-100</b></td>
    </tr>

    @php $i = 1 @endphp
        @foreach($data as $g)
                <tr>
                    <td align="center" height="19">{{$i++}}</td>
                    <td align="center" height="19">{{$g['kode_login']}}</td>
                    <td height="19">{{$g['nama']}}</td>
                    <td align="center" height="19">{{$g['total']}}</td>
                    <td align="center" height="19">{{$g['rata']}}</td>
                </tr>
        @endforeach
</table>