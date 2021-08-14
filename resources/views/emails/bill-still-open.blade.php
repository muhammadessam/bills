<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <title>PaymentsReminder</title>
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }

        body {
            height: 100vh;
            background-color: #F1F2F3;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 500px;
            height: 250px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 10px 10px 5px 0px rgba(46,43,43,0.1);
            -webkit-box-shadow: 10px 10px 5px 0px rgba(46,43,43,0.1);
            -moz-box-shadow: 10px 10px 5px 0px rgba(46,43,43,0.1);
        }

        .header {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .row {
            width: 100%;
            display: flex;
            flex-direction: row-reverse;
        }

        .col-6 {
            width: 50%;
            padding: 0px 10px;
        }

        .rtl {
            direction: rtl;
        }

        .bold {
            font-weight: bolder;
        }
    </style>

</head>
<body>

<div class="container">
    <div class="header">
        <h2>تذكير بمدفوعات الفاتورة رقم : {{$bill->number}}</h2>
    </div>

    <div class="row">
        <div class="col-6 text-right rtl bold">
            رقم الفاتورة:
        </div>
        <div class="col-6 text-right rtl">{{$bill->number}}</div>
    </div>
    <div class="row">
        <div class="col-6 text-right rtl bold">
            تاريخ الاصدار:
        </div>
        <div class="col-6 text-right rtl">{{$bill->released_at->format('Y-m-d')}}</div>
    </div>
    <div class="row">
        <div class="col-6 text-right rtl bold">
            قيمة الفاتورة:
        </div>
        <div class="col-6 text-right rtl">{{$bill->amount}}</div>
    </div>
</div>

</body>
</html>
