<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            direction: rtl;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Arial";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        @page {
            size: A4;
            margin-top: 20px;
            margin-bottom: 20px;
            @bottom-center{
                content: "Page" counter(page)
            }
        }
@media print{
    body{
        margin-bottom: 1in;

    }

    .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
.page-break{

    page-break-after: always;
}
}
        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 5mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
        }

        p {
            margin: 0;
        }

        .table td,
        .table th {
            padding: 3px 3px;
            border: 1px solid #000;
        }

        .inner-table tr:first-child td,
        .inner-table tr:first-child th {
            border-top: 0
        }

        .inner-table tr td:first-child,
        .inner-table tr th:first-child {
            border-right: 0
        }

        .inner-table tr:last-child td,
        .inner-table tr:last-child th {
            border-bottom: 0
        }

        .inner-table tr td:last-child,
        .inner-table tr th:last-child {
            border-left: 0
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .bg-grey {
            background-color: #d8d8d8;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="page">
        <table class="header_table" style="width:100%;">
            <tr>
                <td style="text-align:right;width:33%;vertical-align:top;">
                    <br>
                    <br>
                    <p>پوهنحی: {{ $student->department->name }} <span style="font-size: 12px"></span></p>

                    <br>
                    <p>
                        ID محصل: {{ $student->konkor_id }}<span style="font-size: 12px"></span>
                    </p>
                    <br>
                    د مکتوب نیټه
                    <br>/ تاریخ مکتوب
                    <div
                        style="border: 1px solid #aaa;
							width: 124px;
							height: 30px;
							float: left;
							margin-left: 10px;
							margin-top: -8px;

                            padding-top:5px">
                        {{ now()->format('Y/m/d') }}
                    </div>
                </td>
                <td style="text-align:center;width:33%;vertical-align:top;">
                    <img src="" style="max-width: 80px" />
                    <p style="margin-top:5px;font-size: 14px">د لوړو زده کړو وزارت</p>
                    <p style="margin-top:5px;" > پوهنتون کابل </p>
                    <p style="margin-top:5px;">فورمه سوانح محصل</p>
                </td>
                <td style="text-align:right;width:33%;padding-right:17%;vertical-align:top;padding-top:1%;">
                    <img src="{{asset('wezarat-logo.jpg')}}" style="max-width: 100px">
                </td>
            </tr>
        </table>

        <table class="table" style="margin-top: 20px; margin-bottom: 10px">
            <tr>
                <th class="bg-grey center">
                    د محصل پیژند او نښی / شهرت و مشخصات محصل
                </th>
            </tr>
        </table>

        <table class="table ">
            <tr>
                <th class="bg-grey" colspan="2">پیژند / شهرت</th>
                <th class="bg-grey" colspan="2">د تذکره معلومات / معلومات تذکره</th>
                <th class="bg-grey" colspan="2">د زده کړی معلومات / معلومات تحصیلات</th>
            </tr>
            <tr>
                <td class="bg-grey">نوم / نام</td>
                <td>{{ $student->name ?? __('Not') }}</td>

                <td class="bg-grey">عمومی کڼه / نمبر عمومی</td>
                <td>{{ $student->konkor_id ?? __('Not') }}</td>

                <td class="bg-grey">د ښوونڅی نوم / نام مکتب</td>
                <td>{{ $student->school_name ?? __('Not') }}</td>
            </tr>
            <tr>
                <td class="bg-grey"> پلار نوم / نام پدر</td>
                <td>{{ $student->father_name ?? __('Not') }}</td>

                <td class="bg-grey"> شماره تماس</td>
                <td>{{ $student->phone ?? __('Not') }}</td>


                <td class="bg-grey"> د فراغت کال / سال فراغت</td>
                <td>{{ $student->graduate_year ?? __('Not') }}</td>

            </tr>
            <tr>
                <td class="bg-grey"> نیکه نوم / نام پدر کلان</td>
                <td>{{ $student->grand_father_name ?? __('Not') }}</td>

                <td class="bg-grey">پاڼه/ صفحه</td>
                <td></td>

                <td class="bg-grey">د کانکور کال / سال کانکور</td>
                <td>{{ $student->konkor_year ?? __('Not') }}</td>
            </tr>
            <tr>
                <td class="bg-grey"> کورنی نوم / نام فامیلی</td>
                <td>{{ $student->last_name ?? __('Not') }}</td>

                <td class="bg-grey"> ثبت ګڼه / شماره ثبت</td>
                <td>{{ $student->id_card ?? __('Not') }}</td>

                <td class="bg-grey">کانکور نمره / نمره کانکور</td>
                <td></td>
            </tr>
            <tr>
                <td class="bg-grey">د زیږیدولو کال / سال تولد</td>
                <td>{{ $student->dob ?? __('Not') }}</td>
                <td class="bg-grey">د زیږیدولو څای / محل تولد</td>
                <td>{{ $student->pob ?? __('Not') }}</td>

                <td class="bg-grey">د کانکور آی ډی / آی دی کانکور</td>
                <td>{{ $student->konkor_id ?? __('Not') }}</td>

            </tr>
        </table>
        <table class="table" style="margin-top: 20px">
            <tr>
                <th colspan="6" class="bg-grey center">
                    سایر مشخصات
                </th>
            </tr>
            <tr>
                <th colspan="2" class="bg-grey center">

                    @lang('Info In English')
                </th>
                <th colspan="2" class="bg-grey center">

                    @lang('University')
                </th>

            </tr>
            <tr>
                <th class="bg-grey center">@lang('Name in English')</th>
                <td dir="ltr">{{ $student->name_en ?? __('Not') }}</td>
                <th>@lang('Konkor Year')</th>

                <td dir="ltr">{{ $student->konkor_year ?? __('Not') }}</td>

            </tr>
            <tr>
                <th class="bg-grey center">@lang('Last Name in English')</th>
                <td dir="ltr">{{ $student->last_name_en ?? __('Not') }}</td>

                <th>@lang('Enter Year')</th>

                <td dir="ltr">{{ $student->enter_year ?? __('Not') }}</td>
            </tr>
            <tr>
                <th class="bg-grey center">@lang('Father Name in English')</th>

                <td dir="ltr">{{ $student->father_name_en ?? __('Not') }}</td>
                <th>@lang('Break Year')</th>

                <td dir="ltr">{{ $student->break_year ?? __('Not') }}</td>
            </tr>
            <tr>
                <th rowspan="4" class="bg-grey center">@lang('Grand Father Name in English')</th>

                <td rowspan="4" dir="ltr">{{ $student->grand_father_name_en ?? __('Not') }}</td>
                <th>@lang('Drop Year')</th>

                <td dir="ltr">{{ $student->drop_year ?? __('Not') }}</td>


            </tr>
            <tr>
                <th>@lang('Fail Year')</th>
                <td dir="ltr">{{ $student->fail_year ?? __('Not') }}</td>
            </tr>
            <tr>
                <th>@lang('Graduate Year')</th>

                <td dir="ltr">{{ $student->graduate_year ?? __('Not') }}</td>
            </tr>
            <tr>

            </tr>
        </table>
        <div class="page-break"></div>
        <table class="table" style="margin-top: 20px">
            <tr>
                <th colspan="10" class="bg-grey center">
                    @lang('Scores')
                </th>
            </tr>
        </table>
        @for ($i = 1; $i <= 8; $i++)
            <table class="table" style="margin-top: 20px">
                <thead>

                    <tr>
                        <th colspan="10" style="margin-top: 20px" class="bg-grey center">

                            @lang("semester $i")
                        </th>
                    </tr>
                    <tr>
                        <th class="bg-grey center">@lang('#')</th>
                        <th class="bg-grey center">@lang('Subject')</th>
                        <th class="bg-grey center">@lang('Credit')</th>
                        <th class="bg-grey center">@lang('Chance 1')</th>
                        <th class="bg-grey center">@lang('Chance 2')</th>
                        <th class="bg-grey center">@lang('Chance 3')</th>
                        <th class="bg-grey center">@lang('Chance 4')</th>
                        <th class="bg-grey center">@lang('Chance 5')</th>
                        <th class="bg-grey center">@lang('Total')</th>
                        <th class="bg-grey center">@lang('Group')</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($student->scores()->where('semister', "$i")->get() as $score)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $score->subject }}</td>
                            <td>{{ $score->credit }}</td>
                            <td>{{ $score->chance_1 }}</td>
                            <td>{{ $score->chance_2 }}</td>
                            <td>{{ $score->chance_3 }}</td>
                            <td>{{ $score->chance_4 }}</td>
                            <td>{{ $score->chance_5 }}</td>
                            <td>{{ $score->total }}</td>
                            <td>{{ $score->group }}</td>


                        </tr>
                    @endforeach
                    <tr>
                        @php
                            $total = "subject_total$i";
                        @endphp
                        <td colspan="10" class="bg-grey">{{ $student->$total }}</td>
                    </tr>
                </tbody>


            </table>
        @endfor
<div>
این فورم توسط

</div>


    </div>
    <script>
    	window.print();
    </script>
</body>

</html>
