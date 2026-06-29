<?php defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require_once APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/BeforeValidException.php';
require_once APPPATH . '/libraries/ExpiredException.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';

use \Firebase\JWT\JWT;
/**
 * Class MY_Rest
 *
 * @property CI_Session     $session
 * @property General_model  $general
 * @property Utils          $utils
 * @property Encryptlib     $encryptlib
 * @property Userlib        $userlib
 *
 */
class MY_Rest extends REST_Controller
{
    public $_log_id;

    public function __construct()
    {
        parent::__construct();

        $cors_file      = "public/files/json/cors.json";

        if (file_exists($cors_file)){
            $allowedOrigins = file_get_contents("public/files/json/cors.json");
            $allowedOrigins = json_decode($allowedOrigins, 1);
        } else {
            $allowedOrigins = array();
        }

        if (!empty($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)){
            $http_origin    = $_SERVER['HTTP_ORIGIN'];
        } else {
            $http_origin    = "";
        }

        if (!empty($http_origin)){
            header("Access-Control-Allow-Origin: $http_origin");
        }

        $controller     = $this->router->fetch_class();
        $method         = $this->router->fetch_method();

        $logs           = array(
            "address"    => $this->input->ip_address(),
            "controller"    => $controller,
            "method"        => $method,
            "type"          => $_SERVER["REQUEST_METHOD"],
            "data"          => $_SERVER["REQUEST_METHOD"] == "GET" ? $this->get() : $this->post()
        );

        $this->_log_id  = $this->general->insert("log_api_in", $logs);
    }

    public function set_log_start()
    {
        $this->general->update("log_api_in", array(
            "id"        => array(
                SQL_CONDITION_OPERATOR  => SQL_WHERE_EQUAL,
                SQL_CONDITION_VALUE     => $this->_log_id
            )
        ), array(
            "start"     => date("Y-m-d H:i:s")
        ));
    }
    public function set_log_end($result = array(), $status = null, $id_api = null)
    {
        $data       = array(
            "result"    => $result,
            "end"       => date("Y-m-d H:i:s")
        );

        if ($status !== null)
        {
            $data["status"]     = $status;
        }
        if ($id_api !== null)
        {
            $data["id_api"]  = $id_api;
        }

        $this->general->update("log_api_in", array(
            "id"        => array(
                SQL_CONDITION_OPERATOR  => SQL_WHERE_EQUAL,
                SQL_CONDITION_VALUE     => $this->_log_id
            )
        ), $data);
    }
}