<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $emailTitle ?? 'Languify' }}</title>
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
          <td align="center" style="background: {{ $headerGradient ?? 'linear-gradient(135deg, #e040a0 0%, #c22885 100%)' }}; padding: 36px 24px;">
            <img src="https://languify.us/logo.png" alt="Languify" width="64" height="64" style="border-radius:16px; background:#ffffff; padding:8px;">
          </td>
        </tr>
