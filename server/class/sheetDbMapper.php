<?php
require_once('baseDbMapper.php');

/**
 * Class to handle the communication with the dsa_sheet-DB
 *
 * @author moiri
 */
class SheetDbMapper extends BaseDbMapper {
    var $debug = true;
    /**
     * Open connection to mysql database
     *
     * @param string $server:   address of server
     * @param string $database: name of database
     * @param string $login:    username
     * @param string $password: password
     */
    function SheetDbMapper($server="",$database="",$login="",$password="") {
        $this->BaseDbMapper($server,$database,$login,$password);
    }
}

?>
