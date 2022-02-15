<DOCTYPE html>
    <html>

    <head>
        <title>Change Password</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <style type="text/css">
            /* FONTS */
            @media screen {
                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                }

                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 700;
                    src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                }
            }

            /* CLIENT-SPECIFIC STYLES */
            body,
            table,
            td,
            a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }

            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }

            img {
                -ms-interpolation-mode: bicubic;
            }

            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }

            table {
                border-collapse: collapse !important;
            }

            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            /* MOBILE STYLES */
            @media screen and (max-width:600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }

            /* ANDROID CENTER FIX */
            div[style*="margin: 16px 0;"] {
                margin: 0 !important;
            }

        </style>
    </head>

    <body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">

        <!-- HIDDEN PREHEADER TEXT -->
        <div
            style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
            Your Email was updated on {{ config('app.name', 'Pittige-Dates') }}, We Will be in tuch, Please check your login
            information,Thank you.
        </div>

        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <!-- LOGO -->
            <tr>
                <td bgcolor="#f4f4f4" align="center">
                    <!--[if (gte mso 9)|(IE)]>
              <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
              <tr>
              <td align="center" valign="top" width="600">
              <![endif]-->
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td align="center" valign="top" style="padding: 80px 10px 48px 10px;">
                                <a href="{{ url('/') }}" target="_blank">
                                    <img alt="Logo" src="{{ asset('assets/images/logo-img.png') }}"
                                        style="display: block; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;padding-right: 12px;height: 70px;"
                                        border="0">
                                </a>
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
              </td>
              </tr>
              </table>
            <![endif]-->
                </td>
            </tr>
            <!-- HERO -->
            <tr>
                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                    <!--[if (gte mso 9)|(IE)]>
              <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
              <tr>
              <td align="center" valign="top" width="600">
              <![endif]-->
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <tr>
                            <td bgcolor="#ffffff" align="center" valign="top"
                                style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                <h1 style="font-size: 42px; font-weight: 400; margin: 0;"> Your Email was updated on {{ config('app.name', 'Pittige-Dates') }}.</h1>
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
              </td>
              </tr>
              </table>
            <![endif]-->
                </td>
            </tr>
            <!-- COPY BLOCK -->
            <tr>
                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                    <!--[if (gte mso 9)|(IE)]>
              <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
              <tr>
              <td align="center" valign="top" width="600">
              <![endif]-->
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                        <!-- COPY -->
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 20px 30px 10px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">Hi {{ $name }} ,Your Email successfully updated. Please check your Email was updated,Thank you.</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 20px 30px 10px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <label>Name : {{ $name }}</label>

                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 20px 30px 10px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <label>Old Email : {{ $old_email }}</label>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 20px 30px 10px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <label>Old Password : {{ $old_password }}</label>

                            </td>
                        </tr> --}}
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 20px 30px 10px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                                <label>New updated Email : {{ $new_email }}</label>

                            </td>
                        </tr>

                        <!-- BULLETPROOF BUTTON -->
                        <tr>
                            <td bgcolor="#ffffff" align="left">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 20px 30px;">
                                            <table border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td align="center" style="border-radius: 3px;" bgcolor="#7774E7"><a
                                                            href="{{ route('login') }}" target="_blank"
                                                            style="font-size: 18px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 12px 50px; border-radius: 2px; border: 1px solid #7774E7; display: inline-block;">Login</a>
                                                    </td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        {{-- <tr>
                  <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 10px 30px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 25px;">
                    <p style="margin: 0;color:red">If you did not request a password reset , please ignore this email.</p>
                  </td>
                </tr> --}}
                        <tr>
                            <td bgcolor="#ffffff" align="left"
                                style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: &apos;Lato&apos;, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;">
                                <p style="margin: 0;">Thank you :) ,<br>{{ config('app.name', 'Pittige Dates') }}</p>
                            </td>
                        </tr>
                    </table>
                    <!--[if (gte mso 9)|(IE)]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                </td>
            </tr>

        </table>

    </body>

    </html>
