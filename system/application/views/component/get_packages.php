<p>
Cari paket aplikasi yang anda butuhkan. Kami akan mendonwloadkan semua temasuk depedensi nya untuk anda
</p>

<p>
<form name="package">
<table>
<tr><td>Distro</td><td>:</td><td>
<select name="countries"  onChange="updatecities(this.selectedIndex)" >
<option selected>Select A Distro</option>
<option value="freebsd">FreeBSD</option>
<option value="fedora">Fedora</option>
<option value="ubuntu">Ubuntu</option>
</select>
</td></tr>
<tr><td>Release</td><td>:</td><td>
<select name="cities" >
</select>
</td></tr>
<tr><td>Package Name</td><td>:</td><td><input name="package" type="type"></td></tr>
<tr><td colspan="3" align="center"><input type="reset" value="Reset"/> <input type="submit" value="Submit"/></td></tr>
</table>

</form>

<script type="text/javascript
">

var countrieslist=document.package.countries
var citieslist=document.package.cities

var cities=new Array()
cities[0]=""
cities[1]=["7.2|7.2","8.0|8.0","8.1|8.1"]
cities[2]=["10|10","11|11","12|12","13|13","14|14"]
cities[3]=["9.04|9.04","9.10|9.10","10.04|10.04"]

function updatecities(selectedcitygroup){
citieslist.options.length=0
if (selectedcitygroup>0){
for (i=0; i<cities[selectedcitygroup].length; i++)
citieslist.options[citieslist.options.length]=new Option(cities[selectedcitygroup][i].split("|")[0], cities[selectedcitygroup][i].split("|")[1])
}
}
</script>
</p>