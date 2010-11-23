<p>Upload file yang memuat list paket apa saja yang ada di repository<br><br>
Apabila anda belum memiliki file repo nya, anda dapat melihat cara membuat nya di <a href="http://bramandityo.com" target="blank">http://bramandityo.com</a></p>
<p>
<form name="package" action="<?php echo site_url();?>/system_mod/set_repo">
<table>
<tr><td>Distro</td><td>:</td><td>
<select name="countries"  onChange="updatecities(this.selectedIndex)" >
<option selected>Select A Distro</option>
<?php $this->setting->distro();?>
</select>
</td></tr>
<tr><td>Release</td><td>:</td><td>
<select name="cities" >
</select>
</td></tr>
<tr><td>File repo</td><td>:</td><td><input type="file" name="userfile"></td></tr>
<tr><td colspan="3" align="center"><input type="submit" value="Upload"/></td></tr>
</table>
</form>

<script type="text/javascript">
var countrieslist=document.package.countries
var citieslist=document.package.cities
var cities=new Array()
cities[0]=""
<?php $this->setting->release();?>
function updatecities(selectedcitygroup){
citieslist.options.length=0
if (selectedcitygroup>0){
for (i=0; i<cities[selectedcitygroup].length; i++)
citieslist.options[citieslist.options.length]=new Option(cities[selectedcitygroup][i].split("|")[0], cities[selectedcitygroup][i].split("|")[1])
}
}
</script>
</p>