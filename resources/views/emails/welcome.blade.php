<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to Languify</title>
<style>
  body, table, td { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
  body { margin: 0; padding: 0; background-color: #f5f2fa; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
  img { border: 0; display: block; }
  a { text-decoration: none; }

  @media only screen and (max-width: 600px) {
    .container { width: 100% !important; }
    .stack { display: block !important; width: 100% !important; padding-bottom: 12px !important; }
    .px { padding-left: 20px !important; padding-right: 20px !important; }
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
            <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#c22885;">Welcome aboard 🎉</p>
            <h1 style="margin:0 0 16px; font-size:28px; line-height:1.3; font-weight:800; color:#281b37;">
              Hey {{ $name }}, your language adventure starts now!
            </h1>
            <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
              You've just joined thousands of learners building a daily habit with Languify. Here's a quick look at what's waiting for you.
            </p>
          </td>
        </tr>

        <!-- CTA -->
        <tr>
          <td align="center" style="padding: 28px 48px 8px;">
            <a href="{{ $appUrl }}" style="display:inline-block; background-color:#e040a0; color:#ffffff; font-size:16px; font-weight:700; padding:14px 36px; border-radius:999px; box-shadow: 0 4px 14px rgba(224, 64, 160, 0.35);">
              Start Your First Lesson
            </a>
          </td>
        </tr>

        <!-- Feature grid -->
        <tr>
          <td class="px" style="padding: 32px 48px 8px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td class="stack" width="50%" valign="top" style="padding: 10px 8px 10px 0;">
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#fdf2f9; border-radius:16px;">
                    <tr>
                      <td style="padding: 20px;">
                        <div style="font-size:26px; line-height:1;">🔥</div>
                        <p style="margin:10px 0 4px; font-size:14px; font-weight:700; color:#281b37;">Build a streak</p>
                        <p style="margin:0; font-size:13px; line-height:1.5; color:#613f88;">Learn a little every day and watch your streak grow.</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td class="stack" width="50%" valign="top" style="padding: 10px 0 10px 8px;">
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#eafaff; border-radius:16px;">
                    <tr>
                      <td style="padding: 20px;">
                        <div style="font-size:26px; line-height:1;">💎</div>
                        <p style="margin:10px 0 4px; font-size:14px; font-weight:700; color:#281b37;">Earn gems &amp; rewards</p>
                        <p style="margin:0; font-size:13px; line-height:1.5; color:#045a80;">Unlock chests, avatar items, and bonus perks as you learn.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td class="stack" width="50%" valign="top" style="padding: 8px 8px 0 0;">
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f5f2fa; border-radius:16px;">
                    <tr>
                      <td style="padding: 20px;">
                        <div style="font-size:26px; line-height:1;">🏆</div>
                        <p style="margin:10px 0 4px; font-size:14px; font-weight:700; color:#281b37;">Compete &amp; earn badges</p>
                        <p style="margin:0; font-size:13px; line-height:1.5; color:#4d3269;">Climb the weekly leaderboard and collect badges as you go.</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td class="stack" width="50%" valign="top" style="padding: 8px 0 0 8px;">
                  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#fdf2f9; border-radius:16px;">
                    <tr>
                      <td style="padding: 20px;">
                        <div style="font-size:26px; line-height:1;">👨‍👩‍👧‍👦</div>
                        <p style="margin:10px 0 4px; font-size:14px; font-weight:700; color:#281b37;">Learn as a family</p>
                        <p style="margin:0; font-size:13px; line-height:1.5; color:#613f88;">Share Languify Family with up to 4 people on one plan.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- Tip -->
        <tr>
          <td class="px" style="padding: 28px 48px 40px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#281b37; border-radius:16px;">
              <tr>
                <td style="padding: 20px 24px;">
                  <p style="margin:0 0 4px; font-size:13px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase; color:#e878bb;">Quick tip</p>
                  <p style="margin:0; font-size:14px; line-height:1.6; color:#ebe3f5;">Just 5 minutes a day is enough to keep your streak alive. Set a daily reminder in the app so you never miss a lesson.</p>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- Footer -->
        <tr>
          <td align="center" style="padding: 24px 32px; background-color:#faf9fc; border-top:1px solid #ebe3f5;">
            <p style="margin:0 0 6px; font-size:13px; color:#9878b8;">Happy learning,<br><strong style="color:#613f88;">The Languify Team</strong></p>
            <p style="margin:12px 0 0; font-size:11px; color:#b8a0d0;">You're receiving this because you just created a Languify account.</p>
          </td>
        </tr>

      </table>

    </td>
  </tr>
</table>
</body>
</html>
