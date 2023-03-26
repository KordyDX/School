<?php
class MySQL
{
    private $connection;
    public function connect(
        string $host = "localhost",
        string $username = "root",
        string $password = "",
        string $database = "somedb"
    ): ?static
    {
        $this->connection = mysqli_connect($host, $username, $password, $database);
        return $this;
    }

    /**
     * SELECT rows from table
     *
     * @param string $query SQL query SELECT string
     * @return array result as a associative array, key is attribute name, value is attribute array; empty on error
     */
    function select(string $query): array
    {
        $query = mysqli_query($this->connection, $query);
        $array = [];
        while ($line = mysqli_fetch_assoc($query)) {
            $array[] = $line;
        }
        return $array;
    }

    /**
     * INSERT record to table
     *
     * @param string $table database table name
     * @param array $data data to insert, key is attribute name, value is attribute value
     * @return boolean true on success otherwise false
     */
    function insert(string $table, array $data): bool
    {
        $keys = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $query = "INSERT INTO $table ($keys) VALUES ($values)";
        return mysqli_query($this->connection, $query);
    }

    /**
     * UPDATE record in table
     *
     * @param string $table database table name
     * @param integer $id primary key value for record to update
     * @param array $data data to update, key is attribute name, value is attribute value
     * @return boolean true on success otherwise false
     */
    function update(string $table, int $id, array $data): bool
    {
        $pairs = [];
        foreach ($data as $key => $value) {
            $pairs[] = "$key='$value'";
        }
        $query = "UPDATE $table SET " . implode(', ', $pairs) . " WHERE id=$id";
        return mysqli_query($this->connection, $query);
    }

    /**
     * DELETE item from table
     *
     * @param string $table database table name
     * @param integer $id primary key value for record to delete
     * @return boolean true on success otherwise false 
     */
    function delete(string $table, int $id): bool
    {
        $query = "DELETE FROM $table WHERE id=$id";
        return mysqli_query($this->connection, $query);
    }
}

/*$testSQL = new MySQL();
$testSQL->connect();
$testSQL->select("SELECT * FROM customer;");
var_dump($testSQL);*/