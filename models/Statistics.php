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
                        SELECT ('2016'-substring(birthday,1,4)) as year,count(*) as counter 
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
			SELECT  * from ( select substring(birthday,6,10) as sameday,count(*) as counter
							FROM stubaseinfo
							GROUP BY sameday
							ORDER BY counter desc) a 
			where a.counter>1
			order by sameday
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
	
	public function getRoom()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT substring(room,1,(InStr(`room`, '-')-1)) AS num, COUNT(*) AS counter
			FROM netuser
			GROUP BY num
			ORDER BY counter desc
EOF;
		$command = $connection->createCommand($sql);
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}	

        public function getConstellation()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT star,count(*) as counter 
                        FROM (SELECT stuno ,birthday,
			case 
   		        when 
	                    birthday>=str_to_date(concat(year(birthday),'-12-22'),'%Y-%m-%d')
                            and 
                            birthday<=str_to_date(concat(year(birthday),'-12-31'),'%Y-%m-%d')
        
                            then  '魔羯座(Capricorn)'
                        WHEN
               	            birthday>=str_to_date(concat(year(birthday),'-01-01'),'%Y-%m-%d')
                            and 
   		            birthday<=str_to_date(concat(year(birthday),'-01-19'),'%Y-%m-%d')
                            then  '魔羯座(Capricorn)'
                            when
                            birthday>=str_to_date(concat(year(birthday),'-01-20'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-02-18'),'%Y-%m-%d')
        
                            then  '水瓶座(Aquarius)'
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-02-19'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-03-20'),'%Y-%m-%d')
        
                            then  '双鱼座(Pisces)'
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-03-21'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-04-30'),'%Y-%m-%d')
        
                            then  '牡羊座(Aries)'
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-04-21'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-05-20'),'%Y-%m-%d')
        
                            then  '金牛座(Taurus)'
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-05-21'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-06-21'),'%Y-%m-%d')
        
                            then  '双子座(Gemini) '
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-06-22'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-07-22'),'%Y-%m-%d')
        
                            then  '巨蟹座(Cancer)'
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-07-23'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-08-22'),'%Y-%m-%d')
        
                            then  '狮子座(Leo)'
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-08-23'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-09-22'),'%Y-%m-%d')
        
                            then  '处女座(Virgo)'
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-09-23'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-10-22'),'%Y-%m-%d')
        
                           then  '天秤座(Libra)'
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-10-23'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-11-22'),'%Y-%m-%d')
        
                            then  '天蝎座(Scorpio)'
                        when 
                            birthday>=str_to_date(concat(year(birthday),'-11-23'),'%Y-%m-%d')
                            and 
 		            birthday<=str_to_date(concat(year(birthday),'-12-21'),'%Y-%m-%d')
        
                            then  '射手座(Sagittarius)'
   

       
                            end star
                        FROM `stuinfo`
                              ) a
                        GROUP BY star
                        ORDER BY counter desc
EOF;
		$command = $connection->createCommand($sql);
		$results = $command->queryAll(\PDO::FETCH_BOTH);
		
		return $results;
	}
	public function getIsp()
	{
		$connection = \Yii::$app->db;
		$sql=<<<EOF
			SELECT isp, counter
			FROM (SELECT substring(phone,1,3) as num,count(*) as counter 
                              FROM  netuser 
                              GROUP BY num 
                              ORDER BY counter desc) a,isp_num b 
			WHERE a.num=b.num
			GROUP BY isp
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
