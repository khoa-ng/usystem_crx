@extends('users-mgmt.base')
@section('action-content') 
<div class="row clearfix">
  <div class="col-sm-6"></div>
  <div class="col-sm-6"></div>
</div> 
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      List of users
                  </h2>
              </div> 
              <div class="body">
                  <div class="table-responsive">
                      <table id = 'DataTables_Table_0' class="table table-bordered table-striped table-hover js-basic-example dataTable">
                          <thead>
                              <tr> 
                                  <th>USERNAME</th>
                                  <th>EMAIL</th>
                                  <th>WORKED DAYS</th>
                                  <th>TYPE</th>
                                  <th>LEVEL</th>
                                  <th>ACTION</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr> 
                                  <th>USERNAME</th>
                                  <th>EMAIL</th>
                                  <th>WORKED DAYS</th>
                                  <th>TYPE</th>
                                  <th>LEVEL</th>
                                  <th>ACTION</th>
                              </tr>
                          </tfoot>
                          <tbody>
                          @foreach ($users as $user)
                              @if($user->userinfo !== null)
                                  <tr>
                                      <td><img class="users-circle" src="{{\App\Http\Controllers\HelperController::getAvatar($user->slack_user_id, $user->workspace_id)}}" width="50" height="50" />&nbsp;&nbsp;<b>{{ $user->workspace_id }}</b>&nbsp;{{ $user->username }}</td>
                                      <td>{{ $user->email }}</td>
                                      <td>
                                          <?php
                                              $now = time();
                                              $created = strtotime($user->created_at);
                                              $worked = $now - $created;
                                              echo round($worked / (60 * 60 * 24));
                                          ?>
                                      </td>

                                      @if ($user->type == '0')
                                          <td>Admin</td>
                                      @elseif ($user->type == '1')
                                          <td>Member</td>
                                      @else
                                          <td>Developer</td>
                                      @endif

                                      <td>{{ $user->level }}</td>
                                      <td align = 'center'>
                                          <form class="row" method="POST" action="{{ route('user-management.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                              <input type="hidden" name="_method" value="DELETE">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              @if(Auth::user()->type == '0' || $user->id == Auth::user()->id)
                                                  <a href="{{ route('user-management.edit', ['id' => $user->id]) }}" class="btn btn-info waves-effect">
                                                      Update
                                                  </a>
                                                  &nbsp;
                                              @endif
                                              @if ( Auth::user()->type == '0' )
                                                  <button type="submit" class="btn btn-danger waves-effect">
                                                      Delete
                                                  </button>
                                              @endif
                                          </form>
                                      </td>
                                  </tr>
                              @endif
                          @endforeach 
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div> 
  </div> 
@endsection