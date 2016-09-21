<? ob_start();
session_start();
include_once('../../../wp-config.php');
include_once('../../../wp-includes/wp-db.php');
error_reporting(E_NONE);
ini_set('display_errors','Off');
global $wpdb;
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

$action = $_REQUEST['action'];
$curcode = get_option('wordtowordpresssecurecode');


if ($curcode != '')
{
	if ($curcode == $action)
	{
		if ($_REQUEST['test'] == 'test')
		{
			echo 'success';
		}
		else
		{
			$file = file_get_contents('php://input');
			$str = time() . '-' . gen_uuid();
		
			if (!file_exists('../../uploads/artifacts'))
				mkdir('../../uploads/artifacts', 0755, true);
		
			file_put_contents('../../uploads/artifacts/' . $str . '.png', $file);	
		
	
			echo $str . '.png';
		}
	}
}
?>