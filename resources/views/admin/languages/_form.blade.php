@php
    $language ??= null;
    $flag = old('flag_emoji', $language?->flag_emoji);
@endphp

{{-- Flag first: picking one also fills in the code and names when adding a
     new language, so usually only a quick check is left. --}}
<div data-flag-picker data-fill-empty="{{ $language ? '0' : '1' }}">
    <span class="field-label">Flag</span>
    <input type="hidden" id="flag_emoji" name="flag_emoji" value="{{ $flag }}">
    <button type="button" data-flag-toggle aria-expanded="false" aria-controls="flag-panel"
            class="flex w-full items-center gap-3 rounded-xl border border-gray-200 bg-white px-3 py-2.5 text-left hover:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/30">
        <span data-flag-current class="text-3xl leading-none">{{ $flag ?: '🏳️' }}</span>
        <span class="flex-1 text-sm font-semibold text-gray-700" data-flag-label>{{ $flag ? 'Change flag' : 'Choose a flag' }}</span>
        <svg class="h-5 w-5 text-gray-400" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
    </button>
    <div id="flag-panel" data-flag-panel class="mt-2 hidden rounded-xl border border-gray-200 bg-white p-3">
        <label for="flag-search" class="sr-only">Search countries</label>
        <input type="search" id="flag-search" data-flag-search class="field-input" placeholder="Search a country, for example Italy">
        <ul data-flag-list class="mt-3 grid max-h-72 grid-cols-2 gap-1 overflow-y-auto overscroll-contain pr-1 sm:grid-cols-3" role="listbox" aria-label="Flags"></ul>
        @if ($flag)
            <button type="button" data-flag-clear class="mt-2 text-xs font-bold text-gray-500 hover:text-rose-600">Remove flag</button>
        @endif
    </div>
    @error('flag_emoji') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label for="name" class="field-label">Name in English</label>
        <input type="text" id="name" name="name" value="{{ old('name', $language?->name) }}" required class="field-input" placeholder="Spanish">
        @error('name') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label for="native_name" class="field-label">Name in the language itself</label>
        <input type="text" id="native_name" name="native_name" value="{{ old('native_name', $language?->native_name) }}" required class="field-input" placeholder="Español">
        @error('native_name') <p class="field-error">{{ $message }}</p> @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="code" class="field-label">Code</label>
        <input type="text" id="code" name="code" value="{{ old('code', $language?->code) }}" required maxlength="10" class="field-input font-mono" placeholder="es">
        <p class="field-hint">Two-letter language code such as en, es, ja. Filled in from the flag; check it. The apps use it to pick translations and voices.</p>
        @error('code') <p class="field-error">{{ $message }}</p> @enderror
    </div>
</div>

@unless ($language)
    <p class="text-xs text-gray-500">A new language starts hidden. Switch it to Live on its card once its course is ready.</p>
@endunless

@push('scripts')
<script>
    (() => {
        const root = document.querySelector('[data-flag-picker]')
        if (!root) return

        // Every country with a flag (ISO 3166 codes). Names come from the browser.
        const COUNTRIES = 'AD AE AF AG AI AL AM AO AQ AR AS AT AU AW AX AZ BA BB BD BE BF BG BH BI BJ BL BM BN BO BQ BR BS BT BV BW BY BZ CA CC CD CF CG CH CI CK CL CM CN CO CR CU CV CW CX CY CZ DE DJ DK DM DO DZ EC EE EG EH ER ES ET FI FJ FK FM FO FR GA GB GD GE GF GG GH GI GL GM GN GP GQ GR GS GT GU GW GY HK HM HN HR HT HU ID IE IL IM IN IO IQ IR IS IT JE JM JO JP KE KG KH KI KM KN KP KR KW KY KZ LA LB LC LI LK LR LS LT LU LV LY MA MC MD ME MF MG MH MK ML MM MN MO MP MQ MR MS MT MU MV MW MX MY MZ NA NC NE NF NG NI NL NO NP NR NU NZ OM PA PE PF PG PH PK PL PM PN PR PS PT PW PY QA RE RO RS RU RW SA SB SC SD SE SG SH SI SJ SK SL SM SN SO SR SS ST SV SX SY SZ TC TD TF TG TH TJ TK TL TM TN TO TR TT TV TW TZ UA UG UM US UY UZ VA VC VE VG VI VN VU WF WS YE YT ZA ZM ZW'.split(' ')

        // The main language of a country, used to fill in the code. Countries
        // not listed leave the code for the admin to type.
        const LANGUAGE = {
            US: 'en', GB: 'en', AU: 'en', NZ: 'en', IE: 'en', CA: 'en', ES: 'es', MX: 'es', AR: 'es', CO: 'es', CL: 'es', PE: 'es', VE: 'es',
            FR: 'fr', BE: 'fr', DE: 'de', AT: 'de', CH: 'de', IT: 'it', PT: 'pt', BR: 'pt', NL: 'nl', SE: 'sv', NO: 'no', DK: 'da', FI: 'fi',
            IS: 'is', PL: 'pl', CZ: 'cs', SK: 'sk', HU: 'hu', RO: 'ro', BG: 'bg', GR: 'el', HR: 'hr', RS: 'sr', SI: 'sl', UA: 'uk', RU: 'ru',
            BY: 'be', LT: 'lt', LV: 'lv', EE: 'et', TR: 'tr', AZ: 'az', GE: 'ka', AM: 'hy', KZ: 'kk', UZ: 'uz', SA: 'ar', AE: 'ar', EG: 'ar',
            MA: 'ar', DZ: 'ar', IQ: 'ar', JO: 'ar', IL: 'he', IR: 'fa', AF: 'ps', PK: 'ur', IN: 'hi', BD: 'bn', LK: 'si', NP: 'ne', CN: 'zh',
            TW: 'zh', HK: 'zh', JP: 'ja', KR: 'ko', VN: 'vi', TH: 'th', ID: 'id', MY: 'ms', PH: 'tl', MM: 'my', KH: 'km', LA: 'lo', MN: 'mn',
            KE: 'sw', TZ: 'sw', ET: 'am', NG: 'ha', ZA: 'af', SO: 'so', AL: 'sq', MK: 'mk', BA: 'bs', ME: 'sr', MT: 'mt', LU: 'lb', CY: 'el',
        }

        const flagOf = (code) => String.fromCodePoint(...[...code].map((c) => 0x1F1E6 + c.charCodeAt(0) - 65))
        const codeOf = (flag) => [...(flag || '')].map((c) => String.fromCharCode(c.codePointAt(0) - 0x1F1E6 + 65)).join('')
        let regionName = (code) => code
        try { const names = new Intl.DisplayNames(['en'], { type: 'region' }); regionName = (code) => names.of(code) } catch (e) {}
        const languageName = (code, locale) => { try { return new Intl.DisplayNames([locale], { type: 'language' }).of(code) } catch (e) { return '' } }

        const countries = COUNTRIES.map((code) => ({ code, flag: flagOf(code), name: regionName(code) })).sort((a, b) => a.name.localeCompare(b.name))
        const input = root.querySelector('#flag_emoji')
        const panel = root.querySelector('[data-flag-panel]')
        const toggle = root.querySelector('[data-flag-toggle]')
        const list = root.querySelector('[data-flag-list]')
        const search = root.querySelector('[data-flag-search]')
        const form = root.closest('form')

        const render = () => {
            const q = search.value.trim().toLowerCase()
            const current = codeOf(input.value)
            list.innerHTML = ''
            countries.filter((c) => !q || c.name.toLowerCase().includes(q) || c.code.toLowerCase() === q).forEach((c) => {
                const li = document.createElement('li')
                li.innerHTML = `<button type="button" role="option" class="flex w-full items-center gap-2 rounded-lg px-2 py-1.5 text-left text-sm hover:bg-brand-50"><span class="text-2xl leading-none"></span><span class="min-w-0 truncate"></span></button>`
                const button = li.querySelector('button')
                button.setAttribute('aria-selected', c.code === current ? 'true' : 'false')
                if (c.code === current) button.classList.add('bg-brand-50', 'ring-1', 'ring-brand-300')
                li.querySelector('span').textContent = c.flag
                li.querySelector('span:last-child').textContent = c.name
                button.addEventListener('click', () => pick(c))
                list.append(li)
            })
            if (!list.children.length) list.innerHTML = '<li class="col-span-full py-4 text-center text-sm text-gray-500">No country matches.</li>'
        }

        const setOpen = (open) => {
            panel.classList.toggle('hidden', !open)
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false')
            if (open) { render(); search.focus() }
        }

        const fill = (name, value) => {
            const field = form.querySelector(`[name="${name}"]`)
            if (field && value && (root.dataset.fillEmpty === '1' || !field.value.trim())) field.value = value
        }

        const pick = (c) => {
            input.value = c.flag
            root.querySelector('[data-flag-current]').textContent = c.flag
            root.querySelector('[data-flag-label]').textContent = c.name
            const lang = LANGUAGE[c.code]
            if (lang && root.dataset.fillEmpty === '1') {
                fill('code', lang)
                fill('name', languageName(lang, 'en'))
                const own = languageName(lang, lang)
                fill('native_name', own ? own.charAt(0).toLocaleUpperCase(lang) + own.slice(1) : '')
            }
            setOpen(false)
        }

        toggle.addEventListener('click', () => setOpen(panel.classList.contains('hidden')))
        search.addEventListener('input', render)
        search.addEventListener('keydown', (event) => { if (event.key === 'Enter') event.preventDefault() })
        root.querySelector('[data-flag-clear]')?.addEventListener('click', () => {
            input.value = ''
            root.querySelector('[data-flag-current]').textContent = '🏳️'
            root.querySelector('[data-flag-label]').textContent = 'Choose a flag'
            setOpen(false)
        })
    })()
</script>
@endpush
