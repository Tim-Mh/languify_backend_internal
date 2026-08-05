@include('emails.partials.shell-open', ['emailTitle' => 'League Result', 'headerGradient' => $promoted ? 'linear-gradient(135deg, #e040a0 0%, #c22885 100%)' : 'linear-gradient(135deg, #9878b8 0%, #613f88 100%)'])

<tr>
  <td class="px" align="center" style="padding: 40px 48px 8px;">
    @include('emails.partials.mascot', ['variant' => $promoted ? 'primary' : 'secondary', 'mood' => $promoted ? 'happy' : 'sad'])
  </td>
</tr>

<tr>
  <td class="px" align="center" style="padding: 20px 48px 8px;">
    @if ($promoted)
      <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#c22885;">Promoted 🏆</p>
      <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
        You climbed into {{ $tierName }}!
      </h1>
      <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
        Hi {{ $name }}, last week's XP pushed you up into the {{ $tierName }} league. Keep it up to climb even higher this week.
      </p>
    @else
      <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#613f88;">League update</p>
      <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
        You've dropped to {{ $tierName }}
      </h1>
      <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
        Hi {{ $name }}, last week's cohort was tough. You've moved down to the {{ $tierName }} league. Earn XP this week to climb back up.
      </p>
    @endif
  </td>
</tr>

<tr>
  <td align="center" style="padding: 28px 48px 40px;">
    <a href="{{ $appUrl }}" style="display:inline-block; background-color:#e040a0; color:#ffffff; font-size:16px; font-weight:700; padding:14px 36px; border-radius:999px; box-shadow: 0 4px 14px rgba(224, 64, 160, 0.35);">
      View Leaderboard
    </a>
  </td>
</tr>

@include('emails.partials.shell-close')
