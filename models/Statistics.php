<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
 
/*
  using DAO visit database
  DSN setting in config/db.php 
  use the db handle 
  $connection = \Yii::$app->db;
*/
 
class Statistics extends Model
{
	/**
		statistics the class man/woman counter
	*/
	public function getGender()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT  gender,count(*) as counter
			FROM selectclass
			GROUP BY gender
EOF;
		$command = $connection->createCommand($sql);
		//for get array key number index MUST use this PDO mode
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}
	
	public function getMajor()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT  major,count(*) as counter
			FROM selectclass
			GROUP BY major
			ORDER BY counter desc
EOF;
		$command = $connection->createCommand($sql);
		//for get array key number index MUST use this PDO mode
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}
	
	public function getProvince()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT  province,count(*) as counter
			FROM stubaseinfo
			GROUP BY province
			ORDER BY counter desc
EOF;
		$command = $connection->createCommand($sql);
		//for get array key number index MUST use this PDO mode
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}
	
	/**
		the param is $results array[][] from db results
		the array[][0] stand for name
		the array[][1] stand for number
	*/
	public function convert_json($results)
	{	
		$rows=array();
		foreach($results as $row)
		{	
			$name=$row[0];
			$counter=intval($row[1]);
			$rows[]=array($name,$counter);
		}
		
        $json =  json_encode($rows);
		return $json;
	}
}