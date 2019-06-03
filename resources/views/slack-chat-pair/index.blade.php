@extends('slack-chat-pair.base')
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
                        List of chat pairs
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a class="btn btn-primary" href="{{ route('slack-chat-pair.create') }}">Add new Chat Pair</a>
                        </li>
                    </ul>
                </div>
                <div class="body">
                  <div class="table-responsive">
                      <table id = 'DataTables_Table_0' class="table table-bordered table-striped table-hover js-resources-metas dataTable">
                          <thead>
                              <tr>
                                  <th>PROJECT</th>
                                  <th>USER 1</th>
                                  <th>USER 2</th>
                                  <th>ACTION</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>PROJECT</th>
                                  <th>USER 1</th>
                                  <th>USER 2</th>
                                  <th>ACTION</th>
                              </tr>
                          </tfoot>
                          <tbody>
                          @foreach ($pairs as $pair)
                                  <tr>
                                      <td>{{ $pair->project['p_name'] }}</td>
                                      <td>
                                          <img class="users-circle" src="{{\App\Http\Controllers\HelperController::getAvatar($pair->user_1['slack_user_id'], $pair->user_1['workspace_id'])}}" width="50" height="50" />
                                          {{ $pair->workspace_1['id_'].' - '.$pair->user_1['username'] }}
                                      </td>
                                      <td><img class="users-circle" src="{{\App\Http\Controllers\HelperController::getAvatar($pair->user_2['slack_user_id'], $pair->user_2['workspace_id'])}}" width="50" height="50" />
                                          {{ $pair->workspace_2['id_'].' - '.$pair->user_2['username'] }}</td>
                                      <td align = 'center'>
                                          <form class="row" method="POST" action="{{ route('slack-chat-pair.destroy', ['id' => $pair->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              <a href="{{ route('slack-chat.slackChat', ['id' => $pair->id]) }}" class="btn btn-info waves-effect">
                                                  Chat
                                              </a>
                                                @if(Auth::user()->type == '0' || $pair->id == Auth::user()->id)
                                                    <a href="{{ route('slack-chat-pair.edit', ['id' => $pair->id]) }}" class="btn btn-info waves-effect">
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
                          @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div> 
  </div> 
@endsection