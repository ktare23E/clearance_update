<?php
    class DBConnectHelper {

        private $db;
        public $insert_id;
        public $affected_rows;

        function __construct() {
            $this->db = new mysqli('localhost', 'root', '', 'clearance');
        }

        function connection_status() {
            return $this->db->connect_error ? 'Error connecting to DataBase':'Connection success.';
        }
        
        function result($table, $where='', $orderby='', $limit=0) {
            $Where = (strlen($where) > 0) ? " WHERE $where":'';
            $Orderby = (strlen($orderby) > 0) ? "ORDER BY $orderby":'';
            $Limit = ($limit > 0) ? " LIMIT $limit ":'';
            $results = $this->db->query("SELECT * FROM $table $Where $Orderby $Limit");
            if ($this->db->error) {
                return 'Query error: '.$this->db->error;
            } else {
                $data = array();
                while ($row = $results->fetch_assoc()) {
                    $data[] = (object)$row;
                }
                return $data;
            }
        }

        function row($table, $where='') {
            $results = $this->result($table, $where);
            return gettype($results) != 'string' ? $results[0]:$results;
        }

        function delete($table, $where) {
            $this->db->query("DELETE FROM $table WHERE $where");
            $this->affected_rows = $this->db->affected_rows;
            return $this->db->error ? 'Delete error: '.$this->db->error: $this->db->affected_rows;
        }

        function insert($table, $array_data) {
            $data = array();
            foreach($array_data as $key => $value):
                if (gettype($value) == 'integer' || gettype($value) == 'double') {
                    $data[] = $key . '=' . $value;
                } else {
                    $data[] = $key . '=' . $this->quote($value);
                }
            endforeach;
            $setValue = join(", ", $data);
            $this->db->query("INSERT INTO $table SET $setValue");
            $this->insert_id = $this->db->insert_id;
            return $this->db->error ? 'Insert error: '.$this->db->error:$this->db->insert_id;
        }

        function update($table, $array_data, $where) {
            $data = array();
            foreach($array_data as $key => $value):
                if (gettype($value) == 'integer' || gettype($value) == 'double') {
                    $data[] = $key . '=' . $value;
                } else {
                    $data[] = $key . '=' . $this->quote($value);
                }
            endforeach;
            $setValue = join(", ", $data);
            $this->db->query("UPDATE $table SET $setValue WHERE $where");
            $this->affected_rows = $this->db->affected_rows;
            return $this->db->error ? 'Update error: '.$this->db->error:$this->db->affected_rows;
        }

        function query($query) {
            $results = $this->db->query($query);
            $data = array();
            while($row = $results->fetch_assoc()) {
                $data[] = (object) $row;
            }
            return $this->db->error ? 'Query error: '.$this->db->error: $data;
        }

        function is_exist($table, $where) {
            $results = $this->result($table, $where);
            return $this->db->error ? 'Error: '.$this->db->error: sizeof($results) > 0;
        }

        function quote($value) {
            return "'" . addslashes($value) . "'";
        }
    }


    $db = new DBConnectHelper();


