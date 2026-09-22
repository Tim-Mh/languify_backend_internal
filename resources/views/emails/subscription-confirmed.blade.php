@include('emails.partials.shell-open', ['emailTitle' => 'Subscription Confirmed'])

<tr>
  <td class="px" align="center" style="padding: 40px 48px 8px;">
    @include('emails.partials.mascot', ['variant' => 'primary', 'mood' => 'happy'])
  </td>
</tr>

<tr>
  <td class="px" align="center" style="padding: 20px 48px 8px;">
    <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#c22885;">You're all set 🎉</p>
    <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
      Your {{ $planTitle }} plan is active
    </h1>
    <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
      Thanks for subscribing, {{ $name }}!
      @if ($amountFormatted)
        You were charged <strong>{{ $amountFormatted }}</strong> for one {{ $interval ?? 'billing' }}, and
      @endif
      {{ $heartsPerk }}, bonus gems, and every other {{ $planTitle }} perk are live on your account right now.
    </p>
    @if ($expiresFormatted)
      <p style="margin:12px 0 0; font-size:14px; line-height:1.6; color:#7850a8;">
        Your plan is active until <strong>{{ $expiresFormatted }}</strong>. Renew any time before then to keep your perks (renewing early adds the extra time on, so you never lose days). If you don't renew, your account simply switches back to the free plan and your progress stays safe.
      </p>
    @endif
  </td>
</tr>

<tr>
  <td align="center" style="padding: 28px 48px 8px;">
    <a href="{{ $appUrl }}" style="display:inline-block; background-color:#e040a0; color:#ffffff; font-size:16px; font-weight:700; padding:14px 36px; border-radius:999px; box-shadow: 0 4px 14px rgba(224, 64, 160, 0.35);">
      Start Learning
    </a>
  </td>
</tr>

<tr>
  <td class="px" style="padding: 28px 48px 40px;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f5f2fa; border-radius:16px;">
      <tr>
        <td class="stack" width="50%" style="padding: 20px 24px;">
          <p style="margin:0 0 4px; font-size:13px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase; color:#7850a8;">Plan</p>
          <p style="margin:0; font-size:15px; font-weight:700; color:#281b37;">{{ $planTitle }}</p>
        </td>
        @if ($amountFormatted)
          <td class="stack" width="50%" style="padding: 20px 24px; border-left:1px solid #ebe3f5;">
            <p style="margin:0 0 4px; font-size:13px; font-weight:700; letter-spacing:0.5px; text-transform:uppercase; color:#7850a8;">Amount</p>
            <p style="margin:0; font-size:15px; font-weight:700; color:#281b37;">{{ $amountFormatted }}{{ $interval ? '/'.$interval : '' }}</p>
          </td>
        @endif
      </tr>
    </table>
  </td>
</tr>

@include('emails.partials.shell-close', ['footerNote' => 'You can manage or cancel your subscription any time from your Languify account.'])
