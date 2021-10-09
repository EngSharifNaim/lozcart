<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bank;
use App\Models\Admin\BankAccount;
use App\Models\Admin\Country;
use App\Models\Admin\LozCartPayment;
use App\Models\Admin\Market;
use App\Models\Admin\Order;
use App\Models\Admin\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class PaymentController extends Controller
{
    public function index($id=null){
        if ($id!=null){
            $market_now=Market::query()->where(['type'=>'Admin','trader_id'=>Auth::user()->trader_id ])
                ->first();
            $market=Market::query()->where('id',$market_now->id)->first();
            $notification= $market->notifications()->findOrFail($id);
            $notification->markAsRead();
        }
        $countries=Country::all();

        $paypal=Payment::query()->where(['trader_id'=>Auth::id(),'name'=>'PayPal'])
            ->with('order_paypal')->first();
//        return $paypal;
        $lozCart=Payment::query()->where(['trader_id'=>Auth::id(),'name'=>'LozCart Payments'])
            ->with(['order_lozCart','application'])->first();
//        return$lozCart;
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting','country','trader_plan'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.settings.payments.index',compact('countries',
            'language','paypal','lozCart','market'));

//        return view('dashboard.settings.payments.index');


    }
    public function get_bank_accounts(Request $request){
        ## Read value
//        return $status;
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = BankAccount::query()->where('trader_id',Auth::id())->select('count(*) as allcount')->count();
        $totalRecordswithFilter = BankAccount::query()->where('trader_id',Auth::id())->select('count(*) as allcount')
            ->where('account_no', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = BankAccount::query()->where('trader_id',Auth::id())->with(['bank','country'])->orderBy($columnName,$columnSortOrder)
            ->where('bank_accounts.account_no', 'like', '%' .$searchValue . '%')
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
//return $records;
        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "account_no" => $record->account_no,
                "name" => $record->name,
                "name_ar" => $record->name_ar,
                "country" => $record->country,
                "bank" => $record->bank,
                "iban" => $record->iban,
                "number_transfers" => 0,
                "status" => $record->status,

            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
    public function get_payment_method(Request $request){
        ## Read value
//        return $status;
//        return $request->all();
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
//        return $searchValue;
        // Total records
        $totalRecords = Payment::query()->where(['trader_id'=>Auth::id(),'type'=>5])->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Payment::query()
            ->where(['trader_id'=>Auth::id(),'type'=>5])

            ->where(['trader_id'=>Auth::id(),['name', 'like', '%' .$searchValue . '%']])
            ->orWhere(['trader_id'=>Auth::id(),['name_ar', 'like', '%' .$searchValue . '%']])
            ->whereIn('type',[5])
//            ->where('type',5)
//            ->orWhere(['trader_id'=>Auth::id(),['name', 'like', '%' .$searchValue . '%'],'type'=>5])
            ->count();
//return$totalRecordswithFilter;
        // Fetch records
        $records = Payment::query()->where(['trader_id'=>Auth::id(),'type'=>5])->with(['orders'])->orderBy($columnName,$columnSortOrder)
//            ->where(['trader_id'=>Auth::id(),'type'=>5,['payments.name', 'like', '%' .$searchValue . '%']])
//            ->where(['trader_id'=>Auth::id(),['name', 'like', '%' .$searchValue . '%']])
//            ->orWhere(['trader_id'=>Auth::id(),['name_ar', 'like', '%' .$searchValue . '%']])
//            ->whereIn('type',[5])
                ->where(['trader_id'=>Auth::id(),'type'=>5])

                ->where(function($q) use ($searchValue){
                    $q->where('name', 'like', '%' .$searchValue . '%')
                        ->orWhere('name_ar', 'like', '%' .$searchValue . '%');
                })
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();
//        return $records;

        $data_arr = array();
//return $records;
        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "name_ar" => $record->name_ar,
                "name" => $record->name,
                "status" => $record->status,
                "order_count" => $record->orders->count(),

            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
    public function get_banks(Request $request)
    {
        $code=Country::query()->find($request->country_id)->short_name;

            $banks = Bank::query()->where('country_id',$request->country_id)->get();

        return response()->json(['banks'=>$banks,'code'=>$code]);
    }
    public function store(Request $request)
    {
//        return $request->all();

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'country_id' => 'required',
            'bank_id' => 'required',
            'account_no' => 'required',
            'iban' => 'required',
            'details_ar' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            $code=Country::query()->find($request->country_id)->short_name;
            $data=$request->all();
            $data['iban']=$code.$request->iban;
            $data['trader_id']=Auth::id();
           BankAccount::query()->create($data);
           $bank=Bank::query()->where('id',$request->bank_id)->first();
            $dataBank['name_ar']=$bank->name_ar;
            $dataBank['name']=$bank->name;
            $dataBank['type']=4;
            $dataBank['status']=1;
            $dataBank['trader_id']=Auth::id();
            Payment::query()->create($dataBank);
            return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);
            ;


        }

    }
    public function addPayment(Request $request)
    {
//        return $request->all();

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'details_ar' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            $data=$request->all();
            $data['type']=5;
            $data['status']=1;
            $data['trader_id']=Auth::id();
           Payment::query()->create($data);
            return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);
            ;


        }

    }
    public function lozCart(Request $request)
    {
//        return $request->all();

        $validator = Validator::make($request->all(), [
            'account_no' => 'required',
            'business_name' => 'required',
//            'business_registration_no' => 'required',
            'business_type' => 'required',
            'city' => 'required',
            'mobile' => 'required',
            'country_id' => 'required',
            'country' => 'required',
            'description_product' => 'required',
            'dob' => 'required',
            'f_name' => 'required',
//            'identity_photo_b' => 'required',
            'identity_photo_f' => 'required',
            'identity_type' => 'required',
            'national_number' => 'required',
            'nickname' => 'required',
            'postal_code' => 'required',
            'product_type' => 'required',
            'routing_no' => 'required',
            'street_address' => 'required',
            'address_verification_type' => 'required',
            'address_verification_photo_f' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            $data=$request->all();
            DB::beginTransaction();
            try {
            if ($request->hasfile('identity_photo_f') ) {
                $identity_photo_f = $request->file('identity_photo_f');
                $image_name_identity_photo_f = Uuid::uuid4().'.' .$identity_photo_f->getClientOriginalExtension();
                $identity_photo_f->move(public_path('uploads/identity/'), $image_name_identity_photo_f);
                $data['identity_photo_f']=$image_name_identity_photo_f;
            }
            if ($request->hasfile('identity_photo_b') ) {
                $identity_photo_b = $request->file('identity_photo_b');
                $image_name_identity_photo_b = Uuid::uuid4().'.' .$identity_photo_b->getClientOriginalExtension();
                $identity_photo_b->move(public_path('uploads/identity/'), $image_name_identity_photo_b);
                $data['identity_photo_b']=$image_name_identity_photo_b;
            }
                if ($request->hasfile('address_verification_photo_f') ) {
                    $address_verification_photo_f = $request->file('address_verification_photo_f');
                    $image_name_address_verification_photo_f = Uuid::uuid4().'.' .$address_verification_photo_f->getClientOriginalExtension();
                    $address_verification_photo_f->move(public_path('uploads/identity/'), $image_name_address_verification_photo_f);
                    $data['address_verification_photo_f']=$image_name_address_verification_photo_f;
                }
            $data['trader_id']=Auth::id();
            LozCartPayment::query()->create($data);
            Payment::query()->create([
                'name'=>'LozCart Payments',
                'name_ar'=>'LozCart Payments',
                'status'=>2,
                'logo'=>'logo.png',
                'trader_id'=>Auth::id(),
                'type'=>'2',
            ]);
                DB::commit();
                return response()->json([
                    'massage_ar'=>"تمت العملية بنجاح ",
                    'massage_en'=>"The process has successfully",
                    'status'=>1,
                ]);

            } catch (\Throwable $e){
                DB::rollBack();
                throw $e;
            }
        }

    }
    public function lozCartUpdate(Request $request)
    {
//        return $request->all();
        $LozCartPayment=LozCartPayment::query()->where('trader_id',Auth::id())->first();
        $validator = Validator::make($request->all(), [
            'account_no' => 'required',
            'business_name' => 'required',
//            'business_registration_no' => 'required',
            'business_type' => 'required',
            'city' => 'required',
            'mobile' => 'required',
            'country_id' => 'required',
            'country' => 'required',
            'description_product' => 'required',
            'dob' => 'required',
            'f_name' => 'required',
//            'identity_photo_b' => 'required',
//            'identity_photo_f' => 'required',
            'identity_type' => 'required',
            'national_number' => 'required',
            'nickname' => 'required',
            'postal_code' => 'required',
            'product_type' => 'required',
            'routing_no' => 'required',
            'street_address' => 'required',
            'address_verification_type' => 'required',
//            'address_verification_photo_f' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            $data=$request->all();
            DB::beginTransaction();
            try {
            if ($request->hasfile('identity_photo_f') ) {
                $identity_photo_f = $request->file('identity_photo_f');
                $image_name_identity_photo_f = Uuid::uuid4().'.' .$identity_photo_f->getClientOriginalExtension();
                $identity_photo_f->move(public_path('uploads/identity/'), $image_name_identity_photo_f);
                $data['identity_photo_f']=$image_name_identity_photo_f;
            }
            if ($request->hasfile('identity_photo_b') ) {
                $identity_photo_b = $request->file('identity_photo_b');
                $image_name_identity_photo_b = Uuid::uuid4().'.' .$identity_photo_b->getClientOriginalExtension();
                $identity_photo_b->move(public_path('uploads/identity/'), $image_name_identity_photo_b);
                $data['identity_photo_b']=$image_name_identity_photo_b;
            }
                if ($request->hasfile('address_verification_photo_f') ) {
                    $address_verification_photo_f = $request->file('address_verification_photo_f');
                    $image_name_address_verification_photo_f = Uuid::uuid4().'.' .$address_verification_photo_f->getClientOriginalExtension();
                    $address_verification_photo_f->move(public_path('uploads/identity/'), $image_name_address_verification_photo_f);
                    $data['address_verification_photo_f']=$image_name_address_verification_photo_f;
                }
            $data['trader_id']=Auth::id();
                $LozCartPayment->update($data);
//            Payment::query()->create([
//                'name'=>'LozCart Payments',
//                'name_ar'=>'LozCart Payments',
//                'status'=>2,
//                'logo'=>'logo.png',
//                'trader_id'=>Auth::id(),
//                'type'=>'2',
//            ]);
                DB::commit();
                return response()->json([
                    'massage_ar'=>"تمت العملية بنجاح ",
                    'massage_en'=>"The process has successfully",
                    'status'=>1,
                ]);

            } catch (\Throwable $e){
                DB::rollBack();
                throw $e;
            }
        }

    }
    public function deactivate_lozCart(Request $request)
    {
//        return $request->all();

        Payment::query()->updateOrCreate([
            'trader_id'=>Auth::id(),
            'type'=>'2',
        ],[
            'status'=>0,

        ]);
        return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);
        ;


    }
    public function activeLozCart(Request $request)
    {
//        return $request->all();

        Payment::query()->updateOrCreate([
            'trader_id'=>Auth::id(),
            'type'=>'2',
        ],[
            'status'=>1,

        ]);
        return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);
        ;


    }
    public function payPal(Request $request)
    {
//        return $request->all();

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'client_id' => 'required',
            'secret_id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
           Payment::query()->updateOrCreate([
               'trader_id'=>Auth::id(),
               'type'=>'1',
           ],[
               'name'=>'PayPal',
               'name_ar'=>'باي بال',
               'status'=>1,
               'logo'=>'paypal.webp',
               'email'=>$request->email,
               'secret_id'=>$request->secret_id,
               'client_id'=>$request->client_id,

           ]);
            return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);
            ;


        }

    }

    public function deactivate_payPal(Request $request)
    {
//        return $request->all();

           Payment::query()->updateOrCreate([
               'trader_id'=>Auth::id(),
               'type'=>'1',
           ],[
               'status'=>0,

           ]);
            return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);
            ;


    }
    public function status(Request $request,$id){
        $bank_account=  BankAccount::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);

        $bank_account->update($data);

        if ($validator->passes()) {
            return response()->json(['massage_ar'=>"تم تحديث الحالة ",'massage_en'=>"Status has been updated"]);
        }

    }
    public function status_payPal(Request $request,$id){
        $payment=  Payment::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);

        $payment->update($data);

        if ($validator->passes()) {

            return response()->json(['massage_ar'=>"تم تحديث الحالة ",'massage_en'=>"Status has been updated"]);
        }

    }
    public function status_LozCart(Request $request,$id){
        $payment=  Payment::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);

        $payment->update($data);

        if ($validator->passes()) {

            return response()->json(['massage_ar'=>"تم تحديث الحالة ",'massage_en'=>"Status has been updated"]);
        }

    }
    public function status_payment(Request $request,$id){
        $payment=  Payment::find($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response(["responseJSON" => $errors, "message" => 'هناك خطاء يرجى ملى جميع الحقول '], 422);
        }
        $data = $request->all();
        unset($data['_token']);

        $payment->update($data);

        if ($validator->passes()) {

            return response()->json(['massage_ar'=>"تم تحديث الحالة ",'massage_en'=>"Status has been updated"]);
        }

    }
    public function edit($id){
        $bank_account=BankAccount::query()->findOrFail($id);
        $countries=Country::all();
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
        return view('dashboard.settings.payments.edit',compact('bank_account','countries','language'));

    }
    public function update(Request $request,$id)
    {
        $bank_account=BankAccount::query()->find($id);

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'country_id' => 'required',
            'bank_id' => 'required',
            'account_no' => 'required',
            'iban' => 'required',
            'details_ar' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            $code=Country::query()->find($request->country_id)->short_name;
            $data=$request->all();
            $data['iban']=$code.$request->iban;
            $bank_account->update($data);
            return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);
            ;


        }

    }
    public function payment_edit($id){
        $payment_methode=Payment::query()->findOrFail($id);
        $market=Market::query()->where('id',Auth::id())->with(['additional_setting'])->first();
        if ($market->additional_setting)
            $market->additional_setting->lang=json_decode($market->additional_setting->lang,true);
        $language=$market->additional_setting->lang;
//        return $payment;
        return view('dashboard.settings.payments.method_edit',compact('payment_methode','language'));

    }
    public function payment_update(Request $request,$id)
    {
        $payment=Payment::query()->find($id);

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'details_ar' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $input=$request->all();
            return response(["responseJSON" => $errors,"input"=>$input, "message" => 'يرجي التأكد من صحة البيانات وملئ جميع الحقول'], 422);
        }
        if ($validator->passes()) {
            $data=$request->all();

            $payment->update($data);
            return response()->json(['massage_ar'=>"تمت العملية بنجاح ",'massage_en'=>"The process has successfully"]);



        }

    }

    public function delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        $bank_accounts= BankAccount::query()->whereIn('id',explode(",",$ids))->get();

        foreach ($bank_accounts as $bank_account){
            $bank_account->delete();
        }
        $arr = array('massage_ar' => "تم حذف الحسابات المحددة",'massage_en' => "Has been deleted", 'status' => true);

        return Response()->json($arr);

    }
    public function delete($id)
    {
        $bank_account =BankAccount::find($id);
        $bank_account->delete();
        $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        if($bank_account){
            $arr = array('massage_ar' => "تم الحذف",'massage_en' => "Has been deleted", 'status' => true);

        }
        return Response()->json($arr);

    }
    public function payment_delete_all(Request $request)
    {
        $ids = $request->ids;
//        return $ids;
        $payments= Payment::query()->whereIn('id',explode(",",$ids))->get();

        foreach ($payments as $payment){
            $payment->delete();
        }
        $arr = array('massage_ar' => "تم حذف الحسابات المحددة",'massage_en' => "Has been deleted", 'status' => true);

        return Response()->json($arr);

    }
    public function payment_delete($id)
    {
        $payment =Payment::find($id);
        $payment->delete();
        $arr = array('msg' => 'هناك بعض الاخطاء حاول مرة اخرى', 'status' => false);
        if($payment){
            $arr = array('massage_ar' => "تم الحذف",'massage_en' => "Has been deleted", 'status' => true);

        }
        return Response()->json($arr);

    }
    public function orders($payment_id){
//        $orders=Order::query()->where('trader_id',Auth::id());


        return view('dashboard.settings.payments.orders',compact('payment_id'));
    }
    public function get_orders(Request $request,$payment_id){
        ## Read value
//        return $status;
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Order::query()->where(['trader_id'=>Auth::id(),'payment_id'=>$payment_id])->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Order::query()->where(['trader_id'=>Auth::id(),'payment_id'=>$payment_id])->select('count(*) as allcount')
            ->where('order_no', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Order::query()->where(['trader_id'=>Auth::id(),'payment_id'=>$payment_id])->with(['user','order_address','payment','shipping'])->orderBy($columnName,$columnSortOrder)
            ->where('orders.order_no', 'like', '%' .$searchValue . '%')
//            ->select('name','file_no','address','mobile','age','id')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
//return $records;
        foreach($records as $record){


            $data_arr[] = array(
                "id" => $record->id,
                "order_no" => $record->order_no,
                "client_name" => $record->user->name,
                "country" => $record->order_address->country,
                "order_date" => $record->created_at->diffForHumans(),
                "payment" => $record->payment,
                "shipping" => $record->shipping,
                "total_price" => $record->total_price,
                "status" => $record->status,

            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
}
