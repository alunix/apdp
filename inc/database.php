<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 9/11/18
 * Time: 2:46 PM
 */


// Database Function

if (!function_exists('connectDb')) {
    function connectDb($host='', $username='', $password='', $databaseName='') {
        static $database;

        if ($database == null) {
            $database = mysqli_connect($host, $username, $password, $databaseName);
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                die();
            }

        }
        return $database;
    }
}
if (!function_exists('_connect')) {
    function _connect($host='', $username='', $password='', $databaseName='') {
        return connectDb($host, $username, $password, $databaseName);
    }
}

if (!function_exists('_query')) {
    function _query($sql) {
        return mysqli_query(connectDb(), $sql);
    }
}

if (!function_exists('_num_rows')) {
    function _num_rows($query) {
        return mysqli_num_rows($query);
    }
}
if (!function_exists('_escape_string')) {
    function _escape_string($string) {
        return mysqli_real_escape_string(_connect(), $string);
    }
}

if (!function_exists('_fetch_array')) {
    function _fetch_array($query) {
        return mysqli_fetch_array($query);
    }
}

if (!function_exists('_fetchMultipleFromSql')) {
    function _fetchMultipleFromSql($sql, $mode="array") {
        $functionName = $mode == 'object' ? "mysqli_fetch_object" : "mysqli_fetch_assoc";
        $query = _query($sql);
        $results=[];
        if (!$query) return false;

        while ($obj = call_user_func_array($functionName, array($query))) {
            $results[]=$obj;
        }
        return $results;
    }
}

if (!function_exists('_fetchOneFromSql')) {
    function _fetchOneFromSql($sql, $mode="array") {
        $functionName = $mode == 'object' ? "mysqli_fetch_object" : "mysqli_fetch_assoc";
        $query = _query($sql);
        $results=[];
        if (!$query) return false;
        return call_user_func_array($functionName, array($query) );
    }
}

if (!function_exists('_getMultipleData')) {
    function _getMultipleData($table, $where="1=1", $column="*", $group_by="", $order_by="") {
        $sql = sprintf("SELECT %s FROM %s WHERE %s %s %s", $column, $table, $column,
            $group_by?("GROUP BY ".$group_by):"",
            $order_by?("ORDER BY ".$order_by):""
        );
        return _fetchMultipleFromSql($sql);
    }
}

if (!function_exists('_getOneData')) {
    function _getOneData($table, $where="1=1", $column="*", $group_by="", $order_by="") {
        $sql = sprintf("SELECT %s FROM %s WHERE %s %s %s", $column, $table, $where,
            $group_by?("GROUP BY ".$group_by):"",
            $order_by?("ORDER BY ".$order_by):""
        );
        return _fetchOneFromSql($sql);
    }
}

if (!function_exists('_insertData')) {
    function _insertData($table, $columns) {
        $key = array_keys($columns);
        $sql = sprintf(
            "INSERT INTO %s (`%s`) VALUES ('%s')",
            $table,
            implode("`, `", $key),
            implode("', '", $columns)
        );
        return _query($sql);
    }
}


if (!function_exists('_updateData')) {
    function _updateData($table, $columns, $where='1=1') {
        $newColumn = [];
        foreach ($columns as $key => $value) {
            $newColumn[] = sprintf("`%s`= '%s'", $key, $value);
        }
        $sql = sprintf(
            "UPDATE %s SET %s WHERE %s",
            $table,
            implode(", ", $newColumn),
            $where
        );
        return _query($sql);
    }
}

if (!function_exists('_deleteData')) {
    function _deleteData($table, $where='1=1') {
        $sql = sprintf(
            "DELETE FROM %s WHERE %s",
            $table,
            $where
        );
        return _query($sql);
    }
}


if (!function_exists('antiInjection')) {
    function antiInjection($data){
        $filter = mysqli_real_escape_string(connectDb(),
            stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)))
        );
        return $filter;
    }
}

// End Database Function

