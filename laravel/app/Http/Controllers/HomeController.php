<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index(){
		return view('home.index');
	}
	

	public function create(){
		//查询该表所有
		$results0 = DB::table('users')->get();
		//查询一行数据
		$results1 = DB::table('users')->where('USER_ID','7')->first();
		//查询单一数据列的单一字段
		$results2 = DB::table('users')->where('USER_ID','7')->pluck('USER_NAME');
		//查询一列
		$results3 = DB::table('users')->lists('USER_NAME');
		//查询一列自定键值,前为值,后为键
		$results3 = DB::table('users')->lists('USER_NAME','USER_ID');
		//增删改
		
		DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
		DB::update('update users set votes = 100 where name = ?', ['John']);
		DB::delete('delete from users');
		DB::statement('drop table users');//执行一般语法
		
		dump($results3);exit;
		return view('home.create');
	}
	
	public function add(){
		dump(User::all()->toArray());exit;
		if(isset($_POST)){
			$list = new User;
		}
		return view('home.add');
		
	}

}
