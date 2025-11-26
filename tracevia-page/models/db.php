<?php

class Database {
  private $host;
  private $username;
  private $password;
  private $dbname;
  private $charset;

  public function __construct($host, $username, $password, $dbname, $charset) {
      $this->host = $host;
      $this->username = $username;
      $this->password = $password;
      $this->dbname = $dbname;
      $this->charset = $charset;
  }

  public function connect() {
      $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

      try {
          $pdo = new PDO($dsn, $this->username, $this->password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $pdo;
      } catch (PDOException $e) {
          die("Connection failed: " . $e->getMessage());
      }
  }
}

// PARA TESTE LOCALHOST
// $db1 = new Database('localhost', 'root', '', 'aquilombo', 'utf8');
// $pdo1 = $db1->connect();

// PARA CONEXÃO COM BANCO DE DADOS OFICIAL
// $db = new Database('botanarifa.calojwncybj2.us-east-1.rds.amazonaws.com', 'melissa', 'cp0N1MOv&e71TDoY!#a6', 'aquilombo', 'utf8');
// $pdo = $db->connect();

$db = new Database('54.198.2.111', 'melissa', 'cp0N1MOv&e71TDoY!#a6', 'tracevia', 'utf8');
$pdo = $db->connect();