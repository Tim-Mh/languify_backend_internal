@include('emails.partials.shell-open', ['emailTitle' => 'Payment Failed', 'headerGradient' => 'linear-gradient(135deg, #9878b8 0%, #613f88 100%)'])

<tr>
  <td class="px" align="center" style="padding: 40px 48px 8px;">
    @include('emails.partials.mascot', ['variant' => 'secondary', 'mood' => 'sad'])
  </td>
</tr>

<tr>
  <td class="px" align="center" style="padding: 20px 48px 8px;">
    <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#c22885;">Action needed</p>
    <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
      We couldn't process your payment
    </h1>
    <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
      Hi {{ $name }}, your card was declined for your {{ $planTitle }} plan, so your Languify access is on hold until it's resolved. Update your payment details and you'll be back in as soon as it goes through.
    </p>
  </td>
</tr>

<tr>
  <td align="center" style="padding: 28px 48px 8px;">
    <a href="{{ $appUrl }}" style="display:inline-block; background-color:#e040a0; color:#ffffff; font-size:16px; font-weight:700; padding:14px 36px; border-radius:999px; box-shadow: 0 4px 14px rgba(224, 64, 160, 0.35);">
      Update Payment Method
    </a>
  </td>
</tr>

<tr>
  <td class="px" style="padding: 28px 48px 40px;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#fdf2f9; border-radius:16px;">
      <tr>
        <td style="padding: 20px 24px;">
          <p style="margin:0; font-size:14px; line-height:1.6; color:#9c1e6a;">
            {{ $isFamilyOwner ? 'This also affects everyone on your Family plan. They\'re on hold too until payment goes through.' : 'Your progress and streak are safe. You\'ll pick up right where you left off once payment succeeds.' }}
          </p>
        </td>
      </tr>
    </table>
  </td>
</tr>

@include('emails.partials.shell-close', ['footerNote' => 'Sent because a payment on your Languify subscription failed.'])
