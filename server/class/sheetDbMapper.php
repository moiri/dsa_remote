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

    /**
     * Get a single row of a db table by foreign key
     *
     * @param string $table:    the name of the db table
     * @param string $fk:       name of the foreign key
     * @param int $id:          the foreign key of the row to be selected
     * @return an array with all row entries or false if no entry was selected
     */
    function getGroupsGyUserId($id) {
        $retValue = false;
        $sql = sprintf("SELECT g.id, g.name AS gn, g.description,
            h.id AS hi, h.chatname AS hn FROM gruppe AS g
            LEFT JOIN held_gruppe AS hg ON g.id = hg.id_gruppe
            LEFT JOIN held AS h ON hg.id_held = h.id
            WHERE h.id_user = %d;",
                mysql_real_escape_string($id));
        if($this->debug) $errorQuery = "Error: Invalid mySQL query: ".$sql;
        else $errorQuery = "Error: Invalid mySQL query!";
        $result = mysql_query($sql, $this->handle)
        or die ($errorQuery);

        $num_rows = mysql_num_rows($result);
        if($num_rows >= 1) {
            $retValue = array();
            while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                array_push($retValue, $row);
            }
        }
        else {
            // no entry
            $retValue = false;
        }
        return $retValue;
    }
}

?>
