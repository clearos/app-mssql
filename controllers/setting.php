<?php
/**
 * MSSQL settings controller.
 *
 * @category   apps
 * @package    mssql
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2014 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/mssql/
 */

///////////////////////////////////////////////////////////////////////////////
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
///////////////////////////////////////////////////////////////////////////////

// Exceptions
//-----------

use \clearos\apps\base\Engine_Exception as Engine_Exception;

clearos_load_library('base/Engine_Exception');

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * mssql settings controller.
 *
 * @category   apps
 * @package    mssql
 * @subpackage controllers
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2014 ClearFoundation
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/mssql/
 */
class Setting extends ClearOS_Controller
{
    /**
     * mssql default controller
     *
     * @return view
     */

    function index()
    {
    	//ini_set("display_startup_errors", 1); ini_set("display_errors", 1);
        // Load libraries
        //---------------

        $this->load->library('mssql/Mssql');
        $this->lang->load('mssql');

        // Set validation rules
        //---------------------
         
        if ($this->input->post('submit')) {
            $this->form_validation->set_policy('password', 'mssql/mssql', 'validate_password', TRUE);
            $this->form_validation->set_policy('verify', 'mssql/mssql', 'validate_password', TRUE);
            $this->form_validation->set_policy('system_password', 'mssql/mssql', 'validate_password', TRUE);
        } else {
            $this->form_validation->set_policy('new_password', 'mssql/mssql', 'validate_password', TRUE);
            $this->form_validation->set_policy('new_verify', 'mssql/mssql', 'validate_password', TRUE);
        }

        $form_ok = $this->form_validation->run();

        // Extra validation
        //-----------------

        if ($this->input->post('submit')) {
            $password = $this->input->post('password');
            $verify = $this->input->post('verify');
            $system_password = $this->input->post('system_password');
        } else {
            $current_password = '';
            $password = $this->input->post('new_password');
            $verify = $this->input->post('new_verify');
        }

        if ($form_ok) {
            if ($password !== $verify) {
                $this->form_validation->set_error('new_verify', lang('base_password_and_verify_do_not_match'));
                $this->form_validation->set_error('verify', lang('base_password_and_verify_do_not_match'));
                $form_ok = FALSE;
            }
            else
            {
                $running_status = $this->mssql->get_status();
                if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).+$/', $password)) 
                {
                    $this->form_validation->set_error('password', lang('base_password_lower_and_upper'));
                    $form_ok = FALSE;
                }
                else if($running_status == 'running')
                {
                    try {
                        throw new Exception(lang('mssql_management_tool_not_accessible')); 
                    } catch (Exception $e) {
                        $this->page->view_exception($e);
                    }
                    $form_ok = FALSE;
                }
            }
        }

        // Handle form submit
        //-------------------
        if (($this->input->post('submit') || $this->input->post('submit_new')) && $form_ok) {
            try {
                $this->mssql->set_root_password($password,$system_password);

                $this->page->set_message(lang('mssql_password_updated'), 'info');
                redirect('/mssql');
            } catch (Exception $e) {
                $this->page->view_exception($e);
            }
        }

        // Load view data
        //---------------

        try {
            $data['is_running'] = $this->mssql->get_running_state();
            $data['url_download'] = $this->mssql->get_download_url();
            $data['server_version'] = $this->mssql->get_mssql_version();
            $data['is_password_set'] = $this->mssql->is_password_set();
        } catch (Exception $e) {
            $this->page->view_exception($e);
            return;
        }

        // Load views
        //-----------

	    if ($this->mssql->is_eula_agreed())  
			$this->page->view_form('mssql/setting', $data, lang('base_settings'));
		else
			$this->page->view_form('mssql/eula', $data, lang('base_settings'));
    }
    function agree_eula($norepeat =NULL)
    {
    	
    	$this->load->library('mssql/Mssql');
    	$this->lang->load('mssql');
        try {
           
            $this->mssql->set_eula_agreed($norepeat);
			redirect('mssql');
        } catch (Exception $e) {
            $this->page->view_exception($e);
            return;
        }
    	$this->page->view_form('mssql/eula', $data, lang('base_settings'));
    }
}
