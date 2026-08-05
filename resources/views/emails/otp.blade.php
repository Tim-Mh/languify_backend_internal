<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your Languify verification code</title>
<style>
  body, table, td { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
  body { margin: 0; padding: 0; background-color: #f5f2fa; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
  img { border: 0; display: block; }
  a { text-decoration: none; }

  @media only screen and (max-width: 600px) {
    .container { width: 100% !important; }
    .px { padding-left: 20px !important; padding-right: 20px !important; }
    .code { font-size: 34px !important; letter-spacing: 8px !important; }
  }
</style>
</head>
<body>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f5f2fa;">
  <tr>
    <td align="center" style="padding: 32px 16px;">

      <table role="presentation" class="container" width="600" cellpadding="0" cellspacing="0" style="width:600px; max-width:600px; background-color:#ffffff; border-radius:24px; overflow:hidden; box-shadow: 0 4px 24px rgba(120, 80, 168, 0.08);">

        <!-- Header -->
        <tr>
          <td align="center" style="background: linear-gradient(135deg, #e040a0 0%, #c22885 100%); padding: 36px 24px;">
            <img src="https://languify.us/logo.png" alt="Languify" width="64" height="64" style="border-radius:16px; background:#ffffff; padding:8px;">
          </td>
        </tr>

        <!-- Hero -->
        <tr>
          <td class="px" align="center" style="padding: 40px 48px 8px;">
            <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#c22885;">Verify your email 🔐</p>
            <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
              Hi {{ $name }}, here's your code
            </h1>
            <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
              Enter this code in the app to finish setting up your Languify account.
            </p>
          </td>
        </tr>

        <!-- OTP code box -->
        <tr>
          <td class="px" align="center" style="padding: 28px 48px 8px;">
            <table role="presentation" cellpadding="0" cellspacing="0" style="background-color:#fdf2f9; border:2px dashed #e878bb; border-radius:16px;">
              <tr>
                <td align="center" style="padding: 22px 40px;">
                  <span class="code" style="font-size:42px; font-weight:800; letter-spacing:12px; color:#c22885; font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">{{ $otp }}</span>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- Expiry -->
        <tr>
          <td align="center" style="padding: 12px 48px 8px;">
            <p style="margin:0; font-size:13px; font-weight:600; color:#9878b8;">This code expires in {{ $expiresMinutes }} minutes.</p>
          </td>
        </tr>

        <!-- Security note -->
        <tr>
          <td class="px" style="padding: 24px 48px 40px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f5f2fa; border-radius:16px;">
              <tr>
                <td style="padding: 18px 22px;">
                  <p style="margin:0; font-size:13px; line-height:1.6; color:#613f88;">
                    Didn't try to sign up? You can safely ignore this email. No account will be created and no changes will be made.
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- Footer -->
        <tr>
          <td align="center" style="padding: 24px 32px; background-color:#faf9fc; border-top:1px solid #ebe3f5;">
            <p style="margin:0 0 6px; font-size:13px; color:#9878b8;">Happy learning,<br><strong style="color:#613f88;">The Languify Team</strong></p>
            <p style="margin:12px 0 0; font-size:11px; color:#b8a0d0;">You're receiving this because someone entered this email to verify a Languify account.</p>
          </td>
        </tr>

      </table>

    </td>
  </tr>
</table>
</body>
</html>
