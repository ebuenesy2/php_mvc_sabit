<?php

class DB {

    private static $base_url;
    private static $conn = null;
    private static $host;
    private static $dbname;
    private static $userName;
    private static $pass;

    private $table;

    private static function loadConfig() {
        global $base_url, $host, $dbname, $userName, $pass;

        self::$base_url = $base_url;

        self::$host = Config::get('db', 'host');
        self::$dbname = Config::get('db', 'dbname');
        self::$userName = Config::get('db', 'username');
        self::$pass = Config::get('db', 'password');
    }

    public static function connect() {
        if (self::$conn === null) {
            self::loadConfig();

            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8mb4";

            try {
                self::$conn = new PDO($dsn, self::$userName, self::$pass);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                errors::index("Veritabanı bağlantı hatası", $e->getMessage()); die();
            }
        }
        return self::$conn;
    }

    public static function table($tableName) {
        return new static($tableName);
    }

    private function __construct($tableName) {
        $this->table = $tableName;
        self::connect();
    }

    private $joins = [];

    public function leftJoin($table, $first, $operator, $second) {
        return $this->join($table, $first, $operator, $second, 'LEFT');
    }

    public function join($table, $first, $operator, $second, $type = 'INNER') {
        $this->joins[] = strtoupper($type) . " JOIN $table ON $first $operator $second";
        return $this;
    }

    private $selects = ['*'];

    public function select(...$columns) {
        $this->selects = $columns;
        return $this;
    }

    public function first() {
        $result = $this->get();
        return $result[0] ?? null;
    }

    public function count() {
        $sql = "SELECT COUNT(*) as count FROM {$this->table}";

        if (!empty($this->wheres)) {
            $whereClauses = array_map(fn($w) => "{$w[0]} {$w[1]} ?", $this->wheres);
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }

        $stmt = self::$conn->prepare($sql);
        $stmt->execute(array_column($this->wheres, 2));

        return $stmt->fetch(PDO::FETCH_ASSOC)['count'] ?? 0;
    }

    private $orderBy;
    private $limit;
    private $offset;

    public function orderBy($column, $direction = 'ASC') {
        $this->orderBy = "$column $direction";
        return $this;
    }

    public function limit($number) {
        $this->limit = (int)$number;
        return $this;
    }

    public function offset($number) {
        $this->offset = (int)$number;
        return $this;
    }

    private $groupBy;
    public function groupBy($column) {
        $this->groupBy = $column;
        return $this;
    }

    private $wheres = [];
    private $whereIn = [];

    public function whereIn($column, array $values) {
        $this->whereIn[] = [
            'column' => $column,
            'values' => $values
        ];
        return $this;
    }

    public function where($column, $operator, $value) {
        $this->wheres[] = [$column, $operator, $value];
        return $this;
    }

    public function get($asJson = false) {
        $sql = "SELECT " . implode(', ', $this->selects) . " FROM {$this->table}";

        if (!empty($this->joins)) {
            $sql .= ' ' . implode(' ', $this->joins);
        }

        $whereClauses = [];
        $values = [];

        foreach ($this->wheres as $index => $w) {
            $whereClauses[] = "{$w[0]} {$w[1]} ?";
            $values[] = $w[2];
        }

        foreach ($this->whereIn as $index => $wIn) {
            $placeholders = implode(', ', array_fill(0, count($wIn['values']), '?'));
            $whereClauses[] = "{$wIn['column']} IN ($placeholders)";
            $values = array_merge($values, $wIn['values']);
        }

        if (!empty($whereClauses)) {
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }

        if ($this->groupBy) {
            $sql .= " GROUP BY " . $this->groupBy;
        }

        if ($this->orderBy) {
            $sql .= " ORDER BY " . $this->orderBy;
        }

        if ($this->limit) {
            $sql .= " LIMIT " . $this->limit;
        }

        if ($this->offset) {
            $sql .= " OFFSET " . $this->offset;
        }

        $stmt = self::$conn->prepare($sql);
        $stmt->execute($values);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $asJson ? json_encode($results, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) : $results;
    }

    public function insert($data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function insertGetId($data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = self::$conn->prepare($sql);
        if ($stmt->execute($data)) {
            return self::$conn->lastInsertId();
        }
        return false;
    }

    public function delete() {
        if (empty($this->wheres) && empty($this->whereIn)) {
            throw new Exception("Silme işlemi için 'where' veya 'whereIn' koşulu gereklidir.");
        }

        $whereClauses = [];
        $values = [];

        foreach ($this->wheres as $index => $w) {
            $whereClauses[] = "{$w[0]} {$w[1]} :where_{$index}";
            $values[":where_{$index}"] = $w[2];
        }

        foreach ($this->whereIn as $index => $wIn) {
            $placeholders = [];
            foreach ($wIn['values'] as $k => $v) {
                $ph = ":whereIn_{$index}_{$k}";
                $placeholders[] = $ph;
                $values[$ph] = $v;
            }
            $whereClauses[] = "{$wIn['column']} IN (" . implode(', ', $placeholders) . ")";
        }

        $sql = "DELETE FROM {$this->table} WHERE " . implode(" AND ", $whereClauses);
        $stmt = self::$conn->prepare($sql);

        foreach ($values as $ph => $val) {
            $stmt->bindValue($ph, $val);
        }

        return $stmt->execute();
    }

    public function update($data) {
        if (empty($this->wheres) && empty($this->whereIn)) {
            throw new Exception("Güncelleme işlemi için 'where' veya 'whereIn' koşulu gereklidir.");
        }

        $setClauses = [];
        foreach ($data as $column => $value) {
            $setClauses[] = "$column = :$column";
        }

        $sql = "UPDATE {$this->table} SET " . implode(", ", $setClauses);

        $whereClauses = [];
        $values = [];

        foreach ($data as $column => $value) {
            $values[":$column"] = $value;
        }

        foreach ($this->wheres as $index => $w) {
            $whereClauses[] = "{$w[0]} {$w[1]} :where_{$index}";
            $values[":where_{$index}"] = $w[2];
        }

        foreach ($this->whereIn as $index => $wIn) {
            $placeholders = [];
            foreach ($wIn['values'] as $k => $v) {
                $ph = ":whereIn_{$index}_{$k}";
                $placeholders[] = $ph;
                $values[$ph] = $v;
            }
            $whereClauses[] = "{$wIn['column']} IN (" . implode(', ', $placeholders) . ")";
        }

        $sql .= " WHERE " . implode(" AND ", $whereClauses);
        $stmt = self::$conn->prepare($sql);

        foreach ($values as $ph => $val) {
            $stmt->bindValue($ph, $val);
        }

        return $stmt->execute();
    }

}

?>
