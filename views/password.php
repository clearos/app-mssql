<?php

/**
 * Set password view.
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

///////////////////////////////////////////////////////////////////////////////
// Show warning if password is not set
///////////////////////////////////////////////////////////////////////////////

if (!$is_running)
    echo infobox_warning(lang('base_warning'), lang('mssql_management_tool_not_accessible'));

echo infobox_warning(lang('base_warning'), lang('mssql_lang_please_set_a_database_password'));

echo form_open('mssql');
echo form_header(lang('base_password'));

echo field_password('new_password', '', lang('base_password'));
echo field_password('new_verify', '', lang('base_verify'));

echo field_button_set(
    array(form_submit_custom('submit_new', lang('mssql_set_password'), 'high'))
);

echo form_footer();
echo form_close();
