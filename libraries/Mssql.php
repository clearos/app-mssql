<?php 

/**
 * MSSQL class.
 *
 * @category   apps
 * @package    mssql
 * @subpackage libraries
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2017 ClearFoundation
 * @license    http://www.gnu.org/copyleft/lgpl.html GNU Lesser General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/mssql/
 */

///////////////////////////////////////////////////////////////////////////////
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
// N A M E S P A C E
///////////////////////////////////////////////////////////////////////////////

namespace clearos\apps\mssql;

///////////////////////////////////////////////////////////////////////////////
// B O O T S T R A P
///////////////////////////////////////////////////////////////////////////////

$bootstrap = getenv('CLEAROS_BOOTSTRAP') ? getenv('CLEAROS_BOOTSTRAP') : '/usr/clearos/framework/shared';
require_once $bootstrap . '/bootstrap.php';

///////////////////////////////////////////////////////////////////////////////
// T R A N S L A T I O N S
///////////////////////////////////////////////////////////////////////////////

clearos_load_language('mssql');

///////////////////////////////////////////////////////////////////////////////
// D E P E N D E N C I E S
///////////////////////////////////////////////////////////////////////////////

// Classes
//--------

use \clearos\apps\base\Daemon as Daemon;
use \clearos\apps\base\Shell as Shell;
use \clearos\apps\base\File as File;
use \clearos\apps\network\Network_Utils as Network_Utils;

clearos_load_library('base/Daemon');
clearos_load_library('base/Shell');
clearos_load_library('base/File');
clearos_load_library('network/Network_Utils');

// Exceptions
//-----------

use \Exception as Exception;
use \clearos\apps\base\Engine_Exception as Engine_Exception;
use \clearos\apps\base\Validation_Exception as Validation_Exception;

clearos_load_library('base/Engine_Exception');
clearos_load_library('base/Validation_Exception');

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * mssql class.
 *
 * @category   apps
 * @package    mssql
 * @subpackage libraries
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2017 ClearFoundation
 * @license    http://www.gnu.org/copyleft/lgpl.html GNU Lesser General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/mssql/
 */
const COMMAND_MSSQL_FILE = "/usr/sbin/connect.exp";


class Mssql extends Daemon
{
    ///////////////////////////////////////////////////////////////////////////////
    // V A R I A B L E S
    ///////////////////////////////////////////////////////////////////////////////

    //const FILE_EULA = "/usr/clearos/apps/mssql/mssql_eula";
    const FILE_EULA = 'mssql_eula';

    ///////////////////////////////////////////////////////////////////////////////
    // M E T H O D S
    ///////////////////////////////////////////////////////////////////////////////

    /**
     * MSSql constructor.
     */

    public function __construct()
    {
        clearos_profile(__METHOD__, __LINE__);

        parent::__construct('mssql');
    }
    /**
     * Gets the Current status.
     *
     * @return running or stopped
     */
    function get_status()
    {
        $options['validate_exit_code'] = FALSE;
        $shell = new Shell();
        $retval = $shell->execute(
            "systemctl status mssql-server", " ", TRUE, $options
        );
        $output = $shell->get_output();
        $running_status = 'stopped';
        if (strpos($output[2], '(running)') !== false) {
            $running_status = 'running';
        }
        return $running_status;
    }
    /**
    * Update the root password.
    *
    * @return exception if error exists
    */
    public function set_root_password($password,$system_password)
    {
        clearos_profile(__METHOD__, __LINE__);

        // set_password will handle the validation

        Validation_Exception::is_valid($this->validate_password($password));
        Validation_Exception::is_valid($this->validate_password($system_password));

        $this->put_password_file($password,$system_password); 
        $command = COMMAND_MSSQL_FILE;

        $shell = new Shell();
        $options['validate_exit_code'] = FALSE;
        $retval = $shell->execute(
            $command, "set-sa-password", false, $options
        );
        $output = $shell->get_output();
        //var_dump($output); die;
        $error = (preg_match('/su: Authentication failure/', $output[2])) ? lang('mssql_system_password_wrong') : NULL;
        if($error)
        {
            throw new Engine_Exception($error);
        }
    }

    /**
     * Gets the MSSQL Download URL.
     *
     * @return URL string
     */
    function get_mssql_version()
    {
        return "SQL Server 2017 CTP 2.0";
    }

    /**
     * Gets the MSSQL Version.
     *
     * @return URL string
     */
    function get_download_url()
    {
        return "https://www.microsoft.com/en-us/download/details.aspx?id=50402";
    }

    /**
     * Agreed to EULA.
     *
     * @return boolean
     */
    function is_eula_agreed()
    {
        $file = new File(self::FILE_EULA);
            if ($file->exists())
            return TRUE;
        return FALSE;
    }

    /**
     * Set agreed to EULA.
     *
     * @return void
     */
    function set_eula_agreed($system_password)
    {
        $this->set_eula_command($system_password);
        try {
            $file = new File(self::FILE_EULA);
            if (!$file->exists())
                $file->create('root', 'root', "0644");
            
        } catch (Exception $e) {
            throw new Exception($e->get_message());
        }
    }
    /**
     * Set Eula File and RUn it via Expect.
     *
     * @param string $system password 
     *
     * @return Exception if any error
     */
    public function set_eula_command($system_password)
    {
        clearos_profile(__METHOD__, __LINE__);

        // set_password will handle the validation

        Validation_Exception::is_valid($this->validate_password($system_password));

        $this->set_eula_expect($system_password); 
        $command = COMMAND_MSSQL_FILE;

        $shell = new Shell();
        $options['validate_exit_code'] = FALSE;
        $retval = $shell->execute(
            $command, "setup", false, $options
        );
        $output = $shell->get_output();
        //var_dump($output); die;
        $error = (preg_match('/su: Authentication failure/', $output[2])) ? lang('mssql_system_password_wrong') : NULL;
        if($error)
        {
            throw new Engine_Exception($error);
        }
    }


    
    ///////////////////////////////////////////////////////////////////////////////
    // V A L I D A T I O N   R O U T I N E S
    ///////////////////////////////////////////////////////////////////////////////



    /**
     * Validates password.
     *
     * @param string $password password
     *
     * @return string error message if password is invalid
     */

    public function validate_password($password)
    {
        clearos_profile(__METHOD__, __LINE__);

        // TODO
    }

    /**
     * Validates password/verify.
     *
     * @param string $password password
     * @param string $verify   verify password
     *
     * @return string error message if passwords do not match
     */

    public function validate_password_verify($password, $verify)
    {
        clearos_profile(__METHOD__, __LINE__);

        if ($password != $verify)
            return lang('mariadb_password_mismatch');
    }
    /**
     * Set password via Expect.
     *
     * @param string $password 
     * @param string $system password 
     *
     * @return void
     */
    function put_password_file($password = "Champ@123",$system_password)
    {
        $file = COMMAND_MSSQL_FILE;

        $commandc_code = '#!/usr/bin/expect -f';
        $commandc_code = $commandc_code.  "\n";
        $commandc_code = $commandc_code. ' set timeout 60';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' spawn su - root';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?assword" { send "'.$system_password.'\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*#" { send "/opt/mssql/bin/mssql-conf set-sa-password\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?new" { send "'.$password.'\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?assword" { send "'.$password.'\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?Confirm" { send "'.$password.'\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?uccess" { send "/opt/mssql/bin/mssql-conf start-service\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' interact';
        $commandc_code = $commandc_code. "\n";

        $file = new File($file, TRUE);
        if (!$file->exists())
            $file->create('root','root','0777');
        $commandc_codeA[] = $commandc_code;
        $file->dump_contents_from_array($commandc_codeA);
    }
    /**
     * Agree EULA via Expect.
     *
     * @param string $password 
     * @param string $system password 
     *
     * @return void
     */
    function set_eula_expect($system_password,$passowrd = "Champ@123")
    {
        $file = COMMAND_MSSQL_FILE;

        $commandc_code = '#!/usr/bin/expect -f';
        $commandc_code = $commandc_code.  "\n";
        $commandc_code = $commandc_code. ' set timeout 60';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' spawn su - root';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?assword" { send "'.$system_password.'\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*#" { send "/opt/mssql/bin/mssql-conf setup\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?terms" {';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' send "Yes\r"';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. " }";
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?assword" { send "'.$passowrd.'\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?Confirm" { send "'.$passowrd.'\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' expect "*?uccess" { send "/opt/mssql/bin/mssql-conf start-service\r" }';
        $commandc_code = $commandc_code. "\n";
        $commandc_code = $commandc_code. ' interact';
        $commandc_code = $commandc_code. "\n";

        $file = new File($file, TRUE);
        if (!$file->exists())
            $file->create('root','root','0777');
        $commandc_codeA[] = $commandc_code;
        $file->dump_contents_from_array($commandc_codeA);
    }
}
