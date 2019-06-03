var slackChatPair = function () {
  var instance = this;

  instance = {
      user_1: [],
      user_2: [],
      messages_list : {},
      auto: false,
      autoMessages : [],
      keywords : $('#forbidden').val() != '' ? JSON.parse($('#forbidden').val()) : {},
      status : 1,
      audio : {},
      urls : {
         updateStatuses : '/update-statuses-pair',
         getChannelChat : '/get-channel-chat-pair',
         sendMessage    : '/send-slack-message-pair',
         selectPair     : '/select-pair',
         uploadFile     : '/upload-file'
      }
  };

  instance.init = function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      instance.audio = document.createElement('audio');
      instance.audio.setAttribute('src', '/audio/beep.wav');

      instance.user_1 = JSON.parse($('#user_1').attr('data-creds'));
      instance.user_2 = JSON.parse($('#user_2').attr('data-creds'));

      setInterval(function () {
          instance.updateStatuses()
      }, 60000);

      setInterval(function() {
          if(instance.auto && instance.autoMessages.length > 0){
              instance.autoMessages.sort(function(a,b) {return (a.tsi > b.tsi) ? 1 : ((b.tsi > a.tsi) ? -1 : 0);} );
              var message = instance.autoMessages[0];
              var check = true;
              $.each(instance.keywords, function (index, key) {
                  if(key.keyword != '' && ('text' in message.message) && message.message.text.indexOf(key.keyword) >= 0 ){
                      $('.set-auto').click();
                      check = false;
                      return false;
                  }
              });

              if(check){
                  if(message.type == 'file'){
                      instance.uploadFile(message.message.file, message.user, 'auto');
                  }else{
                      message.message = instance.filterUrl(message.message.text);
                      instance.sendAutoMessage(message);
                  }
                  instance.autoMessages.shift();
              }

          }
      }, 3000);

      instance.eventListeners();
  };

  instance.toggleLoader = function (show) {
      $('.loading-block').toggleClass('display-none', !show);
  };

  instance.sendAutoMessage = function (data) {
      var msg_data = data;
      $.ajax({
          type: 'post',
          url: instance.urls.sendMessage,
          data: msg_data,
          success: function (response) {
              document.getElementById('scroll_' + msg_data.user).scrollTop = document.getElementById('scroll_' + msg_data.user).scrollHeight;
          }
      });
  };

  instance.updateStatuses = function () {
          $.ajax({
              type: 'post',
              url: instance.urls.updateStatuses,
              data: {
                  user_1 : instance.user_1,
                  user_2 : instance.user_2
              },
              success: function (response) {
                  $.each(response.data, function (key, status) {
                      var active = (status == 'active') ? true : false;
                      $('.'+key+'_status.slack-status').toggleClass('active', active);
                  });
              }
          });
  };

  instance.filterUrl = function (text) {
      var matchs = text.match(/(?<=\href=")(.*?)(?=\")/gm);
      if(matchs != null){
          $.each(matchs, function (index, match) {
              var str = '<a href="'+match+'" target="_blank">'+match+'</a>';
              text = text.split(str).join(match);
          });
          return text;
      }
      return text;
  };

  instance.eventListeners = function () {
      instance.renderMessaging('user_1');

      $(document).ready(function () {
          var body = $('body');

          body.on('click', '.clear-chat', function () {
              $('.messaging-block .slack-massages .table-div').hide();
          });

          body.on('keypress', '.slack-message',function(e) {
              if(e.which == 13) {
                  if($(this).hasClass('user_1')){
                      $('body .send-message[data-user="user_1"]').click()
                  }else{
                      $('body .send-message[data-user="user_2"]').click()
                  }
              }
          });

          body.on('click', '.set-auto',function(e) {
              var state = $(this).attr('data-state');
              $(this).toggleClass('btn-info').toggleClass('btn-danger').attr('data-state', state == 'auto' ? 'stop' : 'auto' ).html( state == 'auto' ? 'Stop' : 'Automatic' );
              instance.auto = state == 'auto' ? true : false;
              instance.autoMessages = [];
          });

          body.on('change','.upload-file',function(){

              if($(this).prop('files').length > 0)
              {
                  var file =$(this).prop('files')[0];
                  instance.uploadFile(file, $(this).attr('data-user'), 'none');
              }
          });

          body.on('click', '.send-message', function () {
              var user = $(this).attr('data-user');
              $.ajax({
                  type: 'post',
                  url: instance.urls.sendMessage,
                  data: {
                      developer : instance[user],
                      message : $('.slack-message.'+user).val()
                  },
                  beforeSend: function () {
                      instance.toggleLoader(true);
                  },
                  success: function (response) {
                      instance.toggleLoader(false);
                      $('.slack-message.'+user).val('');
                      document.getElementById('scroll_'+user).scrollTop = document.getElementById('scroll_'+user).scrollHeight;
                  }
              });
          });

          body.on('click', '.edit-btn', function (e) {
              var text = $(this).parent().attr('data-type') == 'file' ? instance.messages_list[$(this).parent().attr('data-ts')] : $(e.target).closest('.info-div').find('.info-txt').html();
              instance.sendEditMessage('edit', $(this).parent().attr('data-user'), text, $(this).parent().attr('data-type'));
              $(e.target).closest('.info-div').removeClass('red-msg');
              $(this).parent().hide();
          });

          body.on('click', '.send-btn', function (e) {
              var text = $(this).parent().attr('data-type') == 'file' ? instance.messages_list[$(this).parent().attr('data-ts')] : $(e.target).closest('.info-div').find('.info-txt').html();
              instance.sendEditMessage('send', $(this).parent().attr('data-user'), text, $(this).parent().attr('data-type'));
              $(e.target).closest('.info-div').removeClass('red-msg');
              $(this).parent().hide();
          });
      });
  };

  instance.sendEditMessage = function (action, user, text, type) {

      if(type == 'file'){
          instance.uploadFile(text.file, user, 'auto');
      }else{
          if(action == 'send') {
              $('body .slack-message.' + user).val(instance.filterUrl(text));
              $('body .send-message[data-user="'+ user +'"]').click();
          }else{
              $('body .slack-message.' + user).val(instance.filterUrl(text));
          }
      }
  };

    instance.renderMessaging = function (user_block) {
        console.log(instance);
        $.ajax({
            type: 'post',
            url: instance.urls.getChannelChat,
            data: {
                user : instance[user_block]
            },
            beforeSend: function () {
                if(instance.status <= 2){
                    instance.toggleLoader(true);
                }
            },
            success: function (response) {
                var play = true;
                if(response.data.length > 0) {
                    $.each(response.data, function (index, message) {

                        if($('.messaging-block .slack-massages.'+user_block+' .msg-btns[data-ts="'+message.tsi+'"]').length == 0) {
                            instance.messages_list[message.tsi] = message;
                            var avatar = ('user' in message && 'image_512' in message.user.profile) ? message.user.profile.image_512 : $('.messaging-block').attr('data-photo');
                            var display_name = ('user' in message) ? message.user.profile.real_name : '';

                            $('.messaging-block .slack-massages.' + user_block).append('' +
                                '<div class="table-div"><div class="table-cell w-60-px"><img width="40" height="40" class="img-circle" src="' + avatar + '"></div>' +
                                '<div class="table-cell info-div"><span class="first-name">' + display_name + '</span><span class="reply-time">' + message.ts + '</span><span class="msg-btns" '+((instance[user_block].slack_id != message.user.id) ? 'style="display:none"' : '')+'data-type="'+message.type+'" data-ts="'+message.tsi+'" data-user="'+(user_block =='user_1' ? 'user_2' : 'user_1')+'"><i class="material-icons send-btn">send</i><i class="material-icons edit-btn">edit</i></span><div class="info-txt">' + message.text + '</div></div></div></div>');

                            if(instance[user_block].slack_id == message.user.id){
                                instance.autoMessages.push({
                                    developer : instance[user_block =='user_1' ? 'user_2' : 'user_1'],
                                    message   : message,
                                    user : user_block =='user_1' ? 'user_2' : 'user_1',
                                    type : message.type,
                                    tsi  : message.tsi
                                });
                            }
                            document.getElementById('scroll_'+user_block).scrollTop = document.getElementById('scroll_'+user_block).scrollHeight;
                            if(play && instance.status > 2 && instance[user_block].slack_id == message.user.id){
                                instance.audio.play();
                                play = false;
                            }
                        }
                    });
                }
                instance.status++;
                instance.renderMessaging(user_block =='user_1' ? 'user_2' : 'user_1');

                if(instance.status <= 2){
                    instance.toggleLoader(false);
                }
            }
        });
    };

    instance.uploadFile = function (file, user, action) {
        var formdata = new FormData();

        formdata.append("attach", action == 'auto' ? JSON.stringify(file) : file);
        formdata.append("action", action);
        formdata.append("user", JSON.stringify(instance[user]));
        if(action == 'auto'){
            formdata.append("sender", JSON.stringify(instance[(user=='user_1') ? 'user_2' : 'user_1']));
        }

        $.ajax({
            url: instance.urls.uploadFile,
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            beforeSend: function () {
                if(action != 'auto'){
                    instance.toggleLoader(true);
                }
            },
            success: function (message) {
                if(action != 'auto'){
                    instance.toggleLoader(false);
                }
            }
        });
    };
    instance.init();
};
slackChatPair();