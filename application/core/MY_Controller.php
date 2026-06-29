<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class MY_Controller
 *
 * @property CI_User_agent  $agent
 * @property CI_Session     $session
 * @property General_model  $general
 * @property Utils          $utils
 * @property Encryptlib     $encryptlib
 * @property Userlib        $userlib
 * @property Template       $template
 * @property Systemlib      $systemlib
 *
 */
class MY_Controller extends CI_Controller
{
    public $_user;
    public $_client;
    public $_agent;
    public $_is_mobile;
    public $_controller;
    public $_folder;
    public $_method;
    public $_menu_active;
    public $_modules_active;

    public function __construct()
    {
	    parent::__construct();

        $this->_is_mobile   = $this->agent->is_mobile();
	    $controller         = $this->router->fetch_class();
	    $method             = $this->router->fetch_method();
        $folder             = $this->uri->segment(1);
	    $session_id         = $this->session->userdata("id");
        $cookie_id          = !empty($_COOKIE["app_session"]) ? $this->encryptlib->decode($_COOKIE["app_session"]) : "";
	    $current_url        = current_url().(!empty($_SERVER['QUERY_STRING']) ? "?".$_SERVER['QUERY_STRING'] : "");

        $session_id         = !empty($session_id) ? $session_id : $cookie_id;

        // from another module
        $redirect           = $this->input->get("redirect");
        $force_login        = $this->input->get("force_login");
        // from another module

        $this->_controller  = $controller;
        $this->_method      = $method;

	    if (empty($session_id))
	    {
		    if ($this->input->is_ajax_request())
		    {
			    header("Content-Type: application/json");
			    echo json_encode(array(
				    "redirect"	=> base_url("auth/login")
			    ));
			    die;
		    }
		    else
		    {
			    $this->session->set_userdata(array(
				    "current_url"   => $current_url
			    ));
			    redirect(base_url("auth"));
		    }
	    }
	    else
	    {
		    $this->load->library("userlib");

		    if ($this->input->is_ajax_request()){
		    	$data["ajax"]   = 1;
		    }else{
			    $this->session->set_userdata(array(
				    "current_url"   => $current_url
			    ));
		    }
            $session_user   = $this->session->userdata("_user");
            $this->_user    = $this->userlib->get_user($session_id, true);

            /*var_dump($this->_user);
            die;*/

            if (!empty($this->_user->force_session))
            {
                $this->general->update("mst_users", array(
                    "id"    => array(
                        SQL_CONDITION_OPERATOR  => SQL_WHERE_EQUAL,
                        SQL_CONDITION_VALUE     => $this->_user->id
                    )
                ), array(
                    "force_session" => 0
                ));

                redirect(base_url("auth/logout"));
            }

            if ($folder == "mobile" && !$this->_is_mobile && !$this->input->is_ajax_request())
            {
                redirect(base_url("home/dashboard"));
            }
            else if ($this->_is_mobile && $folder != "mobile" && !$this->input->is_ajax_request())
            {
                /*redirect(base_url("mobile/home"));*/
            }
        }

	    $this->log_users($this->_user, $controller, $method, $current_url);
    }

    public function reset_user_login()
    {
	    $this->userlib->get_user(null, true);
    }
    public function log_users($user, $controller, $method, $current_url)
    {
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        }elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }else{
            $agent = 'Undefined';
        }
        $data   = array(
            "id_user"       => $user->id,
            "user"          => !empty($user->username) ? $user->username : $user->email,
            "url"           => $current_url,
            "type"          => $this->input->is_ajax_request() ? "Ajax Request" : "Page",
            "controller"    => $controller,
            "method"        => $method,
            "ip_address"    => $this->input->ip_address(),
            "os"            => $this->agent->platform(),
            "browser"       => $agent
        );

        $this->general->insert("log_users", $data);
    }
    public function check_access($module_code = "")
    {
        if (!empty($module_code))
        {
            $configs        = !empty($this->systemlib->_configs["module_restricted"]) ? $this->systemlib->_configs["module_restricted"] : array();
            $enable_config  = !empty($configs["value"]) ? true : false;

            if ($enable_config)
            {
                $ids_user       = $this->_user->id;
                $ids_roles      = $this->_user->roles["ids_roles"];
                $modules        = $this->general->get_data("__sys_modules", array(
                    "code"  => array(
                        SQL_CONDITION_OPERATOR  => SQL_WHERE_EQUAL,
                        SQL_CONDITION_VALUE     => $module_code
                    )
                ))->row();

                /*var_dump($modules);
                var_dump($module_code);
                die;*/

                if (!empty($modules))
                {
                    $modules->roles     = explode(DATA_MULTI_SEPARATOR, $modules->roles);
                    $modules->client   = explode(DATA_MULTI_SEPARATOR, $modules->client);

                    if (in_array($this->_user->client->id, $modules->client))
                    {
                        if (!empty($modules->roles))
                        {
                            foreach ($modules->roles as $id_role)
                            {
                                if (in_array($id_role, $ids_roles))
                                {
                                    return true;
                                }
                            }

                            $this->utils->push_forbiden_access($this->_user->email);
                            redirect(base_url("error_403"));
                        }
                        else
                        {
                            $this->utils->push_forbiden_access($this->_user->email);
                            redirect(base_url("error_403"));
                        }
                    }
                    else
                    {
                        $this->utils->push_forbiden_access($this->_user->email);
                        redirect(base_url("error_403"));
                    }
                }
                else
                {
                    $this->utils->push_forbiden_access($this->_user->email);
                    redirect(base_url("error_403"));
                }
            }
        }
    }
    protected function page_no_access()
    {
        $this->template->data["title"]          = "Page Not Found";
        $this->template->generate("errors/error_404");
    }
}
