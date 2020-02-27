/*
 * Date & Clock Javascript
 * By Adyoi
 * 
 * <span id="dater"></span>
 * <span id="timer"></span>
 *
 */

months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
mydays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];

today  = new Date();
day    = today.getDay();
date   = today.getDate();
year   = today.getYear();
month  = today.getMonth();
tday   = mydays[day];
tmonth = months[month];
tdate  = date < 10 ? '0' + date : date;
tyear  = year < 1000 ? year + 1900 : year;
gdate  = tday + ', ' + tdate + ' ' + tmonth + ' ' + tyear;
sdate  = document.getElementById('dater');
if (sdate) sdate.textContent = gdate;

startTime();

function startTime() {
t = new Date();
h = t.getHours();
m = t.getMinutes();
s = t.getSeconds();
h = h < 10 ? '0' + h : h;
m = m < 10 ? '0' + m : m;
s = s < 10 ? '0' + s : s;
gtime = h + ':' + m + ':' + s;
stime = document.getElementById('timer');
if (stime) stime.textContent = gtime;
setTimeout(startTime, 1000);
}