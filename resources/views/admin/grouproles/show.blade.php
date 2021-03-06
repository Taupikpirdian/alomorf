@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Group Roles
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('/group-roles/index')}}">List Group Roles</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
            <td>ID</td>
            <td>
              {{{$group_role->id}}}
            </td>
          </tr>
          <tr>
            <td width="200px">Group</td>
            <td>
              {{{$group_role->group->name}}}
            </td>
          </tr>
          <tr>
            <td width="200px">Role</td>
            <td>
              {{{$group_role->role->name}}}
            </td>
          </tr>
        </table>
      </div>
    </div>
  </section>
@endsection