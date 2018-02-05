<?php

/**
 * @Author: zz
 * @Date:   2018-02-05 16:36:48
 * @Last Modified by:   zz
 * @Last Modified time: 2018-02-05 17:04:48
 */
function get_db_config(){
	if(getenv('IS_IN_HEROKU')){
		$url = parse_url(getenv("DATEBASE_URL"));
		return $db_config = [
			'connection'=>'pgsql',
			'host' =>$url['host'],
			'database'=>substr($url['path'], 1),
			'username'=>$url['user'],
			'password'=>$url['pass'],
		];
	}else{
		return $db_config=[
			'connection'=>env('DB_CONNECTION','mysql'),
			'host'=>env('DB_HOST','localhost'),
			'database'=>env('DB_DATABASE','forge'),
			'username'=>env('DB_USERNAME','forge'),
			'password'=>env('DB_PASSWORD',''),
		];
	}
}