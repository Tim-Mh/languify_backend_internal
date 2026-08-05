@php
    // The app's real mascot (public/main_char.png in the web repo, deployed
    // to the same static host as the logo) — a plain hosted <img>, not
    // inline SVG/CSS, so it renders reliably across email clients.
    $width = 140;
    $height = 148; // matches the source image's ~0.946 aspect ratio
@endphp
<table role="presentation" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
  <tr>
    <td align="center">
      <img src="https://languify.us/main_char.png" alt="Languify mascot" width="{{ $width }}" height="{{ $height }}" style="display:block; width:{{ $width }}px; height:{{ $height }}px;">
    </td>
  </tr>
</table>
