@extends("layouts.site")
@section('jshead')
@if(App::isLocale('en'))
    <!-- BEGIN: Vendor CSS-->


    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 17px;
        }
    </style>
@else

@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
<style>
    #pricing #active-tb {
        background: #ffffff;
        box-shadow: 0px 6px 30px 5px rgb(89 91 181 / 10%);
    }
    #pricing .table {
        min-height: 471px;
    }
    #pricing .table {
        text-align: center;
        margin-top: 15px;
        padding: 30px 0;
        border-radius: 15px;
        border: none !important;
        box-shadow: 0px 2px 18px 0px rgb(198 198 198 / 30%);
        -webkit-transition: all .3s linear;
        -moz-transition: all .3s linear;
        -ms-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;
        background: #fff;
    }
    #pricing .shape {
        height: 1px;
        margin: 0 auto 30px;
        position: relative;
        width: 60px;
        background-color: #096d3e;
    }
    #pricing .table .pricing-header {
        position: relative;
        text-align: center;
    }
    #pricing .table .pricing-header .price-value {
        font-size: 28px;
        color: #096d3e;
        position: relative;
        text-align: center;
        font-weight: 700;
        top: 0 !important;
        margin-bottom: 10px;
    }
    #pricing .table .pricing-header p {
        top: 0 !important;
        margin-bottom: 0;
    }
    #pricing .table .description {
        text-align: center;
        padding: 10px 10px;
        list-style: none;
        margin-bottom: 0;
    }

    .custom-control{
        display: inline-block !important;
    }

</style>
<style>
    .sev_new h3 {
        position: relative;
        top: -30px;
    }

    .bord_radio_tab {;
        padding: 20px 25px;
        border-radius: 5px;
        margin: 10px;
        box-shadow: 0px 2px 6px 0px rgba(198, 198, 198, 0.3);
        border: 1px solid #e7e7e7;
    }

    .sev_new_text {
        padding: 10px;
        position: relative;
        top: -80px
    }

    .sev_new h4 {
        position: relative;
        top: -14px;
    }

    .sev_new h2 {
        position: relative;
        top: -12px;
        font-size: 20px
    }

    .button_pay a {
        padding: 10px 40px

    }

    .onle_radio {
        position: relative;
        top: -125px
    }

    .hide {
        display: none;
    }

    .toggle,
    .toggler {
        display: inline-block;
        vertical-align: middle;
        margin: 10px;
    }

    .toggler {
        color: #fff;
        transition: 0.2s;
        font-weight: normal;
    }

    /*
    .toggler--is-active {
      color: #9D1726;
    }
    */
    .b {
        display: block;
    }

    .toggle {
        position: relative;
        width: 60px;
        height: 28px;
        border-radius: 100px;
        background-color: #ffffff;
        overflow: hidden;
        box-shadow: inset 0 0 2px 1px rgba(0, 0, 0, 0.05);
    }

    .check {
        position: absolute;
        display: block;
        cursor: pointer;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        z-index: 6;
    }

    .check:checked ~ .switch {
        left: 2px;
        right: 57.5%;
        transition: 0.25s cubic-bezier(0.785, 0.135, 0.15, 0.86);
        transition-property: left, right;
        transition-delay: 0.08s, 0s;
    }

    .switch {
        position: absolute;
        right: 2px;
        top: 3px;
        bottom: 2px;
        left: 54%;
        background: linear-gradient(to left, rgba(29, 196, 154, 0.95) 0%, rgba(29, 196, 154, 0.95) 90%);
        border-radius: 36px;
        z-index: 1;
        transition: 0.25s cubic-bezier(0.785, 0.135, 0.15, 0.86);
        transition-property: left, right;
        transition-delay: 0s, 0.08s;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .pp-switch {
        position: relative;
        top: -8px;
        margin: 0;
        padding: 0
    }

    .card-subsc {
        margin: 10px 5px;
        position: relative;
        display: flex;
        flex: 1;
    }

    .card-subsc .card-body {
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card-subsc .card-body::after {
        content: " ";
        display: table;
        clear: both;
    }

    .card-subsc input[type="radio"] {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
        z-index: 22222;
    }

    .card-subsc .info .card-title {
        margin-bottom: 0;
    }

    /*
            .card-subsc .radioCircle {
                width: 20px;
                height: 20px;
                background: #e5e5eb;
                border-radius: 50px;
                border: 1px solid #f0f0f0;
                position: relative;
                margin-left: 10px;
            }
    */

    /*
            .card-subsc .radioCircle::after {
                content: " ";
                width: 10px;
                height: 10px;
                background: #7374b6;
                position: absolute;
                top: 50%;
                left: 50%;
                border-radius: 50px;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                opacity: 0;
            }
    */
    .card-subsc .radioCircle {
        width: 20px;
        height: 20px;
        background: #fff;
        border-radius: 50px;
        border: 1px solid #fff;
        position: relative;
        right: -20px;

    }

    .card-subsc.plansSubCard .radioCircle {
        position: relative;
        left: -35px;
        top: -15px;
    }

    .card-subsc .info.months {
        position: relative;
        right: -10px;
        z-index: 222;
    }

    .card-subsc .radioCircle::after {
        content: "";
        color: #ffffff;
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 12px;
        width: 100%;
        height: 100%;
        line-height: 16px;
        border-radius: 50px;
        background: #096d3e;
        border-color: #096d3e;
        -webkit-transform: translate(-50%, -50%) rotate(10deg);
        transform: translate(-50%, -50%) rotate(10deg);

        opacity: 0;
    }

    .card-subsc .card-subscLabel {
        color: #000;
        background-color: #fff;
        border: none;
        -webkit-box-shadow: 0px 8px 15px rgba(70, 72, 195, .08);
        box-shadow: 0px 8px 15px rgba(70, 72, 195, .08);
        -webkit-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        width: 100%;
        border-radius: 4px;
        border: 1px solid #eeeef9;
    }

    .card-subsc .card-subscInput:checked ~ .card-subscLabel {
        background-color: #f7f5f9;
        -webkit-box-shadow: 0px 8px 15px rgba(70, 72, 195, .08);
        box-shadow: 0px 8px 15px rgba(70, 72, 195, .08);
        color: #fff;
        -webkit-transform: translateY(-7px);
        transform: translateY(-7px);
        border: 1px solid #096d3e;
    }

    .card-subsc .card-subscInput:checked ~ .card-subscLabel .radioCircle {
        background: #fff;
        border-color: #f7f5f9;
    }

    .card-subsc .card-subscInput:checked ~ .card-subscLabel .radioCircle img {
        width: 12px;
        position: absolute;
        z-index: 2222222;
        height: 10px;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .card-subsc .radioCircle img {
        width: 12px;
        position: absolute;
        z-index: 2222222;
        height: 10px;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .card-subsc .card-subscInput:checked ~ .card-subscLabel .radioCircle::after {
        opacity: 1;
    }

    .subscribe-modal-view .modal-title {
        margin-bottom: 1.5rem;

    }

    .subscribe-modal-view form {
        width: 100%;
    }

    .subscribe-modal-view .modal-footer {
        justify-content: center;
    }

    @media (max-width: 767px) {
        .card-subsc.plansSubCard {
            display: flex;
            flex: none;
            width: 47%;
        }

        .card-subsc-policis {
            display: block !important;
        }

        .card-subsc-policis .card-subsc {
            flex: none;
            width: 45%;
            display: inline-block;
        }

        .card-subsc.plansSubCard .radioCircle {
            position: relative;
            right: -40px;
            top: -4px;
        }

        .card-subsc.plansSubCard .card-subscInput:checked ~ .card-subscLabel .radioCircle {
            right: -30px;
            top: -12px;
        }
    }

    /*#loginModal_3 .card-subsc.plansSubCard {*/
    /*    display: flex;*/
    /*    flex: none;*/
    /*    width: 47%;*/
    /*}*/

    /*#loginModal_3 .card-subsc.plansSubCard .radioCircle {*/
    /*    position: absolute;*/
    /*    left: 19px;*/
    /*    top: 8px;*/
    /*}*/

    /*@media (max-width: 520px) {*/
    /*    #loginModal_3 .card-subsc.plansSubCard .radioCircle {*/
    /*        position: absolute;*/
    /*        left: 3px;*/
    /*    }*/

    /*    #loginModal_3 .card-subsc.plansSubCard .card-body {*/
    /*        padding: .6rem 2rem .6rem 1rem;*/
    /*    }*/

    /*}*/
</style>
<style>
    .r4rj p {
        font-size: 20px;
        font-weight: 600 !important;
        color: #004c3f;
    }

    .so {
        position: relative;
        top: 50px;
    }

    .fogj {
        font-size: 20px;
        font-weight: 600 !important;
        color: #004c3f;
    }

    .price-value {
        color: #555;
        font-size: 16px;
    }

    @media (min-width: 992px) {
        .packages-modal-view .modal-lg, .packages-modal-view .modal-xl {
            max-width: 75%;
        }
    }

    @media (max-width: 767px) {
        .packages-modal-view .packagesRows {
            max-height: 650px;
            overflow-y: scroll;
            -webkit-overflow-scrolling: scroll;
        }
    }

    .packages-modal-view .modal-header {
        background: #28c76f !important;
    }

    .packages-modal-view .modal-header .modal-title {
        color: #fff;
        width: 100%;
        text-align: center;
        font-size: 22px;
    }

    .packages-modal-view .modal-header .close {
        /*color: #fff;*/
    }

    .packages-modal-view .modal-body {
        padding: 0 5px;
        overflow: hidden;
    }

    .featname p {
        margin-bottom: 0;
        margin-top: 10px;
    }

    @media (min-width: 992px) {
        .subscribe-modal-view .modal-lg {
            max-width: 750px;

        }
    }

    .subscribe-modal-view .card-subsc .card-body {
        padding: .6rem 1rem;
    }

    .subscribe-modal-view .card-subscLabel .info p {
        margin-bottom: 0;
        color: #333;
        margin-top: 10px;
    }

    /*.comaparePackagesBtn {
        position: relative;
        overflow: hidden;
        background: linear-gradient(to left, rgb(111 113 205 / 1) 0%, rgb(70 72 159 / 1) 90%);
        color: #fff;
    }

    .comaparePackagesBtn span {
        display: inline-block;
        vertical-align: baseline;
        zoom: 1;
        position: relative;
        padding: 0 20px;
    }

    .comaparePackagesBtn span:before,
    .comaparePackagesBtn span:after {
        content: '';
        display: block;
        width: 400px;
        position: absolute;
        top: 0.73em;
        border-top: 1px solid #d8d8d8;
        z-index: -1;
    }

    .comaparePackagesBtn span:before {
        right: 148%;
    }

    .comaparePackagesBtn span:after {
        left: 148%;
    }*/

    .card-subsc-policis {
        margin-bottom: 15px;
    }

    .card-subsc-policis .card-subsc .radioCircle {
        position: absolute;
        left: 7px;
        z-index: 222;
        top: 7px;
    }


</style>
<style>
    .current{
        background: linear-gradient(to left, rgb(40 199 111) 0%, rgb(40 199 111 / 71%) 90%) !important;
        box-shadow: 0px 6px 30px 5px rgb(89 91 181 / 10%)  !important;
    }
    .current .title h3{
        color: #fff;
    }
    .current .title .shape{
        color: #fff  !important;
        background: #fff  !important;
    }
    .current .toggler {
        color: #ffffff  !important;
    }
    .current .pricing-header .price-value{
        font-size: 24px  !important;
        font-weight: normal  !important;
        font-weight: 400  !important;
        color: #fff  !important;
        position: relative  !important;
        top: 10px  !important;
        padding: 5px  !important;
    }
    .current .pricing-header .price-value a span{
        color: #fff;
    }
    .current  .description li{
        color: #fff  !important;
    }
    .current a{
        color: #fff  !important;
    }
    .btn-warning {
        border-color: #096d3e !important;
        background-color: #096d3e !important;
        color: #FFFFFF !important;
    }

</style>
<style>
    .ftur_thumb img {
        max-width: 100%;
    }
</style>
<style>

    .custom-control {
        position : relative;
        z-index : 1;
        display : block;
        min-height : 1.45rem;
        padding-right : 1.5rem;
        -webkit-print-color-adjust : exact;
        color-adjust : exact;
    }

    .custom-control-inline {
        display : -webkit-inline-box;
        display : -webkit-inline-flex;
        display : -ms-inline-flexbox;
        display :         inline-flex;
        margin-left : 1rem;
    }

    .custom-control-input {
        position : absolute;
        right : 0;
        z-index : -1;
        width : 1rem;
        height : 1.225rem;
        opacity : 0;
    }

    .custom-control-input:checked ~ .custom-control-label::before {
        color : #FFFFFF;
        border-color : #0e7362;
        background-color : #0e7362;
    }

    .custom-control-input:focus ~ .custom-control-label::before {
        box-shadow : 0 3px 10px 0 rgba(34, 41, 47, 0.1);
    }

    .custom-control-input:focus:not(:checked) ~ .custom-control-label::before {
        border-color : #0e7362;
    }

    .custom-control-input:not(:disabled):active ~ .custom-control-label::before {
        color : #FFFFFF;
        background-color : white;
        border-color : white;
    }

    .custom-control-input[disabled] ~ .custom-control-label, .custom-control-input:disabled ~ .custom-control-label {
        color : #B8C2CC;
    }

    .custom-control-input[disabled] ~ .custom-control-label::before, .custom-control-input:disabled ~ .custom-control-label::before {
        background-color : #EFEFEF;
    }

    .custom-control-label {
        position : relative;
        margin-bottom : 0;
        vertical-align : top;
    }

    .custom-control-label::before {
        position : absolute;
        top : 0.225rem;
        right : -1.5rem;
        display : block;
        width : 1rem;
        height : 1rem;
        pointer-events : none;
        content : '';
        background-color : #FFFFFF;
        border : #D8D6DE solid 1px;
    }

    .custom-control-label::after {
        position : absolute;
        top : 0.225rem;
        right : -1.5rem;
        display : block;
        width : 1rem;
        height : 1rem;
        content : '';
        background : no-repeat 50% / 50% 50%;
    }

    .custom-checkbox .custom-control-label::before {
        border-radius : 3px;
    }

    .custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
        background-image : url('data:image/svg+xml;charset=utf8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 9.5 7.5\'%3E%3Cpolyline points=\'0.75 4.35 4.18 6.75 8.75 0.75\' style=\'fill:none;stroke:%23fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px\'/%3E%3C/svg%3E');
    }

    .custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before {
        border-color : #0e7362;
        background-color : #0e7362;
    }

    .custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::after {
        background-image : url('data:image/svg+xml;charset=utf8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'white\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\' class=\'feather feather-minus\'%3E%3Cline x1=\'5\' y1=\'12\' x2=\'19\' y2=\'12\'%3E%3C/line%3E%3C/svg%3E');
    }

    .custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
        background-color : #0e7362;
    }

    .custom-checkbox .custom-control-input:disabled:indeterminate ~ .custom-control-label::before {
        background-color : #0e7362;
    }

    .custom-radio .custom-control-label::before {
        border-radius : 50%;
    }

    .custom-radio .custom-control-input:checked ~ .custom-control-label::after {
        background-image : none;
    }

    .custom-radio .custom-control-input:disabled:checked ~ .custom-control-label::before {
        background-color : #0e7362;
    }

    .custom-switch {
        padding-right : 3.5rem;
    }

    .custom-switch .custom-control-label::before {
        right : -3.5rem;
        width : 3rem;
        pointer-events : all;
        border-radius : 1rem;
    }

    .custom-switch .custom-control-label::after {
        top : calc(0.225rem + 2px);
        right : calc(-3.5rem + 2px);
        width : 1rem;
        height : 1rem;
        background-color : #D8D6DE;
        border-radius : 1rem;
        -webkit-transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s, -webkit-transform 0.15s ease-in-out;
        transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s, -webkit-transform 0.15s ease-in-out;
        transition : transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s;
        transition : transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s, -webkit-transform 0.15s ease-in-out;
    }

    @media (prefers-reduced-motion: reduce) {
        .custom-switch .custom-control-label::after {
            -webkit-transition : none;
            transition : none;
        }
    }

    .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
        background-color : #FFFFFF;
        -webkit-transform : translateX(-2rem);
        -ms-transform : translateX(-2rem);
        transform : translateX(-2rem);
    }

    .custom-switch .custom-control-input:disabled:checked ~ .custom-control-label::before {
        background-color : #0e7362;
    }

    .custom-select {
        display : inline-block;
        width : 100%;
        height : 2.714rem;
        padding : 0.438rem 1rem 0.438rem 2rem;
        font-size : 1rem;
        font-weight : 400;
        line-height : 1.45;
        color : #6E6B7B;
        vertical-align : middle;
        background : #FFFFFF url('data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'4\' height=\'5\' viewBox=\'0 0 4 5\'%3e%3cpath fill=\'%23d8d6de\' d=\'M2 0L0 2h4zm0 5L0 3h4z\'/%3e%3c/svg%3e') no-repeat left 1rem center/10px 10px;
        border : 1px solid #D8D6DE;
        border-radius : 0.357rem;
        -webkit-appearance : none;
        -moz-appearance : none;
        appearance : none;
    }

    .custom-select:focus {
        border-color : #0e7362;
        outline : 0;
        box-shadow : 0 3px 10px 0 rgba(34, 41, 47, 0.1);
    }

    .custom-select:focus::-ms-value {
        color : #6E6B7B;
        background-color : #FFFFFF;
    }

    .custom-select[multiple], .custom-select[size]:not([size='1']) {
        height : auto;
        padding-left : 1rem;
        background-image : none;
    }

    .custom-select:disabled {
        color : #B8C2CC;
        background-color : #EFEFEF;
    }

    .custom-select::-ms-expand {
        display : none;
    }

    .custom-select:-moz-focusring {
        color : transparent;
        text-shadow : 0 0 0 #6E6B7B;
    }

    .custom-select-sm {
        height : 2.142rem;
        padding-top : 0.188rem;
        padding-bottom : 0.188rem;
        padding-right : 0.857rem;
        font-size : 0.857rem;
    }

    .custom-select-lg {
        height : 3.2857rem;
        padding-top : 0.75rem;
        padding-bottom : 0.75rem;
        padding-right : 1.143rem;
        font-size : 1.143rem;
    }

    .custom-file {
        position : relative;
        display : inline-block;
        width : 100%;
        height : 2.714rem;
        margin-bottom : 0;
    }

    .custom-file-input {
        position : relative;
        z-index : 2;
        width : 100%;
        height : 2.714rem;
        margin : 0;
        opacity : 0;
    }

    .custom-file-input:focus ~ .custom-file-label {
        border-color : #0e7362;
        box-shadow : 0 3px 10px 0 rgba(34, 41, 47, 0.1);
    }

    .custom-file-input[disabled] ~ .custom-file-label, .custom-file-input:disabled ~ .custom-file-label {
        background-color : #EFEFEF;
    }

    .custom-file-input:lang(en) ~ .custom-file-label::after {
        content : 'Browse';
    }

    .custom-file-input ~ .custom-file-label[data-browse]::after {
        content : attr(data-browse);
    }

    .custom-file-label {
        position : absolute;
        top : 0;
        left : 0;
        right : 0;
        z-index : 1;
        height : 2.714rem;
        padding : 0.438rem 1rem;
        font-weight : 400;
        line-height : 1.45;
        color : #6E6B7B;
        background-color : #FFFFFF;
        border : 1px solid #D8D6DE;
        border-radius : 0.357rem;
    }

    .custom-file-label::after {
        position : absolute;
        top : 0;
        left : 0;
        bottom : 0;
        z-index : 3;
        display : block;
        height : 2.714rem;
        padding : 0.438rem 1rem;
        line-height : 1.45;
        color : #6E6B7B;
        content : 'Browse';
        background-color : white;
        border-right : inherit;
        border-radius : 0.357rem 0 0 0.357rem;
    }

    .custom-range {
        width : 100%;
        height : 1.4rem;
        padding : 0;
        background-color : transparent;
        -webkit-appearance : none;
        -moz-appearance : none;
        appearance : none;
    }

    .custom-range:focus {
        outline : none;
    }

    .custom-range:focus::-webkit-slider-thumb {
        box-shadow : 0 0 0 1px #F8F8F8, 0 3px 10px 0 rgba(34, 41, 47, 0.1);
    }

    .custom-range:focus::-moz-range-thumb {
        box-shadow : 0 0 0 1px #F8F8F8, 0 3px 10px 0 rgba(34, 41, 47, 0.1);
    }

    .custom-range:focus::-ms-thumb {
        box-shadow : 0 0 0 1px #F8F8F8, 0 3px 10px 0 rgba(34, 41, 47, 0.1);
    }

    .custom-range::-moz-focus-outer {
        border : 0;
    }

    .custom-range::-webkit-slider-thumb {
        width : 1rem;
        height : 1rem;
        margin-top : -0.25rem;
        background-color : #0e7362;
        border : 0;
        border-radius : 1rem;
        -webkit-transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s;
        transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s;
        -webkit-appearance : none;
        appearance : none;
    }

    @media (prefers-reduced-motion: reduce) {
        .custom-range::-webkit-slider-thumb {
            -webkit-transition : none;
            transition : none;
        }
    }

    .custom-range::-webkit-slider-thumb:active {
        background-color : white;
    }

    .custom-range::-webkit-slider-runnable-track {
        width : 100%;
        height : 0.5rem;
        color : transparent;
        cursor : pointer;
        background-color : #DAE1E7;
        border-color : transparent;
        border-radius : 1rem;
    }

    .custom-range::-moz-range-thumb {
        width : 1rem;
        height : 1rem;
        background-color : #0e7362;
        border : 0;
        border-radius : 1rem;
        -moz-transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s;
        transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s;
        -moz-appearance : none;
        appearance : none;
    }

    @media (prefers-reduced-motion: reduce) {
        .custom-range::-moz-range-thumb {
            -moz-transition : none;
            transition : none;
        }
    }

    .custom-range::-moz-range-thumb:active {
        background-color : white;
    }

    .custom-range::-moz-range-track {
        width : 100%;
        height : 0.5rem;
        color : transparent;
        cursor : pointer;
        background-color : #DAE1E7;
        border-color : transparent;
        border-radius : 1rem;
    }

    .custom-range::-ms-thumb {
        width : 1rem;
        height : 1rem;
        margin-top : 0;
        margin-left : 0.2rem;
        margin-right : 0.2rem;
        background-color : #0e7362;
        border : 0;
        border-radius : 1rem;
        -ms-transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s;
        transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s;
        appearance : none;
    }

    @media (prefers-reduced-motion: reduce) {
        .custom-range::-ms-thumb {
            -ms-transition : none;
            transition : none;
        }
    }

    .custom-range::-ms-thumb:active {
        background-color : white;
    }

    .custom-range::-ms-track {
        width : 100%;
        height : 0.5rem;
        color : transparent;
        cursor : pointer;
        background-color : transparent;
        border-color : transparent;
        border-width : 0.5rem;
    }

    .custom-range::-ms-fill-lower {
        background-color : #DAE1E7;
        border-radius : 1rem;
    }

    .custom-range::-ms-fill-upper {
        margin-left : 15px;
        background-color : #DAE1E7;
        border-radius : 1rem;
    }

    .custom-range:disabled::-webkit-slider-thumb {
        background-color : #ADB5BD;
    }

    .custom-range:disabled::-webkit-slider-runnable-track {
        cursor : default;
    }

    .custom-range:disabled::-moz-range-thumb {
        background-color : #ADB5BD;
    }

    .custom-range:disabled::-moz-range-track {
        cursor : default;
    }

    .custom-range:disabled::-ms-thumb {
        background-color : #ADB5BD;
    }

    .custom-control-label::before, .custom-file-label, .custom-select {
        -webkit-transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s;
        transition : background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, background 0s, border-color 0s;
    }

    @media (prefers-reduced-motion: reduce) {
        .custom-control-label::before, .custom-file-label, .custom-select {
            -webkit-transition : none;
            transition : none;
        }
    }
    a:not([href]):not([tabindex]) {
        color: inherit;
        text-decoration: none;
    }
</style>
<style>
    /* Switches */
    .custom-switch {
        padding-right : 0;
        line-height : 1.7rem;
        /*For Switch label*/
        /*For Switch Handle Animation*/
    }

    .custom-switch .custom-control-label {
        padding-right : 3.5rem;
        line-height : 1.7rem;
        /* For bg color of switch*/
        /*For Switch handle*/
        /*For Switch text*/
    }

    .custom-switch .custom-control-label::before {
        border : none;
        background-color : #E2E2E2;
        height : 1.7rem;
        box-shadow : none !important;
        -webkit-transition : opacity 0.25s ease, background-color 0.1s ease;
        transition : opacity 0.25s ease, background-color 0.1s ease;
        cursor : pointer;
        -webkit-user-select : none;
        -moz-user-select : none;
        -ms-user-select : none;
        user-select : none;
        top : 0;
        right : 0;
    }

    .custom-switch .custom-control-label:after {
        position : absolute;
        top : 4px;
        right : 4px;
        box-shadow : 1px 2px 3px 0 rgba(34, 41, 47, 0.2);
        background-color : #FFFFFF;
        -webkit-transition : all 0.15s ease-out;
        transition : all 0.15s ease-out;
        cursor : pointer;
        -webkit-user-select : none;
        -moz-user-select : none;
        -ms-user-select : none;
        user-select : none;
    }

    .custom-switch .custom-control-label .switch-text-left, .custom-switch .custom-control-label .switch-text-right, .custom-switch .custom-control-label .switch-icon-left, .custom-switch .custom-control-label .switch-icon-right {
        position : absolute;
        cursor : pointer;
        -webkit-user-select : none;
        -moz-user-select : none;
        -ms-user-select : none;
        user-select : none;
        line-height : 1.8;
    }

    .custom-switch .custom-control-label .switch-text-left i, .custom-switch .custom-control-label .switch-text-left svg, .custom-switch .custom-control-label .switch-text-right i, .custom-switch .custom-control-label .switch-text-right svg, .custom-switch .custom-control-label .switch-icon-left i, .custom-switch .custom-control-label .switch-icon-left svg, .custom-switch .custom-control-label .switch-icon-right i, .custom-switch .custom-control-label .switch-icon-right svg {
        height : 13px;
        width : 13px;
        font-size : 13px;
    }

    .custom-switch .custom-control-label .switch-text-left, .custom-switch .custom-control-label .switch-icon-left {
        right : 6px;
        color : #FFFFFF;
        opacity : 0;
        -webkit-transform : translateX(-8px);
        -ms-transform : translateX(-8px);
        transform : translateX(-8px);
        -webkit-transition : opacity 0.1s ease, -webkit-transform 0.15s ease;
        transition : opacity 0.1s ease, -webkit-transform 0.15s ease;
        transition : opacity 0.1s ease, transform 0.15s ease;
        transition : opacity 0.1s ease, transform 0.15s ease, -webkit-transform 0.15s ease;
    }

    .custom-switch .custom-control-label .switch-text-right, .custom-switch .custom-control-label .switch-icon-right {
        left : 13px;
        opacity : 1;
        -webkit-transform : translateX(0px);
        -ms-transform : translateX(0px);
        transform : translateX(0px);
        -webkit-transition : opacity 0.08s ease, -webkit-transform 0.15s ease;
        transition : opacity 0.08s ease, -webkit-transform 0.15s ease;
        transition : opacity 0.08s ease, transform 0.15s ease;
        transition : opacity 0.08s ease, transform 0.15s ease, -webkit-transform 0.15s ease;
    }

    .custom-switch .custom-control-label:focus {
        outline : 0;
    }

    .custom-switch .switch-label {
        padding-right : 1rem;
    }

    .custom-switch .custom-control-input:checked ~ .custom-control-label::before {
        box-shadow : none;
    }

    .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
        -webkit-transform : translateX(-1.4rem);
        -ms-transform : translateX(-1.4rem);
        transform : translateX(-1.4rem);
    }

    .custom-switch .custom-control-input:checked ~ .custom-control-label .switch-text-left, .custom-switch .custom-control-input:checked ~ .custom-control-label .switch-icon-left {
        -webkit-transform : translateX(0);
        -ms-transform : translateX(0);
        transform : translateX(0);
        opacity : 1;
    }

    .custom-switch .custom-control-input:checked ~ .custom-control-label .switch-text-right, .custom-switch .custom-control-input:checked ~ .custom-control-label .switch-icon-right {
        -webkit-transform : translateX(8px);
        -ms-transform : translateX(8px);
        transform : translateX(8px);
        opacity : 0;
    }

    .custom-switch .custom-control-input:not(:checked) ~ .custom-control-label .switch-text-left {
        opacity : 0;
    }

    .custom-switch .custom-control-input:not(:checked) ~ .custom-control-label .switch-text-right {
        opacity : 1;
    }

    .custom-switch .custom-control-input:checked ~ .custom-control-label .switch-text-right {
        opacity : 0;
    }

    .custom-switch .custom-control-input:checked ~ .custom-control-label .switch-text-left {
        opacity : 1;
    }
</style>
@endsection
@section("header-nav")

<div id="hero-area" class="hero-area-bg">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="contents new-word">
                            <h2 class="head-title" style="color: #004c3f;">{{__('LozCart Platform')}} </h2>
                            <p>
                                @if (App::isLocale('en'))
                                    {{$main_page->header_desc}}
                                @else
                                    {{$main_page->header_desc_ar}}
                                @endif
                            </p>
                            <div class="header-button">
                                <div class="dfiif">
                                    <a href="{{route('login')}}" class="btn btn-common text-center">{{__('Start Now')}} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12  ">
                        <div class="intro-img">
                            <img class="img-responsive " style="width: 105%;margin:-20px 0 0 0 "
                                src="{{env('ATTACH_URL_ADMIN').'main_page/'.$main_page->header_photo}}"
                                alt="  متجر إلكتروني جاهز ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section("content")


    <!-- Features Section start -->
    <section class="section_features_nw section-padding">
        <div class="container">
            <div class="section-header text-center onle-way-h2">
                <br>
                <h2 class="section-title " data-wow-delay="0.3s">{{__('What makes LozCart special')}}</h2>
                <div class="shape wow " data-wow-delay="0.3s"></div>
            </div>
        </div>
        <div class="block_features_list">
            <div class="box_item_feature">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 order-md-12">
                            <div class="ftur_thumb">
                                <img src="{{env('ATTACH_URL_ADMIN').'main_page/'.$main_page->feature_photo}}"
                                    alt=" مميزات منصة لوز ">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 order-md-1">
                            <div class="ftur_txt col-12">
                                <h3>
                                    @if (App::isLocale('en'))
                                        {{$main_page->feature_title}}
                                    @else
                                        {{$main_page->feature_title_ar}}
                                    @endif
                                </h3>
                                <p>
                                    @if (App::isLocale('en'))
                                        {{$main_page->feature_desc}}
                                    @else
                                        {{$main_page->feature_desc_ar}}
                                    @endif
                                </p>
                                <a href="management" class="link_arrow">{{__('Find out how to easily manage your store')}}<i
                                        class="fa fa-angle-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_item_feature">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 ">
                            <div class="ftur_thumb img-left-2img">
                                <img src="{{env('ATTACH_URL_ADMIN').'main_page/'.$main_page->payment_photo}}"
                                    alt=" مميزات منصة لوز  ">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 ">
                            <div class="ftur_txt col-12">
                                <h3 class="tex">{{__('Payments')}}</h3>
                                <p>
                                    @if (App::isLocale('en'))
                                        {{$main_page->payment_desc}}
                                    @else
                                        {{$main_page->payment_desc_ar}}
                                    @endif
                                </p>
                                <p>
                                    @if (App::isLocale('en'))
                                        {{$main_page->payment_method}}
                                    @else
                                        {{$main_page->payment_method_ar}}
                                    @endif
                                </p>
                                <a href="{{ url('payment') }}" class="link_arrow"> {{__('Find out more about online payment')}}<i
                                        class="fa fa-angle-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_item_feature">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 order-md-12">
                            <div class="ftur_thumb">
                                <img src="{{env('ATTACH_URL_ADMIN').'main_page/'.$main_page->shipping_photo}}"
                                    alt=" مميزات منصة لوز ">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 order-md-1">
                            <div class="ftur_txt col-12">
                                <h3>{{__('Shipping')}}</h3>
                                <p>
                                    @if (App::isLocale('en'))
                                        {{$main_page->shipping_desc}}
                                    @else
                                        {{$main_page->shipping_desc_ar}}
                                    @endif
                                </p>
                                <p>
                                    @if (App::isLocale('en'))
                                        {{$main_page->shipping_method}}
                                    @else
                                        {{$main_page->shipping_method_ar}}
                                    @endif
                                </p>
                                <a href="{{ url('shipping_options') }}" class="link_arrow">{{__('Explore the options and benefits Shipping')}} <i
                                        class="fa fa-angle-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_item_feature">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 ">
                            <div class="ftur_thumb   img-left-2img">
                                <img src="{{env('ATTACH_URL_ADMIN').'main_page/'.$main_page->partner_services_photo}}"
                                    alt=" مميزات منصة لوز  ">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 ">
                            <div class="ftur_txt col-12">
                                <h3>{{__('Partner Services')}}</h3>
                                <p>
                                    @if (App::isLocale('en'))
                                        {{$main_page->partner_services_desc}}
                                    @else
                                        {{$main_page->partner_services_desc_ar}}
                                    @endif
                                </p>
                                <p>
                                    @if (App::isLocale('en'))
                                        {{$main_page->partner_services_method}}
                                    @else
                                        {{$main_page->partner_services_method_ar}}
                                    @endif
                                </p>
                                <a href="{{ url('partners_services') }}" class="link_arrow">{{__('Learn about partner services')}}<i
                                        class="fa fa-angle-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->


    <!-- Features Section Start -->
    <section id="features">
        <div class="container">
            <div class="section-header text-center">
                <br> <br> <br>
                <h2 class="section-tite  " style="color: #333a45;font-size:28px;  font-weight: normal;"
                    data-wow-delay="0.3s"> {{__('Examples LozCart')}} </h2>
                <div class="shape " style="margin:20px auto" data-wow-delay="0.3s"></div>
            </div>
            <section class=" screens">
                <br>
                <div id="owl-demo" class="owl-carousel">
                    @foreach($sliders as $slider)
                    <div class="item car-ex"
                        style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);position: relative;top: 10px">
                        <br>
                        <div class="logo-icon " style="padding:5px;">
                            <img src="{{asset("/uploads/logoMarket/")}}/{{ $slider->logo }}"
                                alt=" متجر الكتروني  ">
                        </div>
                        <h6 class="text-center" style="font-weight: 400;">
                            @if(App::isLocale('en'))
                                {{$slider->market_name}}
                            @else
                                {{$slider->market_name_ar}}
                            @endif

                        </h6>
                        <div class="social-overlap process-scetion ">
                            <div class="container">
                                <div class="row ">
                                    <div class="social-icons  text-center">

                                        <a href="{{$slider->link}}" target="_blank" class="slider-nav-item"><img
                                                data-toggle="tooltip" data-placement="bottom" title="متجر ويب "
                                                style="width:20px;margin:7px auto;"
                                                src="{{asset('/looz/loozLandingPage/img/rfdcc.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </section>

    <!-- Statics -->
    <section class="statics-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="item">
                        <h6><img src="{{asset('/looz/loozLandingPage/img/7-2.png')}}" alt="متجر الكتروني  ">
                        </h6>
                        <div class="count-statics">+<span class="counter">
                             {{ $matajers }}
                         </span></div>
                        <p>{{__('Active online store')}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <h6><img src="{{asset('/looz/loozLandingPage/img/money.png')}}" alt="Sales"></h6>
                        <div class="count-statics">+<span class="counter">
                            {{ $all_orders }}</span>{{-- K --}}</div>

                        <p>{{__('more than')}}  {{ $all_orders }}{{__('Thousand riyals of sales of merchants')}} </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <h6><img src="{{asset('/looz/loozLandingPage/img/encapsulation.png')}}" alt="Orders"></h6>
                        <div class="count-statics">+<span class="counter">{{ $complete_orders }}</span></div>
                        <p>{{__('Completed application for rent')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Statics -->

    <!-- Pricing section Start -->
    <section id="pricing" class="section-padding   pricing_onle_1 ">
        <div class="container">
            <div class="section-header text-center fbhhd2">
                <a class="section-title " data-wow-delay="0.3s" style="color: #333a45">{{__('packages LozCart')}} </a>
                <div class="shape " data-wow-delay="0.3s"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="table " id="active-tb" data-wow-delay="1.2s" style="background: #ffffff;box-shadow:0px 6px 30px 5px rgba(89,91,181,0.1);">
                        <div class="title">
                            <h3>
                                @if(App::isLocale('en'))
                                    {{$first_plan->title}}
                                @else
                                    {{$first_plan->title_ar}}
                                @endif
                            </h3>
                            <div style="color: #fff;background-color: #096d3e;" class="shape" data-wow-delay="0.3s"></div>
                        </div>
                        <div class="pricing-header">
                            <div class="pp-switch">
                                <label class="toggler toggler--is-active" id="filt-monthly-1" style="color:#000000"> {{__('Monthly')}} </label>
                                <div class="custom-control custom-switch custom-switch-success">
                                    <input type="checkbox" class="custom-control-input"  id="switcher-1"/>
                                    <label class="custom-control-label" for="switcher-1">
                                        <span class="switch-icon-left"></span>
                                        <span class="switch-icon-right">x</span>
                                    </label>
                                </div>
                                <label class="toggler" id="filt-yearly-1" style="color:#000000">{{__('Annual')}} </label>

                            </div>
                            <div class="pricing-header" id="monthly-1">
                                <p class="price-value">
                                    <a style="   text-decoration-line: line-through;margin:0 10px " style="color:#000000">
                                        {{$first_plan->price_month}} </a>{{$first_plan->discount_month}}
                                    <span style="color: #096d3e ;"> {{__('USD')}}  </span></p>
                            </div>
                            <div class="pricing-header hide" id="yearly-1">
                                <p class="price-value" >
                                    <a style="   text-decoration-line: line-through;margin:0 10px " style="color:#096d3e">
                                        {{$first_plan->price_year}} </a>{{$first_plan->discount_year}}
                                    <span style="color: #096d3e ;"> {{__('USD')}}  </span></p>
                            </div>

                        </div>
                        <ul class="description">
                            @foreach($first_plan->services as $item)
                                <li>
                                    @if(App::isLocale('en'))
                                        {{$item->description}}
                                    @else
                                        {{$item->description_ar}}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ url('pricing') }}" style=" color: #004c3f;text-decoration: none;">
                            {{__('More features')}} <i class="fa fa-angle-left"
                                        style="font-size:24px;position:relative;top:4px;right:3px; color: #004c3f;"></i>
                        </a>
                        {{--                                    @if (\Carbon\Carbon::parse($current_plan->end_date) <= Carbon\Carbon::today()->toDateString() )--}}
                        {{--                                    @endif--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="table " id="active-tb" data-wow-delay="1.2s" style=" background: linear-gradient(to left, rgba(1, 111, 93,0.95) 0%, rgba(0, 76, 63, 0.95) 90%)">
                        <div class="title" >
                            <h3 style="color: #fff;" >
                                @if(App::isLocale('en'))
                                    {{$second_plan->title}}
                                @else
                                    {{$second_plan->title_ar}}
                                @endif
                            </h3>
                            <div class="shape " data-wow-delay="0.3s"></div>
                        </div>
                        <div class="pricing-header">
                            <div class="pp-switch">
                                <label class="toggler toggler--is-active" id="filt-monthly">{{__('Monthly')}}  </label>
                                <div class="custom-control custom-switch custom-switch-success">
                                    <input type="checkbox" class="custom-control-input"  id="switcher"/>
                                    <label class="custom-control-label" for="switcher">
                                        <span class="switch-icon-left"></span>
                                        <span class="switch-icon-right">x</span>
                                    </label>
                                </div>
                                <label class="toggler" id="filt-yearly"> {{__('Annual')}}</label>

                            </div>
                            <div class="pricing-header" id="monthly">
                                <p class="price-value" style="font-size:24px;font-weight: normal;font-weight: 400;color: #fff;position: relative;top:10px;padding:5px">
                                    <a style="   text-decoration-line: line-through;margin:0 10px ">
                                        {{$second_plan->price_month}} </a>{{$second_plan->discount_month}} <span style="color: #fff ;"> {{__('USD')}}  </span></p>
                            </div>
                            <div class="pricing-header hide" id="yearly">
                                <p class="price-value"  style="font-size:24px;font-weight: normal;font-weight: 400;color: #fff;position: relative;top:10px;padding:5px">
                                    <a style="   text-decoration-line: line-through;margin:0 10px ">
                                        {{$second_plan->price_year}} </a>{{$second_plan->discount_year}} <span style="color: #fff ;"> {{__('USD')}}  </span></p>
                            </div>

                        </div>
                        <ul class="description">
                            @foreach($second_plan->services as $item)
                                <li style="color:#fff;" >
                                    @if(App::isLocale('en'))
                                        {{$item->description}}
                                    @else
                                        {{$item->description_ar}}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ url('pricing') }}" style=" color: #004c3f;text-decoration: none;">
                            {{__('More features')}} <i class="fa fa-angle-left"
                                                       style="font-size:24px;position:relative;top:4px;right:3px; color: #004c3f;"></i>
                        </a>
                        {{--                                    @if (\Carbon\Carbon::parse($current_plan->end_date) <= Carbon\Carbon::today()->toDateString() )--}}

                        {{--                                    @endif--}}

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="table " id="active-tb" data-wow-delay="1.2s" style="background: #ffffff;box-shadow:0px 6px 30px 5px rgba(89,91,181,0.1);">
                        <div class="title">
                            <h3 style="/*color: #fff;*/">
                                @if(App::isLocale('en'))
                                    {{$third_plan->title}}
                                @else
                                    {{$third_plan->title_ar}}
                                @endif
                            </h3>
                            <div style="color: #fff;background-color: #096d3e;" class="shape " data-wow-delay="0.3s"></div>
                        </div>
                        <div class="pricing-header">
                            <div class="pp-switch">
                                <label class="toggler toggler--is-active" id="filt-monthly-2" style="color:#000000"> {{__('Monthly')}} </label>
                                <div class="custom-control custom-switch custom-switch-success">
                                    <input type="checkbox" class="custom-control-input"  id="switcher-2"/>
                                    <label class="custom-control-label" for="switcher-2">
                                        <span class="switch-icon-left"></span>
                                        <span class="switch-icon-right">x</span>
                                    </label>
                                </div>
                                <label class="toggler" id="filt-yearly-2" style="color:#000000">{{__('Annual')}} </label>

                            </div>
                            <div class="pricing-header" id="monthly-2">
                                <p class="price-value">
                                    <a style="   text-decoration-line: line-through;margin:0 10px " style="color:#000000">
                                        {{$third_plan->price_month}} </a>{{$third_plan->discount_month}}
                                    <span style="color: #096d3e ;"> {{__('USD')}}  </span></p>
                            </div>
                            <div class="pricing-header hide" id="yearly-2">
                                <p class="price-value" >
                                    <a style="   text-decoration-line: line-through;margin:0 10px " style="color:#096d3e">
                                        {{$third_plan->price_year}} </a>{{$third_plan->discount_year}}
                                    <span style="color: #096d3e ;"> {{__('USD')}}  </span></p>
                            </div>

                        </div>
                        <ul class="description">
                            @foreach($third_plan->services as $item)
                                <li>
                                    @if(App::isLocale('en'))
                                        {{$item->description}}
                                    @else
                                        {{$item->description_ar}}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ url('pricing') }}" style=" color: #004c3f;text-decoration: none;">
                            {{__('More features')}} <i class="fa fa-angle-left"
                                                       style="font-size:24px;position:relative;top:4px;right:3px; color: #004c3f;"></i>
                        </a>
                        {{--                                    @if (\Carbon\Carbon::parse($current_plan->end_date) <= Carbon\Carbon::today()->toDateString() || $current_plan->status)--}}

                        {{--                                    @endif--}}
                    </div>
                </div>
            </div>
            <br> <br>
            <div class="header-button " style="position:relative;top:20px">
                <a href="pricing" class="btn btn-common"
                    style=";border-radius: 100px;margin:15px 0 40px 0;padding:12px 50px; "> {{__('Compare packages')}} </a>
            </div>
            <br>
        </div>
    </section>


    <!-- Pricing Table Section End -->
    <div id="home-div1316" class="pfblock-image-div12">
        <div class="home-overlay-div1316">
            <div class="text-center  botton-2 ">
                <h2>{{__('Focus on growing your business and let us run your online store')}}</h2>
                <br>
                <a href="{{route('login')}}" class="btn btn-common "> {{__('Start Now')}} </a>
            </div>
        </div>
    </div>



@endsection
@section('js')
    <script>
        var e = document.getElementById("filt-monthly"),
            d = document.getElementById("filt-yearly"),
            t = document.getElementById("switcher"),
            m = document.getElementById("monthly"),
            y = document.getElementById("yearly");

        e.addEventListener("click", function () {
            t.checked = false;
            e.classList.add("toggler--is-active");
            d.classList.remove("toggler--is-active");
            m.classList.remove("hide");
            y.classList.add("hide");
        });

        d.addEventListener("click", function () {
            t.checked = true;
            d.classList.add("toggler--is-active");
            e.classList.remove("toggler--is-active");
            m.classList.add("hide");
            y.classList.remove("hide");
        });

        t.addEventListener("click", function () {
            d.classList.toggle("toggler--is-active");
            e.classList.toggle("toggler--is-active");
            m.classList.toggle("hide");
            y.classList.toggle("hide");
        })
    </script>

    <script>
        var ee = document.getElementById("filt-monthly-two"),
            dd = document.getElementById("filt-yearly-two"),
            tt = document.getElementById("switcher-two"),
            mm = document.getElementById("monthly-two"),
            yy = document.getElementById("yearly-two");

        ee.addEventListener("click", function () {
            tt.checked = false;
            ee.classList.add("toggler--is-active");
            dd.classList.remove("toggler--is-active");
            mm.classList.remove("hide");
            yy.classList.add("hide");

        });

        dd.addEventListener("click", function () {
            tt.checked = true;
            dd.classList.add("toggler--is-active");
            ee.classList.remove("toggler--is-active");
            mm.classList.add("hide");
            yy.classList.remove("hide");
        });

        tt.addEventListener("click", function () {
            dd.classList.toggle("toggler--is-active");
            ee.classList.toggle("toggler--is-active");
            mm.classList.toggle("hide");
            yy.classList.toggle("hide");

        })

    </script>
    <script>
        var ee4 = document.getElementById("filt-monthly-4"),
            dd4 = document.getElementById("filt-yearly-4"),
            tt4 = document.getElementById("switcher-4"),
            mm4 = document.getElementById("monthly-4"),
            yy4 = document.getElementById("yearly-4");

        ee4.addEventListener("click", function () {
            tt4.checked = false;
            ee4.classList.add("toggler--is-active");
            dd4.classList.remove("toggler--is-active");
            mm4.classList.remove("hide");
            yy4.classList.add("hide");

        });

        dd4.addEventListener("click", function () {
            tt4.checked = true;
            dd4.classList.add("toggler--is-active");
            ee4.classList.remove("toggler--is-active");
            mm4.classList.add("hide");
            yy4.classList.remove("hide");
        });

        tt4.addEventListener("click", function () {
            dd4.classList.toggle("toggler--is-active");
            ee4.classList.toggle("toggler--is-active");
            mm4.classList.toggle("hide");
            yy4.classList.toggle("hide");

        })

    </script>
    <script>
        var ee5 = document.getElementById("filt-monthly-5"),
            dd5 = document.getElementById("filt-yearly-5"),
            tt5 = document.getElementById("switcher-5"),
            mm5 = document.getElementById("monthly-5"),
            yy5 = document.getElementById("yearly-5");

        ee5.addEventListener("click", function () {
            tt5.checked = false;
            ee5.classList.add("toggler--is-active");
            dd5.classList.remove("toggler--is-active");
            mm5.classList.remove("hide");
            yy5.classList.add("hide");

        });

        dd5.addEventListener("click", function () {
            tt5.checked = true;
            dd5.classList.add("toggler--is-active");
            ee5.classList.remove("toggler--is-active");
            mm5.classList.add("hide");
            yy5.classList.remove("hide");
        });

        tt5.addEventListener("click", function () {
            dd5.classList.toggle("toggler--is-active");
            ee5.classList.toggle("toggler--is-active");
            mm5.classList.toggle("hide");
            yy5.classList.toggle("hide");

        })

    </script>
    <script>
        var eeee = document.getElementById("filt-monthly-1"),
            dddd = document.getElementById("filt-yearly-1"),
            tttt = document.getElementById("switcher-1"),
            mmmm = document.getElementById("monthly-1"),
            yyyy = document.getElementById("yearly-1");

        eeee.addEventListener("click", function () {
            tttt.checked = false;
            eeee.classList.add("toggler--is-active");
            dddd.classList.remove("toggler--is-active");
            mmmm.classList.remove("hide");
            yyyy.classList.add("hide");

        });

        dddd.addEventListener("click", function () {
            tttt.checked = true;
            dddd.classList.add("toggler--is-active");
            eeee.classList.remove("toggler--is-active");
            mmmm.classList.add("hide");
            yyyy.classList.remove("hide");
        });

        tttt.addEventListener("click", function () {
            dddd.classList.toggle("toggler--is-active");
            eeee.classList.toggle("toggler--is-active");
            mmmm.classList.toggle("hide");
            yyyy.classList.toggle("hide");

        })

    </script>
    <script>
        var eee = document.getElementById("filt-monthly-2"),
            ddd = document.getElementById("filt-yearly-2"),
            ttt = document.getElementById("switcher-2"),
            mmm = document.getElementById("monthly-2"),
            yyy = document.getElementById("yearly-2");

        eee.addEventListener("click", function () {
            ttt.checked = false;
            eee.classList.add("toggler--is-active");
            ddd.classList.remove("toggler--is-active");
            mmm.classList.remove("hide");
            yyy.classList.add("hide");

        });

        ddd.addEventListener("click", function () {
            ttt.checked = true;
            ddd.classList.add("toggler--is-active");
            eee.classList.remove("toggler--is-active");
            mmm.classList.add("hide");
            yyy.classList.remove("hide");
        });

        ttt.addEventListener("click", function () {
            ddd.classList.toggle("toggler--is-active");
            eee.classList.toggle("toggler--is-active");
            mmm.classList.toggle("hide");
            yyy.classList.toggle("hide");

        })

    </script>
@endsection
