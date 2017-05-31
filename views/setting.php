<?php

/**
 * mssql view.
 *
 * @category   apps
 * @package    mssql
 * @subpackage views
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

///////////////////////////////////////////////////////////////////////////////
// Load dependencies
///////////////////////////////////////////////////////////////////////////////

$this->lang->load('base');
$this->lang->load('mssql');

$options['buttons']  = array(
    anchor_custom($url_download, lang('mssql_go_to_download_link'), 'high', array('target' => '_blank')),
    //anchor_custom('JavaScript:', 'Start', 'high', array('id' => 'btn_start_stop')),
);

echo infobox_highlight(
    lang('mssql_management_tool'),
    lang('mssql_management_tool_help'),
    $options
);

if(!$is_password_set)
{
	echo infobox_warning(
	    lang('mssql_set_password_first'),
	    lang('mssql_set_password_first_help')
	);
}


echo form_open('mssql',array('id' => 'mssql_password_set'));
echo form_header(lang('base_password'));

echo field_input('version', $server_version, lang('mssql_server_version'),array('readonly' => 'readonly'));
echo field_password('password', '', lang('base_password'));
echo field_password('verify', '', lang('base_verify'));
echo field_password('system_password', '', lang('mssql_system_password'));

echo field_button_set(
    array(form_submit_update('submit', 'high'))
);
//echo '<input type="submit" id="submit_btn" name="submit" value="Update" class="btn theme-form-submit-update  btn-primary">';
//echo '<div class="btn-group"><button type="button" onclick="checkServerStatus(this)" class="btn theme-form-submit-update btn-primary">Update</button></div>';
echo form_footer();
echo form_close();
