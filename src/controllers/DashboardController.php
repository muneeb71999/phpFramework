<?php


class DashboardController extends Controller
{
  public function index()
  {
    $data = Illuminate\Database\Capsule::table('classes')->get();
    print_r($data);
  }
}