<?php 

namespace Ruben\Imagenes\db;

use PDO;
use PDOException;

class Database
{
  private string $host;
	private string $db;
	private string $user;
	private string $password;
	private string $charset;

  public function __construct(){
      $this->host = '127.0.0.1';
      $this->db = 'galeriaimagenes';
      $this->user = 'root';
      $this->password = '';
      $this->charset = 'uft8mb4';
  }

  public function conn(){
  	try {
  		$conn = "mysql:host=" . $this->host . ";dbname=" . $this->db;
  		$options = [
  			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  			PDO::ATTR_EMULATE_PREPARES => false
  		];

  		$pdo = new PDO($conn, $this->user, $this->password, $options);
      return $pdo;
  	} catch (PDOException $e) {
  		print_r('Error connection: ' . $e->getMessage());
  	}
  }
}


?>