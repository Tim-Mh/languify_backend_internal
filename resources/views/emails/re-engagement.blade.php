@php
    $copy = [
        3 => ['eyebrow' => 'We miss you', 'title' => "It's been 3 days, {$name}", 'body' => "Your streak and progress are still saved. Jump back in for just a few minutes and pick up right where you left off."],
        7 => ['eyebrow' => 'Come back!', 'title' => "A week away from Languify", 'body' => "It's been a week since your last lesson, {$name}. Your progress is waiting. A quick session today gets you right back in the habit."],
        14 => ['eyebrow' => "Don't lose your progress", 'title' => "Still there, {$name}?", 'body' => "Two weeks is a long break. Your account and everything you've learned so far are still saved. Come finish what you started."],
        30 => ['eyebrow' => 'One last check-in', 'title' => "We'd love to see you again, {$name}", 'body' => "It's been a month since you last opened Languify. No pressure. Your account is still here whenever you're ready to pick learning back up."],
    ];
    $c = $copy[$stage] ?? $copy[3];
@endphp
@include('emails.partials.shell-open', ['emailTitle' => $c['title'], 'headerGradient' => 'linear-gradient(135deg, #9878b8 0%, #613f88 100%)'])

<tr>
  <td class="px" align="center" style="padding: 40px 48px 8px;">
    @include('emails.partials.mascot', ['variant' => 'secondary', 'mood' => 'sad'])
  </td>
</tr>

<tr>
  <td class="px" align="center" style="padding: 20px 48px 8px;">
    <p style="margin:0 0 12px; font-size:13px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:#613f88;">{{ $c['eyebrow'] }}</p>
    <h1 style="margin:0 0 16px; font-size:26px; line-height:1.3; font-weight:800; color:#281b37;">
      {{ $c['title'] }}
    </h1>
    <p style="margin:0; font-size:15px; line-height:1.6; color:#613f88;">
      {{ $c['body'] }}
    </p>
  </td>
</tr>

<tr>
  <td align="center" style="padding: 28px 48px 40px;">
    <a href="{{ $appUrl }}" style="display:inline-block; background-color:#e040a0; color:#ffffff; font-size:16px; font-weight:700; padding:14px 36px; border-radius:999px; box-shadow: 0 4px 14px rgba(224, 64, 160, 0.35);">
      Continue Learning
    </a>
  </td>
</tr>

@include('emails.partials.shell-close')
