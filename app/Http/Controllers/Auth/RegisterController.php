<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\LozCart;
use App\Models\Admin\AdditionalSetting;
use App\Models\Admin\Country;
use App\Models\Admin\CountryStore;
use App\Models\Admin\Admin;
use App\Models\Admin\DesignSorting;
use App\Models\Admin\Market;
use App\Models\Admin\Page;
use App\Models\Admin\Permissions;
use App\Models\Admin\TraderPlan;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'owner_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:traders'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }
    public function showRegistrationForm()
    {
        $countries=Country::all();
        return view('auth.register',compact('countries'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create_role($id){
        $permissions = Permissions::where(['type'=>'Market'])->pluck('id')->toArray();
//        return $permissions;
        $permissions_accountant=[63];
        $permissions_follow_orders_official=[27,28,29,30,34];
        $permissions_data_entry=[19,20,21,22,23,24,25,26,40,41,42,43,44,45,46,47,48,49];
        $permissions_digital_marketing_officer=[50,51,52,53,63];
        $data=[
            [
                'name'=>'Admin','ar_name'=>'مدير','type'=>'Market',
                'market_id'=>$id,'guard_name'=>'web','permissions'=>$permissions
            ],
            [
                'name'=>'Accountant','ar_name'=>'محاسب','type'=>'Market',
                'market_id'=>$id,'guard_name'=>'web','permissions'=>$permissions_accountant
            ],
            [
                'name'=>'Follow Orders Official','ar_name'=>'مسؤول متابعة الطلبات','type'=>'Market',
                'market_id'=>$id,'guard_name'=>'web','permissions'=>$permissions_follow_orders_official
            ],
            [
                'name'=>'Data Entry','ar_name'=>'مدخل البيانات','type'=>'Market',
                'market_id'=>$id,'guard_name'=>'web','permissions'=>$permissions_data_entry
            ],
            [
                'name'=>'Digital Marketing Officer','ar_name'=>'مسؤول تسويق رقمي','type'=>'Market',
                'market_id'=>$id,'guard_name'=>'web','permissions'=>$permissions_digital_marketing_officer
            ],
        ];
        $desc_ar='<p class="MsoNormal" dir="RTL" style="margin: 0cm; font-size: 12pt; font-family: Calibri, sans-serif; direction: rtl; unicode-bidi: embed;"><span lang="AR-SA" style="font-family: Arial, sans-serif;"><o:p>&nbsp;</o:p></span><span style="font-family: SSTArabic-Roman, sans-serif; font-size: 12pt;">تتم عملية الإسترجاع والإستبدال بسهولة كبيرة من خلالنا لأننا نعمل بكافة الوسائل على راحة جميع المستخدمين وتقديم تجربة ممتازة ومتتعة لهم.</span></p><p class="MsoNormal" dir="RTL" style="margin: 0cm 0cm 6pt; font-size: 12pt; font-family: Calibri, sans-serif; line-height: 15.75pt; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-family: SSTArabic-Roman, sans-serif;">أ- وللعميل الحق في طلب استبدال وإسترجاع المنتجات أو السلع التي اشتراها من التجار في بعض الحالات مثل:-</span><span lang="AR-SA" style="font-family: SSTArabic-Roman, sans-serif;"><o:p></o:p></span></p><p class="MsoNormal" dir="RTL" style="margin: 0cm 0cm 6pt; font-size: 12pt; font-family: Calibri, sans-serif; line-height: 15.75pt; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-family: SSTArabic-Roman, sans-serif;">1- إذا استلمت منتج أو سلعة خاطئة أو السلعة مخالفة للوصف الذي ذكره التاجر بمتجرنا.</span><span lang="AR-SA" style="font-family: SSTArabic-Roman, sans-serif;"><o:p></o:p></span></p><p class="MsoNormal" dir="RTL" style="margin: 0cm 0cm 6pt; font-size: 12pt; font-family: Calibri, sans-serif; line-height: 15.75pt; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-family: SSTArabic-Roman, sans-serif;">2- إذا استلمت منتج تالف أو مقلد أو يحمل بيانات علامة تجارية مقلدة.</span><span lang="AR-SA" style="font-family: SSTArabic-Roman, sans-serif;"><o:p></o:p></span></p><p class="MsoNormal" dir="RTL" style="margin: 0cm 0cm 6pt; font-size: 12pt; font-family: Calibri, sans-serif; line-height: 15.75pt; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-family: SSTArabic-Roman, sans-serif;">3- إذا وجدت أن المنتج أو السلعة المشتراه ليست بالمقاس أو الوزن المدون عليها.</span><span lang="AR-SA" style="font-family: SSTArabic-Roman, sans-serif;"><o:p></o:p></span></p><p class="MsoNormal" dir="RTL" style="margin: 0cm 0cm 6pt; font-size: 12pt; font-family: Calibri, sans-serif; line-height: 15.75pt; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-family: SSTArabic-Roman, sans-serif;">4- إذا وجدت عيب في جودة صناعة المنتج المشترى.</span><span lang="AR-SA" style="font-family: SSTArabic-Roman, sans-serif;"><o:p></o:p></span></p><p class="MsoNormal" dir="RTL" style="margin: 0cm 0cm 6pt; font-size: 12pt; font-family: Calibri, sans-serif; line-height: 15.75pt; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-family: SSTArabic-Roman, sans-serif;">5- إذا كانت المنتجات أو السلع مخالفة للمواصفات القياسية السعودية.</span><span lang="AR-SA" style="font-family: SSTArabic-Roman, sans-serif;"><o:p></o:p></span></p><p class="MsoNormal" dir="RTL" style="margin: 0cm 0cm 6pt; font-size: 12pt; font-family: Calibri, sans-serif; line-height: 15.75pt; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-family: SSTArabic-Roman, sans-serif;">6- في حالة عدم إحتياجك للمنتج المشترى و يتم عمل إسترجاع للسلعة أو المنتج المشترى في خلال 3 أيام من وقت الشراء.</span><span lang="AR-SA" style="font-family: SSTArabic-Roman, sans-serif;"><o:p></o:p></span></p><p class="MsoNormal" dir="RTL" style="margin: 0cm; font-size: 12pt; font-family: Calibri, sans-serif; direction: rtl; unicode-bidi: embed;"><span lang="AR-SA" style="font-family: Arial, sans-serif;"><o:p>&nbsp;</o:p></span></p>';
        $role_id=0;
        foreach ($data as $item){
            $role_permissions=$item['permissions'];
            unset($item['permissions']);
            $role = Role::create($item);
            if ($role_id ==0){
                $role_id=$role->id;
            }
            $role->syncPermissions($role_permissions);
        }


        $user=Market::query()->where('id',$id)->first();
        $user->assignRole($role_id);
//    return  $data;
        $pages=[
            [
                'title'=>'Terms of Service','title_ar'=>'شروط الخدمة',
                'link'=>'شروط-الخدمة',
                'trader_id'=>$id,
                'desc_ar'=>$desc_ar,'desc_en'=>$desc_ar
            ],
            [
                'title'=>'Privacy policy','title_ar'=>'سياسة الخصوصية',
                'link'=>'سياسة-الخصوصية',
                'trader_id'=>$id,
                'desc_ar'=>$desc_ar,'desc_en'=>$desc_ar
            ],
            [
                'title'=>'Return Policy','title_ar'=>'سياسة الإرجاع',
                'link'=>'سياسة-الإرجاع',
                'trader_id'=>$id,
                'desc_ar'=>$desc_ar,'desc_en'=>$desc_ar
            ],
            [
                'title'=>'Shipping Policy','title_ar'=>'سياسة الشحن',
                'link'=>'سياسة-الشحن',
                'trader_id'=>$id,
                'desc_ar'=>$desc_ar,'desc_en'=>$desc_ar
            ],
        ];
        foreach ($pages as $page){
            Page::query()->create([
                'title_ar'=>$page['title_ar'],
                'title_en'=>$page['title'],
                'trader_id' => $page['trader_id'],
                'desc_ar'=>$page['desc_ar'],
                'desc_en'=>$page['desc_en'],
                'link'=>$page['link'],
            ]);
        }

        AdditionalSetting::query()->create([
            'trader_id'=>$id,
        ]);
        CountryStore::query()->create([
            'trader_id'=>$id,
            'country_id'=>$user->country_id,
            'is_main'=>1,
        ]);
       $plan= TraderPlan::query()->create([
            'trader_id'=>$id,
            'plan_id'=>4,
            'end_date'=>Carbon::today()->addDays(14)->toDateString(),
           'type' => '3',
           'status' => '1',
           'amount' => '0',
        ]);
        DesignSorting::query()->create([
            'trader_id'=>$id,
            'ids'=>'[]'
        ]);
        $user->update([
            'plan_id'=>$plan->id,
            'trader_id'=>$user->id,
        ]);
        $email=$user->email;
        Mail::to($email)->send(new LozCart($user));
    }
    protected function create(array $data)
    {
//        dd($data);
        DB::beginTransaction();
        try {
            $market=  Market::create([
                'owner_name' => $data['owner_name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'country_id' => $data['country_id'],
                'link' => $data['user_name'],
                'market_name' => $data['market_name'],
                'market_name_ar' => $data['market_name_ar'],
                'have_trade' => $data['have_trade'],
                'registration_source' => $data['registration_source'],
                'password' => Hash::make($data['password']),
                'type' => 'Admin',
            ]);
            $this->create_role($market->id);
            DB::commit();
        }
        catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        };
        return $market;
    }
}
