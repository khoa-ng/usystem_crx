// var serverurl = "https://318ee0b6.ngrok.io";
var serverurl = "http://localhost:8000";
var userinfotooltip ;
var userhintword;
var hintword = [];

$(document).ready(function () {

    var comdeter = 0;
    var resdeter = 1;
    var middeter;

    setTimeout(function () {
        $.ajax({
            url: serverurl + "/getskyperuser",
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                userinfotooltip = [];
                var path = "rx-vlv";
                $('body').append("<div class='tooltip'><p>project name: <span id='project_name'></span></p><p>M_name:<span id='M_name'></span></p><p>Email:<span id='Email'></span></p><p>Description:<span id='Description'></span></p></div>");
                for(i=0;i<$('div[class|="scrollViewport scrollViewportV"]:first div[id|='+ path +']').length ; i++){

                    for(j=0;j<data.length;j++){
                        if($('div[class|="scrollViewport scrollViewportV"]:first div[id|='+ path +']:nth-child(' + i + ') > div > div > div:nth-child(2) > div:nth-child(1) > div').attr("data-text-as-pseudo-element") == data[j].sky_id) {
                            $('div[class|="scrollViewport scrollViewportV"]:first div[id|=' + path + ']:nth-child(' + i + ') > div > div').append('<div class="help-tip" avatar= "' + data[j].sky_id + '"style="position: absolute; top:30px; right: 0px;  font-size:15px; width:100px ;" >project</div>');
                            $('div[class|="scrollViewport scrollViewportV"]:first div[id|=' + path + ']:nth-child(' + i + ') > div > div > div:nth-child(2) > div:nth-child(1)').append('<div style="margin-left: 15px;"><a href="'+ data[j].contact + '">' + data[j].id + '</a></div>');
                            userinfotooltip[data[j].sky_id] = data[j];
                        }
                    }

                }
            },
            error: function (xhr) {
                $("#statusArea").html("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });

    }, 500);
    $(document).on("click", '.filteritem',function () {
        $(".warning").css({"display":"none"});
        $(".filteritem").css({"background-color":"rgba(18,19,24,0.5)"});
        $(this).css({"background-color":"#5bc0de"});
        hintword["id"] = $(this).find('#userkeyhint').text();
        hintword["contact"] = userhintword[hintword["id"]];
        console.log($(this).find('#userkeyhint').text());


    });

    $('.noFocusOutline').on("mresize",function () {

        if($('.noFocusOutline').width()< 760) {
            resdeter = -1;

        }
        if($('.noFocusOutline').width()> 760){
            resdeter = 1;
        }

        if( middeter != resdeter) {

            if (comdeter == -1 || comdeter == 0) {
                setcontentchat();
            }
            else {
                setcontentcontact();
            }
        }
        middeter = resdeter;
    });
    $(document).on("mouseover",".help-tip",(function(e){
        var keyhint = $(this).attr('avatar');
        $('.tooltip').css({'top': e.pageY,'left':e.pageX-40, 'display':'block'});
        $('#project_name').text(userinfotooltip[keyhint].p_name);
        $('#M_name').text(userinfotooltip[keyhint].m_name);
        $('#Email').text(userinfotooltip[keyhint].email);
        $('#Description').text(userinfotooltip[keyhint].pro_des)

    }));
    $(document).on("mouseleave",".help-tip",(function(e){
        $('.tooltip').css({'display':'none'});
    }));

    $(document).on("click", "button[title='Chats']",function () {
        if(comdeter == 1||comdeter == 0) {
            setcontentchat();
        }
        comdeter = -1;

    });

    $(document).on("click", "button[title='Chats']",function () {
        if(comdeter == 1||comdeter == 0) {
            setcontentchat();
        }
        comdeter = -1;

    });
    $(document).on("click", "button[title='Contacts']",function () {
        if(comdeter == -1 || comdeter == 0) {
            setcontentcontact();
        }
        comdeter = 1;

    });

    $(document).on("click", "button[title='Calls']",function () {
            comdeter = 0;
    });

    $(document).on("click", "button[title='Notifications']",function () {
        comdeter = 0;

    });

    $(document).on("click", "button[role='menuitem'][aria-label='Edit contact']",function(){

        edit_contact();
    });
    $(document).on("click", "button[role='button'][aria-label='Edit profile']",function(){

        edit_contact();
    });
    $(document).on('click', 'button[title="Save"][aria-label="Save"]',function () {
        var sky_id = $('div[role="dialog"][aria-label="Edit contact"] input[autocorrect="off"]').val();
        var id = $(".set_name").text();
        $.ajax(
            {
                url: serverurl + "/getskyperuser/" + sky_id + "/" + id,
                type: 'GET',
                dataType: 'json',
                success: function () {
                    setcontentcontact();
                },

                error: function (xhr) {
                    $("#statusArea").html("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            }
        );
    });


    $(document).on("click", "button[id='popup_dialog']",function () {
        var modal = document.getElementById("myModal1");
        modal.style.display = "block";
    });
    $(document).on("click", "span[class='close11']",function () {
        var modal = document.getElementById("myModal1");
        modal.style.display = "none";
    });
    $(document).on("click", "button[class='btn btn-success select']",function () {
        if(!hintword["id"]=="") {
            $(".set_name").text(hintword["id"]);
            $(".set_name").attr({"href": hintword["contact"]});
            hintword = [];
            var modal = document.getElementById("myModal1");
            modal.style.display = "none";
        }
        else{
            $(".warning").css({"display":"block"});
        }
    });
    $(document).on("click", "button[class='btn btn-info search']",function () {
        searchfilter();
    });


});
function searchfilter(){
    var hintword = document.getElementById('hinttext').value;
    var orm ="<div>";
    $('#selectfield').html("<img src='" + chrome.runtime.getURL('icons/loading.gif') + "' width='100px' height='100px' style='position:absolute; top:50px; left: 160px'>");
    userhintword = [];
    $.ajax({
        url:serverurl + "/getskyperuser/" + hintword,
        type: 'GET',
        dataType : 'json',
        success : function(data){
            for( i = 0;i< data.length;i++){
                orm += "<div style='overflow:hidden; width:425px ' class='filteritem'><p class='item' id='userkeyhint'>" + data[i].id + "</p><p class='item'>" + data[i].p_name + "</p><p class='item'>" + data[i].email + "</p><p class='item'> " + data[i].pro_des + "</p></div>"
                userhintword[data[i].id] = data[i].contact;
            }
            orm += "</div>";
            $('#selectfield').html(orm);
            console.log(userhintword);
        },
        error: function (xhr) {
            $("#selectfield").html("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
}


function setcontentchat(){

    if($(".help-tip")){
        setTimeout(function () {
            $.ajax({
                url: serverurl + "/getskyperuser",
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    userinfotooltip = [];
                    var path = "rx-vlv";
                    for(i=0;i<$('div[class|="scrollViewport scrollViewportV"]:first div[id|='+ path +']').length ; i++){

                        for(j=0;j<data.length;j++){
                            if($('div[class|="scrollViewport scrollViewportV"]:first div[id|='+ path +']:nth-child(' + i + ') > div > div > div:nth-child(2) > div:nth-child(1) > div').attr("data-text-as-pseudo-element") == data[j].sky_id) {
                                $('div[class|="scrollViewport scrollViewportV"]:first div[id|=' + path + ']:nth-child(' + i + ') > div > div').append('<div class="help-tip" avatar = "'+ data[j].sky_id +'" style="position: absolute; top:30px; right: 0px;  font-size:15px; width:100px ;" >project</div>');
                                $('div[class|="scrollViewport scrollViewportV"]:first div[id|=' + path + ']:nth-child(' + i + ') > div > div > div:nth-child(2) > div:nth-child(1)').append('<div style="margin-left: 15px;"><a href="' + data[j].contact + '">' + data[j].id + '</a></div>');
                                userinfotooltip[data[j].sky_id] = data[j];
                            }
                        }

                    }


                },
                error: function (xhr) {
                    $("#statusArea").html("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            });

        }, 100);
    }


}
function setcontentcontact(){

    var avatad;
    if($(".help-tip")){
        setTimeout(function () {
            $.ajax({
                url: serverurl + '/getskyperuser',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    userinfotooltip = [];
                    var path = "rx-vlv";
                    var fardata = $('div[class|="scrollViewport scrollViewportV"]:first div[id|=' + path + '][role="button"]');
                    var mid;
                    var midchild;
                    for(i=0;i<fardata.length;i++) {

                        mid = fardata[i].getAttribute('aria-label');
                        midchild = mid.slice(0,mid.search(",")).toString();

                        avatad = midchild.replace(/\s/g, '');
                        fardata[i].setAttribute("avata",avatad);
                        for(j=0;j<data.length;j++) {

                            if( midchild == data[j].sky_id) {

                                $('div[avata~='+ avatad +'] > div > div').append('<div style="position:absolute; top:0px; right: 20px;"><a href="' + data[j].contact + '">' + data[j].id + '</a></div>');
                                $('div[avata~='+ avatad +'] > div').append('<div class="help-tip" avatar = "'+ data[j].sky_id +'" style="position: absolute; top:30px; right: 15px;  font-size:15px; width:100px ;">project</div>');
                                userinfotooltip[data[j].sky_id] = data[j];
                            }
                        }
                    }

                },
                error: function (xhr) {
                    $("#statusArea").html("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            })

        }, 100);
    }

}
function edit_contact(){
    setTimeout(function(){

        var content = "<div class=\"container\">\n" +
            "  <form class='form-inline'>\n" +
            "    <div class=\"form-group\">\n" +
            "      <label for='email'>Search Filter:</label>\n" +
            "      <input type='text' class='form-control' id='hinttext' placeholder='Enter Keyword' name='email'><span class='warning'>Please Select the required field</span>" +
            "    </div>\n" +
            " <div class='form-group'><button type='button' class='btn btn-info search'>Search</button><button type=\"button\" class=\"btn btn-success select\"'>Select</button></div> \n" +
            "  </form>\n" +
            "</div><div style='position: relative; overflow: auto; margin-top:5px; padding:10px; width: 450px; height: 350px; border: 2px solid darkolivegreen;' id='selectfield'></div>";

        $('div[role="dialog"][aria-label="Edit contact"] div[class="scrollViewport scrollViewportV"] > div > div > div:nth-child(2)').append("<div style='padding-top: 22px; margin-right: 45px;'><a class='set_name'></a></div><div style='padding-top: 15px;margin-right: 15px;'><button id = 'popup_dialog' type='button' class='btn btn-success'>SeLect</button><div id='myModal1' class='modal1'><div class='modal1-content'><span class='close11'>&times;</span>" + content + "</div></div></div>");

        var orm ="<div>";
        $('#selectfield').html("<img src='" + chrome.runtime.getURL('icons/loading.gif') + "' width='100px' height='100px' style='position:absolute; top:50px; left: 160px'>");
        userhintword = [];
        $.ajax({
            url: serverurl + "/getskyperuser",
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                for( i = 0;i< data.length;i++){
                    orm += "<div style='overflow:hidden; width:425px ' class='filteritem'><p class='item' id='userkeyhint'>" + data[i].id + "</p><p class='item'>" + data[i].p_name + "</p><p class='item'>" + data[i].email + "</p><p class='item'> " + data[i].pro_des + "</p></div>"
                    userhintword[data[i].id] = data[i].contact;

                }
                orm += "</div>";
                $('#selectfield').html(orm);

                // $(#selectfield).append(' + orm +');
            },

            error: function (xhr) {
                $("#statusArea").html("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    }, 100);
}