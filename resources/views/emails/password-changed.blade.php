@include('emails.partials.shell-open', ['emailTitle' => 'Password Changed'])

<tr>
  <td class="px" align="center" style="padding: 40px 48px 8px;">
    @include('emails.partials.mascot', ['variant' => 'secondary', 'mood' => 'happy'])
  </td>
</tr>

<tr>
  <td class="px" align="center" style="padding: 20px 48px 8px;">
    <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#613f88;">Security notice</p>
    <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
      Your password was just changed
    </h1>
    <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
      Hi {{ $name }}, this confirms the password on your Languify account ({{ $email }}) was changed on {{ $changedAt }}.
    </p>
  </td>
</tr>

<tr>
  <td class="px" style="padding: 28px 48px 40px;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#fdf2f9; border-radius:16px;">
      <tr>
        <td style="padding: 20px 24px;">
          <p style="margin:0; font-size:14px; line-height:1.6; color:#9c1e6a;">
            <strong>Wasn't you?</strong> Reset your password immediately at
            <a href="{{ $resetUrl }}" style="color:#c22885; font-weight:700;">{{ $resetUrl }}</a>
            to secure your account.
          </p>
        </td>
      </tr>
    </table>
  </td>
</tr>

@include('emails.partials.shell-close', ['footerNote' => 'Sent because your Languify account password changed.'])
