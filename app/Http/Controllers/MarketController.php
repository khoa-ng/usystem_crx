<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Market;
use DB;
use Carbon\Carbon;
use App\ResourceManagement;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check user role
         // User role
         $user = Auth::user(); 
        
         if(!$user)
                return redirect()->intended('/login');
    
        $status_list = array('all', 'exist', 'done');
        $running_list = array('all', 'run', 'running');
        $markets = market::get();

        foreach ($markets as $key => $market) {
            // GET TODAY DATE
            $date_today = Carbon::today();
            $date_bid = $date_today->copy();
            // GET MARKET TABLE DATE
            $date_market = Carbon::parse($market->date);
            // CHECK IF DAY(BID_DATE) EXIST IN MONTH (IF NOT SET THE LAST DAY OF MONTH)
            $max_day = cal_days_in_month(CAL_GREGORIAN, $date_bid->month, $date_bid->year);
            $date_bid->day = $market->bid_date <= $max_day ? $market->bid_date : $max_day;
            
            // UPDATE CORRECTED BID_DATE
            market::where('id', $market->id)->update(['bid_date' => $date_bid->day]);
            $market->bid_date = $date_bid->day;

            // FORMULAR STARTS
            $date_bid_this_month = $date_bid;

            if ($market->bid_date >= $date_today->day) {
				$date_bid_this_month = $date_bid;
			} else {
				$date_bid_this_month = $date_bid->addMonths(1);
			}
            // FOMULAR ENDS
            $date_diff = $date_bid_this_month->diffInDays($date_market);
/*
            // DIFFINDAYS ALWAYS RETURNS > 0, SO IF TODAY DATE > BID_DATE DATE_DIFF = -DATE_DIFF
            if ($date_today->gt($date_bid_this_month)) {
                $date_diff = -$date_diff;
            }
*/            // FORMULA FOR CALCULATING DONE OR EXIST STATUS
            $market->status = $date_diff < 30 ? 'done' : 'exist';
        }

        return view('market/index', [
            'markets' => $markets,  
            'status_list' => $status_list,
            'running_list' => $running_list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('market/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        market::create([
            'date' => $request['date'],
            'country' => $request['country'],
            'upwork_password' => $request['upwork_password'],
            'email_password' => $request['email_password'],
            'email' => $request['email'] , 
            'proxy'             => $request['proxy'] , 
            'rising_talent'     => $request['rising_talent'] , 
            'test'              => $request['test'] , 
            'bid_date'          => $request['bid_date'] , 
            'lancer_type'       => $request['lancer_type'] , 
            'security_question' => $request['security_question'] , 
            'security_answer'   => $request['security_answer'] ,
            'utc'               => $request['utc'] ,
            'proxy_port'        => $request['proxy_port'] ,
            'series'            => $request['series']   
        ]);

        return redirect()->intended('/market');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ResourceManagement  $resourcesManagement
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceManagement $resourcesManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResourceManagement  $resourcesManagement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user(); 
        
         if(!$user)
                return redirect()->intended('/login'); 

        $market = market::find($id);
        // Redirect to user list if updating user wasn't existed
        if ($market == null || $market->count() == 0) {
            return redirect()->intended('/market');
        }

        return view('market/edit', ['market' => $market]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResourceManagement  $resourcesManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        market::findOrFail($id);
        $input = [
            'date' => $request['date'],
            'country' => $request['country'],
            'upwork_password' => $request['upwork_password'],
            'email_password' => $request['email_password'],
            'email' => $request['email'] , 
            'proxy' => $request['proxy'] , 
            'rising_talent' => $request['rising_talent'] , 
            'test' => $request['test'] , 
            'bid_date' => $request['bid_date'] , 
            'lancer_type' => $request['lancer_type'] , 
            'security_question' => $request['security_question'] , 
            'security_answer' => $request['security_answer'] ,
            'series' => $request['series'] ,
            'utc' => $request['utc'] ,
            'proxy_port' => $request['proxy_port'] 
        ]; 

        market::where('id', $id)
            ->update($input);

        return redirect()->intended('/market');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResourceManagement  $resourcesManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        market::where('id', $id)->delete();
        return redirect()->intended('/market');
    }

    public function toggleStatus(Request $request) {
        $date_today = Carbon::today();
        market::where('id', $request['id'])->update(['date' => $date_today]);
        return redirect()->intended('/market');
    }

    // public function doneStatus(Request $request) {
    //     $date_today = Carbon::today();

    //     market::where('id', $request['id'])->update(['status' => 'done']);
    //     market::where('id', $request['id'])->update(['date' => $date_today]);
    //     //echo $date_today;
    //     return redirect()->intended('/market');
    // }

    public function toggleRunState(Request $request) {
        $date_today = Carbon::today();

        market::where('id', $request['id'])->update(['running' => 1]);

        return redirect()->intended('/market');
    }

    public function markasseen(Request $request) 
    {
        header("Access-Control-Allow-Origin: *");
        DB::table('email_content')
        ->where('isort_id', $request->isort_id)
        ->update(['read_flag' => 1]);

        return response()->json(null);
    }

    public function toggleRunningState(Request $request) {
        $date_today = Carbon::today();

        market::where('id', $request['id'])->update(['running' => 0]);

        return redirect()->intended('/market');
    }

    public function getProfile(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
  
        if( $request['proxy_ip'] )
        {
            $result = market::select('email' , 'upwork_password' , 'country' , 'bid_date' , 'proxy' , 'utc')
                ->where([
                    ['proxy','=', $request['proxy_ip'] ]
                ])->get();
            if( count( $result ) > 0 )
                return response()->json($result[0]);
        }
        return response()->json(null);
    }

    public function getTestForProfile(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
  
        if( $request['ip'] )
        {
            $result = market::select('id','test')
                ->where([
                    [ 'proxy', '=', $request['ip']]
                ])->first();
            if( $result )
                return response()->json($result);
            
        }
        return response()->json('NOT_FOUND');
    }



    public function getEmailStatus(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
  
        $total_emails = DB::table('email_signin_log' )->select('email' , DB::raw('count(*) as record_cnt'))->groupBy('email')->get();
        $failed_email = [];

        foreach( $total_emails as $fmail  )
        {
            if( $fmail->record_cnt > 1 )
            {
                array_push ( $failed_email , $fmail );
            }
        }
        $new_emails = DB::table('email_content')->select('isort_id' , 'subject' , 'to' , 'from')->where( [ [ 'subject' , 'like' , '%You have unread messages%' ]  , [ 'read_flag' , '0' ] ])->get();
        
        return response()->json( [ 'failed_email' =>$failed_email , 'new_emails' => $new_emails ] );
    }


    public function checkEmail(Request $request)
    {
        header("Access-Control-Allow-Origin: *"); 
        if( $request['id']  )
        {
            $email = DB::table('email_content')->select('contentHtml' , 'subject' , 'to')->where('isort_id' , $request['id'] )->get();
            if($email->count()>0)
            {
                $email = $email[0];
                $market = DB::table('market')->select('country' , 'date' )->where( 'email' , $email->to )->get()[0];

                
                echo "<center><br><br><br></center>";
                echo "<h2 style='text-align:center'>".$email->to."</h2>";
                echo "<h4 style='text-align:center'>".$market->country." (".$market->date.") </h4><br>";
                echo "<div>".$email->contentHtml."</div>";
            }
            die("end");
        }
        return response()->json([]);
    }

    public function AddTestForProfile(Request $request)
    {
        header("Access-Control-Allow-Origin: *"); 
  
        if( $request['test_number'] && $request['id']  )
        {
            $t = market::find( $request['id'] );
            $t->test = $t->test ? $t->test.",".$request['test_number'] : $request['test_number'];
            $t->save();
            return response()->json('SUCCESS');
            
        }
        return response()->json('ERROR');
    }
}
