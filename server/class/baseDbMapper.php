<?php
/**
 * Class to handle the global communication with the DB
 * 
 * @author moiri
 */
class BaseDBMapper {
    var $dbh = null;

    /**
     * Open connection to mysql database
     *
     * @param string $server:   address of server
     * @param string $database: name of database
     * @param string $login:    username
     * @param string $password: password
     * @param string $names:    charset (optional, default: utf8)
     */
    function __construct($server, $dbname, $username, $password, $names="utf8") {
        try {
            $this->dbh = new PDO(
                "mysql:host=$server;dbname=$dbname;charset=$names",
                $username,
                $password,
                array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                )
            );
            $this->dbh->setAttribute( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function __destruct() {
        $this->dbh = null;
    }

    /**
     * Get a single row of a db table by foreign key
     *
     * @param string $table:    the name of the db table
     * @param string $fk:       name of the foreign key
     * @param int $id:          the foreign key of the row to be selected
     * @return an array with all row entries or false if no entry was selected
     */
    function selectByFk( $table, $fk, $id ) {
        $stmt = $this->dbh->prepare( "SELECT * FROM $table WHERE $fk = :fk" );
        $stmt->execute( array( ':fk' => $id ) );
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    /**
     * Get a single row of a db table by unique id
     *
     * @param string $table:    the name of the db table
     * @param int $id:          the unique id of the row to be selected
     * @return an array with all row entries or false if no entry was selected
     */
    function selectByUid( $table, $id ) {
        $stmt = $this->dbh->prepare( "SELECT * FROM $table WHERE id = :id" );
        $stmt->execute( array( ':id' => $id ) );
        $res = $stmt->fetch( PDO::FETCH_ASSOC );
        /* print_r( $res ); */
        return $res;
    }

    /**
     * Get a single row of a data table by unique id and get all names of
     * foreign keys by joining the linked tables (using naming convention)
     *
     * @param string $table:    the name of the db table
     * @param int $id:          the unique id of the row to be selected
     * @return an array with all entries of the row or false if no entry was selected
     */
    function selectByUidJoin( $table, $id ) {
        $mainTable = $this->selectByUid( $table, $id );
        $tableNb = 0;
        $join = "";
        $sql = "SELECT ";
        if( $mainTable ) {
            foreach( $mainTable as $i => $value ) {
                $sql .= "t0.".$i.", ";
                if( substr( $i, 0, 3 ) == "id_" ) {
                    $tableNb++;
                    $arr = explode( '_', $i );
                    $tableName = $arr[1];
                    $nameSuffix = "";
                    if ( $arr[2] != NULL ) $nameSuffix = "_".$arr[2];
                    $join .= " LEFT JOIN ".rtrim( $tableName, "0..9" )." t".$tableNb." ON t0.".$i." = t".$tableNb.".id";
                    $sql .= "t".$tableNb.".name name_".$tableName.$nameSuffix.", ";
                }
            }
            $sql = rtrim( $sql, ", " );
            $sql .= " FROM $table t0$join WHERE t0.id = :id";
            $stmt = $this->dbh->prepare( $sql );
            $stmt->execute( array( ':id' => $id ) );
            return $stmt->fetchAll( PDO::FETCH_ASSOC );
        }
        return false;
    }

    /**
     * Get rows of a db table by condition
     *
     * @param string $sql: query to execute on the db
     * @return an array with all rows or false if no entry was selected
     */
    protected function queryDb($sql) {
        $retValue = false;
        if($this->debug) $errorQuery = "Error: Invalid mySQL query: ".$sql;
        else $errorQuery = "Error: Invalid mySQL query!";
        $result = mysql_query($sql, $this->handle)
            or die ($errorQuery);

        $num_rows = mysql_num_rows($result);
        $retValue = array();
        if($num_rows >= 1) {
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

    /**
     * Insert values into db table
     *
     * @param string $table:    the name of the db table
     * @param array $entries:   an associative array of db entries e.g. $["colname1"] = "blabla" or
     *                          an array with db entries eg $[0] = "blabla"
     * @return inserted id if succeded
     */
    function insert($table, $entries) {
        $data = array();
        $columnStr = "";
        $valueStr = "";
        foreach ($entries as $i => $value) {
            $columnStr .= $i.", ";
            $id = ":".$i;
            $valueStr .= $id.", ";
            $data[$id] = $value;
        }
        $columnStr = rtrim($columnStr, ", ");
        $valueStr = rtrim($valueStr, ", ");
        $sql = "INSERT INTO ".$table." (".$columnStr.") VALUES(".$valueStr.")";
        $stmt = $this->dbh->prepare( $sql );
        $stmt->execute( $data );
        return $this->dbh->lastInsertId();
    }

    /**
     * Update values in db defined by id
     *
     * @param string $table:    the name of the db table
     * @param array $entries:   an associative array of db entries e.g. $["colname1"] = "blabla"
     * @param int $id:          the unique id of the row to be selected
     * @return true if succeded
     */
    function updateByUid($table, $entries, $id) {
        $insertStr = "";
        foreach ($entries as $i => $value) {
            $insertStr .= mysql_real_escape_string($i)."='".mysql_real_escape_string($value)."', ";
        }
        $insertStr = rtrim($insertStr, ", ");
        $sql = sprintf("UPDATE %s SET %s WHERE id='%d';",
            mysql_real_escape_string($table),
            $insertStr,
            mysql_real_escape_string($id));
        if($this->debug) $errorQuery = "Error: Invalid mySQL query: ".$sql;
        else $errorQuery = "Error: Invalid mySQL query!";
        mysql_query($sql, $this->handle)
            or die ($errorQuery);

        return true;
    }
}

?>
