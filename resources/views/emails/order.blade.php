<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        @media  only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media  only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; background-color: #ffffff; color: #718096; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">

<div>
    <div style="margin:0;padding:0;width:100%;background-color:#f2f4f6;font-family:'SST Arabic',sans-serif">

        <table width="100%" cellpadding="0" cellspacing="0" dir="rtl" align="center">
            <tbody>
            <tr>
                <td style="width:100%;margin:0;padding:0;background-color:#f2f4f6" align="center">
                    <table width="100%" cellpadding="0" cellspacing="0">


                        <tbody>
                        <tr>
                            <td style="padding:5px;text-align:center;background-color:#f2f4f6">
                                <h1 style="font-weight:normal;font-family:'SST Arabic'">تم تحديث حالة الطلب</h1>
                                <h3 style="font-family:'SST Arabic'">
                                    <strong>فاتورة رقم:</strong>
                                    <span>{{$order['order_no']}} # </span>
                                </h3>
                                <p style="direction:rtl;font-family:'SST Arabic'">
                                    <strong>{{$order['market']->market_name_ar}} </strong>
                                </p>
                                <p style="direction:rtl">
                                    <span style="font-family:'SST Arabic'"><strong>وقت الطلب: </strong></span>
                                    <span style="font-family:'SST Arabic'">{{$order['created_at']}}</span>
                                </p>
                                <p style="direction:rtl">
                                    <span style="font-family:'SST Arabic'"><strong>حالة الطلب: </strong></span>
                                    <span style="font-family:'SST Arabic'">
                                        @if ($order['status']==0)
                                            جديد
                                        @endif
                                            @if ($order['status']==1)
                                                جاري المعالجة
                                            @endif
                                            @if ($order['status']==2)
                                                جاهز للشحن
                                            @endif
                                            @if ($order['status']==3)
                                                جاري التوصيل
                                            @endif
                                            @if ($order['status']==4)
                                                تم التوصيل
                                            @endif
                                            @if ($order['status']==5)
                                                مرفوض
                                            @endif
                                    </span>
                                </p>

                            </td>
                        </tr>


                        <tr>
                            <td style="width:100%;margin:0;padding:0;border-top:1px solid #edeff2;border-bottom:1px solid #edeff2;background-color:#fff">

                                <table style="width:auto;max-width:570px;margin:0 auto;padding:0" align="center" cellpadding="0" cellspacing="0" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="width:100%;border-bottom:1px solid #edeff2;border-bottom:1px solid #edeff2;background-color:#fff;padding-bottom:5px;margin-bottom:100px" align="center">
                                            <div>
                                                <h1 style="font-weight:normal;font-family:'SST Arabic'">معلومات الدفع والشحن</h1>
                                                <table style="width:620px;max-width:620px;margin:0 auto;padding:0;margin-bottom:20px" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody><tr><td><br>
                                                        </td></tr></tbody><tbody>
                                                    <tr>
                                                        <th style="width:500px;vertical-align:top;font-size:15px;font-family:'SST Arabic'"></th>
                                                        <td style="width:480px;font-family:'SST Arabic'">
                                                            <table style="width:480px;max-width:480px;margin:0 auto;padding:0;padding-bottom:10px;font-family:'SST Arabic'" align="right" cellpadding="0" cellspacing="0" border="0">
                                                                <tbody>
                                                                <tr>
                                                                    <th align="right" style="font-size:15px;font-family:'SST Arabic'">
                                                                        الإسم :
                                                                    </th>
                                                                    <th align="right" style="font-size:15px;font-family:'SST Arabic'">
                                                                        الجوال :
                                                                    </th>
                                                                    <th align="right" style="font-size:15px;font-family:'SST Arabic'">
                                                                        الإيميل :
                                                                    </th>
                                                                </tr>
                                                                <tr>

                                                                    <td align="right" style="font-family:'SST Arabic'">
                                                                        {{$order['user']->name}}
                                                                    </td>
                                                                    <td align="right" style="font-family:'SST Arabic'">
                                                                        {{$order['user']->mobile}}
                                                                    </td>
                                                                    <td align="right" style="font-family:'SST Arabic'"><a>{{$order['user']->email}}</a>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:500px;font-family:'SST Arabic';padding:5px">
                                                            <strong style="font-size:14px">عنوان الشحن :</strong></td>
                                                        <td style="width:460px;font-family:'SST Arabic'">
                                                            {{$order['order_address']->country->name_ar}} | {{$order['order_address']->city->name_ar}} | {{$order['order_address']->details}}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td style="width:500px;font-family:'SST Arabic';padding:5px">
                                                            <strong style="font-size:14px">طريقة الشحن :</strong></td>
                                                        <td style="width:460px;font-family:'SST Arabic'">{{$order['shipping']->name_ar}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:500px;font-family:'SST Arabic';padding:5px">
                                                            <strong style="font-size:14px">طريقة الدفع :</strong></td>
                                                        <td style="width:460px;font-family:'SST Arabic'">
                                                            @if ($order['payment'])
                                                                {{$order['payment']->name_ar}}
                                                            @else
                                                            الدفع عند الإستلام
                                                                @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:100%;border-top:1px solid #edeff2;border-bottom:1px solid #edeff2;background-color:#fff;padding-top:20px" align="center">
                                            <div>
                                                <h1 style="font-weight:normal;font-family:'SST Arabic'">تفاصيل المنتجات</h1>
                                                <table style="width:570px;max-width:570px;margin:0 auto;padding:0" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <thead>
                                                    <tr><td><br>
                                                        </td></tr><tr>
                                                        <th align="right" style="font-family:'SST Arabic'">المنتج</th>
                                                        <th align="right" style="font-family:'SST Arabic'"> رقم المنتج</th>
                                                        <th align="right" style="font-family:'SST Arabic'">السعر</th>
                                                        <th align="right" style="font-family:'SST Arabic'">الكمية</th>
                                                        <th align="right" style="font-family:'SST Arabic'">الإجمالي</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($order['details'] as $item)
                                                    <tr>
                                                        <td>
                                                            <p style="font-family:'SST Arabic'">{{$item->product->name}}</p>
                                                        </td>
                                                        <td>
                                                            <small style="font-family:'SST Arabic'">{{$item->product->code}}</small>

                                                        </td>
                                                        <td style="font-family:'SST Arabic'"> {{$item->price }}
                                                            {{$order['currency']->currency_short_ar}}
                                                        </td>
                                                        <td style="font-family:'SST Arabic'"> {{$item->quantity}}</td>
                                                        <td align="left" style="font-family:'SST Arabic'"> {{$item->total_price }}
                                                            {{$order['currency']->currency_short_ar}}
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:100%;border-bottom:1px solid #edeff2;border-bottom:1px solid #edeff2;background-color:#fff;padding-bottom:5px;margin-bottom:100px" align="center">
                                            <div>
                                                <h1 style="font-weight:normal;font-family:'SST Arabic'">تفاصيل الأسعار</h1>
                                                <table style="width:570px;max-width:570px;margin:0 auto;padding:0;margin-bottom:20px;padding-bottom:10px" align="center" cellpadding="0" cellspacing="0" border="0">
                                                    <tbody>
                                                    <tr>
                                                        <td align="right" style="font-family:'SST Arabic';padding:5px">
                                                            <strong>قيمة المنتجات</strong></td>
                                                        <td align="left" style="font-family:'SST Arabic'">{{$order['price']/$order['currency_rate']}}
                                                            {{$order['currency']->currency_short_ar}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="font-family:'SST Arabic';padding:5px"><strong>
                                                                كوبون خصم
                                                            </strong></td>
                                                        <td align="left" style="font-family:'SST Arabic'">

                                                                {{$order['use_coupon'] ?$order['use_coupon']->coupon->code:'لايوجد'}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right " style="font-family:'SST Arabic';padding:5px">
                                                            <strong>التوصيل</strong></td>
                                                        <td align="left" style="font-family:'SST Arabic'"> {{$order['shipping_value']}}
                                                            {{$order['currency']->currency_short_ar}}
                                                        </td>
                                                    </tr>
{{--                                                    <tr>--}}
{{--                                                        <td align="right" style="font-family:'SST Arabic';padding:5px">--}}
{{--                                                            <strong>دفع عند التوصيل</strong></td>--}}
{{--                                                        <td align="left" style="font-family:'SST Arabic'"> 0--}}
{{--                                                            {{$order['currency']->currency_short_ar}}--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
                                                    <tr>
                                                        <td align="right" style="font-family:'SST Arabic';padding:5px">
                                                            <strong>المجموع الكلي</strong></td>
                                                        <td align="left" style="font-family:'SST Arabic'">{{$order['total_price']}}
                                                            {{$order['currency']->currency_short_ar}}
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    @if ($order['need_tracking_no']==1)
                                        <tr>
                                            <td style="width:100%;border-bottom:1px solid #edeff2;border-bottom:1px solid #edeff2;background-color:#fff;padding-bottom:5px;margin-bottom:100px" align="center">
                                                <div>
                                                    <h1 style="font-weight:normal;font-family:'SST Arabic'">معلومات تتبع طلبك</h1>
                                                    <table style="width:570px;max-width:570px;margin:0 auto;padding:0;margin-bottom:20px;padding-bottom:10px" align="center" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>
                                                        <tr>
                                                            <td align="right" style="font-family:'SST Arabic';padding:5px">
                                                                <strong>اسم شركة الشحن</strong></td>
                                                            <td align="left" style="font-family:'SST Arabic'">
                                                                {{$order['shipping_name']}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" style="font-family:'SST Arabic';padding:5px"><strong>
                                                                    رقم التتبع
                                                                </strong></td>
                                                            <td align="left" style="font-family:'SST Arabic'">

                                                                {{$order['tracking_number'] }}
                                                            </td>
                                                        </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    <tr style="text-align:center">
                                        <td>
                                            <a href="http://market.lozcart.com/ar/{{$order['market']->link}}" style="background-color:#4a4ca4;border-radius:50px;padding:9px 10px;display:block;max-width:160px;color:#fff;text-decoration:none;margin:16px auto;font-family:'SST Arabic'" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://market.lozcart.com/ar/{{$order['market']->link}}&amp;source=gmail&amp;ust=1624620627195000&amp;usg=AFQjCNFvNpbG99nimQ5WRlcOm3CTdtIXOQ">شاهد
                                                التفاصيل كاملة</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </td>
                        </tr>


                        <tr>
                            <td style="margin-top:20px">
                                <table style="width:auto;max-width:570px;margin:0 auto;padding:0;text-align:center" align="center" cellpadding="0" cellspacing="0">
                                    <tbody>
                                    <tr>
                                        <td style="font-family:'SST Arabic';color:#aeaeae;text-align:center">
                                            <p style="margin-top:0;color:#74787e;font-size:12px;line-height:1.5em">
                                            </p>
                                            <p><strong>{{$order['market']->market_name_ar}} </strong></p>

                                            <p></p>

                                            <p style="margin-top:0;color:#74787e;font-size:12px;line-height:1.5em">
                                                جميع الحقوق محفوظة
                                                &nbsp;
                                                <a style="color:#3869d4" href="http://market.lozcart.com/ar/{{$order['market']->link}}" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://market.lozcart.com/ar/{{$order['market']->link}}&amp;source=gmail&amp;ust=1624620627195000&amp;usg=AFQjCNFvNpbG99nimQ5WRlcOm3CTdtIXOQ">  <span> {{$order['market']->market_name_ar}}</span></a>
                                                © {{ now()->year }}
                                            </p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </td>
                <td>
                </td>
            </tr>
            <tr>
            </tr>
            </tbody>
        </table>

    </div>
   </div>
</body>
</html>
