// const serverURL = 'https://protemplates.io';
// let temp;
// chrome.runtime.onMessage.addListener(
//     function(request, sender, sendResponse) {
//         if (request.method == "login") {
//             var formdata = new FormData();
//             formdata.append('email', request.email);
//             formdata.append('password', request.password);
//
//             var xhr = new XMLHttpRequest();
//             xhr.withCredentials = true;
//
//             xhr.addEventListener("readystatechange", function () {
//                 if (this.readyState === 4) {
//                     //alert(this.response);
//                     sendResponse(this.response);
//                 }
//             });
//
//             xhr.open("POST", serverURL+"/v2/login/userlogin");
//             xhr.send(formdata);
//             return true;
//         }
//         else if (request.method == "getTemplates") {
//             var data = null;
//
//             var xhr = new XMLHttpRequest();
//             xhr.withCredentials = true;
//
//             xhr.addEventListener("readystatechange", function () {
//                 if (this.readyState === 4) {
//                     sendResponse(this.response);
//                 }
//             });
//
//             xhr.setRequestHeader("X-API-KEY", request.key);
//             xhr.open("GET", serverURL+"/v2/api/templates");
//             xhr.send(formdata);
//             return true;
//
//         }
//         else if (request.method == "setTemplate") {
//             // alert("bg_script: "+request.data);
//             temp=request.data;
//             localStorage.setItem("lastTemplate", temp.toString());
//             sendResponse({success: true});
//             return true;
//         }
//         else if (request.method == "getTemplate") {
//             // alert("bg_script: va="+temp);
//             temp=localStorage.getItem("lastTemplate");
//             // alert("bg_script: LS="+temp);
//             sendResponse({success: true, data: temp});
//             return true;
//         }
//         return true;
//     });
//
//
