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
    function __construct($server, $dbname, $username, $password ) {
        parent::__construct( $server, $dbname, $username, $password );
    }

    /**
     * Get a list of groups and their corresponding heroes by user id
     *
     * @param int $id:          user id
     * @return an array with all row entries or false if no entry was selected
     */
    function getGroupsByUserId( $id ) {
        $retValue = false;
        $sql = "SELECT g.id, g.name AS gn, g.description,
            h.id AS hi, h.chatname AS hn FROM gruppe AS g
            LEFT JOIN held_gruppe AS hg ON g.id = hg.id_gruppe
            LEFT JOIN held AS h ON hg.id_held = h.id
            WHERE h.id_user = :id";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( array( ':id' => $id ) );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    /**
     * Get all heroes by user id.
     *
     * @param int $id:          user id
     * @return an array with all row entries or false if no entry was selected
     */
    function getHeroesByUserId( $id ) {
        $retValue = false;
        $sql = "SELECT * FROM held WHERE id_user = :id";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( array( ':id' => $id ) );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    /**
     * Get hero attributes
     *
     * @param int $id:          hero id
     * @return an array with all row entries or false if no entry was selected
     */
    function getAttrByHeroId( $id ) {
        $retValue = false;
        $sql = "SELECT e.*, he.wert, he.start, he.modifikator
             FROM eigenschaft AS e
             LEFT JOIN held_eigenschaft AS he ON e.id = he.id_eigenschaft
             AND he.id_held = :id
             WHERE e.meta IS NOT NULL";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( array( ':id' => $id ) );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    /**
     * Get hero basic values
     *
     * @param int $id:          hero id
     * @return an array with all row entries or false if no entry was selected
     */
    function getBaseByHeroId( $id ) {
        $retValue = false;
        $sql = "SELECT b.id, b.name, b.wert_def, b.max_kauf_def,
            hb.modifikator, hb.kauf, hb.aktiv
            FROM basis AS b
            LEFT JOIN held_basis AS hb ON b.id = hb.id_basis
            AND hb.id_held = :id";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( array( ':id' => $id ) );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    /**
     * Get hero basic combat values
     *
     * @param int $id:          hero id
     * @return an array with all row entries or false if no entry was selected
     */
    function getCombatByHeroId( $id ) {
        $retValue = false;
        $sql = "SELECT k.id, k.name, k.wert_def, hk.modifikator "
            ."FROM kampf AS k LEFT JOIN held_kampf AS hk "
            ."ON k.id = hk.id_kampf AND hk.id_held = :id";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( array( ':id' => $id ) );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    function getTalentByHeroIdGruppeId( $id, $tid, $gruppe=null ) {
        $retValue = false;
        $grp_str = "";
        $data = array( ':id' => $id );
        if( $gruppe != null ) {
            $grp_str = "LEFT JOIN talentgruppe AS tg "
                ."ON t.id_talentgruppe = tg.id WHERE tg.gruppe = :gruppe ";
            $data[':gruppe'] = $gruppe;
        }
        else {
            $grp_str = "WHERE t.id_talentgruppe = :tid ";
            $data[':tid'] = $tid;
        }
        $sql = "SELECT t.id, t.name, t.eBE, ht.wert, e1.short_name AS es1, "
            ."e2.short_name AS es2, e3.short_name AS es3 FROM talent AS t "
            ."LEFT JOIN held_talent AS ht ON ht.id_talent = t.id "
            ."AND ht.id_held = :id "
            ."LEFT JOIN eigenschaft AS e1 ON t.id_eigenschaft1 = e1.id "
            ."LEFT JOIN eigenschaft AS e2 ON t.id_eigenschaft2 = e2.id "
            ."LEFT JOIN eigenschaft AS e3 ON t.id_eigenschaft3 = e3.id "
            .$grp_str
            ."AND (t.basis = 1 OR ht.wert IS NOT NULL) ORDER BY t.name";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( $data );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    function getZauberByHeroId( $id ) {
        $retValue = false;
        $grp_str = "";
        $sql = "SELECT z.id, z.name, hz.wert, hz.hauszauber, "
            ."e1.short_name AS es1, e2.short_name AS es2, e3.short_name AS es3 "
            ."FROM zauber AS z "
            ."LEFT JOIN held_zauber AS hz ON hz.id_zauber = z.id "
            ."AND hz.id_held = :id "
            ."LEFT JOIN eigenschaft AS e1 ON z.id_eigenschaft1 = e1.id "
            ."LEFT JOIN eigenschaft AS e2 ON z.id_eigenschaft2 = e2.id "
            ."LEFT JOIN eigenschaft AS e3 ON z.id_eigenschaft3 = e3.id "
            ."WHERE hz.wert IS NOT NULL ORDER BY hz.hauszauber DESC, z.name";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( array( ':id' => $id ) );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    function getHeroEigenschaftById( $hid, $eid ) {
        $sql = "SELECT wert FROM held_eigenschaft "
            ."WHERE id_held=:hid AND id_eigenschaft=:eid";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( array( ':hid' => $hid, ':eid' => $eid ) );
        return $stmt->fetch( PDO::FETCH_NUM )[0];
    }

    function getHeroEigenschaftByShort( $hid, $eshort ) {
        $sql = "SELECT he.wert FROM held_eigenschaft AS he "
            ."LEFT JOIN eigenschaft AS e ON he.id_eigenschaft = e.id "
            ."WHERE he.id_held=:hid AND e.short_name=:eid";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( array( ':hid' => $hid, ':eid' => $eshort ) );
        /* $stmt->debugDumpParams(); */
        return $stmt->fetch( PDO::FETCH_NUM )[0];
    }

    function parseFormula( $hid, $formula ) {
        $div = 1;
        $mul = 1;
        $divs = explode( '/', $formula );
        if( count( $divs ) > 1 ) {
            $div = intval( $divs[1] );
            $formula = $divs[0];
        }
        $muls = explode( '*', $formula );
        if( count( $muls ) > 1 ) {
            $mul = intval( $muls[0] );
            $formula = $muls[1];
        }
        $formula = str_replace( array( '(', ')' ), '', $formula );
        $formula = trim( $formula );
        $adds = explode( '+', $formula );
        $res = 0;
        if( count( $adds ) > 1 ) {
            foreach( $adds as $op ) {
                $op = trim( $op, " " );
                $res += $this->getHeroEigenschaftByShort( $hid, $op );
            }
        }
        else {
            $res = $this->getHeroEigenschaftByShort( $hid, $formula );
        }
        return round( $mul * $res / $div );
    }

    /**
     * Update values in db defined by hero id and a foreign key deduced by the
     * table name due to naming conventions
     *
     * @param string $table:    the name of the db table
     * @param array $entries:   an associative array of db entries
     *                           e.g. $["colname1"] = "blabla"
     * @param int $id:          the hero id of the row to be selected
     * @param int $fk:          the foreign key id of the row to be selected
     * @return true if succeded
     */
    function updateByHidFk($table, $entries, $id, $fk) {
        try {
            $data = array( ':hid' => $id, ':fk' => $fk );
            $fk_name = str_replace( "held_", "id_", $table );
            $insertStr = "";
            foreach ($entries as $i => $value) {
                $id = ":".$i;
                $insertStr .= $i."=".$id.", ";
                $data[$id] = $value;
            }
            $insertStr = rtrim($insertStr, ", ");
            $sql = "UPDATE ".$table." SET ".$insertStr
                ." WHERE id_held=:hid AND ".$fk_name."=:fk";
            $stmt = $this->dbh->prepare( $sql );
            $stmt->execute( $data );
        }
        catch(PDOException $e) {
            $this->addDebug(
                "BaseDbMapper::updateByHidFk: ".$e->getMessage() );
        }
    }
}

?>
