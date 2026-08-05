@include('emails.partials.shell-open', ['emailTitle' => "Don't lose your streak!"])

<tr>
  <td class="px" align="center" style="padding: 40px 48px 8px;">
    @include('emails.partials.mascot', ['variant' => 'primary', 'mood' => 'sad'])
  </td>
</tr>

<tr>
  <td class="px" align="center" style="padding: 20px 48px 8px;">
    <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#c22885;">Streak reminder ⏳</p>
    <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
      @if ($streak > 0)
        Don't lose your {{ $streak }}-day streak!
      @else
        You haven't learned today yet
      @endif
    </h1>
    <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
      Hi {{ $name }}, you haven't finished a lesson today. Just 5 minutes keeps @if ($streak > 0) your streak alive @else your habit going @endif. You've got time before the day ends.
    </p>
  </td>
</tr>

<tr>
  <td align="center" style="padding: 28px 48px 40px;">
    <a href="{{ $appUrl }}" style="display:inline-block; background-color:#e040a0; color:#ffffff; font-size:16px; font-weight:700; padding:14px 36px; border-radius:999px; box-shadow: 0 4px 14px rgba(224, 64, 160, 0.35);">
      Do a Quick Lesson
    </a>
  </td>
</tr>

@include('emails.partials.shell-close')

