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
     * Get a list of groups and their corresponding heroes by user id
     *
     * @param int $id:          user id
     * @return an array with all row entries or false if no entry was selected
     */
    function getGroupsByUserId($id) {
        $retValue = false;
        $sql = sprintf("SELECT g.id, g.name AS gn, g.description,
            h.id AS hi, h.chatname AS hn FROM gruppe AS g
            LEFT JOIN held_gruppe AS hg ON g.id = hg.id_gruppe
            LEFT JOIN held AS h ON hg.id_held = h.id
            WHERE h.id_user = %d;",
                mysql_real_escape_string($id));
        return $this->queryDB($sql);
    }

    /**
     * Get all heroes by user id.
     *
     * @param int $id:          user id
     * @return an array with all row entries or false if no entry was selected
     */
    function getHeroesByUserId($id) {
        $retValue = false;
        $sql = sprintf("SELECT * FROM held WHERE id_user = %d;",
                mysql_real_escape_string($id));
        return $this->queryDB($sql);
    }

    /**
     * Get hero attributes
     *
     * @param int $id:          hero id
     * @return an array with all row entries or false if no entry was selected
     */
    function getAttrByHeroId($id) {
        $retValue = false;
        $sql = sprintf("SELECT e.id, e.name, he.wert, he.start, he.modifikator
             FROM eigenschaft AS e
             LEFT JOIN held_eigenschaft AS he ON e.id = he.id_eigenschaft
             AND he.id_held = %d;",
             mysql_real_escape_string($id));
        return $this->queryDB($sql);
    }

    /**
     * Get hero basic values
     *
     * @param int $id:          hero id
     * @return an array with all row entries or false if no entry was selected
     */
    function getBaseByHeroId($id) {
        $retValue = false;
        $sql = sprintf("SELECT b.id, b.name, b.wert_def, b.max_kauf_def,
            hb.wert, hb.start, hb.modifikator, hb.kauf, hb.kauf_max
            FROM basis AS b
            LEFT JOIN held_basis AS hb ON b.id = hb.id_basis
            AND hb.id_held = %d;",
            mysql_real_escape_string($id));
        return $this->queryDB($sql);
    }

    /**
     * Get hero basic combat values
     *
     * @param int $id:          hero id
     * @return an array with all row entries or false if no entry was selected
     */
    function getCombatByHeroId($id) {
        $retValue = false;
        $sql = sprintf("SELECT k.id, k.name, k.wert_def, hk.wert
            FROM kampf AS k
            LEFT JOIN held_kampf AS hk ON k.id = hk.id_kampf
            AND hk.id_held = %d;",
            mysql_real_escape_string($id));
        return $this->queryDB($sql);
    }
}

?>
