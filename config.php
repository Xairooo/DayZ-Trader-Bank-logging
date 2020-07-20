<?php
class configConnect
{
    const LOGS_DIR = "C:\Users\administrator\AppData\Local\DayZ\Trader\TBlogs\\";//TBlogs folder; Your DayZ server profile location
    const HAS_TRADER = true;//Always be true
    const HAS_ATM = true;//Set as false if not using banking/ATM mod

    const DISPLAY_PLAYER_NAMES = true;//Set as false if wanting to display player UID's
    const DISPLAY_ITEM_NAMES = true;//Set as false if wanting to display item class names

    const FIX_BROKEN_LOG_LINES = false;//"Try to" fix log lines that are split into 2 (unknown cause)

    const ONLY_ADMINS_CAN_VIEW = true;

    const TIMEZONE = '';//Force a Timezone. Leave empty for default server timezone (optimal) https://www.w3schools.com/php/php_ref_timezones.asp

    public $api_key = '';//Steam api key
    private $logout_page = 'logout.php';

    public function db_connect(bool $select_only = false): object
    {
        if ($select_only) {//SELECT only MySQL user privilege (front end)
            $db_host = '127.0.0.1';
            $db_name = 'dz_tb_logs';
            $db_user = 'root';
            $db_password = '';
        } else {//MySql user that has INSERT and UPDATE privileges
            $db_host = '127.0.0.1';
            $db_name = 'dz_tb_logs';
            $db_user = 'root';
            $db_password = '';
        }
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        return new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password, $options);
    }
}