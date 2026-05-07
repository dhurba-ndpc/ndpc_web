<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<body style="margin:0; padding:0; background:#f4f4f4; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                       style="background:#ffffff; margin:40px auto; border-radius:10px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#0d6efd; padding:30px; text-align:center; color:#ffffff;">
                            <h1 style="margin:0;">Welcome {{ $user->name }}</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:40px; color:#333333;">

                            <h2 style="margin-top:0;">Your account has been created successfully.</h2>

                            <p>
                                Below are your login details:
                            </p>

                            <table width="100%" cellpadding="10"
                                   style="background:#f8f9fa; border-radius:6px; margin:20px 0;">

                                <tr>
                                    <td width="120">
                                        <strong>Email:</strong>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Password:</strong>
                                    </td>
                                    <td>
                                      {{ $validatedData['password'] }}
                                    </td>
                                </tr>

                            </table>

                            <p>
                                For security reasons, please change your password after login.
                            </p>

                            <div style="text-align:center; margin:35px 0;">

                                <a href="{{ $resetLink }}"
                                   style="
                                        background:#0d6efd;
                                        color:#ffffff;
                                        padding:14px 28px;
                                        text-decoration:none;
                                        border-radius:5px;
                                        display:inline-block;
                                        font-weight:bold;
                                   ">
                                    Change Password
                                </a>

                            </div>

                            <p>
                                If you did not create this account, please ignore this email.
                            </p>

                            <br>

                            <p>
                                Regards,<br>
                                <strong>{{ config('app.name') }}</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8f9fa; padding:20px; text-align:center; color:#777777; font-size:14px;">

                            © {{ date('Y') }} {{ config('app.name') }}.
                            All rights reserved.

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>