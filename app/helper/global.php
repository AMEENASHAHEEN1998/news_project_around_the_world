<?php

use App\Models\admin\Blog;
use App\JoinReporters;
use App\User;


function count_blogs(){
    $count = Blog::count();
    return $count;
}

function count_publish_blogs()
{
    $count = Blog::where('Value_Status' , 2)->count();
    return $count;
}

function count_accept_blogs()
{
    $count = Blog::where('Value_Status' , 1)->count();
    return $count;
}

function count_join_reporter()
{
    $count = JoinReporters::where('status' , 0)->count();
    return $count;
}

function count_admin()
{
    $count = User::where('roles_name' , '["admin"]')->count();

    return $count;
}

function count_user()
{
    $count = User::where('roles_name' , '["user"]')->count();
    //$count = User::count();

    return $count;
}

function average_publish_news(){
    $count_publish = Blog::where('Value_Status' , 2)->count();
    $count_blogs = Blog::count();
    $result = $count_publish/$count_blogs * 100 . '%';
    return $result  ;
}

function average_unpublish_news(){
    $count_publish = Blog::where('Value_Status' , 3)->count();
    $count_blogs = Blog::count();
    $result = $count_publish/$count_blogs * 100 . '%';
    return $result  ;
}

function average_approval_news(){
    $count_publish = Blog::where('Value_Status' , 1)->count();
    $count_blogs = Blog::count();
    $result = $count_publish/$count_blogs * 100 . '%';
    return $result  ;
}

?>
