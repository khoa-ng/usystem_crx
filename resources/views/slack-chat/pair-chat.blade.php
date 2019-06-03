@extends('slack-chat.base')
@section('slack-chat-pair-scripts')
    <script src="{{ asset ("/js/slack-chat-pair.js") }}"></script>
@stop
@section('title', $pair->project['p_name'])
@section('action-content')
<div class="row clearfix">
  <div class="col-sm-6"></div>
  <div class="col-sm-6"></div>
</div>
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 body-container">
          <div class="card">
              <div class="body" style="position: relative">
                  <div class="row clearfix">
                      <div class="col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="hidden" id="forbidden" value="{{json_encode($keywords)}}">
                              </div>
                          </div>
                      </div>
                      <div style="padding-right: 0;" class="col-xs-6 m-b-2-px">
                          <div class="col-xs-12 messaging-block" data-photo="{{ URL::to('/') }}/image/user_temp.jpg">
                                  <div id="scroll_user_1" class="forum-block slack-massages user_1 wrapper">

                                  </div>
                          </div>
                          <div class="col-md-12 m-b-2-px" style="margin-top: 15px;">
                              <div class="row clearfix">
                                  <div class="col-md-12 text-right">
                                      <span><label for="attach_file_1"><i class="material-icons attach-file user_1">attach_file</i></label></span>
                                      <input style="display: none;" type="file" id="attach_file_1" data-user="user_1" class="upload-file" name="attach_file_1">
                                  </div>
                                  <div class="col-xs-12 m-b-2-px">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <textarea type="text" class="form-control slack-message user_1" name="message"></textarea>
                                              {{--<label class="form-label">Message</label>--}}
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xs-1 m-b-2-px" style="display: none;" >
                                      <button class="btn btn-primary waves-effect send-message" data-user="user_1">Send</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div style="padding-left: 0;" class="col-xs-6 m-b-2-px">
                          <div class="col-xs-12 messaging-block" data-photo="{{ URL::to('/') }}/image/user_temp.jpg">
                              <div id="scroll_user_2" class="forum-block slack-massages user_2 wrapper">

                              </div>
                          </div>
                          <div class="col-md-12 m-b-2-px" style="margin-top: 15px;">
                              <div class="row clearfix">
                                  <div class="col-md-12 text-right">
                                      <span><label for="attach_file_2"><i class="material-icons attach-file user_2">attach_file</i></label></span>
                                      <input style="display: none;" type="file" id="attach_file_2" data-user="user_2" class="upload-file" name="attach_file_2">
                                  </div>
                                  <div class="col-xs-12 m-b-2-px">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <textarea type="text" class="form-control slack-message user_2" name="message"></textarea>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xs-1 m-b-2-px" style="display: none;">
                                      <button class="btn btn-primary send-message waves-effect" data-user="user_2" >Send</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <?php
                          $data = array(
                              'id' => $pair->user_1['id'],
                              'slack_id' => $pair->user_1['slack_user_id'],
                              'channel_id' => $pair->user_1['channel_id'],
                              'workspace_id' => $pair->workspace_1['id'],
                              'admin_id' => $pair->admin_1['id']
                          );
                          ?>
                          <div class="col-xs-4 m-b-2-px">
                              <h4 id="user_1" data-creds="{{json_encode($data)}}"><span class="user_1_name">{{$pair->user_1['username']}}</span>
                                  <span class="user_1_status slack-status {{(($pair->user_1['status'] == 'active') ? 'active' : '')}}" data-slack_id="{{$pair->user_1['slack_user_id']}}"></span>
                              </h4>
                          </div>
                          <div class="col-xs-2 m-b-2-px">
                              <div class="col-xs-12 m-b-2-px text-right">
                                  <a href="javascript:" class="btn btn-info set-auto" data-state="auto">Automatic</a>
                              </div>
                          </div>
                              <div class="col-xs-2 m-b-2-px">
                                  <div class="col-xs-12 m-b-2-px text-left">
                                      <a href="javascript:" class="btn btn-danger clear-chat">Clear</a>
                                  </div>
                              </div>
                          <?php
                          $data = array(
                              'id' => $pair->user_2['id'],
                              'slack_id' => $pair->user_2['slack_user_id'],
                              'channel_id' => $pair->user_2['channel_id'],
                              'workspace_id' => $pair->workspace_2['id'],
                              'admin_id' => $pair->admin_2['id']
                          );
                          ?>
                          <div class="col-xs-4 m-b-2-px text-right">
                              <h4 id="user_2" data-creds="{{json_encode($data)}}"><span class="user_2_name">{{$pair->user_2['username']}}</span>
                                  <span class="user_2_status slack-status {{(($pair->user_2['status'] == 'active') ? 'active' : '')}}" data-slack_id="{{$pair->user_2['slack_user_id']}}"></span>
                              </h4>
                          </div>
                      </div>
                  </div>
              </div>
          <div class="loading-block display-none">
          </div>
          </div>
      </div>
  </div>
@endsection