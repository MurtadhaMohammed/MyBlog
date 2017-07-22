@extends('master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">USER ROLES</div>
            <table class="table">
                <thead class="thead-default">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>

                @foreach($users as $row)
                <tbody>
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>

                        <td>

                            <div class="form-group" style="margin-bottom: 0px ">
                                <form method="post" action="/add-role">
                                    {{ csrf_field()}}
                                    <input type="hidden" name="id" value="{{$row->id}}"/>
                                    <select class="form-control" name="role" onchange="this.form.submit();">
                                        <option value="1" {{ ($row->hasRole('Admin')) ? 'selected' : null}}>
                                            Admin
                                        </option>
                                        <option value="2" {{($row->hasRole('Editor')) ? 'selected' :null}}>
                                            Editor
                                        </option>
                                        <option value="3" {{($row->hasRole('User'))? 'selected' :null}}>
                                            User
                                        </option>

                                    </select>

                                </form>

                            </div>

                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@stop