@extends('layout.admin')
@section('content')
<h2>User List</h2>
@if($user_list->count() > 0)
<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Referral Code</th>
    <th>Points</th>
  </tr>
  @foreach($user_list as $user)
  <tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->referral_code}}</td>
    <td>{{$user->points}}</td>
  </tr>
  @endforeach
</table>
@endif
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
@endsection