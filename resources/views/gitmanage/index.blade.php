@extends('gitmanage.base')
@section('action-content')
<script>
$(document).ready(function() {

    // initialize datatable
    $.fn.dataTableExt.oSort["customNumber-desc"] = function(x, y) {
        return x < y;
    };

    $.fn.dataTableExt.oSort["customNumber-asc"] = function(x, y) {
        return x > y;
    };
    $.fn.dataTableExt.oSort["customNumber-pre"] = function(num) {
        return num;
    };
    $('#DataTables_Table_1').DataTable({
        "columnDefs": [
            { "type": "customNumber", targets: 0 }
        ],
        responsive: true
    });

    var git_username, repos_name = [];

    //when you select a user, it takes this user's repositories from one owner
    $(".user-group").click(function() {
        git_username = $(this).data("gitname");
        // if(git_username == "" || git_username == null) git_username = "nogitusername";
        $(".user-group").each(function( index, element ) {
            $(element).css("border", "1px solid #ddd");
        });

        $(this).css("border", "2px solid black");
        $.ajax({
            type: "POST",
            url: '/gitmanage/ajaxrepofromuser',
            data: { git_username: git_username },
            // dataType:"json",
            success: function( resp ) {
                var flag = 0;
            //    $(".uproject").html("<li class='list-group-item'>No data available in table</li>");
                $('.uproject').html("");
                for ( i = 0 ; i < resp.length; i++){
                    if(resp[i].git_username == git_username.trim()){
                        if (flag == 0) $(".uproject").html("<li class='list-group-item alloc' data-repo_name =  "+resp[i].repository+">"+resp[i].repository+"</li>");
                        else $(".uproject").append("<li class='list-group-item alloc' data-repo_name =  "+resp[i].repository+">"+resp[i].repository+"</li>");
                        flag = 1;
                    }
                }
                {{--if(response.status == "error"){--}}
                    {{--alert(response.string); --}}
                    {{--return;--}}
                {{--}else{--}}
                    {{--$(".uproject").html(""); --}}
                    {{--if (response.string == "notfound") return; --}}
                    {{--resp = JSON.parse(response.string);--}}
                    {{--for ( i = 0 ; i < resp.length; i++){--}}
                        {{--if(resp[i].owner.login == "{{ env('GITHUB_USERNAME') }}")--}}
                            {{--$(".uproject").append("<li class='list-group-item alloc' data-repo_name=  "+resp[i].name+">"+resp[i].name+"</li>");--}}
                    {{--}--}}
                {{--}--}}
            },
            error: function(err){
                alert('ajax error');
            }
        });
    });

    // if click third table...
    $(".projects-group").click(function() {
        if($(this).hasClass("selected")){
            $(this).css("border", "0");
            $(this).removeClass("selected");
            var index = repos_name.indexOf($(this).data('reposname'));
            repos_name.splice(index, 1);
        }
        else {
            repos_name.push($(this).data('reposname'));
            $(this).addClass("selected");
            $(this).css("border", "1px solid black");
        }
    });

    //if click arrow button...
    $("#shift_proj").click(function(e){
        e.preventDefault();
        if(git_username == '' || git_username == null) {
            alert("Please select a user!");
            return;
        }

        if(repos_name == [] || repos_name == null){
            alert('Please select repositryies.'); return;
        }
        $.ajax({
            type: "POST",
            url: '/gitmanage/updaterepos',
            data: {git_username: git_username, repos_name: repos_name},
            dataType : "json",
            success: function( response ) {
                
                if(response.status =='error') {
                    alert(response.string);
                    return;
                }
                else {
                    data = response.string;
                    for ( i = 0 ; i < data.length; i++){
                        resp = JSON.parse(data[i]);
                        $(".uproject").append("<li class='list-group-item alloc' data-repo_name =  "+resp.repository.name+">"+resp.repository.name+"</li>");
                  
                    }
                }
            }
        })
    });
    // when click second table...
    var del_repos = [];
    $(".uproject").on('click', '.alloc', function(){
        if($(this).hasClass("selected")){
            $(this).css("border", "1px solid #ddd");
            $(this).removeClass("selected");
            var index = del_repos.indexOf($(this).data('repo_name'));
            del_repos.splice(index, 1);
        }
        else {
            del_repos.push($(this).data('repo_name'));
            $(this).addClass("selected");
            $(this).css("border", "2px solid red");
        }

    });

    $("#del_proj").click(function(){
    	console.log(git_username);
    	console.log(del_repos);
        if(git_username == '' || git_username == null) {
            alert("Please select a user!");
            return;
        }
        if(del_repos.length==0){
            alert("Please select a project to delete");
            return;
        }
        $.ajax({
            type:"POST",
            url: '/gitmanage/del_invite',
            data: {git_username: git_username, del_repos: del_repos},
            dataType: "json",
            success: function(resp) {
                var flag = 0;   
                $(".uproject").html("");                     
                for ( i = 0 ; i < resp.length; i++){
                    if(resp[i].git_username == git_username){
                        if (flag == 0) $(".uproject").html("<li class='list-group-item alloc' data-repo_name = "+resp[i].repository+">"+resp[i].repository+"</li>");
                        else $(".uproject").append("<li class='list-group-item alloc'  data-repo_name =  "+resp[i].repository+">"+resp[i].repository+"</li>");
                        flag = 1;
                    }
                }
            }
        })
    });
});
</script>
<div class="row clearfix">
  <div class="col-sm-6"></div>
  <div class="col-sm-6"></div>
</div> 
    
  <div class="row clearfix">
    <div class="col-lg-4 col-md-4">
        <div class="card">
            <div class="header">
                <h2>
                    Users
                </h2>
            </div>
            <div class="body">
                <table id = 'DataTables_Table_1' class="table table-bordered table-striped table-hover dataTable">
                    <thead>
                    <tr>
                        <th>USER</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>USER</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($users as $user)
                        @if ($user->type == '2')
                            <tr>
                                <td class="list-group-item user-group" data-gitname="{{$user->github_id}}">
                                    <div>
                                        <img class="users-circle" src="{{\App\Http\Controllers\HelperController::getAvatar($user->slack_user_id, $user->workspace_id)}}" width="50" height="50" />
                                        {{ $user->workspace_id }}&nbsp;&nbsp;&nbsp;&nbsp;{{ $user->username }} </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
     <!-- Button Items -->
    <div class="col-lg-4 col-md-4">
        <div class="card">
            <div class="header">
                <h2>
                    Repositories
                </h2>
                <button type="button" id="shift_proj" class="btn btn-primary waves-effect" style="position: absolute; right: 100px; top: 15px;">Add</button>
                <button type="button" class="btn btn-danger waves-effect" id="del_proj" style="position: absolute;right:15px;top:15px">Delete
                </button>
            </div>
            <div class="body">
                <ul class="list-group uproject">
                    <!-- <li class="list-group-item" style = "background-color: #f9f9f9;">No data available in table</li> -->
                </ul>
            </div>
        </div>
    </div>

   <!--  <a class="col-lg-1 col-md-1" style="width:5%;margin-left:-30px;padding:60px 30px; cursor: pointer;" id="shift_proj">
        <i class="large material-icons" style="zoom:2">arrow_back</i>
    </a> -->
    <div class="col-lg-4 col-md-4">
        <div class="card">
            <div class="header">
                <h2>
                    All Repositories
                    <a href="{{ url('gitmanage/updateinfo') }}" class="btn btn-info waves-effect" style="right: -250px;">
                        Update Repository
                    </a>
                </h2>
            </div> 
            <div class="body">
                <div class="table-responsive">
                    <table id = 'DataTables_Table_0' class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead> 
                            <tr>
                                <th>REPOSITORY</th>


                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($repos as $repo)
                            <tr>
                                <td class="projects-group" data-reposname = "{{ $repo['name'] }}">
                                    {{ $repo['name'] }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>REPOSITORY</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    
  </div>
    
@endsection