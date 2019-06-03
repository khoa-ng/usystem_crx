@extends('project.base') 

@section('action-content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 body-container">
        <div class="card">
            <div class="header">
                <h2>Add new project</h2>
            </div>
            <div class="body">
                <!-- <form id="project" class="form-horizontal" role="form" enctype="multipart/form-data"> -->
                <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="row clearfix">
                        <div class="col-md-8">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="p_name" id="p_name" value="{{ old('p_name') }}"  min="1" max="100" required>
                                    <label class="form-label">Project</label>
                                </div> 
                                <div class="help-info"> Max. 100 characters</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="p_client" id="p_client" value="{{ old('p_client') }}"  min="1" max="200" required>
                                    <label class="form-label">Client</label>
                                </div> 
                                <div class="help-info"> Max. 200 characters</div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="sky_id" id="sky_id">
                                <label class="form-label">Skyper ID</label>
                            </div>

                        </div>
                    </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="contact" id="contact" required>
                                    <label class="form-label">Contact</label>
                                </div>
                                <div class="help-info"> Contact_URL: https://www.example.com</div>

                            </div>
                        </div>
                    <div class="col-md-3 staus">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="m_name" id="m_name"  required>
                                <label class="form-label">M_name</label>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3 hots">

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" name="email" id="email" required>
                                <label class="form-label">Email</label>
                            </div>
                            <div class="help-info"> for example: www@example.com </div>
                        </div>
                    </div>
                </div>
                    <div class="row clearfix">
                        <div class="col-md-3">
                            <p>
                                <b>Level</b>
                            </p>
                            <select class="form-control show-tick" id = 'level'>
                                <option>LV1</option>
                                <option>LV2</option>
                                <option>LV3</option>
                                <option>LV4</option>
                                <option>LV5</option>
                            </select>

                        </div>
                        <div class="col-md-3 staus">
                            <p>
                                <b>Status</b>
                            </p>
                            <select class="form-control show-tick" id = "status">
                                <option>Upcoming</option>
                                <option>Live</option>
                                <option>Hold</option>
                                <option>Closed</option>
                                <option>Deleted</option>
                            </select>

                        </div>
                        <div class="col-md-3 hots">
                            <p>
                                <b>Hot</b>
                            </p>
                            <select class="form-control show-tick" id= "hot">
                                <option>Hot</option>
                                <option>Normal</option>
                                <option>Loose</option>
                            </select>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea class="form-control" name="p_name" id="pro_des"  style="height:130px;" required></textarea>
                                    <label class="form-label">Project Description</label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" id = 'create' type="submit">Create</button>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div> 

<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#create").click(function(){
            p_name = $("#p_name").val();
            p_client = $("#p_client").val();
            level = $("#level").val();
            status = $("#status").val();
            hot = $("#hot").val();
            sky_id = $("#sky_id").val();
            contact = $("#contact").val();
            m_name = $("#m_name").val();
            email = $("#email").val();
            pro_des = $("#pro_des").val();
            $.ajax({
                type: "POST",
                url: "/project/store",
                data: {p_name:p_name, p_client:p_client, level:level, status:status, hot:hot, sky_id:sky_id, contact:contact, m_name:m_name, email:email, pro_des:pro_des},
                // data: {p_name: p_name, p_client:p_client, level:level, status:status, hot:hot },
                success: function(resp){

                    if(resp.status == 'success'){
                        location.reload();
                    }else{
                        alert('ajax error');
                    }
                }
            })
        })
    });
</script>
@endsection
 
 
