@extends('project.base') 

@section('action-content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 body-container">
        <div class="card">
            <div class="header">
                <h2>Marketing</h2> 
            </div>
            <div class="body">
                <form class="form-horizontal" id="market" role="form" method="POST" action="{{ route('market.update', ['id' => $market->id]) }}">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ csrf_field() }} 
                    <div class="row clearfix">
                        <div class="col-md-3"> 
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line  focused">
                                    <input type="date" class="form-control focused" name="date" id="date" value="{{$market->date}}" >
                                    <label class="form-label">Date</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="country" id="country" value="{{ $market->country }}"  min="1" max="200" required>
                                    <label class="form-label">Country</label>
                                </div> 
                                <div class="help-info"> </div>
                            </div>
                        </div>
                        <div class="col-md-3"> 
                        </div>
                    </div>
                    <div class="row clearfix"> 
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $market->email }}"  min="1" max="200" required>
                                    <label class="form-label">Email</label>
                                </div> 
                                <div class="help-info"> </div>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="proxy" id="proxy" value="{{ $market->proxy }}"  min="1" max="200" >
                                    <label class="form-label">proxy</label>
                                </div> 
                                <div class="help-info"> </div>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="proxy_port" id="proxy_port" value="{{ $market->proxy_port }}"  min="1" max="200" >
                                    <label class="form-label">proxy port</label>
                                </div> 
                                <div class="help-info"> </div>
                            </div>
                        </div> 
                    </div>   
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="upwork_password" id="upwork_password" value="{{ $market->upwork_password }}"  min="1" max="200" required>
                                    <label class="form-label">Upwork Password</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="email_password" id="email_password" value="{{ $market->email_password }}"  min="1" max="200" required>
                                    <label class="form-label">Email Password</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="utc" id="utc" value="{{ $market->utc }}"  min="1" max="200" required>
                                    <label class="form-label">UTC</label>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="rising_talent" id="rising_talent" value="{{ $market->rising_talent }}"  min="1" max="200" >
                                    <label class="form-label">Rising Talent</label>
                                </div> 
                                <div class="help-info">top rate , rising talent</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="test" id="test" value="{{ $market->test }}" >
                                    <label class="form-label">Test</label>
                                </div>  
                                <div class="help-info"></div>
                            </div>
                        </div> 
                    </div>  
                    <div class="row clearfix"> 
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <input type="number" class="form-control focused" name="bid_date" id="bid_date" value="{{$market->bid_date}}" required>
                                    <!-- <input type="date" class="form-control focused" name="bid_date" id="bid_date" value="{{$market->bid_date}}" required> -->
                                    <label class="form-label">Bid Date</label>
                                </div> 
                                <div class="help-info"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lancer_type" id="lancer_type" value="{{ $market->lancer_type }}" >
                                    <label class="form-label">Freelancer Type</label>
                                </div> 
                                <div class="help-info">ex: developer , graphic designer , translator , writer ,,,</div>
                            </div>
                        </div>
                    </div>  
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="security_question" id="security_question"  value="{{ $market->security_question }}"  >
                                    <label class="form-label">Security Question</label>
                                </div>   
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="security_answer" id="security_answer"  value="{{ $market->security_answer }}"  >
                                    <label class="form-label">Security Answer</label>
                                </div>   
                            </div>
                        </div>
                    </div>  
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="series" id="series"  value="{{ $market->series }}"  >
                                    <label class="form-label">Series</label>
                                </div>   
                            </div>
                        </div> 
                    </div>  
                    <button class="btn btn-primary waves-effect" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection
 
 
