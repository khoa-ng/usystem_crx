@extends('market.base') 

@section('action-content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 body-container">
        <div class="card">
            <div class="header">
                <h2>Add new Marketing</h2>
            </div>
            <div class="body">
                <form id="market" class="form-horizontal" role="form" method="POST" action="{{ route('market.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}  
                    <div class="row clearfix">
                        <div class="col-md-3"> 
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line  focused">
                                    <input type="date" class="form-control focused" name="date" id="date" >
                                    <label class="form-label">Date</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="country" id="country" value="{{ old('country') }}"  min="1" max="200" required>
                                    <label class="form-label">Country</label>
                                </div> 
                                <div class="help-info"> Max. 200 characters</div>
                            </div>
                        </div>
                        <div class="col-md-3"> 
                        </div>
                    </div>
                    <div class="row clearfix"> 
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}"  min="1" max="200" required>
                                    <label class="form-label">Email</label>
                                </div> 
                                <div class="help-info"> </div>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="proxy" id="proxy" value="{{ old('proxy') }}"  min="1" max="200" >
                                    <label class="form-label">proxy</label>
                                </div> 
                                <div class="help-info"> </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="proxy_port" id="proxy_port" value="{{ old('proxy_port') }}"  min="1" max="200" >
                                    <label class="form-label">proxy_port</label>
                                </div> 
                                <div class="help-info"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="upwork_password" id="upwork_password" value="{{ old('upwork_password') }}"  min="1" max="200" required>
                                    <label class="form-label">Upwork Password</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="email_password" id="email_password" value="{{ old('email_password') }}"  min="1" max="200" required>
                                    <label class="form-label">Email Password</label>
                                </div>  
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="utc" id="utc" value="{{ old('utc') }}"  min="1" max="200" required>
                                    <label class="form-label">utc</label>
                                </div>  
                            </div>
                        </div>
                    </div> 
                    
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="rising_talent" id="rising_talent" value="{{ old('rising_talent') }}"  min="1" max="200" >
                                    <label class="form-label"> Talent</label>
                                </div> 
                                <div class="help-info">top rate ,  talent</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="test" id="test" value="{{ old('test') }}" >
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
                                    <input type="number" class="form-control focused" name="bid_date" id="bid_date" value="{{ old('bid_date') }}" >
                                    <!-- <input type="date" class="form-control focused" name="bid_date" id="bid_date" value="{{ old('bid_date') }}" required> -->
                                    <label class="form-label">Bid Date</label>
                                </div> 
                                <div class="help-info"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lancer_type" id="lancer_type" value="{{ old('lancer_type') }}" >
                                    <label class="form-label"> Type</label>
                                </div> 
                                <div class="help-info">ex: developer , graphic designer , translator , writer ,,,</div>
                            </div>
                        </div>
                    </div>  
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="security_question" id="security_question" >
                                    <label class="form-label">S Question</label>
                                </div>   
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="security_answer" id="security_answer" >
                                    <label class="form-label">S Answer</label>
                                </div>   
                            </div>
                        </div>
                    </div>  
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="series" id="series" >
                                    <label class="form-label">Series</label>
                                </div>   
                            </div>
                        </div> 
                    </div>  
                    <button class="btn btn-primary " type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection
 
 
