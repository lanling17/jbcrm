<?php

use Illuminate\Database\Seeder;
use App\Models\Jurisdiction;

class JurisdictionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s',time());
        $jurisdiction = [
          ['name' => '所有权限','slug' => '*','http_method' => 'ANY','http_path' => '*','parent'=>0,'created_at' => $date,'updated_at' => $date],
          ['name' => '用户管理','slug' => 'user*','http_method' => 'ANY','http_path' => 'user*','parent' => 1,'created_at' => $date,'updated_at' => $date],
          ['name' => '用户列表','slug' => 'user.index','http_method' => 'GET','http_path' => 'user','parent' => 2,'created_at' => $date,'updated_at' => $date],
          ['name' => '用户增加','slug' => 'user.create','http_method' => 'GET','http_path' => 'user/create','parent' => 2,'created_at' => $date,'updated_at' => $date],
          ['name' => '用户增加保存','slug' => 'user.store','http_method' => 'POST','http_path' => 'user','parent' => 2,'created_at' => $date,'updated_at' => $date],
          ['name' => '用户修改','slug' => 'user.edit','http_method' => 'GET','http_path' => 'user/{user}/edit','parent' => 2,'created_at' => $date,'updated_at' => $date],
          ['name' => '用户修改保存','slug' => 'user.update','http_method' => 'PUT','http_path' => 'user/{user}','parent' => 2,'created_at' => $date,'updated_at' => $date],
          ['name' => '用户删除','slug' => 'user.destory','http_method' => 'DELETE','http_path' => 'user/{user}','parent' => 2,'created_at' => $date,'updated_at' => $date],
          ['name' => '角色管理','slug' => 'role*','http_method' => 'ANY','http_path' => 'role*','parent' => 1,'created_at' => $date,'updated_at' => $date],
          ['name' => '角色列表','slug' => 'role.index','http_method' => 'GET','http_path' => 'role','parent' => 9,'created_at' => $date,'updated_at' => $date],
          ['name' => '角色增加','slug' => 'role.create','http_method' => 'GET','http_path' => 'role/create','parent' => 9,'created_at' => $date,'updated_at' => $date],
          ['name' => '角色增加保存','slug' => 'role.store','http_method' => 'POST','http_path' => 'role','parent' => 9,'created_at' => $date,'updated_at' => $date],
          ['name' => '角色修改','slug' => 'role.edit','http_method' => 'GET','http_path' => 'role/{role}/edit','parent' => 9,'created_at' => $date,'updated_at' => $date],
          ['name' => '角色修改保存','slug' => 'role.update','http_method' => 'PUT','http_path' => 'role/{role}','parent' => 9,'created_at' => $date,'updated_at' => $date],
          ['name' => '角色删除','slug' => 'role.destory','http_method' => 'DELETE','http_path' => 'role/{role}','parent' => 9,'created_at' => $date,'updated_at' => $date],
          ['name' => '权限管理','slug' => 'jurisdiction*','http_method' => 'ANY','http_path' => 'jurisdiction*','parent' => 1,'created_at' => $date,'updated_at' => $date],
          ['name' => '权限列表','slug' => 'jurisdiction.index','http_method' => 'GET','http_path' => 'jurisdiction','parent' => 16,'created_at' => $date,'updated_at' => $date],
          ['name' => '权限增加','slug' => 'jurisdiction.create','http_method' => 'GET','http_path' => 'jurisdiction/create','parent' => 16,'created_at' => $date,'updated_at' => $date],
          ['name' => '权限增加保存','slug' => 'jurisdiction.store','http_method' => 'POST','http_path' => 'jurisdiction','parent' => 16,'created_at' => $date,'updated_at' => $date],
          ['name' => '权限修改','slug' => 'jurisdiction.edit','http_method' => 'GET','http_path' => 'jurisdiction/{jurisdiction}/edit','parent' => 16,'created_at' => $date,'updated_at' => $date],
          ['name' => '权限修改保存','slug' => 'jurisdiction.update','http_method' => 'PUT','http_path' => 'jurisdiction/{jurisdiction}','parent' => 16,'created_at' => $date,'updated_at' => $date],
          ['name' => '权限删除','slug' => 'jurisdiction.destory','http_method' => 'DELETE','http_path' => 'jurisdiction/{jurisdiction}','parent' => 16,'created_at' => $date,'updated_at' => $date],
          ['name' => '分类管理','slug' => 'classify*','http_method' => 'ANY','http_path' => 'classify*','parent' => 1,'created_at' => $date,'updated_at' => $date],
          ['name' => '分类列表','slug' => 'classify.index','http_method' => 'GET','http_path' => 'classify','parent' => 23,'created_at' => $date,'updated_at' => $date],
          ['name' => '分类增加/保存','slug' => 'classify.store','http_method' => 'POST','http_path' => 'classify','parent' => 23,'created_at' => $date,'updated_at' => $date],
          ['name' => '分类修改/保存','slug' => 'classify.update','http_method' => 'PUT','http_path' => 'classify/{classify}','parent' => 23,'created_at' => $date,'updated_at' => $date],
          ['name' => '分类删除','slug' => 'classify.destory','http_method' => 'DELETE','http_path' => 'classify/{classify}','parent' => 23,'created_at' => $date,'updated_at' => $date],
          ['name' => '客户管理','slug' => 'client*','http_method' => 'ANY','http_path' => 'client*','parent' => 1,'created_at' => $date,'updated_at' => $date],
          ['name' => '客户列表','slug' => 'client.index','http_method' => 'GET','http_path' => 'client','parent' => 28,'created_at' => $date,'updated_at' => $date],
          ['name' => '客户详情','slug' => 'client.show','http_method' => 'GET','http_path' => 'client/{client}','parent' => 28,'created_at' => $date,'updated_at' => $date],
          ['name' => '客户增加','slug' => 'client.create','http_method' => 'GET','http_path' => 'client/create','parent' => 28,'created_at' => $date,'updated_at' => $date],
          ['name' => '客户增加保存','slug' => 'client.store','http_method' => 'POST','http_path' => 'client','parent' => 28,'created_at' => $date,'updated_at' => $date],
          ['name' => '客户修改','slug' => 'client.edit','http_method' => 'GET','http_path' => 'client/{client}/edit','parent' => 28,'created_at' => $date,'updated_at' => $date],
          ['name' => '客户修改保存','slug' => 'client.update','http_method' => 'PUT','http_path' => 'client/{client}','parent' => 28,'created_at' => $date,'updated_at' => $date],
          ['name' => '客户删除','slug' => 'client.destory','http_method' => 'DELETE','http_path' => 'client/{client}','parent' => 28,'created_at' => $date,'updated_at' => $date],
        ];
        //插入一条所有权限
        Jurisdiction::insert($jurisdiction);
    }
}
