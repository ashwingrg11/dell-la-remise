<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />

    <style type="text/css">

        * {
            margin: 0;
            padding: 0;
            font-size: 100%;
            font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            line-height: 1.65;
        }

        img {
            max-width: 100%;
            margin: 0 auto;
            display: block;
        }

        body,
        .body-wrap {
            width: 100% !important;
            height: 100%;
            background: #ffffff;
        }

        .container {
            display: block !important;
            clear: both !important;
            margin: 0 auto !important;
            max-width: 580px !important;
        }
        
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u~div .email-container {
                min-width: 320px !important;
            }
        }

        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u~div .email-container {
                min-width: 375px !important;
            }
        }

        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u~div .email-container {
                min-width: 414px !important;
            }
        }

        @media only screen and (max-width: 600px) {
            .heading-section {
                font-size: 30px !important;
            }
        }
    </style>
</head>

<body>
    <center style="width: 100%; background-color:#ffffff;">
        <div style="max-width: 580px; margin: 0 auto;" class="email-container">
            <table align="center" class="body-wrap" width="580" cellpadding="0" style="border-collapse:collapse; clear: both; margin: 0 auto; max-width: 580px;">
                <tr>
                    <td width="580">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                            <tr>
                                <td width="580">
                                    <table class="masthead" width="100%" style="width:100%;">
                                        <tr>
                                            <td width="100%"><img src="{{cloudfrontUrl('images/cashback-banner.jpg')}}" alt="La Remise en plus"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr widt>
                                <td class="container" width="580">
                                    <table cellpadding="0" border="0" cellspacing="20" width="100%" style="width: 100%">
                                        <tr>
                                            <td style="font-size: 24px;font-weight: bold;">
                                                Cher(e) Partenaire,
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 16px;">
                                                <font style="font-size: 16px; line-height: 20px; margin: 0; padding: 0; font-family: 'Avenir Next', Arial, sans-serif;">
                                                    Suite à votre achat de matériel Dell et votre demande de remboursement sur le site <a style="color:#0076CE" href="https://laremiseenplus.com/" target="_blank">laremiseenplus.com</a>,
                                                    nous sommes au regret de vous annoncer que votre demande n’a pas été validée.
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 16px;">
                                                <font style="font-size: 16px; line-height: 20px; margin: 0; padding: 0; font-family: 'Avenir Next', Arial, sans-serif;">
                                                    {{$detail->disapprove_reason}}
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 16px;">
                                                <font style="font-size: 16px; line-height: 20px; margin: 0; padding: 0; font-family: 'Avenir Next', Arial, sans-serif;">
                                                    Durant la durée de l’opération, vous pouvez refaire une demande de remboursement par mois calendaire sur la base de vos achats de produits éligibles Dell.
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 16px;">
                                                <font style="font-size: 16px; line-height: 20px; margin: 0; padding: 0; font-family: 'Avenir Next', Arial, sans-serif;">
                                                    Donc, n’hésitez pas à revenir le mois prochain.
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 16px;">
                                                <font style="font-size: 16px; line-height: 20px; margin: 0; padding: 0; font-family: 'Avenir Next', Arial, sans-serif;">
                                                    Cordialement,<br>
                                                    L’équipe LaRemiseenplus.<br>
                                                    <a style="color:#0076CE" href="mailto:contact@laremiseenplus.com" target="__blank">contact@laremiseenplus.com.</a>
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 16px;">
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 16px;">
                                            
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20" style="height: 20px;"></td>
                            </tr>
                        </table>
                    </td>
                </tr>                
            </table>
        </div>
    </center>
</body>

</html>
