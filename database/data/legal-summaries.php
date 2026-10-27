<?php

/**
 * Plain-language summaries of the legal pages (WCAG 3.1.5 Reading Level).
 *
 * The full Terms and Privacy Policy are written at a legal reading level. WCAG
 * AAA asks for a simpler version alongside, readable at about lower secondary
 * school level. Each summary is a short list of plain sentences, one per line,
 * shown above the full text as "In short".
 *
 * Used once, by the migration that adds the `summary` column, to fill rows that
 * have none. After that the admin panel is the place to edit them.
 *
 * slug => locale => lines
 */
return [
    'terms' => [
        'en' => [
            'You must be 13 or older to use Languify.',
            'Keep your password safe. You are responsible for what happens in your account.',
            'Gems, heart refills and plans cost money only if you choose to buy them. Payments go through Stripe.',
            'Plans renew by themselves until you cancel. You can cancel at any time.',
            'Do not cheat, use bots or post harmful content.',
            'We can close accounts that break these rules. You can delete your account at any time.',
        ],
        'fr' => [
            'Vous devez avoir au moins 13 ans pour utiliser Languify.',
            'Gardez votre mot de passe secret. Vous êtes responsable de ce qui se passe sur votre compte.',
            'Les gemmes, les recharges de cœurs et les abonnements ne sont payants que si vous décidez de les acheter. Les paiements passent par Stripe.',
            'Les abonnements se renouvellent tout seuls jusqu’à ce que vous les annuliez. Vous pouvez annuler à tout moment.',
            'Ne trichez pas, n’utilisez pas de robots et ne publiez rien de blessant.',
            'Nous pouvons fermer les comptes qui ne respectent pas ces règles. Vous pouvez supprimer votre compte à tout moment.',
        ],
        'es' => [
            'Debes tener al menos 13 años para usar Languify.',
            'Guarda tu contraseña en secreto. Eres responsable de lo que pase en tu cuenta.',
            'Las gemas, las recargas de corazones y los planes solo cuestan dinero si decides comprarlos. Los pagos se hacen con Stripe.',
            'Los planes se renuevan solos hasta que los canceles. Puedes cancelar cuando quieras.',
            'No hagas trampas, no uses bots y no publiques contenido dañino.',
            'Podemos cerrar las cuentas que no cumplan estas reglas. Puedes eliminar tu cuenta cuando quieras.',
        ],
        'de' => [
            'Du musst mindestens 13 Jahre alt sein, um Languify zu nutzen.',
            'Halte dein Passwort geheim. Du bist für alles verantwortlich, was in deinem Konto passiert.',
            'Edelsteine, Herz-Auffüllungen und Abos kosten nur Geld, wenn du sie kaufst. Bezahlt wird über Stripe.',
            'Abos verlängern sich von selbst, bis du kündigst. Du kannst jederzeit kündigen.',
            'Nicht schummeln, keine Bots benutzen und nichts Verletzendes posten.',
            'Wir können Konten schließen, die gegen diese Regeln verstoßen. Du kannst dein Konto jederzeit löschen.',
        ],
        'ja' => [
            'Languify を使うには 13 歳以上である必要があります。',
            'パスワードは他の人に教えないでください。アカウントで起きたことはあなたの責任になります。',
            'ジェム、ハートの回復、プランは、自分で買うと決めたときだけお金がかかります。支払いは Stripe で行います。',
            'プランは解約するまで自動で更新されます。解約はいつでもできます。',
            'ずるをしたり、ボットを使ったり、人を傷つける内容を投稿したりしないでください。',
            'ルールを守らないアカウントは停止することがあります。あなたはいつでもアカウントを削除できます。',
        ],
        'ko' => [
            'Languify를 사용하려면 13세 이상이어야 합니다.',
            '비밀번호를 안전하게 지키세요. 계정에서 일어나는 일은 본인 책임입니다.',
            '보석, 하트 충전, 요금제는 직접 구매할 때만 돈이 듭니다. 결제는 Stripe를 통해 이루어집니다.',
            '요금제는 취소할 때까지 자동으로 갱신됩니다. 언제든지 취소할 수 있습니다.',
            '부정행위, 봇 사용, 해로운 내용 게시는 하지 마세요.',
            '규칙을 어긴 계정은 정지될 수 있습니다. 계정은 언제든지 삭제할 수 있습니다.',
        ],
        'tr' => [
            'Languify’ı kullanmak için en az 13 yaşında olmalısın.',
            'Şifreni kimseyle paylaşma. Hesabında olan her şeyden sen sorumlusun.',
            'Mücevherler, kalp doldurma ve planlar yalnızca satın almayı seçersen ücretlidir. Ödemeler Stripe üzerinden yapılır.',
            'Planlar sen iptal edene kadar kendiliğinden yenilenir. İstediğin zaman iptal edebilirsin.',
            'Hile yapma, bot kullanma ve zarar veren içerik paylaşma.',
            'Bu kurallara uymayan hesapları kapatabiliriz. Hesabını istediğin zaman silebilirsin.',
        ],
        'ru' => [
            'Чтобы пользоваться Languify, вам должно быть не меньше 13 лет.',
            'Храните пароль в секрете. Вы отвечаете за всё, что происходит в вашем аккаунте.',
            'Кристаллы, восстановление сердец и подписки платные, только если вы сами решите их купить. Оплата проходит через Stripe.',
            'Подписка продлевается сама, пока вы её не отмените. Отменить можно в любой момент.',
            'Не жульничайте, не используйте ботов и не публикуйте вредный контент.',
            'Мы можем закрыть аккаунт, который нарушает эти правила. Вы можете удалить свой аккаунт в любой момент.',
        ],
        'ar' => [
            'يجب أن يكون عمرك 13 سنة أو أكثر لاستخدام Languify.',
            'احفظ كلمة المرور ولا تشاركها. أنت مسؤول عما يحدث في حسابك.',
            'الجواهر وإعادة ملء القلوب والخطط لا تكلف مالًا إلا إذا اخترت شراءها. يتم الدفع عبر Stripe.',
            'تتجدد الخطط تلقائيًا حتى تلغيها. يمكنك الإلغاء في أي وقت.',
            'لا تغش، ولا تستخدم برامج آلية، ولا تنشر محتوى مؤذيًا.',
            'يمكننا إغلاق الحسابات التي تخالف هذه القواعد. ويمكنك حذف حسابك في أي وقت.',
        ],
        'az' => [
            'Languify-dan istifadə etmək üçün ən azı 13 yaşın olmalıdır.',
            'Şifrəni heç kimlə paylaşma. Hesabında baş verən hər şeyə görə sən cavabdehsən.',
            'Daş-qaşlar, ürək doldurma və planlar yalnız sən almaq istəsən pullu olur. Ödənişlər Stripe vasitəsilə edilir.',
            'Planlar sən ləğv edənə qədər özü yenilənir. İstənilən vaxt ləğv edə bilərsən.',
            'Fırıldaq etmə, bot istifadə etmə və zərərli məzmun paylaşma.',
            'Bu qaydaları pozan hesabları bağlaya bilərik. Hesabını istənilən vaxt silə bilərsən.',
        ],
    ],

    'privacy' => [
        'en' => [
            'We collect your name, email, learning progress and basic details about your device.',
            'We use them to run the app, save your progress and keep your account safe.',
            'We never sell your data or use it for advertising.',
            'Payments are handled by Stripe or Apple. We never see your full card number.',
            'We share data only with services that help run the app, such as email and notifications.',
            'You can see, change or delete your data from your Profile at any time.',
        ],
        'fr' => [
            'Nous collectons votre nom, votre e-mail, vos progrès et quelques informations simples sur votre appareil.',
            'Nous les utilisons pour faire fonctionner l’application, enregistrer vos progrès et protéger votre compte.',
            'Nous ne vendons jamais vos données et ne les utilisons pas pour la publicité.',
            'Les paiements sont gérés par Stripe ou Apple. Nous ne voyons jamais votre numéro de carte complet.',
            'Nous partageons des données uniquement avec les services qui font fonctionner l’application, comme l’e-mail et les notifications.',
            'Vous pouvez voir, modifier ou supprimer vos données depuis votre Profil à tout moment.',
        ],
        'es' => [
            'Recogemos tu nombre, tu correo, tu progreso y algunos datos básicos de tu dispositivo.',
            'Los usamos para que la app funcione, guardar tu progreso y proteger tu cuenta.',
            'Nunca vendemos tus datos ni los usamos para publicidad.',
            'Los pagos los gestionan Stripe o Apple. Nunca vemos el número completo de tu tarjeta.',
            'Solo compartimos datos con servicios que ayudan a que la app funcione, como el correo y las notificaciones.',
            'Puedes ver, cambiar o eliminar tus datos desde tu Perfil cuando quieras.',
        ],
        'de' => [
            'Wir speichern deinen Namen, deine E-Mail, deinen Lernfortschritt und einfache Angaben zu deinem Gerät.',
            'Wir nutzen sie, um die App zu betreiben, deinen Fortschritt zu speichern und dein Konto zu schützen.',
            'Wir verkaufen deine Daten nie und nutzen sie nicht für Werbung.',
            'Zahlungen laufen über Stripe oder Apple. Deine vollständige Kartennummer sehen wir nie.',
            'Wir teilen Daten nur mit Diensten, die die App am Laufen halten, zum Beispiel für E-Mails und Mitteilungen.',
            'Du kannst deine Daten jederzeit in deinem Profil ansehen, ändern oder löschen.',
        ],
        'ja' => [
            'お名前、メールアドレス、学習の進み具合、端末についての簡単な情報を集めます。',
            'アプリを動かし、進み具合を保存し、アカウントを守るために使います。',
            'あなたのデータを売ったり、広告に使ったりすることはありません。',
            '支払いは Stripe または Apple が扱います。カード番号の全体を私たちが見ることはありません。',
            'データを共有するのは、メールや通知など、アプリを動かすためのサービスだけです。',
            'プロフィールからいつでもデータを見る、変える、削除することができます。',
        ],
        'ko' => [
            '이름, 이메일, 학습 진도, 기기에 대한 기본 정보를 수집합니다.',
            '앱을 운영하고, 진도를 저장하고, 계정을 안전하게 지키는 데 사용합니다.',
            '데이터를 판매하거나 광고에 사용하지 않습니다.',
            '결제는 Stripe 또는 Apple이 처리합니다. 저희는 카드 번호 전체를 볼 수 없습니다.',
            '데이터는 이메일, 알림처럼 앱 운영을 돕는 서비스와만 공유합니다.',
            '프로필에서 언제든지 내 데이터를 보고, 바꾸고, 삭제할 수 있습니다.',
        ],
        'tr' => [
            'Adını, e-postanı, öğrenme ilerlemeni ve cihazınla ilgili temel bilgileri topluyoruz.',
            'Bunları uygulamayı çalıştırmak, ilerlemeni kaydetmek ve hesabını korumak için kullanıyoruz.',
            'Verilerini asla satmıyoruz ve reklam için kullanmıyoruz.',
            'Ödemeleri Stripe veya Apple yönetir. Kart numaranın tamamını asla görmeyiz.',
            'Verileri yalnızca e-posta ve bildirimler gibi uygulamanın çalışmasına yardım eden hizmetlerle paylaşıyoruz.',
            'Verilerini istediğin zaman Profilinden görebilir, değiştirebilir veya silebilirsin.',
        ],
        'ru' => [
            'Мы собираем ваше имя, электронную почту, прогресс в обучении и простые данные об устройстве.',
            'Мы используем их, чтобы приложение работало, сохранялся ваш прогресс и аккаунт был защищён.',
            'Мы никогда не продаём ваши данные и не используем их для рекламы.',
            'Платежи обрабатывают Stripe или Apple. Мы никогда не видим полный номер вашей карты.',
            'Мы передаём данные только сервисам, которые помогают приложению работать, например почте и уведомлениям.',
            'Вы можете посмотреть, изменить или удалить свои данные в Профиле в любой момент.',
        ],
        'ar' => [
            'نجمع اسمك وبريدك الإلكتروني وتقدّمك في التعلم وبعض المعلومات البسيطة عن جهازك.',
            'نستخدمها لتشغيل التطبيق وحفظ تقدّمك وحماية حسابك.',
            'لا نبيع بياناتك أبدًا ولا نستخدمها للإعلانات.',
            'تتولى Stripe أو Apple عمليات الدفع. لا نرى أبدًا رقم بطاقتك كاملًا.',
            'نشارك البيانات فقط مع الخدمات التي تساعد على تشغيل التطبيق، مثل البريد الإلكتروني والإشعارات.',
            'يمكنك عرض بياناتك أو تغييرها أو حذفها من ملفك الشخصي في أي وقت.',
        ],
        'az' => [
            'Adını, e-poçtunu, öyrənmə irəliləyişini və cihazın haqqında sadə məlumatları toplayırıq.',
            'Onlardan tətbiqi işlətmək, irəliləyişini saxlamaq və hesabını qorumaq üçün istifadə edirik.',
            'Məlumatlarını heç vaxt satmırıq və reklam üçün istifadə etmirik.',
            'Ödənişləri Stripe və ya Apple idarə edir. Kartının tam nömrəsini heç vaxt görmürük.',
            'Məlumatları yalnız e-poçt və bildirişlər kimi tətbiqin işləməsinə kömək edən xidmətlərlə paylaşırıq.',
            'Məlumatlarına istənilən vaxt Profilindən baxa, onları dəyişə və ya silə bilərsən.',
        ],
    ],

    'delete-account' => [
        'en' => [
            'In the app or on the website, go to Profile, choose Delete account and confirm. It happens straight away.',
            'Cannot sign in? Send "Delete my account" through the Contact page. We act within 30 days.',
            'Everything is deleted: your details, progress, gems, hearts and avatar.',
            'An active plan is cancelled, but money already paid is not refunded.',
            'A deleted account cannot be brought back.',
        ],
    ],
];
