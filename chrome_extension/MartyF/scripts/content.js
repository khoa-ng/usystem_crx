const Inbox_key = "sdk_EmailTemplate_84021c6a33";

var templateText = "<p><strong>😂THIS IS A TEST</strong></p>";
var additionalModal = '<button type="button" id="openTemplateModal" class="btn btn-sm btn-info" data-toggle="modal"\n' +
    '        data-target="#templateModal" style="display: none">Open Modal\n' +
    '</button>' +
    '<div class="modal fade" id="templateModal" role="dialog">\n' +
    '    <div class="modal-dialog">\n' +
    '        <div class="modal-content">\n' +
    '            <div class="modal-header">\n' +
    '                <div class="row">\n' +
    '                    <div class="col-xs-6 col-sm-6 text-left">\n' +
    '                        <h5 style="display: inline"><b>Template</b> Selector</h5>\n' +
    '                    </div>\n' +
    '                    <div class="col-xs-6 col-sm-6 text-right">\n' +
    '                        <!-- Trigger the login modal with a button -->\n' +
    '                        <button type="button" id="refreshTemplates" class="btn btn-sm btn-primary"><span class="fa fa-refresh"></span></button>\n' +
    '                        <button type="button" id="openLoginModal" class="btn btn-sm btn-info" data-toggle="modal"\n' +
    '                                data-target="#loginModal"><span class="fas fa-sign-in-alt"></span></button>\n' +
    '                        <button type="button" id="logout" class="btn btn-sm btn-danger"><span class="fas fa-sign-out-alt"></span></button>\n' +
    '                        <button type="button" class="close" data-dismiss="modal">&times;</button>\n' +
    '                    </div>\n' +
    '                </div>\n' +
    '            </div>\n' +
    '            <div class="modal-body row">\n' +
    '               <div class="row">\n' +
    '                   <div class="text-center col-xs-5 col-sm-5">\n' +
    '                       <h5>Please select a template</h5>\n' +
    '                       <div class="btn-group btn-group-vertical full-width"  id="templateListArea">\n' +
    '                       </div>\n' +
    '                   </div>\n' +
    '                   <div id="templatePreviewArea" class="text-center col-xs-7 col-sm-7">\n' +
    '                   </div>\n' +
    '               </div>\n' +
    '               <div id="statusArea" class="row"></div>' +
    '            </div>\n' +
    '            <div class="modal-footer">\n' +
    '                <div class="form-horizontal">\n' +
    '                    <div class="form-group">\n' +
    '                        <h5 class="control-label col-xs-4 col-sm-4 text-right text-info">Selected: </h5>\n' +
    '                        <h5 class="control-label col-xs-2 col-sm-2 text-left text-success" id="selectedIndex">2</h5>\n' +
    '                        <div class="col-xs-6 col-sm-6 text-right">\n' +
    '                            <button type="button" id="selectTemplate" class="btn btn-primary" data-dismiss="modal">OK\n' +
    '                            </button>\n' +
    '                            <button type="button" id="closeTemplateModal" class="btn btn-danger" data-dismiss="modal">\n' +
    '                                Cancel\n' +
    '                            </button>\n' +
    '                        </div>\n' +
    '                    </div>\n' +
    '                </div>\n' +
    '            </div>\n' +
    '        </div>\n' +
    '    </div>\n' +
    '</div>' +
    '<!-- Modal -->\n' +
    '<div class="modal fade" id="loginModal" role="dialog">\n' +
    '    <div class="modal-dialog">\n' +
    '        <div class="modal-content">\n' +
    '            <div class="modal-header">\n' +
    '                <button type="button" class="close" data-dismiss="modal">&times;</button>\n' +
    '                <h4 class="modal-title">Login/SignUp</h4>\n' +
    '            </div>\n' +
    '            <div class="modal-body">\n' +
    '                <div id="loginArea" class="text-center">\n' +
    '                    <input type="text" class="form-control full-width margin-top-10 padding-5" id="email" name="email"\n' +
    '                           placeholder="email" value="">\n' +
    '                    <input type="password" class="form-control full-width margin-top-10 padding-5" id="password"\n' +
    '                           name="password" placeholder="password" value="">\n' +
    '                    <!--                    <input type="text" class="form-control full-width margin-top-10 padding-5" id="key" name="key" placeholder="key" value="">-->\n' +
    '                    <button type="button" id="login" class="btn btn-primary half-width margin-top-10 padding-5">Login\n' +
    '                    </button>\n' +
    '                    <button type="button" id="signup" class="btn btn-danger half-width margin-top-10 padding-5">Sign\n' +
    '                        Up\n' +
    '                    </button>\n' +
    '                </div>\n' +
    '            </div>\n' +
    '            <div class="modal-footer">\n' +
    '                <button type="button" id="closeLoginModal" class="btn btn-danger" data-dismiss="modal">Cancel</button>\n' +
    '            </div>\n' +
    '        </div>\n' +
    '    </div>\n' +
    '</div>';

window.onload = function () {
    var newItem = document.createElement('div');
    newItem.setAttribute('id', 'martyTemplateSelector');
    newItem.innerHTML = additionalModal;
    $('body').append(additionalModal);

    InboxSDK.load(1, Inbox_key).then(function (sdk) {
        sdk.Compose.registerComposeViewHandler(function (composeView) {
            composeView.addButton({
                "title": "Select Template",
                "iconClass": "fa fa-plus-circle",
                "onClick": insertHandler,
                "hasDropdown": false,
                "type": "MODIFIER",
                "orderHint": "0"
            });
        });
    });

    function insertHandler(event) {
        document.getElementById('openTemplateModal').click();
        var data = window.localStorage.getItem("curTemplate");
        data = JSON.parse(data);
        if (data)
            templateText = data.body.toString();
        event.composeView.setBodyHTML(templateText)
    }

    const sampleTemplateJSON = {
        "id": "-1",
        "uid": "8",
        "name": "Sample Template",
        "body": "<h4>GMail Template</h4><p>This is a sample template</p>",
        "created": new Date().toLocaleString(),
        "modified": new Date().toLocaleString(),
        "public": "1",
        "favorite": "0",
        "tags": "...",
        "category": "No template is selected"
    };

    var isLogin = "0";
    var serverURL = 'http://localhost:8000';
    var apikey_key = "X-API-KEY";
    var apikey_value = "";
    var templates = [];
    var selectedTemplateID = -1;
    var curTemplateData = {};

    var loginButton = document.getElementById("login");
    loginButton.onclick = login;
    var logoutButton = document.getElementById("logout");
    logoutButton.onclick = logout;
    // var saveButton = document.getElementById('save');
    // saveButton.onclick = saveInfo;
    var signupButton = document.getElementById('signup');
    signupButton.onclick = signup;
    var openTMButton = document.getElementById('refreshTemplates');
    openTMButton.onclick = refreshTemplates;

    //$("#save").hide();
    loadInfo();
    setTimeout(updateStatus, 500);
    updateWindow();

    function login() {
        resetStatus();

        chrome.runtime.sendMessage({
            method: "login",
            email: $('#email').val(),
            password: $('#password').val()
        }, function (response) {
            if (response.status) {
                isLogin = "1";
                apikey_value = response.result;
                updateStatus();
                saveInfo();
            }
            $("#statusArea").html(response.result);

        })
    }

    function logout() {
        resetStatus();

        $.ajax({
            url: serverURL + '/v2/login/logout',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.status) {
                    isLogin = "0";
                    updateStatus();
                }
                $("#statusArea").html(data.result);
            },
            error: function (xhr) {
                $("#statusArea").html("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        })
    }

    function signup() {
        window.open('https://www.bing.com');
    }

    /**
     * get templates from server
     */
    function refreshTemplates() {
        resetStatus();

        chrome.runtime.sendMessage({
            method: "login",
            email: 'xyz1@gmail.com',
            password: '11111'
        }, function (response) {
            if (response.status) {
                isLogin = "1";
                apikey_value = response.result;
                updateStatus();
                saveInfo();
                chrome.runtime.sendMessage({
                    method: "getTemplates",
                    key: apikey_value
                }, function (data) {
                    templates = data;
                    alert(templates);

                    if (template && templates.length > 0) {
                        setSelected(0);
                        $("#statusArea").html("Total : " + templates.length + "+" + "1(sample) templates");
                    } else {
                        $("#statusArea").html("There is no template for you.");
                    }
                    updateWindow();
                });
            }
            $("#statusArea").html(response.result);

        });
    }

    function updateStatus() {
        //alert(isLogin);
        if (isLogin === "1") {
            //$("#loginArea").hide();
            $('#closeLoginModal').click();
            $('#openLoginModal').hide();
            $("#logout").show();
            $("#statusArea").html('Ready...');
        } else {
            //$("#loginArea").show();

            $('#openLoginModal').show();
            $("#logout").hide();
            $("#statusArea").html('If you have no access key, please login');
        }
    }

    function resetStatus() {
        $('#statusArea').html('Getting data from server...');
    }


    function updateWindow() {
        //curTemplateData=sampleTemplateJSON;
        // TODO: bellow code is for test
        if (templates.length && selectedTemplateID >= 0 && selectedTemplateID < templates.length) {
            curTemplateData = templates[selectedTemplateID];
        }

        $('#templateListArea').html(generateList());
        $('#templatePreviewArea').html(generatePreview(curTemplateData));
        assignSelectEventHandler();
        document.getElementById('templateThumbnail').appendChild(generateThumbnail(curTemplateData.body));
    }

    /**
     * Local Storage
     */
    function saveInfo() {
        window.localStorage.clear();
        var person = {
            email: $("#email").val(),
            password: $("#password").val()
            //isLogin: isLogin.toString()
        };
        window.localStorage.setItem('user', JSON.stringify(person));
    }

    function loadInfo() {
        var info = window.localStorage.getItem('user');
        var person = JSON.parse(info);
        if (person) {
            $("#email").val(person.email);
            $("#password").val(person.password);
        }
        curTemplateData = window.localStorage.getItem('curTemplate');
        console.log(curTemplateData);
        if (curTemplateData === null || curTemplateData.length < 1) curTemplateData = sampleTemplateJSON;
        else curTemplateData = JSON.parse(curTemplateData);
    }


    function generateList() {
        var sampleList = '<button type="button" class="btn btn-primary" id="item_-1">' + curTemplateData.name + '</button>';
        var html = (templates.length < 1) ? sampleList : "";
        for (var i = 0; i < templates.length; i++) {
            html += '<button type="button" class="btn btn-primary" id="item_' + (i) + '">' + templates[i].name + '</button>';
        }
        return html;
    }

    function assignSelectEventHandler() {
        for (var i = -1; i < templates.length; i++) {
            var btn = document.getElementById('item_' + i);
            if (!btn) continue;
            btn.addEventListener('click', function () {
                var id = parseInt(this.getAttribute('id').toString().split('_')[1]);
                setSelected(id);
                updateWindow();
                $('#statusArea').html('Selected: ' + (selectedTemplateID + 1) + "/" + templates.length);
            });
        }
        document.getElementById('storeSelected').addEventListener('click', function () {
            window.localStorage.setItem('curTemplate', JSON.stringify(curTemplateData));
            //alert(curTemplateData.body);
        });
    }

    function setSelected(id) {
        selectedTemplateID = id;
    }

    function generatePreview(selectedItem) {
        const sampleElement1 = '<div class="card ">\n' +
            '  <div class="row"><h5><div class="col-xs-4 col-sm-4 text-right">Name: </div><div class="col-xs-8 col-sm-8 text-left"><b>' + selectedItem.name + '</b></div></h5></div>\n' +
            '  <div class="row"><div class="col-xs-4 col-sm-4 text-right">Preview: </div><div class="col-xs-8 col-sm-8 text-left"><div id="templateThumbnail"></div></div></div>\n' +
            '  <div class="row"><div class="col-xs-4 col-sm-4 text-right">Category: </div><div class="col-xs-8 col-sm-8 text-left"><b>' + selectedItem.category + '</b></div></div>\n' +
            '  <div class="row"><div class="col-xs-4 col-sm-4 text-right">Tags: </div><div class="col-xs-8 col-sm-8 text-left"><b>' + selectedItem.tags + '</b></div></div>\n' +
            '  <div class="row"><div class="col-xs-4 col-sm-4 text-right">Favorite: </div><div class="col-xs-8 col-sm-8 text-left"><b>' + selectedItem.favorite + '</b></div></div>\n' +
            '  <div class="row"><div class="col-xs-4 col-sm-4 text-right">Public: </div><div class="col-xs-8 col-sm-8 text-left"><b>' + selectedItem.public + '</b></div></div>\n' +
            '  <div class="row"><div class="col-xs-4 col-sm-4 text-right">Created at: </div><div class="col-xs-8 col-sm-8 text-left"><b>' + selectedItem.created + '</b></div></div>\n' +
            '  <div class="row"><div class="col-xs-4 col-sm-4 text-right">Modified at: </div><div class="col-xs-8 col-sm-8 text-left"><b>' + selectedItem.modified + '</b></div></div>\n' +
            '  <p><button id="storeSelected">Select</button></p>\n' +
            '</div>';
        const sampleElement2 = '<div class="row card">\n' +
            '  <div class="column">\n' +
            '    <div class="content">\n' +
            '      <div id="templateThumbnail"></div>\n' +
            '      <h5>My Work</h5>\n' +
            '      <p class="price">Favorite: 1</p>\n' +
            '      <p><button>Select</button></p>\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>';

        return sampleElement1;
    }


    function generateThumbnail(htmlData) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        canvas.width = 200;
        canvas.height = 160;
        var tempImg = document.createElement('img');
        var targetImg = document.createElement('img');

        tempImg.src = 'data:image/svg+xml,' + encodeURIComponent('<svg xmlns="http://www.w3.org/2000/svg" width="200" height="160"><foreignObject width="100%" height="100%"><div xmlns="http://www.w3.org/1999/xhtml">' + htmlData.toString() + '</div></foreignObject></svg>');
        tempImg.addEventListener('load', function (e) {
            ctx.drawImage(e.target, 0, 0);
            targetImg.src = canvas.toDataURL();
        });
        targetImg.setAttribute('class', 'img-thumbnail');
        targetImg.setAttribute('alt', 'can not generate thumbnail');
        return targetImg;
    }


};
