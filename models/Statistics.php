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
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
	       	return $results;
	}
        
                  public function getCollege()
        {
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT college,count(*) as counter 
                        FROM stubaseinfo 
                        GROUP BY college 
                        ORDER BY counter desc
EOF;
		$command = $connection->createCommand($sql);
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}
                 
        public function getYear()
        {
                $connection = \Yii::$app->db;
                $sql=<<<EOF
                        SELECT substring(birthday,1,4) as year,count(*) as counter 
                        FROM stubaseinfo 
                        GROUP BY year 
                        ORDER BY counter desc
EOF;
                $command = $connection->createCommand($sql);
                $result = $command->queryAll(\PDO::FETCH_BOTH);
                return $result;
        }

        public function getGrade()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT  grade,count(*) as counter
			FROM selectclass
			GROUP BY grade
EOF;
		$command = $connection->createCommand($sql);
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}
	
        public function getGenre()
        {
                $connection = \Yii::$app->db;
                $sql=<<<EOF
                        SELECT genre,count(*) as counter
                        FROM stubaseinfo 
                        GROUP BY genre 
                        ORDER BY counter desc
EOF;
                $command = $connection->createCommand($sql);
                $result = $command->queryAll(\PDO::FETCH_BOTH);
                return$result;
        }
                  
        public function getNational()
        {
                $connection = \Yii::$app->db;
                $sql=<<<EOF
                        SELECT national,count(*) as counter
                        FROM stubaseinfo 
                        GROUP BY national 
                        ORDER BY counter desc
EOF;
                $command = $connection->createCommand($sql);
                $result = $command->queryAll(\PDO::FETCH_BOTH);
                return$result;
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
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}
                    
        public function getBirthday()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT  * from ( select birthday,count(*) as counter
			FROM stubaseinfo
			GROUP BY birthday
			ORDER BY counter desc) a where a.counter>1
EOF;
		$command = $connection->createCommand($sql);
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}

        public function getAlumnus()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT  * from ( select school,count(*) as counter
			FROM stubaseinfo
			GROUP BY school
			ORDER BY counter desc) a where a.counter>1
EOF;
		$command = $connection->createCommand($sql);
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}

        public function getOrganization()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT Organization,count(*) as counter
			FROM  mac a ,user_mac b
			WHERE a.OUI=SUBSTRING(b.mac,1,8)
			GROUP BY Organization 
			ORDER BY counter desc
EOF;
		$command = $connection->createCommand($sql);
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
