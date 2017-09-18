function hari_ini(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        result = ''+days[day]+' Tanggal '+d+' Bulan '+months[month]+' Tahun '+year;
        document.getElementById(id).innerHTML = result;
		 setTimeout('hari_ini("'+id+'");','1000');
        return true;
}