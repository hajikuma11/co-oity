<?
echo 'phpのテストです。<br>';
$dbinfo = parse_url(getenv('DATABASE_URL'));
$dsn = 'pgsql:host=' . $dbinfo['host'] . ';dbname=' . substr($dbinfo['path'], 1);

try {
 // データベースと接続
 $dbh = new PDO($dsn, $dbinfo['user'], $dbinfo['pass']);
 // テーブル作成のためのSQL
 $sql = "CREATE TABLE menu (
	id int PRIMARY KEY,
	name varchar(50),
	price int,
	modify_datetime date,
	create_datetime date
)";
 // SQLクエリ実行
 $res = $dbh->query( $sql);
 var_dump($res);

} catch(PDOException $e) {

 var_dump($e->getMessage());
}

// データベースの接続を切断
$dbh = null;
?>