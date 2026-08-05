@include('emails.partials.shell-open', ['emailTitle' => 'Family Plan Invite'])

<tr>
  <td class="px" align="center" style="padding: 40px 48px 8px;">
    @include('emails.partials.mascot', ['variant' => 'accent', 'mood' => 'happy'])
  </td>
</tr>

<tr>
  <td class="px" align="center" style="padding: 20px 48px 8px;">
    <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#0072a0;">Family plan</p>
    <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
      {{ $ownerName }} invited you to their Family plan
    </h1>
    <p style="margin:0 0 12px; font-size:15px; line-height:1.6; color:#613f88;">
      Join {{ $ownerName }}'s Languify Family plan to unlock unlimited hearts, bonus gems, and more.
    </p>
    <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
      <strong>Important:</strong> create your Languify account using this same email address ({{ $inviteEmail }}). The invite can only be accepted by an account with a matching email.
    </p>
  </td>
</tr>

<tr>
  <td align="center" style="padding: 28px 48px 40px;">
    <a href="{{ $joinUrl }}" style="display:inline-block; background-color:#0090c8; color:#ffffff; font-size:16px; font-weight:700; padding:14px 36px; border-radius:999px; box-shadow: 0 4px 14px rgba(0, 144, 200, 0.35);">
      Accept Invite
    </a>
  </td>
</tr>

@include('emails.partials.shell-close', ['footerNote' => "This invite expires in 7 days. If you weren't expecting this, you can safely ignore it."])
