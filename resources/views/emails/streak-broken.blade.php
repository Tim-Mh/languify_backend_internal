@include('emails.partials.shell-open', ['emailTitle' => 'Streak Ended', 'headerGradient' => 'linear-gradient(135deg, #9878b8 0%, #613f88 100%)'])

<tr>
  <td class="px" align="center" style="padding: 40px 48px 8px;">
    @include('emails.partials.mascot', ['variant' => 'secondary', 'mood' => 'sad'])
  </td>
</tr>

<tr>
  <td class="px" align="center" style="padding: 20px 48px 8px;">
    <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#613f88;">Streak update</p>
    <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
      Your {{ $streak }}-day streak ended
    </h1>
    <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
      Hi {{ $name }}, you missed a lesson and your streak reset to zero. It happens. The fastest way to feel better is to start a new one today.
    </p>
  </td>
</tr>

<tr>
  <td align="center" style="padding: 28px 48px 40px;">
    <a href="{{ $appUrl }}" style="display:inline-block; background-color:#e040a0; color:#ffffff; font-size:16px; font-weight:700; padding:14px 36px; border-radius:999px; box-shadow: 0 4px 14px rgba(224, 64, 160, 0.35);">
      Start a New Streak
    </a>
  </td>
</tr>

@include('emails.partials.shell-close')
