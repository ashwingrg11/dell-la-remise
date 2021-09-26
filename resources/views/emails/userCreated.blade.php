<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
​
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
​
    <style type="text/css">
​
        * {
            margin: 0;
            padding: 0;
            font-size: 100%;
            font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            line-height: 1.65;
        }
​
        img {
            max-width: 100%;
            margin: 0 auto;
            display: block;
        }
​
        body,
        .body-wrap {
            width: 100% !important;
            height: 100%;
            background: #f8f8f8;
        }
​
        .container {
            display: block !important;
            clear: both !important;
            margin: 0 auto !important;
            max-width: 580px !important;
        }
    </style>
</head>
​
<body>
    <table class="body-wrap" width="580" cellpadding="0" style="border-collapse:collapse; clear: both; margin: 0 auto; max-width: 580px;">
        <tr>
            <td>
                <table class="masthead" width="100%" >
                    <tr>
                        <td width="100%" >
                            <img src="{{cloudfrontUrl('images/cashback-banner.jpg')}}" alt="la-remise-en-plus">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="container">
                <table cellpadding="0" border="0" cellspacing="20" width="100%" style="width: 100%">
                    <tr>
                        <td style="font-size: 24px;font-weight: bold;">
                            Hello, {{ $detail['fullname'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 16px;">
                            <font style="font-size: 16px; line-height: 20px; margin: 0; padding: 0; font-family: 'Avenir Next', Arial, sans-serif;">
                                Your account has been created. Please use following details to login to your account.
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 16px;">
                            <font style="font-size: 16px; line-height: 20px; margin: 0; padding: 0; font-family: 'Avenir Next', Arial, sans-serif;">
                                Email : <b>{{ $email }}</b><br>
                                Password: <b>{{ $password }}</b>
                            </font>
                        </td>
                    </tr>
                   
                    <tr>
                        <td style="font-size: 16px;">
                            <font style="font-size: 16px; line-height: 20px; margin: 0; padding: 0; font-family: 'Avenir Next', Arial, sans-serif;">
                                Sincerely,<br>
                                LaRemiseenplus team.<br>
                                <a style="color:#0076CE" href="mailto:contact@laremiseenplus.com" target="__blank">contact@laremiseenplus.com.</a>
                            </font>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="20" style="height: 20px;"></td>
        </tr>
    </table>
​
</body>
​
