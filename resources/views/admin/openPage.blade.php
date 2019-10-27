@extends('layouts.admin_layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                  <h1>{!!  Session::get('success') !!}  </h1>
                    <div class=" card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Role</font></font></th>
                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Users</font></font></th>
                                <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($roles))
                                @foreach($roles as $role)
                            <tr>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$role->name}}</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                            @foreach($role->users  as  $key=> $user)
                                                {{$user->name}}<br>
                                                @endforeach
                                        </font></font></td>
                                <td></td>
                            </tr>

                            @endforeach
                                @endif

                            </tbody>
                        </table>

                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-2">

                <a class="btn btn-block btn-success btn-sm" href="{{route('createRole')}}">Create Role</a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection