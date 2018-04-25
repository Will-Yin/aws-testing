<?php
$stime=microtime(true);
// Enable better php debugging
ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);
error_reporting(E_ALL);

$curl_cmd = 'curl --connect-timeout 1';
$meta_host = '169.254.169.254';
$meta_data['instance-id'] = $instance_id = exec($curl_cmd." http://".$meta_host."/latest/meta-data/instance-id/");
$meta_data['availability-zone'] = $reg_az = exec($curl_cmd." http://".$meta_host."/latest/meta-data/placement/availability-zone/");
$meta_data['local-hostname'] = $local_hostname = exec($curl_cmd." http://".$meta_host."/latest/meta-data/local-hostname/");
$meta_data['instance-type'] = $local_ipv4 = exec($curl_cmd." http://".$meta_host."/latest/meta-data/instance-type/");

echo 'EC2 instance id = ' . $meta_data['instance-id'] . '<br>';
echo 'EC2 instance type = ' . $meta_data['instance-type'] . '<br>';
echo 'EC2 local hostname = ' . $meta_data['local-hostname'] . '<br>';
echo 'EC2 availability zone = ' . $meta_data['availability-zone'] . '<br><br>';

#phpinfo();


session_start();
if(!isset($_SESSION['visit']))
{
    echo "This is the first time you're visiting this server<br>";
    $_SESSION['visit'] = 0;
}
else
    echo "Your number of visits: ".$_SESSION['visit'] . "<br>";

$_SESSION['visit']++;
echo "Client IP: ".$_SERVER['REMOTE_ADDR'] . "<br><br>";
print_r($_COOKIE);

$etime=microtime(true);
$total=$etime-$stime;
echo "<br><br>This page generated in {$total}  second(s)";

?>
